 <br>
 <div class="modal-content " style="width:1300px;margin-left: 270px;">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Details</h5>

  </div>
    <form method="post" action="<?php echo base_url('Setup_product/Insert_data')?>">

  <div class="modal-body">

    <div class="row">
     <div class="col-md-5">
      <div class="form-group">
        <label for="">Insurance Type:</label>
        <select class="form-control" name="insurance_type_id" required=""><option value="">Please select </option>
          <?php foreach($insurancetype as $it) {?> <option value="<?php echo $it['id'];?>"><?php echo $it['insurance_type_name'] ?></option> <?php }?> </select>
        </div>
      </div>
      <div class="col-md-7">
        <div class="form-group">
         <label for="">Insurance Class:</label>
         <select class="form-control" name="insurance_class_id" required=""><option value="">Please select </option>
          <?php foreach($insuranceclass as $ic) {?> <option value="<?php echo $ic['id'];?>"><?php echo $ic['name'];?></option><?php }?> </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <div class="form-group">
         <label for="">Scope of Cover:</label>
         <textarea class="form-control" name="scope" required=""></textarea>
       </div>
     </div>
   </div>

   <div class="row">
    <div class="card" style="width:100%;">
      <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Excess</h6>
      <div class="card-body">
       <div> <div id="errorid1" style="color: red;"></div></div>
        <div class="row">
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="type_id" id="type_id" value="1">
          
          <div class="col-md-2">

            <label class="form-label">Description</label>
            <input type="text" id="description" name="description" class="form-control" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
          </div>
          <div class="col-md-2">
            <label class="form-label">Percent %</label>
            <input type="text" id="percent" name="percent" class="form-control" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
          </div>
          <div class="col-md-2">
            <label class="form-label">Min.Amount</label>
            <input type="number" id="minamount" name="minamount" class="form-control" min="0" max="100" required="">
          </div>
          <div class="col-md-2">
            <label class="form-label">Max.Amount</label>
            <input type="number" id="maxamount" name="maxamount" class="form-control" min="0" max="100" required="">
          </div>
          <div class="col-md-2">
            <label class="form-label">Currency</label>
            <select name="currency_id" id="currency_id" class="form-control" required=""><option value="">Please select</option><?php foreach($Currency as $ci) { ?><option value="<?php echo $ci['id'];?>"><?php echo $ci['name'];?></option> <?php } ?></select>
          </div>
          <div class="col-md-2" style="margin-top: 5px;"><br>
            <button class="btn btn-primary Insert" type="button" id="insertid" >Insert</button>
            <input type="button" name="" class="btn btn-primary" value="Update" id="updateid">      
            <button class="btn btn-primary" type="button" id="updateid" style="display:none;">Edit</button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <b>Note :</b><p>1 Amount in Min/Max Will be termed as Unlimited</p>
  <div class="row">
    <table class="table" id="insertpaneltb">
    </table>
  </div>
  <div class="row">
    <div class="card" style="width:100%;">

      <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Inclusions</h6>
       <div> <div id="errorid2" style="color: red;"></div></div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
           <input type="hidden" name="type_id" id="type_id" value="2">
           <label class="form-label">Description</label>
           <input type="text" id="description1"  name="description1" class="form-control" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
         </div>
         <div class="col-md-2">
          <label class="form-label">Percent %</label>
          <input type="text" id="percent1" name="percent1" class="form-control" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
        </div>
        <div class="col-md-2">  
          <label class="form-label">Min.Amount</label>
          <input type="text" id="minamount1" name="minamount1" class="form-control" min="0" max="100" required="">
        </div>
        <div class="col-md-2">
          <label class="form-label">Max.Amount</label>
          <input type="text" id="maxamount1" name="maxamount1" class="form-control" min="0" max="100" required="">
        </div>
        <div class="col-md-2">
          <label class="form-label">Currency</label>
          <select name="currency_id" id="currency_id1" class="form-control" required=""><option value="">Please select</option><?php foreach($Currency as $ci) { ?><option value="<?php echo $ci['id'];?>"><?php echo $ci['name'];?></option> <?php } ?></select>
        </div>
        <div class="col-md-2" style="margin-top: 5px;"><br>
          <button class="btn btn-primary Insert" type="button" id="insertid1" >Insert</button>
          <input type="button" name="" class="btn btn-primary" value="Update" id="updateid1">      
          <button class="btn btn-primary" type="button" id="updateid" style="display:none;">Edit</button>
        </div>
      </div>

    </div>
  </div>
