<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Http\Controllers\Controller;
use App\Http\Resources\VendorResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\TblVendorPersonType;
use App\Models\VendorContactPerson;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->is('api/*')) {
            // Return JSON response for API requests
            $vendors = Vendor::with('contacts')->get();
            return VendorResource::collection($vendors);
            // return VendorResource :: collection(Vendor::all()->with('contacts'));
        } else {
            // Return Inertia response for web requests
            return "this is browser response";
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $contact_persons = VendorContactPerson::where('vendor','=',$request->id)->get();
       
        if(isset($request->id)){
            $asset_vendor = Vendor::find($request->id);
            return view('vendors.add-vendor',compact('asset_vendor','contact_persons'));
        }
        
        return view('vendors.add-vendor',compact('contact_persons'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vendor_name'=>'required',
        ]);
        $asset_vendor  = new Vendor();
        $asset_vendor->vendor_name  = $request->vendor_name;
        $asset_vendor->business_name  = $request->business_name;
        $asset_vendor->address  = $request->address;
        $asset_vendor->save();
        // api
        return "vendor saved";
        return redirect()->route('vendors.show',$asset_vendor->id);

        $contact_persons = VendorContactPerson::where('vendor','=',$asset_vendor->id)->get();
        return view('vendors.add-vendor',compact('asset_vendor','contact_persons'));
        
    }

    public function vendorsList(){

        $vendors = Vendor::all();
        return view('vendors.vendors',compact('vendors'));
    }

     public function storeContactPerson(Request $request)
    {
        
        $person = new VendorContactPerson();
        $person->name = $request->name;
        $person->person_type = $request->person_type;
        $person->designation = $request->designation;
        $person->email = $request->email;
        $person->landline = $request->landline;
        $person->mobile = $request->mobile;
        $person->vendor = $request->vendor;
        $person->save();
        if ($request->is('api/*')) {
            // Return JSON response for API requests
            return "vendor contact added";
        } else {
            // Return Inertia response for web requests
            return redirect()->route('vendors.create',$request->vendor_id);
        }
      


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function showorg(Vendor $vendor)
    {     
        $asset_vendor = $vendor;
       

        $contact_persons = VendorContactPerson::where('vendor','=',$asset_vendor->id)->get();
        return view('vendors.add-vendor',compact('asset_vendor','contact_persons'));
    }

    public function show($id)
    {     
       $vendor = Vendor::with('contacts')->find($id);
       return new VendorResource($vendor);
    
        $contact_persons = VendorContactPerson::where('vendor','=',$asset_vendor->id)->get();
        return view('vendors.add-vendor',compact('asset_vendor','contact_persons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)  
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
       
        $asset_vendor = Vendor::find($request->id);
        $asset_vendor->vendor_name  = $request->vendor_name;
        $asset_vendor->business_name  = $request->business_name;
        $asset_vendor->address  = $request->address;
        $asset_vendor->save();
        return $asset_vendor;

        return "record updated successcully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $vendor = Vendor::find($id);
        $vendor->delete();
        return "Vendor Deleted Successfully";
       
    }
}
