<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkOrderResource;
use App\Models\WorkOrder;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class WorkOrderApiController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:sanctum');
    }
    public function create(){


        return "waseem  is khan";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return WorkOrderResource::collection(WorkOrder::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "request_type_id" => 'required',
            "department_id" => 'required',
            "category_id" => 'required',
            "asset_id" => 'required',
            "priority_id" => 'required',
            "due_date" => 'required'
        ]);
        // dd($validator->fails());
        if($validator->fails()){

            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], JsonResponse::HTTP_BAD_REQUEST);
        }
       
        $workOrder = new WorkOrder();
        $workOrder->request_type_id = $request->request_type_id;
        $workOrder->department_id = $request->department_id;
        $workOrder->category_id = $request->category_id;
        $workOrder->asset_id = $request->asset_id;
        $workOrder->priority_id = $request->priority_id;
        $workOrder->due_date = $request->due_date;
        $workOrder->title = $request->title;
        $workOrder->description = $request->description;
        $workOrder->save();
        return response()->json(['success', 'work order generated successfully']);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder)
    {
        //
        return new WorkOrderResource($workOrder);
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
        $workOrder->title = $request->title;
        $workOrder->description = $request->description;
        $workOrder->save();
        return response()->json(['success', 'workorder updated successfully']);
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
        $workOrder->delete();
        return response()->json('success','workorder deleted successfully');
    }
    
}
