
<div class="main-panel">
<div class="content">
<div class="col-md-12">

                        <div class="card">
                            <div class="header">
									<h4 class="title">Edit Event  <button style="float: right;" onclick="history.go(-1);" class="btn btn-wd btn-default">BACK</button></h4>
                              <hr>
                            </div>
                            <?php if($this->session->flashdata('msg')): ?>
                              <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button> <?php echo $this->session->flashdata('msg'); ?>
                     </div>

                     <?php endif; ?>
                     <?php foreach ($res as $rows) {   } ?>
                            <div class="content">
                                <form method="post" action="<?php echo base_url(); ?>event/save" class="form-horizontal" enctype="multipart/form-data" id="eventform" name="eventform">
                                    <fieldset>
                                        <div class="form-group">
										<label class="col-sm-2 control-label">Date <span class="mandatory_field">*</span></label>
										<div class="col-sm-4">
                                               <input type="text" name="event_date" class="form-control datepicker" placeholder="Event Date" value="<?php $date=date_create($rows->event_date); echo date_format($date,"d-m-Y");  ?>"/>
                                            </div>
										<div class="col-sm-6"></div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Title <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="event_name" class="form-control" value="<?php echo $rows->event_name; ?>" maxlength="50">
                                                  <input type="hidden" name="event_id" class="form-control" value="<?php echo $rows->event_id; ?>">
                                            </div>
											<div class="col-sm-6"></div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Description <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                                <textarea type="text" MaxLength="350" placeholder="Maximum 350 characters" name="event_details" class="form-control"><?php echo $rows->event_details; ?></textarea>
                                            </div>
											<div class="col-sm-6"></div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                              <select name="event_status" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Inactive</option>
                                              </select>
                                              <script language="JavaScript">document.eventform.event_status.value="<?php echo $rows->status; ?>";</script>
                                            </div>
											<div class="col-sm-6"></div>
                                        </div>
                                    </fieldset>



                                    <fieldset>
                                        <div class="form-group">
										<label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-4">
												<input type="submit" id="save" class="btn btn-info btn-fill center"  value="SAVE">
                                            </div>
											<div class="col-sm-6"></div>
                                        </div>
                                    </fieldset>
                                </form>

                            </div>
                        </div>  <!-- end card -->

                    </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  $('#eventmenu').addClass('collapse in');
  $('#event').addClass('active');
  $('#event2').addClass('active');
 $('#eventform').validate({ // initialize the plugin
     rules: {
         event_date:{required:true },
         event_details:{required:true },
         event_name:{required:true },
         event_status:{required:true }
     },
     messages: {
           event_details: "This field cannot be empty!",
           event_date: "Please choose an option!",
           event_name: "This field cannot be empty!",
           event_status: "Please choose an option!"
         }
 });
});

</script>
