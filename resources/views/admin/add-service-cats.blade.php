@extends('layout.header')
@section('section')
    <div class="card">
        <div class="card-header">
            <h4>Service Categories</h4>
        </div>
        <div class="card-body">
            <div class="form">
                <form method="POST" action="{{ route('serviceCategory.store') }}">
                    <div class="row">
                        <div class="col-3">
                            @csrf
                            <label for="">Category Name</label>
                            <input type="text" name="service_category_name" id="" class="form-control"
                                placeholder="category Name">


                            {{-- <select name="" id="" class="form-control">
                            <option value="">ICT</option>
                            <option value="BME">BME</option>
                        </select> --}}
                        </div>
                        <div class="col-3 d-flex align-items-end">
                            <button class=" btn btn-primary">+</button>
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-3">
                            <label for="">Select Department</label>
                            <select name="department" id="sel_dept" class="form-control">
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <table class="mt-2 table table-head-fixed text-nowrap">
                <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="categories_body">
                   <td></td>
                    
                </tbody>
            </table>
        </div>
    </div>
<Script>
    $(document).ready(function(){

        console.log('this is start');
        console.log($('#sel_dept').val());
        var depId = $('#sel_dept').val();
        getServiceCategories(depId);
    
    });

    function getServiceCategories(depId){

        $.ajax({
                url: "{{ route('dept-service-categories') }}",
                type: "GET",
                data: {
                    id: depId,
                },
                success: function(dataResult) {
                    $("#categories_body").empty();
                    console.log('recv');
                    console.log(dataResult);
                    var i;
                    for (i = 0; i < dataResult.length; i++) {
                        var item = dataResult[i];
                        console.log(item);
                        markup = `<tr> <td>`+i+` </td> <td id = "cusItem` + item.id +`">` + item.service_category_name + `</td> <td></td> </tr>`;
                        console.log(  $("#categories_body"));
                        $("#categories_body").append(markup);
                        
                    }
                    

                },
                error: function(xhr, status, error) {
                    // $("#customer_name").val("");
                    // $("#customer_id").val("");
                },
            });

    }
    $('#sel_dept').on('change',function(){
            
        var depId = $('#sel_dept').val();
        getServiceCategories(depId);
    })

</Script>

@endsection
