<!-- simplebar js -->
<script src="{{ asset('template/assets/plugins/simplebar/js/simplebar.js') }}"></script>
<!-- sidebar-menu js -->
<script src="{{ asset('template/assets/js/sidebar-menu.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('template/assets/js/app-script.js') }}"></script>
<!--Data Tables js-->
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js') }}"></script>
<!-- Sweet Alert -->
<script src="{{url('assets/js/plugins/sweetalert2.js')}}"></script>
<!-- Sweet Alert -->
<script src="{{url('assets/js/plugins/jquery.inputmask.js')}}"></script>
<script src="{{url('assets/js/xlsx.full.min.js')}}"></script>
<script src="{{url('backend_layout/js/plugin/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('backend_layout/js/plugin/flatpickr/flatpickr.js')}}"></script>
<script src="{{url('backend_layout/js/plugin/flatpickr/index.js')}}"></script>
<script src="{{url('backend_layout/js/plugin/jquery-validate/jquery.form-validator.min.js')}}"></script>
<!--notification js -->
<script src="{{ asset('template/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/notifications/js/notifications.min.js') }}"></script>
<!--Select Plugins Js-->
<script src="{{ asset('template/assets/plugins/select2/js/select2.min.js') }}"></script>
<!--Bootstrap Switch Buttons-->
<script src="{{ asset('template/assets/plugins/bootstrap-switch/bootstrap-switch.min.js') }}"></script>
<!--Lightbox-->
<script src="{{ asset('template/assets/plugins/fancybox/js/jquery.fancybox.min.js') }}"></script>

<!-- Chart js -->
  
<script src="{{ asset('template/assets/plugins/Chart.js/Chart.min.js') }}"></script>
<!-- Vector map JavaScript -->
<script src="{{ asset('template/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Easy Pie Chart JS -->
<script src="{{ asset('template/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<!-- Sparkline JS -->
<script src="{{ asset('template/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('template/assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('template/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.rupiah').inputmask({
            alias: "decimal",
            digits: 2,
            repeat: 10,
            digitsOptional: false,
            decimalProtect: true,
            groupSeparator: ".",
            placeholder: '0',
            radixPoint: ",",
            radixFocus: true,
            autoGroup: true,
            autoUnmask: false,
            onBeforeMask: function(value, opts) {
                return value;
            },
            removeMaskOnSubmit: true
        });
    })
    // Token
    var token = $('meta[name="csrf-token"]').attr('content');
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

    // Switch Init
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();

    // Notif Init
    function notif(type,msg){
        icon = {
            success:'fa-check-circle',
            error:'fa-times-circle',
            warning:'fa-exclamation-circle',
            info:'fa-info-circle'
        }
        switch(type){
            case 'error' : case 'warning' :
                sound = 'error';
                break;
            default :
                sound = 'notif';
        }
        Lobibox.notify(type, {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: 'fa '+icon[type],
            delayIndicator: false,
            delay: 2000,
            sound: sound,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: msg
        });
    }     

    // Global Function JS
    function objForm(form,name){
    	return $('#'+form).find('[name="'+name+'"]');
    }

    function resetFile(){
      $('#customFile').val('');
      $('.custom-file-label').text('Choose file');
    }

    function isEmpty(str) {
        return (!str || 0 === str.trim().length);
    }

    $(document).ready(function() {
        radioswitch.init()
    });
</script>