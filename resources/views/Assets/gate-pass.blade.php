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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Gate Pass Log
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <label class="mt-1 form-label">Gate Pass#</label>
                        <input placeholder="Name" type="text" class="form-control">
                    </div>
                    <div class="col-3">
                        <label class="mt-1 form-label">GP Date
                        </label>
                        <input placeholder="Name" type="date" class="form-control">
                    </div>
                    <div class="col-3">
                        <label class="mt-1 form-label">Expected Return date
                        </label>
                        <input placeholder="Name" type="date" class="form-control">
                    </div>
                    <div class="col-3">
                        <label class="mt-1 form-label">Status
                        </label>
                        <select name="" id="" class="form-control">
                            <option value="Opened">Sent</option>
                            <option value="Returned">Returned</option>
                        </select>
                    </div>
                    {{-- <div class="col-3">
                        <label class="mt-1 form-label">Return date
                        </label>
                        <input placeholder="Name" type="date" class="form-control">
                    </div> --}}

                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="mt-1 form-label">Gate Pass Reason</label>
                        <textarea class="form-control" name="" id="" cols="30" rows="3"></textarea>
                    </div>
                    <div class="col-3">
                        <label class="mt-1 form-label">Return date
                        </label>
                        <input placeholder="Name" type="date" class="form-control">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <button class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Gate Pass log Reports
            </div>
            <div class="card-body">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Gate Pass No</th>
                            <th>GP Date</th>
                            <th>Expected Return Date</th>
                            <th>Return Date</th>
                            {{-- <th>Detail</th> --}}
                        </tr>
                    </thead>
                    {{-- href="{{ route('gp-detail') }}"
                    href="{{ route('gp-detail') }}"
                    href="{{ route('gp-detail') }}" --}}
                    <tbody>
                        <tr>
                            <td>183</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            {{-- <td><a>
                                    <ion-icon name="document-outline"></ion-icon>
                                </a> </td> --}}
                        </tr>
                        <tr>
                            <td>219</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            {{-- <td><a>
                                    <ion-icon name="document-outline"></ion-icon>
                                </a> </td> --}}
                        </tr>
                        <tr>
                            <td>657</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            {{-- <td><a>
                                    <ion-icon name="document-outline"></ion-icon>
                                </a> </td> --}}
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>