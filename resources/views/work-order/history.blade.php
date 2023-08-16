<div class="row">
    <div class="col-5">
        @if(isset($workOrder->events))
            @foreach($workOrder->events as $ev)
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-3">
                                {{$ev->created_at}}
                            </div>
                            <div class="col-3">
                                {{$ev->description}}
                            </div>
                            <div class="col-3">
                                {{$ev->user->name}}
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
            @endforeach
        @endif
     
      
        
    </div>
</div>
