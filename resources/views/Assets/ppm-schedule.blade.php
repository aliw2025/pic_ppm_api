<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            
        <div data-toggle="modal" data-target="#exampleModalCenter" class="card-header">
                <h4>Asset Details</h4>
                <p class="m-0">{{$asset->equipment_category_name}}</p>
                <p class="m-0">{{$asset->equipment_type}}</p>
                <p class="m-0">{{$asset->manufacturer}} {{$asset->model}} </p>
            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @if(!isset($asset->schedule))
        <div class="card">
            
            <div class="card-header">
                <h4>Create PPM Scheudule</h4>
            </div>
            <div class="card-body">
                <form action="{{route('finalize-schedule')}}" method="POST">   
                    @csrf
                    <input type="hidden"  value="{{$asset->id}}" name="asset_id" id="">
                    <div class="row d-flex align-items-center">
                        <div class="col-3">
                            <label class="mt-1 form-label">Schedule Type</label>
                            <select id="sch_type" name="schedule_type_id" class="form-control">
                                
                                @foreach($scheduleTypes as $st)
                                    <option value="{{$st->id}}">{{$st->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div id="ppm_type" class="col-3">
                            <label class="mt-1 form-label">PPM Type</label>
                            <select name="ppm_type_id" id="ppm_type" class="form-control">
                                @foreach($ppmTypes as $pt)
                                    <option value="{{$pt->id}}">{{$pt->ppm_type_name}}</option>
                                @endforeach
                            </select>
                        </div>

                     

                        <div id="meter" class="col-3">
                            <label class="mt-1 form-label">Meter Value</label>
                            <input name="meter_value" type="text" class="form-control">
                        </div>
                        <div id="unit" class="col-3">
                            <label class="mt-1 form-label">Meter Unit</label>
                            <input name="meter_unit" type="text" class="form-control">
                        </div>
                        <div id="num_itt" class="col-3">
                            <label class="mt-1 form-label">Number of Itterations</label>
                            <input name="num_of_itt" type="text" class="form-control">
                        </div>
                        <div id="fin_sc" class="mt-4 col-3">
                            <button  class="btn btn-primary">Finalize Schedule</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
        @else
            <div class="card">
                <form action="">                
                    <div class="card-body">
                        <button class="btn btn-danger">Delete Scuedule</button>
                    </div>
                </form>
            </div>

        @endif
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Schedule</h4>
            </div>
            <div class="card-body">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Expected PPM date</th>
                            <th>Planned PPM date</th>
                            <th>Performed date</th>
                            <th>Status</th>
                            <th>Detail</th>
                            <th>Action</th>
                           

                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($asset->scheduleEntries))
                            @foreach($asset->scheduleEntries as $entry)
                            <form method="POST" action="{{route('finalize-ppm')}}" >
                                @csrf
                            <tr>
                            <td>{{$entry->id}}</td>
                            <td>{{$entry->expected_date}}</td>
                            <td><input value="{{isset($entry->workOrder)?$entry->workOrder->due_date:''}}" name="planned_date" type="date" class="form-control" @if(isset($entry->workOrder)) disabled @endif>
                            <input type="hidden" name="asset_id" value="{{$asset->id}}">
                            <input type="hidden" name="ppm_id" value="{{$entry->id}}">


                        </td>
                            <td></td>
                            <td>{{isset($entry->workOrder)?$entry->workOrder->status->name:''}}</td>
                            <td><a href="{{isset($entry->workOrder)?route('workOrder.show',$entry->work_order_id):'#'}}">
                                <i style="color:black; font-size: 15px" class="fas fa-eye"></i>
                            </a> </td>
                            <td>
                                <!-- <a href="{{ route('finalize-ppm') }}">
                                    <i style="font-size: 15px" class="fas fa-save"></i>
                                </a> -->
                                
                                <button @if(isset($entry->workOrder)) disabled @endif type="submit" class="btn btn-primary">finalize</button>
                            </td>


                        </tr>
                        </form>
                            @endforeach
                        @endif
                       
                       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
        <div class=" bg-dark">
            {{-- class="modal-title text-center" --}}
            <h5 class="mt-2 text-center">Equipment Type Name</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
           
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5>Equipment Detail</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Name:</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">Computer</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Type:</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">Desktop</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Model:</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">G12</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Seriel # :</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">1234</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Manufacturer :</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">Dell</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Model :</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">1234</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">FA #:</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">1234</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Equipment Sequence #:</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">1234</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Manufacture Date :</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">1234</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Manufacture Date :</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">12-Jan-23</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Installation Datee :</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">12-Jan-23</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Status :</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">Running</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Vendor:</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">Apex</p>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-6">
                                <h5>Location</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <p style="margin: 0">Vendor:</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="margin: 0">Apex</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
        </div>
        {{-- <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div> --}}
    </div>
</div>
</div>