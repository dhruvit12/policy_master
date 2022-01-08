<script>
    $( function() {
  var from = $( "#fromDate" )
      .datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true
      })
      .on( "change", function() {
        to.datepicker( "option", "minDate", getDate( this ) );
      }),
    to = $( "#toDate" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true
    })
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });

  function getDate( element ) {
    var date;
    var dateFormat = "yy-mm-dd";
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }

    return date;
  }
});
</script>
<!-- Main Footer -->

<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap -->
<script src="<?=base_url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>">
</script>
<!-- overlayScrollbars -->
<script src="<?=base_url('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>">
</script>
<!-- AdminLTE App -->
<script src="<?=base_url('public/assets/dist/js/adminlte.js')?>">
</script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url('public/assets/dist/js/demo.js')?>">
</script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=base_url('public/assets/plugins/jquery-mousewheel/jquery.mousewheel.js')?>">
</script>
<script src="<?=base_url('public/assets/plugins/raphael/raphael.min.js')?>">
</script>
<script src="<?=base_url('public/assets/plugins/jquery-mapael/jquery.mapael.min.js')?>">
</script>
<script src="<?=base_url('public/assets/plugins/jquery-mapael/maps/usa_states.min.js')?>">
</script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?=base_url('public/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')?>">
</script>
<!-- ChartJS -->
<script src="<?=base_url('public/assets/plugins/chart.js/Chart.min.js')?>">
</script>
<!-- DataTables -->
<script src="<?=base_url('public/assets/plugins/datatables/jquery.dataTables.min.js')?>">
</script>
<script src="<?=base_url('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>">
</script>
<script src="<?=base_url('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>">
</script>
<script src="<?=base_url('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>">
</script>
<!-- Bootstrap Switch -->
<script src="<?=base_url('public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>">
</script>
<!-- PAGE SCRIPTS -->
<!-- Summernote -->
<script src="<?=base_url('public/assets/plugins/summernote/summernote-bs4.min.js')?>">
</script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js">
</script>
<!-- <script>
  $(function () {
    //Initialize Select2 Elements
    
    //Initialize Select2 Elements
    

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });



  })
</script> -->
<script>
    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>
