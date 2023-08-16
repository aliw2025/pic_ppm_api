<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\TblDepartment;
use App\Models\TblPriority;
use App\Models\TblRequestType;
use App\Models\TblServiceCategory;
use App\Models\TblWoParty;
use App\Models\TblWorkOrderStatus;
use App\Models\User;
use App\Models\Vendor;
use App\Models\WorkOrder;
use App\Models\WorkOrderEvent;
use App\Models\WorkOrderEvents;
use App\Models\WorkOrderResolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $workOrders = WorkOrder::where('parent_id',null)->get();
        return view("work-order.wo-list",compact('workOrders'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requestTypes = TblRequestType::all();
        $departments = TblDepartment::all();
        $woStatuses = TblWorkOrderStatus::all();
        $priorities = TblPriority::all();
        $party_type = TblWoParty::all();  
        $vendors = Vendor::all();     
        $users = User::all(); 
        return view('work-order.add-wo',compact('requestTypes','departments','woStatuses','priorities','party_type','vendors','users'));

    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
        $workOrder = new WorkOrder();
        $workOrder->request_type_id = $request->request_type_id;
        $workOrder->department_id = $request->department_id;
        $workOrder->category_id = $request->category_id;
        $workOrder->asset_id = $request->asset_id;
        $workOrder->priority_id = $request->priority_id;
        $workOrder->due_date = $request->due_date;
        $workOrder->completion_date = $request->completion_date;
        $workOrder->resolution_date = $request->resolution_date;
        $workOrder->status_id = $request->status_id;
        $workOrder->party_type_id = $request->party_type_id;
        $workOrder->vendor_id = $request->vendor_id;
        $workOrder->tech_id = $request->tech_id;
        $workOrder->parent_id = $request->parent_id;
        $workOrder->title = $request->title;
        $workOrder->description = $request->description;
        $workOrder->title = $request->title;
        $workOrder->save(); 

        $event = new WorkOrderEvent();
        if(isset($request->parent_id) ){
            $event->description = "created Task";
            $event->work_order_id = $workOrder->parent_id;


        }else{
            $event->description = "created Work Order";
            $event->work_order_id = $workOrder->id;

        }

        $event->user_id = Auth::id();
        $event->save();
        return redirect()->route('workOrder.show',$workOrder);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder)
    {
        $requestTypes = TblRequestType::all();
        $departments = TblDepartment::all();
        $woStatuses = TblWorkOrderStatus::all();
        $priorities = TblPriority::all();   
        $party_type = TblWoParty::all();  
        $vendors = Vendor::all();     
        $users = User::all();       
        $cats = TblServiceCategory::where('department_id',$workOrder->department_id)->get();
        $assets = Asset::where('asset_technical_category',$workOrder->department_id)->get();       
        return view('work-order.add-wo',compact('requestTypes','departments','woStatuses','priorities','party_type','workOrder','vendors','users','cats','assets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkOrder $workOrder)
    {

        $workOrder->request_type_id = $request->request_type_id;
        $workOrder->department_id = $request->department_id;
        $workOrder->category_id = $request->category_id;
        $workOrder->asset_id = $request->asset_id;
        $workOrder->priority_id = $request->priority_id;
        $workOrder->due_date = $request->due_date;
        $workOrder->completion_date = $request->completion_date;
        $workOrder->resolution_date = $request->resolution_date;
        $tempStatus = $workOrder->status_id;
        if($request->status_id==7){

            if(isset($workOrder->tasks)){
                $tasks = $workOrder->tasks->where('statu_id','!=',7);
                if(count($tasks)!=0){
                    return "please mark pending task close first";
                }
            }
        }
        $workOrder->status_id = $request->status_id;
        $workOrder->party_type_id = $request->party_type_id;
        $workOrder->vendor_id = $request->vendor_id;
        $workOrder->tech_id = $request->tech_id;
        $workOrder->title = $request->title;
        $workOrder->description = $request->description;
        $workOrder->title = $request->title;
        $workOrder->save(); 

        $event = new WorkOrderEvent();
        $event->description = "updated";

        if($tempStatus!=$workOrder->status_id){
            
            $event->description = "updated status";
        }

        $event->work_order_id = $workOrder->id;
        $event->user_id = Auth::id();
        $event->save();
        return redirect()->route('workOrder.show',$workOrder);
        
    }


    public function addResolution(Request $request){

        $resolution = new WorkOrderResolution();
        $resolution->resolution = $request->resolution;
        $resolution->work_order_id = $request->work_order_id;
        $resolution->user_id = Auth::id();
        $resolution->save();
        $event = new WorkOrderEvent();
        $event->description = "Added Resolution";
        $event->work_order_id =  $resolution->work_order_id ;
        $event->user_id = Auth::id();
        
        $event->save();
        return redirect()->route('workOrder.show',$request->work_order_id);
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        //
    }
}
