<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssetResource;
use App\Models\AssetPpm;
use App\Models\PpmSchedule;
use App\Models\TblAssetImages;
use App\Models\TblBuildingBlock;
use Illuminate\Http\Request;
use App\Models\TblEquipmentStatus;
use App\Models\TblFloor;
use App\Models\TblDepartment;
use App\Models\TblPpmType;
use App\Models\TblScheduleType;
use App\Models\Vendor;
use App\Models\User;
use App\Models\WorkOrder;
use Webmozart\Assert\Assert;
use Carbon\Carbon;
use Storage;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Asset::all();
        return AssetResource::collection($assets);
        //
    }

    public function assetsList()
    {

        $assets = Asset::all();
        return view('Assets.asset-list', compact('assets'));
    }

    public function getDeptAssets(Request $request)
    {


        $assets = Asset::where('asset_technical_category', $request->id)->get();

        return $assets;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::all();
        $vendors = Vendor::all();
        $floors = TblFloor::all();
        $eq_status = TblEquipmentStatus::all();
        $departments = TblDepartment::all();
        $blocks = TblBuildingBlock::all();

        $ppmTypes = TblPpmType::all();
        $scheduleTypes = TblScheduleType::all();
        $responseData = [
            'users' => $users,
            'vendors' => $vendors,
            'floors' => $floors,
            'eq_status' => $eq_status,
            'departments' => $departments,
            'blocks' => $blocks,
            'ppmTypes' => $ppmTypes,
            'scheduleTypes' => $scheduleTypes
        ];
       return$responseData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $asset = new Asset();
        $asset->asset_technical_category = $request->asset_technical_category;
        $asset->equipment_category_name = $request->equipment_category_name;
        $asset->equipment_type = $request->equipment_type;
        $asset->manufacturer = $request->manufacturer;
        $asset->model = $request->model;
        $asset->serial_number = $request->serial_number;
        $asset->fa_number = $request->fa_number;
        $asset->equipment_sequence_number = $request->equipment_sequence_number;
        $asset->manufacture_date = $request->manufacture_date;
        $asset->installation_date = $request->installation_date;
        $asset->equipment_status = $request->equipment_status;
        // $asset->manual_file_path;
        $asset->vendor = $request->vendor;
        $asset->room_area = $request->room_area;
        $asset->section = $request->section;
        $asset->sub_section = $request->sub_section;
        $asset->custodian_name = $request->custodian_name;
        $asset->office_extention = $request->office_extention;
        $asset->mobile = $request->mobile;
        $asset->email = $request->email;
        // $asset->last_ppm_date;
        // $asset->next_ppm_date;
        $asset->building_block = $request->building_block;
        $asset->floor = $request->floor;
        $asset->department = $request->deparment;

        if ($request->hasFile('file_name')) {

            $file = $request->file('file_name');
            // dd($file);s
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file('file_name')->storeAs('uploads', $fileName, 'public');
            $asset->manual_file_name = $file->getClientOriginalName();
            $asset->manual_file_path = url('/') . '/public/storage/' . $filePath;
        }

        $asset->save();
        if ($request->is('api/*')) {
            // Return JSON response for API requests
            return "Asset Saved";
        } else {
            // Return  response for web requests
            $vendors = Vendor::all();
            $floors = TblFloor::all();
            $eq_status = TblEquipmentStatus::all();
            $departments = TblDepartment::all();
            $blocks = TblBuildingBlock::all();
            return view('Assets.add-asset', compact('asset', 'eq_status', 'floors', 'departments', 'vendors', 'blocks'));
        }
       
       
    }

    public function selectAsset($id)
    {

        $vendors = Vendor::all();
        $floors = TblFloor::all();
        $eq_status = TblEquipmentStatus::all();
        $departments = TblDepartment::all();
        $blocks = TblBuildingBlock::all();
        $asset = Asset::find($id);
        $ppmTypes = TblPpmType::all();
        $scheduleTypes = TblScheduleType::all();
        // $asset->ppm_type;
        return view('Assets.add-asset', compact('asset', 'eq_status', 'floors', 'departments', 'vendors', 'blocks', 'ppmTypes', 'scheduleTypes'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */

    public function show($id,Request $request)
    {   
        $asset = Asset::find($id);
        //
        if ($request->is('api/*')) {
            // Return JSON response for API requests
            return AssetResource::make($asset);
            
        } else {
            // Return Inertia response for web requests
            return redirect()->route('select-asset', $asset->id);

        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //

    }

    // this is not the way to finalize
    public function finalizeSchedule(Request $request)
    {
        // creating the schdeule type
        $schedule = new PpmSchedule();
        $schedule->asset_id = $request->asset_id;
        $schedule->schedule_type_id = $request->schedule_type_id;
        $schedule->ppm_type_id  = $request->ppm_type_id;
        $schedule->num_of_itt = $request->num_of_itt;
        $schedule->meter_value = $request->meter_value;
        $schedule->meter_unit = $request->meter_unit;
        $schedule->save();
        // creating the ppm entried
        if ($request->schedule_type_id == 2) {

            for ($i = 1; $i <= $request->num_of_itt; $i++) {
                $scheduleEntry = new AssetPpm();
                $scheduleEntry->asset_id = $request->asset_id;
                $scheduleEntry->save();
            }

        } else {

            $factor = 1;
            // weekly 
            if ($request->ppm_type_id == 1) {
                // 52
                $factor = 52;
            }
            // monthly
            else if ($request->ppm_type_id == 2) {
                // 12
                $factor = 12;
            }
            // quarterly
            else if ($request->ppm_type_id == 3) {
                // 4
                $factor = 4;
            }
            // bi-annually
            else if ($request->ppm_type_id == 4) {
                // 2
                $factor = 2;
            }
            // annually
            else if ($request->ppm_type_id == 5) {
                // 1
                $factor = 1;
            }
            $asset = Asset::find($request->asset_id);

            for ($i = 1; $i <= $factor * $request->num_of_itt; $i++) {


                $d = new Carbon($asset->installation_date);
                if ($request->ppm_type_id != 1) {

                    $mul = 12 / $factor * $i;
                    $d->addMonth($mul);
                } else {

                    $mul = 7 * $i;
                    $d->addDay($mul);
                }
                $scheduleEntry = new AssetPpm();
                $scheduleEntry->asset_id = $request->asset_id;
                $scheduleEntry->expected_date = $d;
                $scheduleEntry->save();
            }
        }
        
        return redirect()->route('asset.show', $request->asset_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $ast)
    {
        //
        $asset = Asset::find($request->id);
        if(!$asset){
            return $request->all();
        }
        $asset->asset_technical_category = $request->asset_technical_category;
        $asset->equipment_category_name = $request->equipment_category_name;
        $asset->equipment_type = $request->equipment_type;
        $asset->manufacturer = $request->manufacturer;
        $asset->model = $request->model;
        $asset->serial_number = $request->serial_number;
        $asset->fa_number = $request->fa_number;
        $asset->equipment_sequence_number = $request->equipment_sequence_number;
        $asset->manufacture_date = $request->manufacture_date;
        $asset->installation_date = $request->installation_date;
        $asset->equipment_status = $request->equipment_status;
        // $asset->manual_file_path;
        $asset->vendor = $request->vendor;
        $asset->room_area = $request->room_area;
        $asset->section = $request->section;
        $asset->sub_section = $request->sub_section;
        $asset->custodian_name = $request->custodian_name;
        $asset->office_extention = $request->office_extention;
        $asset->mobile = $request->mobile;
        $asset->email = $request->email;
        // $asset->last_ppm_date;
        // $asset->next_ppm_date;
        $asset->building_block = $request->building_block;
        $asset->floor = $request->floor;
        $asset->department = $request->deparment;

        if ($request->hasFile('file_name')) {

            $file = $request->file('file_name');
            // dd($file);s
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file('file_name')->storeAs('uploads', $fileName, 'public');
            $asset->manual_file_name = $file->getClientOriginalName();
            $asset->manual_file_path = url('/') . '/public/storage/' . $filePath;
        }


        $asset->save();

        if ($request->is('api/*')) {
            // Return JSON response for API requests
            return $asset;  
        }

        $vendors = Vendor::all();
        $floors = TblFloor::all();
        $eq_status = TblEquipmentStatus::all();
        $departments = TblDepartment::all();
        $blocks = TblBuildingBlock::all();
        // $asset->ppm_type;
        return view('Assets.add-asset', compact('asset', 'eq_status', 'floors', 'departments', 'vendors', 'blocks'));
    }

    public function getAssetDetails(Request $request)
    {

        // dd($request->all());
        $asset = Asset::where('id', '=', $request->id)->with('assetImages')->get();;

        return $asset;
    }

    public function updateImages(Request $request)
    {


        $asset = Asset::find($request->asset_id);
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            $image = new TblAssetImages();
            $image->image_path = url('/') . '/public/storage/' . $filePath;
            $image->image_name =  $file->getClientOriginalName();
            $image->active = 1;
            $image->asset_id = $request->asset_id;
            $image->save();
        }

        return redirect()->route('select-asset', $asset->id);
    }


    public function deleteImages(Request $request)
    {
        // dd($request->all());
        $image = TblAssetImages::find($request->image_id);
        // // dd($image->image_path);

        // if(file_exists(storage_path($image->image_path))){
        //     unlink(storage_path($image->image_path));
        //   }else{
        //     dd('File not found');
        //   }
        // if(Storage::exists($image->image_path)){
        //     Storage::delete($image->image_path);

        // }else{
        //     dd('File does not exist.');
        // }


        $image->delete();
        return redirect()->route('select-asset', $request->asset_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        //
    }

    public function finalizePpm(Request $request)
    {

        $asset = Asset::find($request->asset_id);
        $workOrder = new WorkOrder();
        $workOrder->request_type_id = 1;
        $workOrder->department_id = $asset->department_id;
        $workOrder->asset_id = $request->asset_id;
        $workOrder->priority_id = 1;
        $workOrder->due_date = $request->planned_date;
        $workOrder->status_id = 1;
        $workOrder->title = "ppm";
        $workOrder->description = $request->description;
        $workOrder->save();

        $ppm = AssetPpm::find($request->ppm_id);
        $ppm->work_order_id = $workOrder->id;
        $ppm->save();

        return redirect()->route('workOrder.index');
    }
}
