@extends('layout.header')
@section('section')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <h4> Gate Pass Detail</h4>
                   <p>Equipment Name</p>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Gate Pass #</label>
                                <input type="text" class="form-control" >
                            </div>
                            <div class="col-3">
                                <label for="">Gate Pass date</label>
                                <input type="date" class="form-control" >
                            </div>
                            <div class="col-3">
                                <label for="">Expected Return date</label>
                                <input type="date" class="form-control" >
                            </div>
                            <div class="col-3">
                                <label for="">Return date</label>
                                <input type="date" class="form-control" >
                            </div>
                            

                        </div>
                        <div class="row mt-1">
                            <div class="col-3">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="Planned">Returned</option>
                                    <option value="Pending">Sent</option>
                                   
                                </select>
                            </div>
                            
                            
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="">Gate Pass Reason</label>
                                
                                <textarea disabled name="" id="" cols="20" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="">Observations</label>
                                
                                <textarea name="" id="" cols="20" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
