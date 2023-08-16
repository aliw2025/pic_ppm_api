@extends('layout.header')
@section('section')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Assets</h4>
                        <a href="{{route('asset.create')}}" class="btn btn-primary">Add Asset</a>

                    </div>  
                </div>
                <div class="card-body">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Equipment Category Name </th>
                                <th>Equipment Type</th>
                                <th>Manufacturer</th>
                                <th>Model</th>
                                <th>Serial #</th>
                                <th>Equipment Owner</th>
                                <th>FA#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach($assets as $asset)
                            <tr class="asset-row" data-id='{{$asset->id}}'  data-toggle="modal" data-target="#exampleModalCenter">
                                <td>{{$count}}</td>
                                <td> {{$asset->equipment_category_name}}</td>
                                <td>{{$asset->equipment_type}}</td>
                                <td>{{$asset->manufacturer}}</td>
                                <td>{{$asset->model}}</td>
                                <td>{{$asset->serial_number}}</td>
                                <td>{{$asset->assetTechnicalCategory->name}}</td>
                                <td>{{$asset->fa_number}}</td>
                                <!-- <td><a href="{{route('select-asset',$asset->id)}}">select</a></td> -->
                            </tr>
                            @php
                                $count = $count +1;
                            @endphp
                            @endforeach
                           

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class=" bg-dark">
                    {{-- class="modal-title text-center" --}}
                    <h5 id="main-head" class="mt-2 text-center">Equipment Type Name</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card">
                        <div class="card-body ">
                            <div class="row d-flex justify-content-center">
                                
                                <div class="col-5">
                                    <div  id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            
                                        </ol>
                                        <div style="height: 250px; width:250px" class="carousel-inner">
                                           
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <h5>Equipment Details <a id="edit-link" class="bg-dark text-end" href="#">
                                    <i class="far fa-edit"></i>
                                    </a>
                                    </h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Category Name:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_cat_name" style="margin: 0">Computer</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Type:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_type" style="margin: 0">Desktop</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p  style="margin: 0">Model:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_model" style="margin: 0">G12</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Seriel # :</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_seriel" style="margin: 0">1234</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Manufacturer :</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_manufacturer" style="margin: 0">Dell</p>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">FA #:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_fa_number" style="margin: 0">1234</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Manufacture Date :</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_manufacture_date" style="margin: 0">1234</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Installation Date :</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_installation_date" style="margin: 0">12-Jan-23</p>
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Status :</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_status" style="margin: 0">Running</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Vendor:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_vendor" style="margin: 0">Apex</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Equipment Sequence #:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_seq_no" style="margin: 0">1234</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <h5>Location</h5>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Building Block:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_building_block" style="margin: 0">IPD</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Floor:</p>
                                        </div>
                                        <div class="col-6">
                                            <p style="margin: 0">Basement</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Department:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_department" style="margin: 0">BME</p>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Room / Area:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_room_area" style="margin: 0">Ward </p>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Section:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_section" style="margin: 0">Surgical</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Sub Section:</p>
                                        </div>
                                        <div class="col-6">
                                            <p id="eq_sub_section" style="margin: 0">Surgical</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <p style="margin: 0">Manual:</p>
                                        </div>
                                        <div class="col-6">
                                           <a download id="eq_manual" href="#"><i class="fa fa-download" aria-hidden="true"></i></a> 

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
    <script>
        
        $(document).on("click", ".asset-row", function() {


            var assetId = $(this).data('id');
            $.ajax({
            url: "{{ route('get-asset-details') }}",
            type: "GET",
            data: { 
                id: assetId,
            },
            success: function(dataResult) {
                if(dataResult.lenght<1){
                    return

                }
                var eq = dataResult[0];
                // console.log('recv');
                // console.log(dataResult);
                $('#eq_cat_name').text(eq.equipment_category_name);
                $('#main-head').text(eq.equipment_type+' '+eq.model);
                $('#eq_type').text(eq.equipment_type);
                $('#eq_manufacturer').text(eq.manufacturer);
                $('#eq_model').text(eq.model);
                $('#eq_serial_number').text(eq.serial_number);
                $('#eq_fa_number').text(eq.fa_number);
                $('#eq_seq_number').text(eq.equipment_sequence_number);
                $('#eq_manufacture_date').text(eq.manufacture_date);
                $('#eq_installation_date').text(eq.installation_date);
                $('#eq_room_area').text(eq.room_area);
                $('#eq_section').text(eq.section);
                $('#eq_sub_section').text(eq.sub_section);
                $('#eq_custodian_name').text(eq.custodian_name);
                $('#eq_vendor').text(eq.vendor);
                $('#eq_manual').prop('href',eq.manual_file_path);
                $('#edit-link').prop('href',"{{url('asset/select-asset')}}/"+eq.id);

                
                
                           
               
                var indicators = $('.carousel-indicators');
                var images = $('.carousel-inner');

                indicators.empty();
                images.empty();
                console.log(eq.asset_images.length);
                for(var i = 0 ; i<eq.asset_images.length;i++){
                    console.log(eq.asset_images[i]);
                    if(i==0){
                        var indicatorMark = `<li class="active" data-target="#carouselExampleIndicators" data-slide-to="`+i+`"></li>`;
                        var imageMark = `<div class="carousel-item active">
                                                <img class="d-block w-100" src="`+eq.asset_images[i].image_path+`" alt="First slide">
                                            </div>`;

                    }else{
                        var indicatorMark = `<li  data-target="#carouselExampleIndicators" data-slide-to="`+i+`"></li>`;

                        var imageMark = `<div class="carousel-item">
                                                <img class="d-block w-100" src="`+eq.asset_images[i].image_path+`" alt="First slide">
                                            </div>`;
                    }
                    indicators.append(indicatorMark);
                    images.append(imageMark);
                }

                // console.log('waseem is king'+eq.equipment_category_name);
                // console.log($('#eq_cat_name'));
                // var tbody = $("#ext_hist_body");
                // console.log(tbody);
                // tbody.empty();
                // var i;
                // for (i = 0; i < dataResult.length; i++) {
                //     var item = dataResult[i];
                //     console.log(item);
                //     var count = i+1;
                //     var date = Date.parse(item.previous_date);
                //     var markup = `<tr>
                //                         <td>`+count +` </td>
                //                         <td>`+date+` </td>
                //                         <td>`+ item.current_date+`</td>
                //                         <td>`+ item.note+`</td>
                //                   </tr>`;
                   
                // }
              

            },
            error: function(xhr, status, error) {
                
            },
        });



    });
        
    </script>
@endsection
