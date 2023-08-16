<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function adminPanel(){


        return view('admin.admin-panel');

    }
    public function addAsset(Request $request){

        return view('Assets.add-asset');

    }
    public function addVendor(Request $request){

        return view('vendor.add-vendor');

    }

    public function vendors(Request $request){

        return view('vendor.vendors');

    }

    public function ppmDetail(Request $request){
        return view('ppm.ppm-detail');
    }


    public function gpDetail(Request $request){
        return view('ppm.gate-pass-details');
    }

    public function ppmList(Request $request){
        return view('ppm.ppm-list');
    }
    public function woList(Request $request){
        return view('work-order.wo-list');
    }

    public function addWorkOrder(Request $request){

        return view('work-order.add-wo');
    }
    public function assetList(Request $request){

        return view('Assets.asset-list');
    }
    public function addDepartment(Request $request){
        return view('admin.add-departments');
    }

    public function serviceCategories(Request $request){
        return view('admin.add-service-cats');
    }

    public function defineSla(Request $request){
        return view('admin.define-sla');
    } 
    
    public function calender(Request $request){

        return view('calender.calender');
    }
   
}
