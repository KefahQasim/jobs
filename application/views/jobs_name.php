<div class="row">
	<div class="col-sm-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light portlet-fit bordered">

			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="row">
						<div class="col-md-6">
							<div class="btn-group">
								<!-- Button trigger modal-->
								<button type="button"  class="btn green" data-toggle="modal" data-target="#exampleModalLong">
									<i class="fa fa-plus"></i>
									اضافة مهنة جديدة
								</button>
							</div>
						</div>

					</div>
				</div>
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
									اسم الحرفة
								</th>
								<th aria-label=" Full Name : activate to sort column ascending"
									style="width: 120px;" colspan="1" rowspan="1"
									aria-controls="sample_editable_1"
									tabindex="0" class="sorting">
									الضريبة السنوية
								</th>
								<th aria-label=" Points : activate to sort column ascending"
									style="width: 100px;"
									colspan="1" rowspan="1"
									aria-controls="sample_editable_1" tabindex="0"
									class="sorting">
									ضريبة النظافة
								</th>
								<th id="edit_th"
									aria-label=" Edit : activate to sort column ascending"
									style="width: 81px;"
									colspan="1" rowspan="1"
									aria-controls="sample_editable_1" tabindex="0"
									class="sorting"> تعديل
								</th>
								<th id="delete_th"
									aria-label=" Delete : activate to sort column ascending"
									style="width: 113px;"
									colspan="1" rowspan="1"
									aria-controls="sample_editable_1" tabindex="0"
									class="sorting"> حذف
								</th>
								<th id="delete_th"
									aria-label=" Delete : activate to sort column ascending"
									style="width: 113px;"
									colspan="1" rowspan="1"
									aria-controls="sample_editable_1" tabindex="0"
									class="sorting" hidden> حذف
								</th>

							</tr>
							</thead>
							<tbody id="table_data">
							<?php
							$i=1; if(isset($jobsName)) foreach ($jobsName as $row) { ?>
								<tr role="row" class="">

									<td> <?php echo $i;?> </td>
									<td class=""> <?php echo $row->job_name;?> </td>
									<td>                   <?php echo $row->annual_tax; ?> </td>
									<td class="">  </td>
									<td hidden><?=$row->id?></td>
									<td>
										<input id="id<?=$i ?>" type="hidden" value="<?=$row->id ?>">
										<button  data-toggle="modal" data-target="#editModal" class="btn btn-outline editingTRbutton btn-circle green btn-sm purple">
											<i class="fa fa-edit"></i> تعديل </button >
									</td>
									<td>
										<a href="<?=base_url()?>index.php/jobs_c/delete_job/<?=$row->id?>"  onclick="ConfirmDelete()"  class="btn btn-outline btn-circle dark btn-sm black">
											<i class="fa fa-trash-o"></i> حذف </a>
									</td>
								</tr>
								<?php $i++; }?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>


<!--Start create Modal-->
<!--Start create Modal-->
<div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">اضافة حرفة</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<form action="<?=base_url()?>index.php/jobs_c/store_new_job" method="post">
				<div class="modal-body" style="margin-bottom: 90px">
						<div class="form-group">
							<label class="col-md-3 control-label">اسم الحرفة</label>
							<div class="col-md-9">
								<input type="text" name="job_name" class="form-control" placeholder=" اسم الحرفة">

							</div>
						</div>
					<br>
						<div class="form-group">
							<label class="col-md-3 control-label">الضريبة السنوية</label>
							<div class="col-md-9">
								<input type="text" name="annual_tax" class="form-control" placeholder="الضريبة السنوية">

							</div>
						</div>
					<br>
						<div
								class="form-group">
							<label class="col-md-3 control-label">ضريبة النظافة</label>
							<div class="col-md-9">
								<input type="text" name="cleaningFees" class="form-control" placeholder="ضريبة النظافة">

							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
					<button type="submit" id="add_job" class="btn btn-primary font-weight-bold">حفظ </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end create Modal-->
<!--end create Modal-->

<!--Start Update Modal-->
<!--Start Update Modal-->
<div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">تعديل حرفة</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<form action="" method="post" id="updat_modal">
				<div class="modal-body" style="margin-bottom: 100px" >
						<div class="form-group" >
							<label class="col-md-3 control-label">اسم الحرفة</label>
							<div class="col-md-9">
								<input type="text" name="job_name" id="job_name" class="form-control" >

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">الضريبة السنوية</label>
							<div class="col-md-9">
								<input type="text" name="annual_tax" id="annual_tax" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">ضريبة النظافة</label>
							<div class="col-md-9">
								<input type="text" name="cleaningFees" id="cleaningFees" class="form-control" >

							</div>
						</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">إغلاق</button>
					<button type="submit" id="add_job" class="btn btn-primary  font-weight-bold">تعديل </button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end Update Modal-->
<!--end Update Modal-->
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

			var job_name = tr.cells[1].textContent.replace(/\s+/g, ' ');
			var annual_tax = tr.cells[2].textContent.replace(/\s+/g, '');

			var id = tr.cells[4].textContent.replace(/\s+/g, '');
			var url = $('#base_url').val();
			//$('#updat_modal').attr('action').val(url);
			//Prefill the fields with the gathered information
			$('#job_name').val(job_name);
			$('#annual_tax').val(annual_tax);


			//If you need to update the form data and change the button link
			$("form#updat_modal").attr('action', url+'update_job/'+id);
			//$("a#saveModalButton").attr('href', window.location.href+'/update/'+id);
		});
	});

	function ConfirmDelete()
	{
		if (confirm("هل أنت متأكد من عملية الحذف ؟"))
			location.href='linktoaccountdeletion';
	}
</script>
