<div class="row">
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
    
        <div class="col-3">
            <label class="mt-1 form-label"> Machine IP</label>
            <input placeholder="Machine IP" type="text"
                class="form-control">
        </div>
        <div class="col-3">
            <label class="mt-1 form-label">AE Title</label>
            <input placeholder="AE Title" type="text"
                class="form-control">
        </div>
        <div class="col-3">
            <label class="mt-1 form-label">PORT</label>
            <input placeholder="PORT" type="text" class="form-control">
        </div>
        <div class="col-3">
            <label class="mt-1 form-label">Dicom</label>
            <input placeholder="Dicom" type="text" class="form-control">
        </div>
        
    
</div>
<div class="row mt-2">
    <div class="col-12">
        <button class="btn btn-primary">Save</button>
    </div>
    
</div>