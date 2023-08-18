<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssetResource;
use App\Models\Asset;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AssetApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AssetResource::collection(Asset::all());
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
        $asset->asset_technical_category = $request->asset_tech_cat;
        $asset->equipment_category_name = $request->equipment_category_name;
        $asset->equipment_type = $request->equipment_type;
        $asset->manufacturer = $request->manufacturer;
        $asset->model = $request->model;
        $asset->serial_number = $request->serial_number;
        $asset->fa_number = $request->fa_number;
        $asset->equipment_sequence_number = $request->equipment_seq_number;
        $asset->manufacture_date = $request->manufacture_date;
        $asset->installation_date = $request->installation_date;
        $asset->equipment_status = $request->asset_status;
        // $asset->manual_file_path;
        $asset->vendor = $request->vendor;
        $asset->room_area = $request->room_area;
        $asset->section = $request->section;
        $asset->sub_section = $request->sub_section;
        $asset->custodian_name = $request->custodian_name;
        $asset->office_extention = $request->custodian_ofc_ext;
        $asset->mobile = $request->custodian_mobile;
        $asset->email = $request->custodian_email;
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
        return response()->json(["success"=>"Asset added successfully"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
        return AssetResource::make($asset);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //
        $asset->asset_technical_category = $request->asset_tech_cat;
        $asset->equipment_category_name = $request->equipment_category_name;
        $asset->equipment_type = $request->equipment_type;
        $asset->manufacturer = $request->manufacturer;
        $asset->model = $request->model;
        $asset->serial_number = $request->serial_number;
        $asset->fa_number = $request->fa_number;
        $asset->equipment_sequence_number = $request->equipment_seq_number;
        $asset->manufacture_date = $request->manufacture_date;
        $asset->installation_date = $request->installation_date;
        $asset->equipment_status = $request->asset_status;
        // $asset->manual_file_path;
        $asset->vendor = $request->vendor;
        $asset->room_area = $request->room_area;
        $asset->section = $request->section;
        $asset->sub_section = $request->sub_section;
        $asset->custodian_name = $request->custodian_name;
        $asset->office_extention = $request->custodian_ofc_ext;
        $asset->mobile = $request->custodian_mobile;
        $asset->email = $request->custodian_email;
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
        return response()->json(["success"=>"Asset updated  successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $asset->delete();
        return response()->json(["success"=>"asset deleted successfully"]);
    }
}
