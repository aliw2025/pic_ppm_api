@extends('layout.admin-header')
@section('section')
    <div class="card">
        <div class="card-header">
            <h4>Departments</h4>

        </div>
        <div class="card-body">
            <div class="form">
                <form method="POST" action="{{ route('department.store') }}">
                    <div class="row">
                        @csrf
                        <div class="col-3">
                            <label for="">Add Department</label>
                            <input name="name" type="text" class="form-control" placeholder="Department Name"
                                class="@error('name') is-invalid @enderror">
                               
                        </div>
                        <div class="col-3 d-flex align-items-end">
                            <button class=" btn btn-primary">Add</button>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-3">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </form>
            </div>
            <table class="mt-2 table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Department ID</th>
                        <th>Department Name </th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($departments as $dept)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $dept->id }}</td>
                            <td> <input readonly style="background-color: white;border:none" class="form-control"
                                    type="text" value="{{ $dept->name }}"> </td>
                            <td class=""><i style="font-size: 15px;margin-right:20px" class="fas fa-pen"></i> <i
                                    style="font-size: 15px;margin-right:20px" class="fas fa-trash"></i> <i
                                    class="fas fa-save"></i></td>

                        </tr>

                        @php
                            $count = $count + 1;
                        @endphp
                    @endforeach
                    {{--  --}}

                    {{-- <tr>
                        <td>2</td>
                        <td>123</td>
                        <td>Biomedical Engineering</td>
                        <td class=""><i style="font-size: 15px;margin-right:20px" class="fas fa-pen"></i> <i
                                style="font-size: 15px;margin-right:20px" class="fas fa-trash"></i> <i
                                class="fas fa-save"></i></td>

                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
