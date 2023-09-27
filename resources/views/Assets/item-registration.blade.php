 <form method="POST" enctype="multipart/form-data" class="form form-vertical" autocomplete="on" action="{{ (isset($asset))? route('asset.update',$asset->id): route('asset.store') }}">
     @csrf
     <div class="row d-flex ">
         <div class="col-12">
             <div class="card">
                 <div class="card-header">
                     <div class="mt-2 d-flex justify-content-between">
                         <h4>Add New Equipment</h4>
                         <div class="d-flex">
                             @if (isset($asset))
                             {{ method_field('PUT') }}
                             @endif
                             <button type="submit" value="submit" class="m-2 mt-2 btn btn-success"> @if(isset($asset)) Update @else Save @endif </button>
                             @if(!isset($asset))
                             <button type="reset" value="submit" class="m-2  mt-2 btn btn-primary"> Reset </button>
                             @endif
                         </div>
                     </div>
                 </div>
                 <div class="card-body">

                     <div class="row">
                         <div class="col-4">
                             <label class="mt-1 form-label">Asset Technical Category </label>
                             <select name="asset_tech_cat" id="" class="form-control">
                                 @foreach ($departments as $dept)
                                 <option @if(isset($asset)) @if($asset->asset_technical_category == $dept->id) selected @endif @endif value="{{ $dept->id }}">{{ $dept->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label">Equipment Category Name</label>
                             <input @if(isset($asset)) value="{{$asset->equipment_category_name}}" @endif name="equipment_category_name" placeholder="Name" type="text" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label">Equipment Type</label>
                             <input @if(isset($asset)) value="{{$asset->equipment_type}}" @endif name="equipment_type" placeholder="Equipment Type" type="text" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label">Manufacturer</label>
                             <input @if(isset($asset)) value="{{$asset->manufacturer}}" @endif name="manufacturer" placeholder="Manufacturer" type="text" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label">Model</label>
                             <input @if(isset($asset)) value="{{$asset->model}}" @endif name="model" placeholder="Model" type="text" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label">Serial number</label>
                             <input @if(isset($asset)) value="{{$asset->serial_number}}" @endif name="serial_number" placeholder="Serial number" type="text" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label">FA #</label>
                             <input @if(isset($asset)) value="{{$asset->fa_number}}" @endif name="fa_number" placeholder="FA #" type="text" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label">Equipment Sequence #</label>
                             <input @if(isset($asset)) value="{{$asset->equipment_sequence_number}}" @endif name="equipment_seq_number" placeholder="Equipment Sequence #" type="text" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label"> Manufacture Date</label>
                             <input @if(isset($asset)) value="{{$asset->manufacture_date}}" @endif name="manufacture_date" placeholder="Manufacture Date" type="date" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label"> Installation Date</label>
                             <input @if(isset($asset)) value="{{$asset->installation_date	}}" @endif name="installation_date" placeholder=" Installation Date" type="date" class="form-control">
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label"> Status</label>
                             <select name="asset_status" id="" class="form-control">
                                 @foreach ($eq_status as $status)

                                 <option @if(isset($asset)) @if($asset->equipment_status == $status->id) selected @endif @endif value="{{ $status->id }}">{{ $status->equipment_status_name }}</option>

                                 @endforeach
                             </select>
                         </div>
                         <div class="col-4">
                             <label for="" class="mt-1 forml-label">Vendor</label>
                             <select name="vendor" id="" class="form-control">
                                 @foreach ($vendors as $vendor)
                                 <option @if(isset($asset)) @if($asset->vendor==$vendor->id) selected @endif @endif value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-4">
                             <label class="mt-1 form-label"> Manual</label>
                             <input @if(isset($asset)) value="{{$asset->manual_file_name}}" @endif name="file_name" placeholder="Attach Manual" type="file" class="form-control">
                         </div>
                         @if(isset($asset))
                         <div class="col-4 mt-4 ">
                            <label class="mt-4 form-label"> download maunal : </label>

                             <a class="mt-2 " href="{{$asset->manual_file_path}}" download>
                            <i class="fa fa-download" aria-hidden="true"></i>

                             </a>
                         </div>
                         @endif
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-3">
                             <label class="mt-1 form-label">Building Block</label>
                             <select name="building_block" id="" class="form-control">
                                 @foreach ($blocks as $block)
                                 <option @if(isset($asset)) @if($asset->building_block == $block->id) selected @endif @endif value="{{ $block->id }}">{{ $block->building_block_name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Floor</label>
                             <select name="floor" id="" class="form-control">
                                 @foreach ($floors as $floor)
                                 <option @if(isset($asset)) @if($asset->floor == $floor->id) selected @endif @endif value="{{ $floor->id }}">{{ $floor->floor_name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Department</label>
                             <select name="department" id="" class="form-control">
                                 @foreach ($departments as $dept)
                                 <option @if(isset($asset)) @if($asset->department == $dept->id) selected @endif @endif value="{{ $dept->id }}">{{ $dept->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Room/Area</label>
                             <input @if(isset($asset)) value="{{$asset->room_area}} " @endif name="room_area" type="text" class="form-control">
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Section</label>
                             <input @if(isset($asset)) value="{{$asset->section}}" @endif name="section" placeholder="Section" type="text" class="form-control">
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Sub Section</label>
                             <input @if(isset($asset)) value="{{$asset->sub_section}}" @endif name="sub_section" placeholder="Sub Section" type="text" class="form-control">
                         </div>
                     </div>
                     <div class="row mt-1">
                         <div class="col-3">
                             <label class="mt-1 form-label"> Custodian Name</label>
                             <input @if(isset($asset)) value="{{$asset->custodian_name}}" @endif name="custodian_name" placeholder="Custodian Name" type="text" class="form-control">
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Office Extention</label>
                             <input @if(isset($asset)) value="{{$asset->office_extention}}" @endif name="custodian_ofc_ext" placeholder="Office Extention" type="text" class="form-control">
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Mobile</label>
                             <input @if(isset($asset)) value="{{$asset->mobile}}" @endif name="custodian_mobile" placeholder="Mobile" type="text" class="form-control">
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Email</label>
                             <input @if(isset($asset)) value="{{$asset->email}}" @endif name="custodian_email" placeholder="Email" type="text" class="form-control">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-3">
                             <label class="mt-1 form-label">PPM Type</label>
                             <select name="ppm_type" id="" class="form-control">
                                 <option value="weekly">Weekly</option>
                                 <option value="Monthly">Monthly</option>
                                 <option selected value="Quarterly">Quarterly</option>
                                 <option value="Bi-Annually">Bi-Annually</option>
                                 <option value="Annually">Annually</option>
                             </select>
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Last PPM Date</label>
                             <input name="last_ppm_date" type="date" class="form-control">
                         </div>
                         <div class="col-3">
                             <label class="mt-1 form-label">Next PPM Date</label>
                             <input name="next_ppm_date" type="date" class="form-control">
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </form>