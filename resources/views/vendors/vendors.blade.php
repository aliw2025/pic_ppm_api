@extends('layout.header')
@section('section')
<div>
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Vendors</h4>
                    <a href="{{route('vendors.create')}}" class="btn btn-primary">Add Vendor</a>
                </div>
            </div>
            <div class="card-body">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vendor</th>
                        <th>Action</th>
                    </tr>   
                </thead>
                <tbody>
                   @isset($vendors)
                        @php
                            $count = 1;
                        @endphp
                        @foreach($vendors as $ven)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$ven->vendor_name}}</td>
                                <td> <a href="{{url('vendors/create').'?id='.$ven->id}}"><i
                                    class="fas fa-eye"></i></a> </td>
                            </tr>
                            @php
                            $count += 1;
                        @endphp
                        @endforeach
                   @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>
    
@endsection
