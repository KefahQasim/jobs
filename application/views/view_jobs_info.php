<div class="portlet light portlet-fit bordered">

	<div class="portlet-body">

		<div class="dataTables_wrapper no-footer" id="sample_editable_1_wrapper">

			<div class="table">
				<table aria-describedby="sample_editable_1_info" role="grid"
					   class="table table-striped table-hover table-bordered dataTable no-footer"
					   id="sample_editable_1">
					<thead>

			<tr role="row">
				<th aria-label=" Username : activate to sort column descending"
					aria-sort="ascending" style="width: 120px;" colspan="1"
					rowspan="1"
					aria-controls="sample_editable_1" id="seq" tabindex="0"
					class="sorting_asc">
					المتسلسل
				</th>
				<th aria-label=" Username : activate to sort column descending"
					aria-sort="ascending" style="width: 120px;" colspan="1"
					rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting_asc">
					اسم المكلف
				</th>
				<th aria-label=" Full Name : activate to sort column ascending"
					style="width: 120px;" colspan="1" rowspan="1"
					aria-controls="sample_editable_1"
					tabindex="0" class="sorting">
					رقم الهوية
				</th>
				<th aria-label=" Points : activate to sort column ascending"
					style="width: 100px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting">
					رقم الملف
				</th>
				<th id=""
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting">اسم الحرفة
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting">id
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting">mobile
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting">profession Name
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting"> job status
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting">profession address
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting"> File No
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting"> open file date
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting"> Bulding No
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting"> street No
				</th>
				<th hidden
					aria-label=" Edit : activate to sort column ascending"
					style="width: 81px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting"> street No
				</th>

				<th id="edit_th"
					aria-label=" Delete : activate to sort column ascending"
					style="width: 113px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting">
				</th>
				<th id="delete_th"
					aria-label=" Delete : activate to sort column ascending"
					style="width: 113px;"
					colspan="1" rowspan="1"
					aria-controls="sample_editable_1" tabindex="0"
					class="sorting" hidden>
				</th>

			</tr>
			</thead>
			<tbody id="table_data">
				<?php
				$i=1; if(isset($jobsinfo)) foreach ($jobsinfo as $row) { ?>
					<tr role="row" class="">
						<td> <?php echo $i;?> </td>
						<td class=""> <?php echo $row->cust_name;?> </td>
						<td> <?php echo $row->card_id; ?> </td>
						<td class="">  <?php echo $row->file_num; ?> </td>
						<td class="">  <?php foreach ($jobs_name as $job){
							if ($job->id == $row->job_code)
							   echo $job->job_name;
							} ?>
						</td>
						<td hidden><?=$row->id?></td>
						<td hidden><?=$row->mobile?></td>
						<td hidden><?=$row->profession_name?></td>
						<td hidden><?=$row->job_status?></td>
						<td hidden><?=$row->profession_address?></td>
						<td hidden><?=$row->file_num?></td>
						<td hidden><?=$row->openFile_date?></td>
						<td hidden><?=$row->building_No?></td>
						<td hidden><?=$row->street_No?></td>
						<td hidden><?=$row->job_code?></td>

						<td>
							<button  data-toggle="modal" data-target="#newProcedur" class="btn btn-outline editingTRbutton btn-circle  btn-sm red">
								<i class="fa fa-edit"></i> حركة جديدة </button >

						</td>
						<td>
							<button  data-toggle="modal" data-target="#editModal" class="btn btn-outline editingTRbutton btn-circle  btn-sm green">
								<i class="fa fa-edit"></i> تعديل </button >
						</td>
					</tr>
					<?php $i++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!--Start create Modal-->
<!--Start create Modal-->
<div class="modal fade" id="newProcedur" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">اضافة حركة</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<form action="<?=base_url()?>index.php/jobs_c/store_new_prosedure" method="post" id="newProcedure_modal">
				<div class="modal-body" style="margin-bottom: 120px">
					<div class="form-group">
						<label class="col-md-3 control-label">نوع الحركة</label>
						<div class="col-md-9">
							<select class="form-control" name="procedure_type" id="procedure_type">
								<option value="تجديد">تجديد</option>
								<option value="إغلاق">إغلاق</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> تاريخ الحركة</label>
						<div class="col-md-9">
							<input type="date" name="procedure_date" id="procedure_date" class="form-control" placeholder="Enter text" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">اسم الحرفة </label>
						<div class="col-md-9">
							<input type="text" name="job_name1" id="job_name1" readonly class="form-control" >

						</div>
					</div>
					<div class="form-group" hidden>
						<label class="col-md-3 control-label">ID </label>
						<div class="col-md-9">
							<input type="text" name="job_id" id="job_id" readonly class="form-control" >

						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> رقم الملف </label>
						<div class="col-md-9">
							<input type="text" name="file_number" id="file_number" readonly class="form-control" >

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">إغلاق</button>
					<button type="submit" id="add_job" class="btn btn-primary  font-weight-bold">حفظ </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end create Modal-->
<!--end create Modal-->
<!--Start create Modal-->
<!--Start create Modal-->
<div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">تعديل بيانات المكلف </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form class="form-horizontal" method="post" id="updat_modal" >
					<div class="form-body">
						<h3 class="form-section">بيانات المكلف (مالك الحرفة) </h3>

						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3" >  اسم المكلف  </label>
									<div class="col-md-9">
										<input type="text"  id="cust_name" name="cust_name" class="form-control">
										<span class="help-block">  </span>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3"> رقم الهوية </label>
									<div class="col-md-9">
										<input type="text"  id="card_id" name="card_id" class="form-control"></div>
								</div>
							</div>
							<!--/span-->

						</div>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3"> العنوان للسكن </label>
									<div class="col-md-9">
										<input type="text"  id="cust_address" name="cust_address" class="form-control">
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">رقم الجوال </label>
									<div class="col-md-9">
										<input type="text"  id="mobile" name="mobile" class="form-control">
									</div>
								</div>
							</div>
							<!--/span-->

						</div>
						<h3 class="form-section">بيانات الحرفة </h3>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">اسم الحرفة  </label>
									<div class="col-md-9 id_100" >
										<select class="form-control" id="job_name" name="job_name" >
											<option></option>
											<?php foreach ($jobs_name as $row):?>

												<option value="<?php echo $row->id ?>"><?php echo $row->job_name ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label col-md-3">الاسم الاعلامي للمنشأة  </label>
									<div class="col-md-9">
										<input type="text" id="profession_name" name="profession_name" class="form-control"> </div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">حالة الحرفة  </label>
									<div class="col-md-9">
										<select class="form-control" name="job_status" id="job_status">
											<option value="نشط">نشط</option>
											<option value="موقوف">موقوف</option>
											<option value="مغلق">مغلق</option>
										</select>
									</div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">عنوان المنشأة    </label>
									<div class="col-md-9">
										<input type="text"  id="profession_address" name="profession_address" class="form-control"> </div>
								</div>
							</div>
							<!--/span-->
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3"> رقم الملف  </label>
									<div class="col-md-9">
										<input  id="file_num" name="file_num" type="text" class="form-control"> </div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">تاريخ فتح الملف   </label>
									<div class="col-md-9">
										<input type="text"   id="openFile_date" name="openFile_date" class="form-control" > </div>
								</div>
							</div>
							<!--/span-->
						</div>
						<!--/row-->
						<h3 class="form-section">بيانات  GIS  </h3>
						<!--/row-->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">رقم البناية   </label>
									<div class="col-md-9">
										<input type="text" id="building_No" name="building_No" class="form-control"> </div>
								</div>
							</div>
							<!--/span-->
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">رقم الشارع  </label>
									<div class="col-md-9">
										<input type="text" name="street_No"  id="street_No" class="form-control">

									</div>
								</div>
							</div>
							<!--/span-->
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<button type="post" class="btn green"><i class="fa fa-check"></i>حفظ </button>
										<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">إلغاء</button>
									</div>
								</div>
							</div>
							<div class="col-md-6"> </div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>
<!--end create Modal-->
<!--end create Modal-->
<input type="text" id="base_url" value="<?=base_url()?>index.php/jobs_c/" hidden>

<script src="../../assets/jquery-3.0.0.js"></script>
<script src="../../assets/pages/scripts/jobs-datatable.js"></script>
<script>
	/*-- ------------------                 Modal                    ------------------ */
	$(function() {
		//Take the data from the TR during the event button
		$('table').on('click', 'button.editingTRbutton',function (ele) {
			//the <tr> variable is use to set the parentNode from "ele
			var tr = ele.target.parentNode.parentNode;

			//I get the value from the cells (td) using the parentNode (var tr)

			var file_number = tr.cells[3].textContent.replace(/\s+/g,'');
			var job_name1 = tr.cells[4].textContent.replace(/\s+/g,' ');
			var id = tr.cells[5].textContent.replace(/\s+/g, '');
			var url = $('#base_url').val();

			$('#file_number').val(file_number);
			$('input#job_name1').val(job_name1);
			$('input#job_id').val(id);
			//If you need to update the form data and change the button link
			//$("form#updat_modal").attr('action', url+'update_job/'+id);
			//$("a#saveModalButton").attr('href', window.location.href+'/update/'+id);
		});
	});
</script>
<script>
	/*-- ------------------                 Modal                    ------------------ */
	$(function() {
		//Take the data from the TR during the event button
		$('table').on('click', 'button.editingTRbutton',function (ele) {
			//the <tr> variable is use to set the parentNode from "ele
			var tr = ele.target.parentNode.parentNode;

			//I get the value from the cells (td) using the parentNode (var tr)

			var cust_name = tr.cells[1].textContent.replace(/\s+/g, ' ');
			var card_id = tr.cells[2].textContent.replace(/\s+/g, '');
			var cust_address = tr.cells[3].textContent.replace(/\s+/g, '');
			var job_name =tr.cells[4].textContent.replace(/\s+/g,' ');
			var mobile = tr.cells[6].textContent.replace(/\s+/g,'');
			var id = tr.cells[5].textContent.replace(/\s+/g, '');
			var profession_name = tr.cells[7].textContent.replace(/\s+/g,' ');
			var job_status = tr.cells[8].textContent.replace(/\s+/g,' ');
			var profession_address = tr.cells[9].textContent.replace(/\s+/g,' ');
			var file_num = tr.cells[10].textContent.replace(/\s+/g,' ');
			var openFile_date = tr.cells[11].textContent.replace(/\s+/g,' ');
			var building_No = tr.cells[12].textContent.replace(/\s+/g,' ');
			var street_No = tr.cells[13].textContent.replace(/\s+/g,' ');
			var job_code = tr.cells[14].textContent.replace(/\s+/g,' ');
			var url = $('#base_url').val();
			//$('#updat_modal').attr('action').val(url);
			//Prefill the fields with the gathered information
			$('#cust_name').val(cust_name);
			$('#card_id').val(card_id);
			$('#cust_address').val(cust_address);
			$("div.id_100 select").val(job_code);
			$('#mobile').val(mobile);
			$('#profession_name').val(profession_name);
			$('#job_status').val(job_status);
			$('#profession_address').val(profession_address);
			$('#file_num').val(file_num);
			$('#openFile_date').val(openFile_date);
			$('#building_No').val(building_No);
			$('#street_No').val(street_No);

			//If you need to update the form data and change the button link
			$("form#updat_modal").attr('action', url+'update_subscriber/'+id);
			//$("a#saveModalButton").attr('href', window.location.href+'/update/'+id);
		});
	});


</script>

