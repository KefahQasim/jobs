   <div class="portlet box blue-hoki ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i> إدارة صلاحيات المستخدم  </div>
                                        <div class="tools">
                                            <a href="" class="collapse" data-original-title="" title=""> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                            <a href="" class="reload" data-original-title="" title=""> </a>
                                            <a href="" class="remove" data-original-title="" title=""> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        
                 <form class="form-horizontal" method="post" action="<?php echo  base_url(); ?>index.php/system_c/add_userPrivilage" >
                                            <div class="form-body">
                                                
                                                
                                               
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">اختر  اسم المستخدم  </label>
                                                    <div class="col-md-9">
                                <select class="form-control"  id = "userName" name="userName" style="width: 50%" >
                  
  
                                                   <?php foreach ($user['crs'] as $row ):?>
              
                                          <option value="<?= $row['USR_NO'] ?>"><?= $row['USR_ENGNAME'] ?></option>
                                                    <?php endforeach; ?>
                
                                                       </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">الصلاحيات </label>
                                                    <div class="col-md-9">
                               <div class="form-group">
                                                   
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">إضافة دفعة بلدية
                                                 <input type="checkbox"  name="priv[]" value="1">
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                            <input type="checkbox"  name="priv[]" value="6"> إضافة دفعة مصلحة
                                                            <span></span>
                                                        </label>
                                                          <label class="mt-checkbox">
                                            <input type="checkbox"  name="priv[]" value="2"> عرض الدفعات ومجموعها
                                                            <span></span>
                                                        </label>
                                                         
                                                       
                                                    </div>
                                                    <div class="mt-checkbox-inline">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox"  name="priv[]" value="3"> ترحيل لموظف البلدية 
                                                            <span></span>
                                                        </label>

                                                        <label class="mt-checkbox">
                                                            <input type="checkbox"  name="priv[]" value="4"> ترحيل لموظف المصلحة 
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">إدارة النظام 
                                                 <input type="checkbox"  name="priv[]" value="5">
                                                            <span></span>
                                                        </label>
                                                        
                                                       
                                                    </div>
                                                </div>
                                                    </div>
                                                </div>
                                               
                                               
                                            </div>
                                            <div class="form-actions right1">
                                                <!--<button type="button" class="btn default">Cancel</button>-->
                                                <button type="submit" class="btn green mt-sweetalert" data-title="تنبيه " data-message="هل أنت متأكد من ترحيل المستند " data-allow-outside-click="true" data-confirm-button-class="btn-info">حفظ </button>
                                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