</div>
<b>Note :</b><p>1 Amount in Min/Max Will be termed as Unlimited</p>
<div class="row">
  <table class="table" id="insertpaneltb1">
  </table>
</div>
<div class="row">
  <div class="card" style="width:100%;">
    <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Exclusions</h6>
     <div> <div id="errorid3" style="color: red;"></div></div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <input type="hidden" name="type_id" id="type_id" value="3">
          <label class="form-label">Description</label>
          <input type="text" id="description2" name="description" class="form-control" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
        </div>
        <div class="col-md-2">
          <label class="form-label">Percent %</label>
          <input type="text" id="percent2" name="percent" class="form-control"  min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
        </div>
        <div class="col-md-2">
          <label class="form-label">Min.Amount</label>
          <input type="text" id="minamount2" name="minamount" class="form-control" min="0" max="100" required="">
        </div>
        <div class="col-md-2">
          <label class="form-label">Max.Amount</label>
          <input type="text" id="maxamount2" name="maxamount" class="form-control" min="0" max="100" required="">
        </div>
        <div class="col-md-2">
          <label class="form-label">Currency</label>
          <select name="currency_id" id="currency_id2" class="form-control" required=""><option value="">Please select</option><?php foreach($Currency as $ci) { ?><option value="<?php echo $ci['id'];?>"><?php echo $ci['name'];?></option> <?php } ?></select>
        </div>
        <div class="col-md-2" style="margin-top: 5px;"><br>
          <button class="btn btn-primary Insert" type="button" id="insertid2" >Insert</button>
          <button class="btn btn-primary" type="button" id="updateid2" style="display:none;">Edit</button>
        </div>
      </div>
   </div>
</div>
</div>
<b>Note :</b><p>1 Amount in Min/Max Will be termed as Unlimited</p>
<div class="row">
  <table class="table" id="insertpaneltb2">
    </table>
  </div><div class="row">
      <div class="card" style="width:100%;">
        <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Extensions</h6>
           <div> <div id="errorid4" style="color: red;"></div></div>
        <div class="card-body">
           <div class="row">
            <div class="col-md-2">
             <input type="hidden" name="type_id" id="type_id3" value="4">
             <label class="form-label">Description</label>
             <input type="text" id="description3" name="description" class="form-control" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
           </div>
           <div class="col-md-2">
            <label class="form-label">Percent %</label>
            <input type="text" id="percent3" name="percent" class="form-control" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
          </div>
          <div class="col-md-2">
            <label class="form-label">Min.Amount</label>
            <input type="text" id="minamount3" name="minamount" class="form-control" min="0" max="100" required="">
          </div>
          <div class="col-md-2">
            <label class="form-label">Max.Amount</label>
            <input type="text" id="maxamount3" name="maxamount" class="form-control" min="0" max="100" required="">
          </div>
          <div class="col-md-2">
            <label class="form-label">Currency</label>
            <select name="currency_id" id="currency_id3" class="form-control" required=""><option value="">Please select</option><?php foreach($Currency as $ci) { ?><option value="<?php echo $ci['id'];?>"><?php echo $ci['name'];?></option> <?php } ?></select>
          </div>
          <div class="col-md-2" style="margin-top: 5px;"><br>
            <button class="btn btn-primary Insert" type="submit" id="insertid3" >Insert</button>
            <button class="btn btn-primary" type="button" id="updateid3" style="display:none;">Edit</button>
          </div>
        </div>
    </div>
  </div>
