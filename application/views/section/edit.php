<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Edit Section</h4>
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
                           <form action="<?php echo base_url(); ?>sectionadd/save_section" method="post" enctype="multipart/form-data" id="myformsection" name="myformsection">
                               <div class="row">
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label>Section <span class="mandatory_field">*</span></label>
                                           <input type="text" class="form-control"  placeholder="" name="sectionname" id="sectionname" value="<?php  echo $rows->sec_name; ?>" maxlength="15">
                                            <input type="hidden" class="form-control"  placeholder="" name="sec_id" value="<?php  echo $rows->sec_id; ?>">

                                       </div>
                                   </div>
								   
								    <div class="col-md-4">
                                       <div class="form-group">
                                           <label>Status <span class="mandatory_field">*</span></label>
                                          <select name="status" class="selectpicker form-control">
												  <option value="Active">Active</option>
												  <option value="Deactive">Inactive</option>
												</select>
											<script language="JavaScript">document.myformsection.status.value="<?php echo $rows->status; ?>";</script>
                                       </div>
                                   </div>
								   
								   <div class="col-md-4">

                                   	<div class="form-group">
                                         	<label class="col-sm-2 control-label">&nbsp;</label><br>
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
  $('#masters3').addClass('active');


  $('#myformsection').validate({ // initialize the plugin
      rules: {
          sectionname:{required:true },
      },
      messages: {
            sectionname: "This field cannot be empty!"
          }
  });
 });





</script>
