<?php

namespace App\Http\Controllers;

use App\Models\TblDepartment;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class DepartmentController extends Controller
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
    public function create(Request $request)
    {
        
        

        $departments = TblDepartment ::all();
        return view('admin.add-departments',compact('departments'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TblDepartment $department)
    {
        $validated =  $request->validate(
            [
                'name' =>'required|unique:tbl_departments'.$department->id,
            ],
            [
                'name.required' => 'Department name field is required',
                'name.unique' => 'Department name already exists',
            ]
        );
        
        $department = new TblDepartment();
        $department->name =$request->name;
        $department->active = 1;
        $department->save();

        return redirect()->route('department.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TblDepartment  $tblDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(TblDepartment $tblDepartment)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TblDepartment  $tblDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(TblDepartment $tblDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TblDepartment  $tblDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TblDepartment $tblDepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TblDepartment  $tblDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TblDepartment $tblDepartment)
    {
        //
    }
}
