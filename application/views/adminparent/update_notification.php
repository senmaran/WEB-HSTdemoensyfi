<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Notification Settings</h4>
						    <p>Choose the way you want to get notified</p>
                           <?php if($this->session->flashdata('msg')): ?>
                             <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                           ×</button> <?php echo $this->session->flashdata('msg'); ?>
                   </div>
					<?php endif; ?>
                       </div>
                       <?php
					   
                       foreach ($notification_status as $rows) 
					   { 
						   $mstatus = $rows->mail_prefs; 
						   $sstatus =  $rows->sms_prefs; 
						   $pstatus = $rows->push_prefs; 
					   }
                        ?>
                       <div class="content" style="padding-top:20px;">
                           <form action="<?php echo base_url(); ?>parentprofile/update_notification" method="post" enctype="multipart/form-data" id="myformpass">

                               <div class="row">
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label>SMS</label><br>
                                       </div>
                                   </div>
								   <div class="col-md-4">
                                       <div class="form-group">
                                           <input type="radio" name="Sms" value="Y" <?php if ($sstatus == 'Y' ) echo "checked";?>> Enable <input type="radio" name="Sms" value="N" <?php if ($sstatus == 'N' ) echo "checked";?>> Disable
                                       </div>
                                   </div>
								</div>
								<div class="row">
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label>Email</label><br>
                                       </div>
                                   </div>
								    <div class="col-md-4">
                                       <div class="form-group">
                                           <input type="radio" name="Mail" value="Y" <?php if ($mstatus == 'Y' ) echo "checked";?>> Enable <input type="radio" name="Mail" value="N" <?php if ($mstatus == 'N' ) echo "checked";?>> Disable
                                       </div>
                                   </div>
								 </div>
								 <div class="row">
								    <div class="col-md-4">
                                       <div class="form-group">
                                           <label>Push Notification</label><br>
                                       </div>
                                   </div>
								   <div class="col-md-4">
                                       <div class="form-group">
                                          <input type="radio" name="Push" value="Y" <?php if ($pstatus == 'Y' ) echo "checked";?>> Enable <input type="radio" name="Push" value="N" <?php if ($pstatus == 'N' ) echo "checked";?>> Disable
                                       </div>
                                   </div>
								  
                               </div>
                               <div class="row">
							    <div class="col-md-4">
                                       <div class="form-group">
                                       </div>
                                   </div>
								    <div class="col-md-4">
                                       <div class="form-group">
                                          <button type="submit" class="btn btn-info btn-fill">SAVE</button>
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
var loadFile = function(event) {
 var output = document.getElementById('output');
 output.src = URL.createObjectURL(event.target.files[0]);
};
</script>
