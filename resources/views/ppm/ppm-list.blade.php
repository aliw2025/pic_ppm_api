@extends('layout.header')
@section('section')
    <div class="row mt-1 mx-2 d-flex align-items-center">
        <div class="col-3">
            <label for="" class="form-label">start date</label>
            <input type="date" class="form-control">
        </div>
        <div class="col-3">
            <label for="" class="form-label">end date</label>
            <input type="date" class="form-control">
        </div>
        <div class="col-3">
            <label for="" class="form-label">Equipment Type Name</label>
            <input type="text" class="form-control">
        </div>
        <div class="col-3 mt-4">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-header">

               </div>
               <div class="card-body">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                      <tr>
                        <th>Sr#</th>
                        <th>Equipment Type Name</th>
                        <th>Expected PPM Date</th>
                        <th>Planned PPM Date</th>
                        <th>Performed Date</th>
                        <th>Status</th>
                        <th>Detail</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>183</td>
                        <td>John Doe</td>
                        <td>Primary</td>
                        <td>Network Engineer</td>
                        <td>aliw2025@gmail.com</td>
                        <td>091222225</td>
                        <td>03400234243</td>
                      </tr>
                      <tr>
                        <td>219</td>
                        <td>Alexander Pierce</td>
                        <td>Technical</td>
                        <td>Support Engineer</td>
                        <td>aliw2025@gmail.com</td>
                        <td>091222225</td>
                        <td>03400234243</td>
                      </tr>
                      <tr>
                        <td>657</td>
                        <td>Bob Doe</td>
                        <td>Secondary</td>
                        <td>IT Technician</td>
                        <td>aliw2025@gmail.com</td>
                        <td>091222225</td>
                        <td>03400234243</td>
                      </tr>
                      <tr>
                        <td>175</td>
                        <td>Mike Doe</td>
                        <td>Primary</td>
                        <td>Technician</td>
                        <td>aliw2025@gmail.com</td>
                        <td>091222225</td>
                        <td>03400234243</td>
                      </tr>
                       
                    </tbody>
                </table>
               </div>
                
            </div>
        </div>
    </div>
@endsection