</div>
<b>Note :</b><p>1 Amount in Min/Max Will be termed as Unlimited</p>
<div class="row">
   <table class="table" id="insertpaneltb3">
    </table>
    </div> <div class="row">
      <div class="card" style="width:100%;">
        <h6 class="card-header bg-primary" style="height:30px;padding:5px;">Terms & Conditions</h6>
           <div> <div id="errorid5" style="color: red;"></div></div>
        <div class="card-body">
            <div class="row">
              <div class="col-md-2">
               <input type="hidden" name="type_id" id="type_id4" value="5">
               <label class="form-label">Description</label>
               <input type="text"  id="description4" name="description" class="form-control" required="" pattern="[a-zA-Z]+" title="Accepts Only Alphabetic Only">
             </div>
             <div class="col-md-2">
              <label class="form-label">Percent %</label>
              <input type="text" id="percent4" name="percent" class="form-control" min="0"  pattern="(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)" required="" title="Accepts Only float value 0 between 100 ">
            </div>
            <div class="col-md-2">
              <label class="form-label">Min.Amount</label>
              <input type="text" id="minamount4" name="minamount" class="form-control" min="0" max="100" required="">
            </div>
            <div class="col-md-2">
              <label class="form-label">Max.Amount</label>
              <input type="text" id="maxamount4" name="maxamount" class="form-control" min="0" max="100" required="">
            </div>
            <div class="col-md-2">
              <label class="form-label">Currency</label>
              <select name="currency_id" id="currency_id4"  class="form-control" required=""><option value="">Please select</option><?php foreach($Currency as $ci) { ?><option value="<?php echo $ci['id'];?>"><?php echo $ci['name'];?></option> <?php } ?></select>
            </div>
            <div class="col-md-2" style="margin-top: 5px;"><br>
              <button class="btn btn-primary Insert" type="submit" id="insertid4" >Insert</button>
              <button class="btn btn-primary" type="button" id="updateid4" style="display:none;">Edit</button>
            </div>
          </div>
      </div>
    </div>
  </div>
  <b>Note :</b><p>1 Amount in Min/Max Will be termed as Unlimited</p>
  <div class="row">
  <table class="table" id="insertpaneltb4">
    </table>
      </div>
      <div class="modal-footer">
           <a href="<?php echo base_url('Setup_product')?>" class="btn btn-secondary">close</a>
        <input type="submit" class="btn btn-primary" value="save">

      </div>
      
    </div>
  </form>
</div>
</div>

