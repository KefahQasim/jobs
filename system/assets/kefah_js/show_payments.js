function clean_form() {
    document.getElementById("pay_total").reset();
}
// JavaScript Document

jQuery(document).ready(function () {
    $(".reset").click(function (e) {
       
        e.preventDefault();
        $(this).closest('form').find("input[type=text], textarea").val("");
       $(this).closest('form').find("select").val('').trigger("liszt:updated");
       $('#pay_date').val('');
      
     /*   $(this).closest('form').find("select").select2({'val': '', allowClear: true});
        $(this).closest('form').find("select").select2("val", "");*/
        $("#payments_view").addClass('hidden');
        /*******************/
        e.preventDefault();
        e.stopPropagation();
    
        return false;
    });

    $('#search').on('click', function (e) {

  //alert('wwwwwwwww');
 e.preventDefault();
  //alert('vvvvvvvv');
      /*  var direction= $('#recevied_party').val();
        var from = $('#from').val();
       var  to= $('#to').val();*/
 var formData = new FormData();
 formData.append('pay_date', $('#pay_date').val());

 
 // alert('localhost/solar/solar/index.php/export/displayReport');
 /* if you need to send param to action and you do't define it in view
  formData.append('op', 'CLOSE_PROCBOX');
 */
    // console.log(formData);
    $.ajax({
        url: 'http://localhost/gebaya/index.php/payments/get_payTotal_info',
        type: 'POST',
        dataType: 'html',
        data: formData,
        cache: false,
        processData: false, // Don't process the files
        contentType: false,
        success: function (result)
        {
          // alert('localhost/solar/solar/index.php/export/display_MReport');
           console.log(result);
          var htable="<div class='table-header'> النتيجة </div><table  class='table table-striped table-bordered table-hover'><thead> <tr> <th>رقم الاشتراك</th><th >مستند التحصيل </th><th > قيمة الفاتورة</th><th >قيمة الدفعة  </th><th>  قيمة الخصم </th> <th > التاريخ </th></tr></thead><tbody>";
          var btable="  </tbody>";
           var ftable="<thead> <th>المجموع الكلي </th></thead>";
          var ctable="";
           var endtable="</table>";
          var trtable="<tr>";
          var endtrtable="</tr>";
          var tdtable="<td>";
          var endtdtable="</td>";

             var obj = JSON.parse(result);
               var counter=obj['data'].length;
                console.log(obj['data']);
for (i = 0; i < counter; i++) {
      ctable += trtable+tdtable+obj['data'][i]['SUBN_SUBSCRIPTION_NO'] + endtdtable;
      ctable += trtable+tdtable+obj['data'][i]['BANK_VOUCHER_NO'] + endtdtable;
      ctable += trtable+tdtable+obj['data'][i]['BILL_NO'] + endtdtable;
      ctable += trtable+tdtable+obj['data'][i]['CSHP_VALUE'] + endtdtable;
      ctable += trtable+tdtable+obj['data'][i]['PYM_DISCOUNT'] + endtdtable;
     
      
      ctable += tdtable+obj['data'][i]['CSHP_ENTRY_DATE'] + endtdtable+endtrtable;
}



ftable += tdtable+obj['total'] + endtdtable;

var report_table=htable+ctable +btable+trtable+ftable+endtrtable+endtable;
      /*  $("#search_box").removeClass('hidden');
        $("#search_box").addClass('active');*/
              
 $("#monthly_report").removeClass('hidden');
  $("#monthly_report").html(report_table);
        // exit();
        }
    });

       });


});

