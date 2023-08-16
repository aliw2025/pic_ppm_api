<!-- Main Footer -->
<footer class="main-footer">
    <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> -->
    <!-- All rights reserved. -->
    <div class="float-right d-none d-sm-inline-block">
        <!-- <b>Version</b> 3.2.0 -->
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ url('resources//plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ url('resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ url('resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('resources/js/adminlte.js') }}"></script>
<script src="{{ url('resources/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ url('resources/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ url('resources/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('resources/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('resources/js//pages/dashboard3.js') }}"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote({
                height: 150
            }


        );
        // Summernote12
        $('#summernote2').summernote({
                height: 150 
            }

        );
         // Summernote12
         $('#summernote3').summernote({
                height: 150
            }

        );
        $('#summernote4').summernote({
                height: 150
            }

        );
        $('.summernotes').summernote({
                height: 150
            }

        );
       

    })
</script>
