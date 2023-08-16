@extends('layout.header')
@section('section')
    <div class="card">
        <div class="card-header">
            <h4>Define SLAs</h4>

        </div>
        <div class="card-body">
            <div class="form">
                <div class="row">
                    <div class="col-3">
                        <label for="">Select Department</label>
                        <select name="" id="" class="form-control">
                            <option value="">ICT</option>
                            <option value="BME">BME</option>
                        </select>
                    </div>

                </div>
                {{-- <div class="row mt-2">
                    <div class="col-3">
                        <label for="">Request Type</label>
                        <select name="" id="" class="form-control">
                            <option value="">PPM</option>
                            <option value="BME">Incedent</option>
                        </select>
                    </div>
                </div> --}}
                <div class="row mt-2">
                    <div class="col-3">
                        <label for="">Service Category</label>
                        <select name="" id="" class="form-control">
                            <option value="">Server Installtion</option>
                            <option value="BME">PC Configuratoin</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-3">
                        <label for="">Event</label>
                        <select name="" id="" class="form-control">
                            <option value="">open</option>
                            <option value="BME">In progress</option>
                            <option value="BME">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-1">
                        <label for="">Days</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-1">
                        <label for="">Hours</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-1">
                        <label for="">Minutes</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                 <div class="row mt-2">
                    <div class="col-3">
                        <label for="">SLA Name</label>
                        <input type="text" class="form-control">
                    </div>
                   
                </div>
            </div>

        </div>
        
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Service Categories
                </div>
                <div class="card-body">
                    <table class="mt-2 table table-head-fixed text-nowrap table-hover">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Service Category Name </th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            {{--  --}}
                            <tr>
                                <td>1</td>
                                <td>Printer Installtion</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tonner Refiling</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Email activation</td>
                            </tr>
                        </tbody>
                    </table>
  
                </div>
            </div>

        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    SLAs
                </div>
                <div class="card-body">
                    <table class="mt-2 table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>ID</th>
                                <th>SLA Name </th>
                                <th>time</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--  --}}
                            <tr>
                                <td>1</td>
                                <td>46</td>
                                <td>SLA 1</td>
                                <td> 0 days 2:00 hours</td>
                                <td class="d-flex justify-content-around"><i style="font-size: 15px" class="fas fa-pen"></i> <i style="font-size: 15px" class="fas fa-trash"></i> <i class="fas fa-save"></i></td>
                                
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>48</td>
                                <td>SlA 2</td>
                                <td> 0 days 2:00 hours</td>
                                <td class="d-flex justify-content-around"><i style="font-size: 15px" class="fas fa-pen"></i> <i style="font-size: 15px" class="fas fa-trash"></i> <i class="fas fa-save"></i></td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>49</td>
                                <td>SLA 3</td>
                                <td> 0 days 2:00 hours</td>
                                <td class="d-flex justify-content-around"><i style="font-size: 15px" class="fas fa-pen"></i> <i style="font-size: 15px" class="fas fa-trash"></i> <i class="fas fa-save"></i></td>

                            </tr>
                        </tbody>
                    </table>                    
                </div>
            </div>

        </div>

    </div>
@endsection
