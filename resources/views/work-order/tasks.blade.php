<div class="row">
    <div class="col-12">
        <div class="">
            <div id="accordion2" class="row">
                <div class="col-12 d-flex justify-content-end">
                    <button data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="btn btn-primary">Add Task</button>
                </div>
                <div id="collapseThree" class=" card-body collapse " aria-labelledby="headingOne" data-parent="#accordion2">

                    <form method="POST" action="{{route('workOrder.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="">
                                    <input type="hidden" name="parent_id" value="{{$workOrder->id}}" id="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 mt-1">
                                                <label for="form-label">Request Type</label>
                                                <select name="request_type_id" id="" class="form-control">
                                                    @If(isset($requestTypes))
                                                    @foreach($requestTypes as $rt)
                                                    <option  value="{{$rt->id}}">{{$rt->name}}</option>
                                                    @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <label for="">Deparment</label>
                                                <select name="department_id" id="dept" class="form-control">
                                                    @If(isset($departments))
                                                    @foreach($departments as $dep)
                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <!-- <div class="col-6 mt-1">
                                                <label for="">Category</label>
                                                <select name="category_id" id="cat_body" class="form-control">

                                                </select>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <label for="">Asset</label>
                                                <select name="asset_id" id="asset_body" class="form-control">

                                                </select>
                                            </div> -->
                                            <div class="col-6 mt-1">
                                                <label for="">Priority</label>
                                                <select name="priority_id" id="" class="form-control">
                                                    @foreach($priorities as $pt)
                                                    <option   value="{{$pt->id}}">{{$pt->priority}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 mt-1">
                                                <label for="">Due Date</label>
                                                <input  name="due_date" type="date" class="form-control">
                                            </div>
                                            <div class="col-6 mt-1">
                                                <label for="">Status</label>
                                                <select name="status_id" id="" class="form-control">

                                                    @foreach($woStatuses as $st)
                                                    <option  value="{{$st->id}}">{{$st->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-6 mt-1">
                                                <label for="">Completion Date</label>
                                                <input name="completion_date" type="date" class="form-control">
                                            </div>
                                            <div class="col-6 mt-1">
                                                <label for="">Assigned to</label>
                                                <select name="party_type_id" id="party" class="form-control">
                                                    @foreach($party_type as $pt)
                                                    <option  value="{{$pt->id}}">{{$pt->name}}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            <div id='vendor_div' class="col-6 mt-1">
                                                <label for="">Vendor </label>
                                                <select name="vendor_id" id="vendor_id" class="form-control">
                                                    @foreach($vendors as $ven)
                                                    <option value="{{$ven->id}}">{{$ven->vendor_name}}</option>
                                                    @endforeach


                                                </select>
                                                <!-- <input name="vendor_id" type="text" class="form-control"> -->
                                            </div>
                                            <div id='tech_div' class="col-6 mt-1">
                                                <label for="">Technician</label>
                                                <select name="tech_id" id="tech_id" class="form-control">
                                                    @foreach($users as $user)
                                                    <option  value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach

                                                </select>
                                                <!-- <input name="tech_id" type="text" class="form-control"> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-3">
                                <div class="card-body">
                                    <label for="">Title</label>
                                    <input   name="title" type="text" class="form-control" name="" id="" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card-body">
                                    <label for="">Description</label>
                                    <textarea name="description" id="summernote4"> </textarea>
                                </div>
                            </div>

                        </div>

                        <div class="row ">
                            <div class=" col-12 d-flex justify-content-end">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                {{-- <h4>Tasks</h4> --}}
                <table class="table table-head-fixed text-nowrap">
                <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Title</th>
                                <th>Asset</th>
                                <th>Request Type</th>
                                <th>Request Category</th>
                                <th>Expected Completion Date</th>

                                <th>Completion Date</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Assigned To</th>
                                <th>Action</th>
                                
                                {{-- <th>Detail</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($workOrder->tasks))
                                @foreach($workOrder->tasks as $wo)
                                <tr>
                                    <td>{{$wo->id}}</td>
                                    <td> <a style="color: black" href="#">{{$wo->title}}</a> </td>
                                    <td></td>
                                    <td>{{$wo->request_type->name}}</td>
                                    <td>{{ isset($wo->category)?$wo->category->service_category_name:''}}</td>
                                    <td>{{$wo->due_date}}</td>
                                    <td>{{$wo->completion_date}}</td>
                                    <td>{{$wo->priority->priority}}</td>
                                    <td>{{$wo->status->name}}</td>
                                    <td>{{isset($wo->assigned_to)?$wo->assigned_to->name:''}}</td>
                                    <td><a href="{{route('workOrder.show',$wo->id)}}">edit</a></td>
                                    
                                </tr>
                                @endforeach
                            @endif
                        </tbody>



                   
                </table>
            </div>

        </div>
    </div>
</div>