<style type="text/css">
  [data-from-dependent] {
  display: none;
}

[data-from-dependent].display {
  display: initial;
}
</style>
<!-- summenote validation -->
<script type="text/javascript">
   $('.btn-create').on('click', function () {
        var submeterForm = 1;
        if ($('#TextText').summernote('isEmpty')|| $($("#TextText").summernote("code")).text().trim() == ''){
        submeterForm = 0;
        }
        if (submeterForm <= 0) {
          $('#summernote').text("*Input Required!");
        return false;
        } else {
        return true;
        }
        
   });
   $('.btn-update').on('click', function () {
        var id=$("#textarea").val();
        if (!id){
            $('#textarea_msg').text("* Description In Input Required!");
            return false;
        } 
        else
        {
           $('#form-post').submit();
        }
   });
 
</script>
<script type="text/javascript">
  document.addEventListener("change", checkSelect);
  function checkSelect(evt) {
  const origin = evt.target;
    if (origin.dataset.dependentSelector) {
     const selectedOptFrom = origin.querySelector("option:checked")
      .dataset.dependentOpt || "n/a";
     const addRemove = optData => (optData || "") === selectedOptFrom 
      ? "add" : "remove";
     document.querySelectorAll(`${origin.dataset.dependentSelector} option`)
      .forEach( opt => 
        opt.classList[addRemove(opt.dataset.fromDependent)]("display") );
  }
}
  </script>
  <script type="text/javascript">
   $(document).ready(function(){
   $('#branch').on('change', function(){
        var branch_id = $(this).val();
        if(branch_id){
            $.ajax({
                type:'POST',
                url:'<?=site_url('quotation/get_vat')?>',
                data:'branch_id='+branch_id,
                success:function(html){
                      var obj=JSON.parse(html);
                     $('#vatid').val(obj.vat);
                     $('#vat-amount').val(obj.vat);
                }
            }); 
        }else{
            $('#vatid').html('<input  value="Select branch first">');
        }
      });
   var branch_id = $("#branch").val();
        if(branch_id){
            $.ajax({
                type:'POST',
                url:'<?=site_url('quotation/get_vat')?>',
                data:'branch_id='+branch_id,
                success:function(html){
                      var obj=JSON.parse(html);
                     $('#vatid').val(obj.vat);
                     $('#vat-amount').val(obj.vat);
                }
            }); 
        }else{
            $('#vatid').html('<input  value="Select branch first">');
        }
    $(".btn-info").attr("title", "Edit");
    $(".fa-desktop").attr("title", "View");
    $(".fa-edit").attr("title", "Edit");
    $(".fa-print").attr("title", "Print");
    $(".btn-danger").attr("title", "Delete");
    $(".fa-arrow-up").attr("title", "Issue Risk Note");
    $(".fa-tv").attr("title", "View");
    $(".submit-form").attr("title", "View");
    $(".fa-comment").attr("title","feedback");
    $(".fa-envelope").attr("title","Mail");
    $(".sattelment").attr("title","Settlements");
    $(".view_assesment").attr("title","View Assessment");
    $(".fa-file-alt").attr("title","generate_receipt");
    $(".fa-credit-card").attr("title","payment");
    $(".fa-paperclip").attr("title","Attach document");
    $(".fa-check").attr("title","Cover Email Note");
    $(".fa-star").attr("title","Dircet payment");
});

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
  function myFunctionage() {
    var userDateinput= document.getElementById("date_of_birth").value;
    console.log(userDateinput);
 //$( "#date_of_birth" ).datepicker({  maxDate: new Date() });
     // convert user input value into date object
     var birthDate = new Date(userDateinput);
     console.log(" birthDate"+ birthDate);

   // get difference from current date;
   var difference=Date.now() - birthDate.getTime(); 

   var  ageDate = new Date(difference); 
   var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);
   $('#age').val(calculatedAge);
 }
</script>
<!-- Main Footer -->
<footer class="main-footer">
 <center> <strong>Copyright &copy; 2020 <a href="https://www.magictechnolabs.com/">Magic TechnoLabs</a>.</strong>
  All rights reserved.
</footer></center>

</div>

<!-- ./summer note -->
<script type="text/javascript">
   $(document).ready(function(){
     $('.summernote-textarea').summernote({

      height: 100,
      codemirror: {
        theme: 'monokai'
      }
    });
   });
</script>

 <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>




-->
<script src="<?=base_url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('public/assets/dist/js/adminlte.js')?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url('public/assets/dist/js/demo.js')?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=base_url('public/assets/plugins/jquery-mousewheel/jquery.mousewheel.js')?>"></script>
<script src="<?=base_url('public/assets/plugins/raphael/raphael.min.js')?>"></script>
<script src="<?=base_url('public/assets/plugins/jquery-mapael/jquery.mapael.min.js')?>"></script>
<script src="<?=base_url('public/assets/plugins/jquery-mapael/maps/usa_states.min.js')?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?=base_url('public/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?=base_url('public/assets/plugins/chart.js/Chart.min.js')?>"></script>
<!-- DataTables -->
<script src="<?=base_url('public/assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>

<script src="<?=base_url('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<!-- Bootstrap Switch -->
<script src="<?=base_url('public/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>"></script>
<!-- PAGE SCRIPTS -->
<!-- Summernote -->
<script src="<?=base_url('public/assets/plugins/summernote/summernote-bs4.min.js')?>"></script>

<script src="<?=base_url('public/assets/js/bootstrap4-toggle.min.js')?>"></script>

    <!-- jQuery library -->
    
    <!-- Popper JS -->
 
    <!-- Latest compiled JavaScript -->
    
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
<script type="text/javascript">
  $(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
  });
  $(document).on('click', '.go-back', function (e) {
    window.history.back();
  });

// make it as accordion for smaller screens
if ($(window).width() < 992) {
  $('.dropdown-menu a').click(function(e){
    e.preventDefault();
    if($(this).next('.submenu').length){
      $(this).next('.submenu').toggle();
    }
    $('.dropdown').on('hide.bs.dropdown', function () {
     $(this).find('.submenu').hide();
   })
  });
}
</script>

<script type="text/javascript">
  $(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
  });
  $(document).on('click', '.go-back', function (e) {
    window.history.back();
  });

// make it as accordion for smaller screens
if ($(window).width() < 992) {
  $('.dropdown-menu a').click(function(e){
    e.preventDefault();
    if($(this).next('.submenu').length){
      $(this).next('.submenu').toggle();
    }
    $('.dropdown').on('hide.bs.dropdown', function () {
     $(this).find('.submenu').hide();
   })
  });
}
$('.btn-switch').bootstrapToggle({
  on: 'Active',
  off: 'In-Active',
  size: 'sm',
  offstyle: 'danger',
});
</script>
<script type="text/javascript">
  $(document).ready(function(){

  });
</script>

</script> 
<!-- Dynamic sidebar menu selected  -->
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
</body>
</html>