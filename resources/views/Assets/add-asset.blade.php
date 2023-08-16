@extends('layout.header')
@section('section')

<!-- <style>
    .imagePreview {
    width: 100%;
    height: 180px;
    background-position: center center;
  background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  background-color:#fff;
    background-size: cover;
   
  background-repeat:no-repeat;
    display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}
.imgUp
{
  margin-bottom:15px;
}
.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}
.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}
</style> -->
<div class="row">
    <div class="col-12">
        <div class="col-12 ">
            <div class="card  card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                        <!-- <li class="pt-2 px-3"><h3 class="card-title">PPM</h3></li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="false">Item Registration</a>
                        </li>

                        @if(isset($asset))
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-two-ppm-tab" data-toggle="pill" href="#custom-tabs-two-ppm" role="tab" aria-controls="custom-tabs-two-ppm" aria-selected="false">PPM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="true">Gate Pass</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="custom-tabs-two-BME-tab" data-toggle="pill" href="#custom-tabs-two-BME" role="tab" aria-controls="custom-tabs-two-BME" aria-selected="true">RAD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="custom-tabs-two-img-tab" data-toggle="pill" href="#custom-tabs-two-img" role="tab" aria-controls="custom-tabs-two-img" aria-selected="true">Images</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content " id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                            @include('Assets.item-registration')
                        </div>
                        @if(isset($asset))
                        <div class="tab-pane fade" id="custom-tabs-two-ppm" role="tabpanel" aria-labelledby="custom-tabs-two-ppm-tab">
                            @include('Assets.ppm-schedule')
                        </div>

                        <div class="tab-pane fade " id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                            @include('Assets.gate-pass')
                        </div>
                        <div class="tab-pane fade " id="custom-tabs-two-BME" role="tabpanel" aria-labelledby="custom-tabs-two-BME-tab">
                            @include('Assets.rad')
                        </div>
                        <div class="tab-pane fade " id="custom-tabs-two-img" role="tabpanel" aria-labelledby="custom-tabs-two-img-tab">
                            @include('Assets.asset-images')
                        </div>
                        @endif


                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        console.log("ready!");
        check_type();
    });

    function check_type() {
            console.log($('#sch_type').val());
            
        if ($('#sch_type').val() == "1") {
            console.log('dfdfdf');
            $('#ppm_type').show();
            // $('#num_itt').show();
            $('#meter').hide();
            $('#unit').hide();

        } else {
            console.log('dfdfd2');
            $('#ppm_type').hide();
            // $('#num_itt').hide();
            $('#meter').show();
            $('#unit').show();
        }
    }
    $(document).on('change', '#sch_type', function() {

        check_type();
    });

    $(".imgAdd").click(function() {
        $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
    });
    $(document).on("click", "i.del", function() {
        // 	to remove card
        $(this).parent().remove();
        // to clear image
        // $(this).parent().find('.imagePreview').css("background-image","url('')");
    });
    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                }
            }

        });
    });
</script>
@endsection