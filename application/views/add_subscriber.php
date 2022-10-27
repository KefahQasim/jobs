<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-gift"></i>البيانات التفصيلية للحرفة والمكلف </div>
		<div class="tools">
			<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
			<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
			<a href="javascript:;" class="reload" data-original-title="" title=""> </a>
			<a href="javascript:;" class="remove" data-original-title="" title=""> </a>
		</div>
	</div>
	<div class="portlet-body form">
		<!-- BEGIN FORM-->
		<form class="form-horizontal" method="post" action="<?php echo  base_url(); ?>index.php/Jobs_c/store_job_info" >
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
							<div class="col-md-9">

								<select class="form-control" id="job_name" name="job_name" >
									<option></option>
									<?php foreach ($jobsName as $row):?>

										<option value="<?php echo $row->id ?>"><?php echo $row->job_name ?></option>
									<?php endforeach; ?>



								</select> </div>
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
								<input type="date"   id="openFile_date" name="openFile_date" class="form-control" > </div>
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
								<button type="button" class="btn default">إلغاء </button>
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


