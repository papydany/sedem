  
    $(document).ready(function(){
  $('#invoice').hide();  
// get lga
$("#state").change( function() {
 
  $("#myModal").modal();  
var id =$(this).val();

   $.getJSON("getlga/"+id, function(data, status){
    var $lga = $("#lga");
    $lga.empty();
    $lga.append('<option value="">Select LGA</option>');
   $.each(data, function(index, value) {
   $lga.append('<option value="' +value.id +'">' + value.lga_name + '</option>');
  });
  $("#myModal").modal("hide");
    });


});

// get staff name
$("#store_id").change( function() {
 
  $("#myModal").modal();  
var id =$(this).val();

   $.getJSON("getstaffbystoreid/"+id, function(data, status){
    var $name = $("#name");
    $name.empty();
    $name.append('<option value="">--- Select Staff Name ---</option>');
   $.each(data, function(index, value) {
   $name.append('<option value="' +value.id +'">' + value.staff_name + '</option>');
  });
  
    });
$.getJSON("getstorerole/"+id, function(data, status){
    var $role = $("#role");
    $role.empty();
    $role.append('<option value="">--- Select Role ---</option>');
   $.each(data, function(index, value) {
   $role.append('<option value="' +value.id +'">' + value.role_name + '</option>');
  });

    });
  $("#myModal").modal("hide");

});
// get drugs name
$("#drugfamily_id").change( function() {
 
  $("#myModal").modal();  
var id =$(this).val();

   $.getJSON("/getdrugname/"+id, function(data, status){
    var $drug_name = $("#drug_name");
    $drug_name.empty();
    $drug_name.append('<option value="">Select Drug Name</option>');
   $.each(data, function(index, value) {
   $drug_name.append('<option value="' +value.id +'~'+value.drugname +'">'+value.drugname+ '</option>');
  });
  $("#myModal").modal("hide");
    });


});
//  get store 
$("#storetype").change( function() {
 
  $("#myModal").modal();  
var id =$(this).val();
var $store = $("#store");
if(id == 0)
{
   $store.empty();
   
   $store.append('<option value="0">Head Office</option>');
}else{
   $.getJSON("/getstore/"+id, function(data, status){
    
    $store.empty();
    $store.append('<option value="">----- Select Store ---- </option>');
   $.each(data, function(index, value) {
   $store.append('<option value="' +value.id +'">' + value.store_name + '</option>');
  });
  
    });
 }
$("#myModal").modal("hide");

});

$('#s').click(function(){ 
  
 $("#myModal").modal(); 



   var $product = $(".product");     
    $.ajax({
      url: 'search',
      type: "post",
      data: {'search':$('input[name=search]').val(), '_token': $('input[name=_token]').val()},
      success: function(data){
    
 
      }
    });
      $("#myModal").modal("hide");      
  });


$('#complete').click(function(event){ 
event.preventDefault();
 $("#myModal").modal(); 

 $.post("order",
    { 
       total:$('input[name=total]').val(),
      customer:$('input[name=customer]').val(),
      phone:$('input[name=phone]').val(),
      subtotal:$('input[name=subtotal]').val(),
      card_number:$('input[name=card_number]').val(),
      payment_type:$('input[type=radio][name=payment_type]:checked').val(),
      discount:$('input[name=discount]').val(),
       _token: $('input[name=_token]').val()
    },
    function(data, status){


   var $invoice = $(".invoice");
   var $payment = $(".payment");
 $invoice.append('<p class="invoice">Invoice No :'+ data.id+'</p>'); 
$payment.append('<p class="payment">Payment Type :'+ data.payment_type+'</p>');
 if(data.payment_type == "Debt" || data.payment_type =="Bank")
  {
    var $balance= $(".balance");
   $balance.append('<p>Balance :&#8358;&nbsp;'+ number_format(data.total)+'</p>'); 
  }
   $('.ccc').hide();
 $('#invoice').show();  
window.print();

window.location ="cashier";
     
    });
 

 $("#myModal").modal("hide");      
  });


$('#card_number').hide();

$('input[type=radio][name=payment_type]').change(function() {
        if (this.value == 'POS') {
         $('#card_number').show();
        }
        else if (this.value == 'Cash') {
           $('#card_number').hide();
        }
          else if (this.value == 'Debt') {
           $('#card_number').hide();
        } else if (this.value == 'Bank') {
           $('#card_number').hide();
        }

      });


// getstaff detail
$("#staff").change( function() {
 
  $("#myModal").modal();  
var id =$(this).val();

   $.getJSON("/getstaff/"+id, function(data, status){
   
    var $s = $("#s");
   
  
document.getElementById("salary").value =number_format(data.salary);
document.getElementById("s_id").innerHTML ='Staff Id :&nbsp;' + data.id;  
document.getElementById("job_type").innerHTML ='Job Type:&nbsp;' + data.jobTitle; 
document.getElementById("type_staff").innerHTML ='Type of Staff:&nbsp;' +data.jobType;  
  
   $s.append('<p>' + data.staff_name + '</p>');

 
    });
document.getElementById("loan").innerHTML ='';
document.getElementById("loan_deduction").value='';
 $.getJSON("/getloan/"+id, function(data, status){
 document.getElementById("loan").innerHTML ='Loan Balance:&nbsp;' + number_format(data.balance); 

 if(Number(data.balance) < Number(data.amount_to_deduct)) 
 {
document.getElementById("loan_deduction").value =number_format(data.balance);
 }else{
  document.getElementById("loan_deduction").value =number_format(data.amount_to_deduct);
 }

 });

 $("#myModal").modal("hide");
});
//================= print asset =========
 $('#m_d').hide();
  $('#p_d').hide();
   $('#m_d1').hide();
  $('#p_d1').hide();
$('input[type=radio][name=view]').change(function() {
        if (this.value == 'All') {
         $('#m_d').hide();
          $('#p_d').hide();
          $('#m_d1').hide();
          $('#p_d1').hide();
        }
        else if (this.value == 'purchase_date') {
           $('#m_d').hide();
            $('#p_d').show();
            $('#m_d1').hide();
            $('#p_d1').show();
        }

         else if (this.value == 'manufactured_date') {
           $('#p_d').hide();
           $('#p_d1').hide();
            $('#m_d').show();
            $('#m_d1').show();
        }


      });


function number_format (number, decimals, decPoint, thousandsSep) { 


number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
  var n = !isFinite(+number) ? 0 : +number
  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
  var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
  var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
  var s = ''

  var toFixedFix = function (n, prec) {
    var k = Math.pow(10, prec)
    return '' + (Math.round(n * k) / k)
      .toFixed(prec)
  }

  // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || ''
    s[1] += new Array(prec - s[1].length + 1).join('0')
  }

  return s.join(dec)
}

});
