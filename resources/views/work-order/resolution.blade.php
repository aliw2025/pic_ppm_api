<div class="row">

    <div class="col-12">
        <div id="accordion4" class="row">
            <div class="col-12">
                @php
                $count = 1
                @endphp
                @foreach($workOrder->resolutions as $res)

                <div class="card">
                    <div class="card-header">
                    <p> <span style="font-weight: bold;">{{isset($res->user)? $res->user->name:''}} </span>  added a comment on {{$res->created_at}}</p>
                    </div>
                    <div class="card-body">
                        @php
                           $text = strip_tags ($res->resolution);
                           $text = preg_replace('/\s*style="[^"]+"/i', '', $text);
                           $text = str_replace('&nbsp;', '', $text);
                        @endphp
                        {{ ($text) }}
                    </div>
                </div>
                <!-- <textarea disabled name="resolution" class="summernotes"> </textarea> -->
                @php
                $count= $count+1
                @endphp  
                @endforeach
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="btn btn-primary">Add Resolution</button>
            </div>

            <div id="collapseFour" class=" card-body collapse " aria-labelledby="headingOne" data-parent="#accordion4">

                <div class="card-body">
                    <form action="{{route('add-resolution')}}" method="POST">
                        @csrf
                        <input type="hidden" name="work_order_id" value="{{$workOrder->id}}">
                        <label for="">Resolutions</label>
                        <textarea name="resolution" id="summernote2">{{strip_tags($workOrder->resolution)}}</textarea>
                        <button action="sumbit" class="btn btn-primary">Add</button>
                    </form>

                </div>
            </div>
            <!-- closing col-12 -->
        </div>

    </div>
</div>