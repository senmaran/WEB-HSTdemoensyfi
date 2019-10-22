
<div class="main-panel">
<div class="content">
<div class="col-md-12">

                        <div class="card">
                            <div class="header">
							<h4 class="title">Edit Event  <button style="float: right;" onclick="history.go(-1);" class="btn btn-wd btn-default">Go Back</button></h4>
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
                                            <label class="col-sm-4 control-label">Date</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="event_date" class="form-control datepicker" placeholder="Event Date" value="<?php echo $rows->event_date; ?>"/>

                                            </div>

                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Title</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="event_name" class="form-control" value="<?php echo $rows->event_name; ?>">
                                                  <input type="hidden" name="event_id" class="form-control" value="<?php echo $rows->event_id; ?>">

                                            </div>

                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Description</label>
                                            <div class="col-sm-4">
                                                <textarea type="text" MaxLength="350" placeholder="Maximum 350 characters" name="event_details" class="form-control"><?php echo $rows->event_details; ?></textarea>

                                            </div>

                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status</label>
                                            <div class="col-sm-4">
                                              <select name="event_status" class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Inactive</option>

                                              </select>
                                              <script language="JavaScript">document.eventform.event_status.value="<?php echo $rows->status; ?>";</script>
                                            </div>

                                        </div>
                                    </fieldset>



                                    <fieldset>
                                        <div class="form-group">
                                            <!-- <label class="col-sm-4 control-label">&nbsp;</label> -->
                                            <div class="text-center">
                                                   <button type="submit" class="btn btn-info btn-fill center">SAVE</button>
                                            </div>

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
