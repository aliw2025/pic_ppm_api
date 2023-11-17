<?php

namespace App\Http\Controllers;

use App\Models\TblServiceCategory;
use App\Models\TblDepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments  = TblDepartment :: all();
        return view('admin.add-service-cats',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $serviceCategory = new TblServiceCategory();
        $serviceCategory->service_category_name = $request->service_category_name;
        $serviceCategory->department_id = $request->department;
        $serviceCategory->save();
        return redirect()->route('serviceCategory.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TblServiceCategory  $tblServiceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TblServiceCategory $tblServiceCategory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TblServiceCategory  $tblServiceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TblServiceCategory $tblServiceCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TblServiceCategory  $tblServiceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TblServiceCategory $tblServiceCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TblServiceCategory  $tblServiceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TblServiceCategory $tblServiceCategory)
    {
        //
    }


    public  function deptServiceCategories(Request $request){

        
        
        $service_cats = TblServiceCategory :: where('department_id',$request->id)->get();
        // $service_cats = TblServiceCategory :: all();
        
        return $service_cats;
    }

    
}