<script type="text/javascript">
  $("#updateid").hide(); $("#updateid1").hide();$("#updateid2").hide();$("#updateid3").hide();$("#updateid4").hide();
  $('#insertid').click(function(){
    $('#errorid').html('')
    var description=$("#description").val();
    var percent=$("#percent").val();
    var minamount=$("#minamount").val();
    var maxamount=$("#maxamount").val();
    var currency_id=$("#currency_id").val();
    var type_id=1;
     $('#insertid').attr('disabled', 'disabled');
    if (!description) {
    $('#errorid1').append('Please select description!<br>');
      }
    if (!percent) {
      $('#errorid1').append('Please Enter percent!<br>');
    }
    if (!minamount) {
      $('#errorid1').append('Please Enter minamount!<br>');
    }
    if (!maxamount) {
      $('#errorid1').append('Please Enter maxamount!<br>');
    }
    if (!currency_id) {
      $('#errorid1').append('Please Enter currency_id!<br>');
    }
    else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/setup_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id},
        success:function(data)
        {
          $('#insertid').removeAttr('disabled');
          getInsertpaneltb();
          console.log(data);
        }
      });
    }
  });

  function getInsertpaneltb() {
    $("#description").val('');
    $("#percent").val('');
    $("#minamount").val('');
    $("#maxamount").val('');
    $("#currency_id").val('');
    $("#type_id").val('');

    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneltb')?>",
      data:{},
      success:function(data)
      {
        $('#insertpaneltb').html(data);
        console.log(data);
      }
    });
  }
  function edit_insertpanel(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneldata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#description").val(obj.description);
        $("#percent").val(obj.percent);
        $("#minamount").val(obj.minamount);
        $("#maxamount").val(obj.maxamount);
        $("#currency_id").val(obj.currency_id);
        $("#type_id").val(obj.type_id);
        $("#id").val(id);
        $("#insertid").hide();
        $("#updateid").show();
        console.log(data);
      }
    });
  }
  $('#updateid').click(function(){
    $('#errorid').html('')
    var description=$("#description").val();
    var percent=$("#percent").val();
    var limit_type=$("#limit_type").val();
    var minamount=$("#minamount").val();
    var maxamount=$("#maxamount").val();
    var currency_id=$("#currency_id").val();
    var type_id=$("#type_id").val();
    var id=$("#id").val(); 
    if (!description|| ! percent) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/edit_insurance_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id,id:id},
        success:function(data)
        {

          $("#updateid").show();
          getInsertpaneltb();
          console.log(data);
        }
      });
    }
  });  
  function delete_insertpanel(id) {
     if(confirm('Are you sure to remove this record ?'))
        {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/delete_insertpanel')?>",
      data:{id:id},
      success:function(data)
      {
      // alert(data);
      getInsertpaneltb();
      console.log(data);
    }
  });
   }
  } 
  $('#insertid1').click(function(){
    $('#errorid').html('')
  //var token=$(this).val();
  var description=$("#description1").val();
  var percent=$("#percent1").val();
  var minamount=$("#minamount1").val();
  var maxamount=$("#maxamount1").val();
  var currency_id=$("#currency_id1").val();
  var type_id=2;
     $('#insertid1').attr('disabled', 'disabled');
   
   if (!description) {
    $('#errorid2').append('Please select description!<br>');
      }
    if (!percent) {
      $('#errorid2').append('Please Enter percent!<br>');
    }
    if (!minamount) {
      $('#errorid2').append('Please Enter minamount!<br>');
    }
    if (!maxamount) {
      $('#errorid2').append('Please Enter maxamount!<br>');
    }
    if (!currency_id) {
      $('#errorid2').append('Please Enter currency_id!<br>');
    }else {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/setup_class_insert')?>",
      data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id},
      success:function(data)
      {
        $('#insertid1').removeAttr('disabled');
        getInsertpaneltb1();
        console.log(data);
      }
    });
  }
});
  function getInsertpaneltb1() {
    $("#description1").val('');
    $("#percent1").val('');
    $("#minamount1").val('');
    $("#maxamount1").val('');
    $("#currency_id1").val('');
    $("#type_id1").val('');

    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneltb1')?>",
      data:{},
      success:function(data)
      {
        $('#insertpaneltb1').html(data);
        console.log(data);
      }
    });
  } 
  function edit_insertpanel1(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneldata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#description1").val(obj.description);
        $("#percent1").val(obj.percent);
        $("#minamount1").val(obj.minamount);
        $("#maxamount1").val(obj.maxamount);
        $("#currency_id1").val(obj.currency_id);
        $("#type_id").val(obj.type_id);
        $("#id").val(id);
        $("#insertid1").hide();
        $("#updateid1").show();
        console.log(data);
      }
    });
  }
   $('#updateid1').click(function(){
    $('#errorid').html('')
    var description=$("#description1").val();
    var percent=$("#percent1").val();
    var limit_type=$("#limit_type1").val();
    var minamount=$("#minamount1").val();
    var maxamount=$("#maxamount1").val();
    var currency_id=$("#currency_id1").val();
    var type_id=$("#type_id1").val();
    var id=$("#id").val(); 
    if (!description|| ! percent) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/edit_insurance_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id,id:id},
        success:function(data)
        {

          $("#updateid1").show();
          getInsertpaneltb1();
          console.log(data);
        }
      });
    }
  });  
   function delete_insertpanel1(id) {
     if(confirm('Are you sure to remove this record ?'))
        {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/delete_insertpanel')?>",
      data:{id:id},
      success:function(data)
      {
      // alert(data);
      getInsertpaneltb1();
      console.log(data);
    }
  });
  }
  } 
  $('#insertid2').click(function(){
    $('#errorid').html('')
    var description=$("#description2").val();
    var percent=$("#percent2").val();
    var minamount=$("#minamount2").val();
    var maxamount=$("#maxamount2").val();
    var currency_id=$("#currency_id2").val();
    var type_id=3;
     $('#insertid2').attr('disabled', 'disabled');

    if (!description) {
    $('#errorid3').append('Please select description!<br>');
      }
    if (!percent) {
      $('#errorid3').append('Please Enter percent!<br>');
    }
    if (!minamount) {
      $('#errorid3').append('Please Enter minamount!<br>');
    }
    if (!maxamount) {
      $('#errorid3').append('Please Enter maxamount!<br>');
    }
    if (!currency_id) {
      $('#errorid3').append('Please Enter currency_id!<br>');
    }else{
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/setup_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id},
        success:function(data)
        {
          $('#insertid2').removeAttr('disabled');

          getInsertpaneltb2();
          console.log(data);
        }
      });
    }
  });
   function getInsertpaneltb2() {
    $("#description2").val('');
    $("#percent2").val('');
    $("#minamount2").val('');
    $("#maxamount2").val('');
    $("#currency_id2").val('');
    $("#type_id2").val('');

    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneltb2')?>",
      data:{},
      success:function(data)
      {
        $('#insertpaneltb2').html(data);
        console.log(data);
      }
    });
  } 
  function edit_insertpanel2(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneldata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#description2").val(obj.description);
        $("#percent2").val(obj.percent);
        $("#minamount2").val(obj.minamount);
        $("#maxamount2").val(obj.maxamount);
        $("#currency_id2").val(obj.currency_id);
        $("#type_id2").val(obj.type_id);
        $("#id").val(id);
        $("#insertid2").hide();
        $("#updateid2").show();
        console.log(data);
      }
    });
  }
   $('#updateid2').click(function(){
    $('#errorid').html('')
    var description=$("#description2").val();
    var percent=$("#percent2").val();
    var limit_type=$("#limit_type2").val();
    var minamount=$("#minamount2").val();
    var maxamount=$("#maxamount2").val();
    var currency_id=$("#currency_id2").val();
    var type_id=$("#type_id2").val();
    var id=$("#id").val(); 
    if (!description|| ! percent) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/edit_insurance_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id,id:id},
        success:function(data)
        {

          $("#updateid2").show();
          getInsertpaneltb2();
          console.log(data);
        }
      });
    }
  });  
   function delete_insertpanel2(id) {
     if(confirm('Are you sure to remove this record ?'))
        {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/delete_insertpanel')?>",
      data:{id:id},
      success:function(data)
      {
      // alert(data);
      getInsertpaneltb2();
      console.log(data);
    }
  });
  }
  } 
   $('#insertid3').click(function(){
    $('#errorid').html('')
    var description=$("#description3").val();
    var percent=$("#percent3").val();
    var minamount=$("#minamount3").val();
    var maxamount=$("#maxamount3").val();
    var currency_id=$("#currency_id3").val();
    var type_id=4;
     $('#insertid3').attr('disabled', 'disabled');

    if (!description) {
    $('#errorid4').append('Please select description!<br>');
      }
    if (!percent) {
      $('#errorid4').append('Please Enter percent!<br>');
    }
    if (!minamount) {
      $('#errorid4').append('Please Enter minamount!<br>');
    }
    if (!maxamount) {
      $('#errorid4').append('Please Enter maxamount!<br>');
    }
    if (!currency_id) {
      $('#errorid4').append('Please Enter currency_id!<br>');
    }else{
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/setup_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id},
        success:function(data)
        {
          $('#insertid3').removeAttr('disabled');

          getInsertpaneltb3();
          console.log(data);
        }
      });
    }
  });

  function getInsertpaneltb3() {
    $("#description3").val('');
    $("#percent3").val('');
    $("#minamount3").val('');
    $("#maxamount3").val('');
    $("#currency_id3").val('');
    $("#type_id3").val('');

    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneltb3')?>",
      data:{},
      success:function(data)
      {
        $('#insertpaneltb3').html(data);
        console.log(data);
      }
    });
  }
  function edit_insertpanel3(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneldata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#description3").val(obj.description);
        $("#percent3").val(obj.percent);
        $("#minamount3").val(obj.minamount);
        $("#maxamount3").val(obj.maxamount);
        $("#currency_id3").val(obj.currency_id);
        $("#type_id3").val(obj.type_id);
        $("#id").val(id);
        $("#insertid3").hide();
        $("#updateid3").show();
        console.log(data);
      }
    });
  }
   $('#updateid3').click(function(){
    $('#errorid').html('')
    var description=$("#description3").val();
    var percent=$("#percent3").val();
    var limit_type=$("#limit_type3").val();
    var minamount=$("#minamount3").val();
    var maxamount=$("#maxamount3").val();
    var currency_id=$("#currency_id3").val();
    var type_id=$("#type_id3").val();
    var id=$("#id").val(); 
    if (!description|| ! percent) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/edit_insurance_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id,id:id},
        success:function(data)
        {

          $("#updateid3").show();
          getInsertpaneltb3();
          console.log(data);
        }
      });
    }
  });  
   function delete_insertpanel3(id) {
     if(confirm('Are you sure to remove this record ?'))
        {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/delete_insertpanel')?>",
      data:{id:id},
      success:function(data)
      {
      // alert(data);
      getInsertpaneltb3();
      console.log(data);
    }
  });
  }
  } 
   $('#insertid4').click(function(){
    $('#errorid').html('')
    var description=$("#description4").val();
    var percent=$("#percent4").val();
    var minamount=$("#minamount4").val();
    var maxamount=$("#maxamount4").val();
    var currency_id=$("#currency_id4").val();
    var type_id=5;
     $('#insertid4').attr('disabled', 'disabled');

     if(!description) {
    $('#errorid5').append('Please select description!<br>');
      }
    if (!percent) {
      $('#errorid5').append('Please Enter percent!<br>');
    }
    if (!minamount) {
      $('#errorid5').append('Please Enter minamount!<br>');
    }
    if (!maxamount) {
      $('#errorid5').append('Please Enter maxamount!<br>');
    }
    if (!currency_id) {
      $('#errorid5').append('Please Enter currency_id!<br>');
    }else{
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/setup_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id},
        success:function(data)
        {
          $('#insertid4').removeAttr('disabled');
          getInsertpaneltb4();
          console.log(data);
        }
      });
    }
  });

  function getInsertpaneltb4() {
    $("#description4").val('');
    $("#percent4").val('');
    $("#minamount4").val('');
    $("#maxamount4").val('');
    $("#currency_id4").val('');
    $("#type_id4").val('');
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneltb4')?>",
      data:{},
      success:function(data)
      {
        $('#insertpaneltb4').html(data);
        console.log(data);
      }
    });
  }
  function edit_insertpanel4(id) {
    $.ajax({
      type:"post",
      datatype:"json",
      url:"<?=site_url('Setup_product/get_insertpaneldata')?>",
      data:{id:id},
      success:function(data)
      {
        var obj=JSON.parse(data);
        $("#description4").val(obj.description);
        $("#percent4").val(obj.percent);
        $("#minamount4").val(obj.minamount);
        $("#maxamount4").val(obj.maxamount);
        $("#currency_id4").val(obj.currency_id);
        $("#type_id4").val(obj.type_id);
        $("#id").val(id);
        $("#insertid4").hide();
        $("#updateid4").show();
        console.log(data);
      }
    });
  }
  $('#updateid4').click(function(){
    $('#errorid').html('')
    var description=$("#description4").val();
    var percent=$("#percent4").val();
    var limit_type=$("#limit_type4").val();
    var minamount=$("#minamount4").val();
    var maxamount=$("#maxamount4").val();
    var currency_id=$("#currency_id4").val();
    var type_id=$("#type_id4").val();
    var id=$("#id").val(); 
    if (!description|| ! percent) {
      exit;
    }else {
      $.ajax({
        type:"post",
        datatype:"json",
        url:"<?=site_url('Setup_product/edit_insurance_class_insert')?>",
        data:{type_id:type_id,description:description,percent:percent,minamount:minamount,maxamount:maxamount,currency_id:currency_id,id:id},
        success:function(data)
        {

          $("#updateid4").show();
          getInsertpaneltb4();
          console.log(data);
        }
      });
    }
  });  
  function delete_insertpanel4(id) {
     if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
              type:"post",
              datatype:"json",
              url:"<?=site_url('Setup_product/delete_insertpanel')?>",
              data:{id:id},
              success:function(data)
              {
              getInsertpaneltb4();
              console.log(data);
            }
          });
  }
  } 
  function doconfirm()
  {
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
      return false;
    }
  }
</script>