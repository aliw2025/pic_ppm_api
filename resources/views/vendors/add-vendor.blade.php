@extends('layout.header')
@section('section')
    <div class="">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (isset($asset_vendor))
                            <h4> {{ ucfirst($asset_vendor->vendor_name) }}</h4>
                        @else
                            <h4>Register Vendor</h4>
                        @endif
                    </div>
                    <div class="card-body">
                        @if (!isset($asset_vendor))
                            <form method="POST" class="form form-vertical" autocomplete="on"
                                action="{{ route('vendors.store') }}">

                                <div class="row">

                                    <div class="col-3">
                                        @csrf
                                        <label class="mt-1 form-label">Name</label>
                                        <input name="vendor_name"
                                            @if (isset($asset_vendor)) value="{{ $asset_vendor->vendor_name }}" @endif
                                            placeholder="Name" type="text" class="@error('vendor_name') is-invalid @enderror form-control">
                                            @error('vendor_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    <div class="col-3">
                                        @csrf
                                        <label class="mt-1 form-label">Business Name</label>
                                        <input name="business_name"
                                            @if (isset($asset_vendor)) value="{{ $asset_vendor->vendor_name }}" @endif
                                            placeholder="Business Name" type="text" class="form-control">
                                    </div>
                                    <div class="col-3">
                                        @csrf
                                        <label class="mt-1 form-label">Address</label>
                                        <input name="address"
                                            @if (isset($asset_vendor)) value="{{ $asset_vendor->address }}" @endif
                                            placeholder="Address" type="text" class="form-control">
                                    </div>
                                </div>

                                <button type="submit" value="submit" class="m-2 mt-2 btn btn-primary"> Save </button>

                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if (isset($asset_vendor))
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Contact Persons</h4>
                        </div>
                        <div id="accordion2" class="row">
                            <div class="col-12 d-flex justify-content-end ">
                                <button data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree" class="btn btn-primary mr-2 mt-2">Add Person</button>
                            </div>
                            <div id="collapseThree" class=" card-body collapse " aria-labelledby="headingOne"
                                data-parent="#accordion2">
                                <div class="">
                                    <form method="POST" enctype="multipart/form-data" class="form form-vertical"
                                        autocomplete="on" action="{{ route('store-contact-person') }}">
                                        <div class="row d-flex align-items-center">
                                            @csrf
                                            <input name="vendor_id" type="hidden" value="{{ $asset_vendor->id }}">
                                            <div class="col-2">
                                                <label for="form-label">Person Name</label>
                                                <input name="name" type="text" class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <label for="form-label">Person Type</label>
                                                <select name="person_type" class="form-control" id="">
                                                    <option value="1">Primary</option>
                                                    <option value="2">Secondary</option>
                                                    <option value="3">Technical</option>
                                                    <option value="4">Support</option>
                                                    <option value="5">Sales</option>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <label for="form-label">Designation</label>
                                                <input name="designation" type="text" class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <label for="">Email</label>
                                                <input name="email" type="text" class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <label for="">Landline</label>
                                                <input name="landline" type="text" class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <label for="">Mobile</label>
                                                <input name="mobile" type="text" class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <button class="mt-4 btn btn-primary">Add</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <!-- collapse end -->
                            </div>

                        </div>
                        <div class="row mt-2 card-body">
                            <div class="col-12 mt-2">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Sr#</th>
                                            <th>Name</th>
                                            <th>Person Type</th>
                                            <th>Designation</th>
                                            <th>Email</th>
                                            <th>landline</th>
                                            <th>Mobile</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @if (isset($contact_persons))
                                            @foreach ($contact_persons as $person)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $person->name }}</td>
                                                    <td>{{ $person->person_type }}</td>
                                                    <td>{{ $person->designation }}</td>
                                                    <td>{{ $person->email }}</td>
                                                    <td>{{ $person->landline }}</td>
                                                    <td>{{ $person->mobile }}</td>
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
        @endif


    </div>
@endsection
