<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Edit Subject</h4>
                           <?php if($this->session->flashdata('msg')): ?>
                             <div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                           ×</button> <?php echo $this->session->flashdata('msg'); ?>
							</div>
						<?php endif; ?>
                       </div>
                       <?php
                       foreach($datas as $rows){}
                      ?>
                       <div class="content">
                           <form action="<?php echo base_url(); ?>subjectadd/save_subject" method="post" enctype="multipart/form-data" id="myformsub" name="myformsub">
                               <div class="row">
                                   
								   <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Subject <span class="mandatory_field">*</span></label>
                                           <input type="text" class="form-control"  placeholder="" name="subjectname" id="subjectname" value="<?php  echo $rows->subject_name; ?>" maxlength="30">
                                           <input type="hidden" class="form-control"  placeholder="" name="subject_id" value="<?php  echo $rows->subject_id; ?>">
                                       </div>
                                   </div>
									<div class="col-md-3">
                                       <div class="form-group">
											<label>Status <span class="mandatory_field">*</span></label>
											<select name="status" class="selectpicker form-control">
												  <option value="Active">Active</option>
												  <option value="Deactive">Inactive</option>
												</select>
											<script language="JavaScript">document.myformsub.status.value="<?php echo $rows->status; ?>";</script>
										</div>
                                   </div>
                                   <div class="col-md-3">
                                     <div class="form-group">
                                       <label style="margin-top:30px;"><input type="checkbox" name="is_preferred_lang" value="1" style="margin-right:10px;" <?php if ($rows->is_preferred_lang == 1) echo 'checked'; ?> >Set as second language</label>
                                       </div>
                                  </div>
								<div class="col-md-3">
                                      <div class="form-group" style="margin-top:20px;">
										<label>&nbsp;</label>
											<input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
                                        </div>
                                    </div>
									 
                                 </div>

                               <div class="clearfix"></div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </div>


</div>

<script type="text/javascript">

$(document).ready(function () {
  $('#mastersmenu').addClass('collapse in');
  $('#master').addClass('active');
  $('#masters4').addClass('active');


  $('#myformsub').validate({ // initialize the plugin
      rules: {
          subjectname:{required:true },
      },
      messages: {
            subjectname: "This field cannot be empty!"
          }
  });
 });





</script>
