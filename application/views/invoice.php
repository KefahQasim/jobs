<head>

	<style>
		@page {
			size: auto;   /* auto is the initial value */
			margin-top: 30px;  /* this affects the margin in the printer settings */
			margin-bottom:0 ;  /* this affects the margin in the printer settings */
		}
		.container-border {
			padding: 20px;
			border-collapse: separate;
			border-width: 2px;
			border-color: black;
			border-style: solid;
			border-radius: 50px 20px;
			overflow: hidden;
			perspective: 1px;
		}
		#rcorners1 {
			border-collapse: separate;
			border-radius: 25px;
			background: #73AD21;
			padding: 20px;
			width: 200px;
			height: 150px;
		}

	</style>
</head>

<div class="invoice">
	<div class="row invoice-logo">
		<div class="col-xs-12">
			<img src="<?php echo base_url(); ?>/assets/pages/media/invoice/header.jpeg" />  </div>

	</div>
	<br>
	<input type="hidden"  id="file_num" name="file_num" class="form-control" value="<?php echo $invoceInfo[0]['file_num']; ?>" >

	<?php $total =0 ; ?>
	<div class="row" style="margin-top: 20px" >
		<div class="col-xs-4 " >
			<div class="well container-border rounded-4" id=""  >
				<address>
					<h3> بيانات المشترك:</h3>
					<strong>رقم الملف :</strong><?php echo $invoceInfo[0]['file_num']; ?>
					<br>
					<strong> اسم المشترك :</strong><?php echo $invoceInfo[0]['cust_name'] ; ?>
					<br>
					<strong> دورة الفاتورة :</strong><?php echo $invoceInfo[0]['openFile_date']  ; ?>

				<address>
					<strong>الفاتورة الاجمالية : </strong>

					<a href=""> <?php  echo ($taxInfo[0]['annual_tax']*12) + $taxInfo[0]['annual_tax']    ; ?> </a>
				</address>
			</div>
			<div class="well container-border rounded-4" style="background: lightgrey; " id="container-border">
				<h3>تفاصيل الحرفة:</h3>
				<ul class="list-unstyled">
					<strong>  نوع الحرفة :</strong><?php echo $taxInfo[0]['job_name'] ; ?>
					<br>
					<strong>  عنوان الحرفة :</strong><?php echo $invoceInfo[0]['profession_address'] ; ?>
					<br>
					<strong> رقم المبنى  :</strong><?php echo $invoceInfo[0]['building_No'] ; ?>
					<br>
					<strong> رقم الشارع :</strong><?php echo $invoceInfo[0]['street_No'] ; ?>
					<br>

				</ul>
			</div>

			<div class="well container-border rounded-4" style="background: lightgrey; " id="container-border">
				<ul class="list-unstyled">
					<strong> عزيزي صاحب المهنة :</strong>
					<br>
					<strong> إن مزاولة أي مهنة برخصة منتهية أو دون الحصول على رخصة أمر مخالف للقانون ويشكل خطرا متفاوتا على صحة وسلامة المواطنين </strong>
					<br>
				</ul>
			</div>

			<div class="well container-border rounded-4" style="background: lightgrey" id="container-border">
				<h3>  ملاحظات :</h3>
				<br>
				<br>
			</div>
		</div>
		<div class="col-xs-7 rounded-4"  >
			<div class="well container-border rounded-4" style="background: lightgrey; " id="container-border">
				<table class="table table-striped table-hover">
					<thead>
					<tr>
						<th> # </th>
						<th> بيانات الفاتورة </th>
						<th > أغورة </th>
						<th > شيكل </th>

					</tr>
					</thead>
					<tbody>
					<tr>
						<td> 1 </td>
						<td> الصرف الصحي </td>
						<td > 00   </td>
						<td > 00 </td>
					</tr>
					<tr>
						<td> 2 </td>
						<td> خدمة النظافة </td>
						<td ><?php echo 00 ; ?> </td>
						<td ><?php  echo $taxInfo[0]['annual_tax'] *12; ?> </td>

					</tr>
					<tr>
						<td> 3 </td>
						<td> مكافحة افات وقوارض </td>
						<td > 00 </td>
						<td > 1 </td>
					</tr>
					<tr>
						<td> 4 </td>
						<td> ضريبة الحرفة </td>
						<td > 00 </td>
						<td > <?php echo $taxInfo[0]['annual_tax'] ; ?> </td>
					</tr>
					<tr>
						<td> 5 </td>
						<td> ضريبة اليافطة </td>
						<td > 00 </td>
						<td > 00 </td>
					</tr>
					<tr>
						<td></td>
						<td >اجمالي الفاتورة </td>
						<td > </td>
						<?php $total = $taxInfo[0]['annual_tax'] *12 + $taxInfo[0]['annual_tax']  ; ?>
						<td style="column-span: 2; align-content: center;"> <?php  echo $total  ; ?> </td>

					</tr>
					</tbody>
				</table>
			</div>
			<div class="well container-border rounded-4" style="background: lightgrey; " id="container-border">
				<ul class="list-styled">
					<strong style="font-size: 19px"> إرشادات هامة :</strong>
					<li><strong style="font-size: 17px">في حال بيع أو إغلاق المشروع أو إخلاء العقار المستأجر يجب اعلام قسم الحرف والصناعات.
					<li><strong style="font-size: 17px">عند الرغبة في التنازل عن ملف الحرفة يسمح بذلك مرة واحدة سنويا وبالشروط التالية :<br> </strong> 1- عقد ايجار مصادق عليه من طرف مكتب محاماة<br>2- حضور الطرفين للتوقيع على طلب التنازل<br>3-فحص المستحقات على المالك القديم والجديد<br>4- دفع رسوم النقل 60 شيكل للمالك الجديد +60 شيكل رسوم إفادة سلبية للمالك القديم

						 </li>
					<li><strong style="font-size: 17px">استخراج رخصة بدل فاقد يجب حضور صاحب الملف أو من ينوب عنه والرسوم 10 شيكل.</strong>
					<li><strong style="font-size: 17px">تغيير الحرفة(إصدار رخصة جديدة بالخصوص)- إضافة / حذف شريك ’ الرسوم 10 شيكل.</strong>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<img src="<?php echo base_url(); ?>/assets/pages/media/invoice/footer.jpg" />  </div>

	</div>
	</div>
	<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();" style=""> طبـاعة
		<i class="fa fa-print"></i>
	</a>
</div>
