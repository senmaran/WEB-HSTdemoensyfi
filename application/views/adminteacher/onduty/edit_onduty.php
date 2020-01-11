<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Update On Duty Form</h4>
                       </div>
						<?php foreach($edit as $res){}	?>
                       <div class="content">
                                 <form method="post" action="<?php echo base_url(); ?>teacheronduty/update_onduty" class="form-horizontal" enctype="multipart/form-data" id="ondutysection" name="ondutysection">
                       
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Reason Out <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
							   <input type="text" name="reason" value="<?php echo $res->od_for; ?>" class="form-control" maxlength="30">
							    <input type="hidden" name="id" value="<?php echo $res->id; ?>" class="form-control">
                              </div>
                            <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
						
						<fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">From Date <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="fdate"  class="form-control datepicker" value="<?php $dateTime=new DateTime($res->from_date); $fdate=date_format($dateTime,'d-m-Y' ); echo $fdate; ?>">
                              </div>
							  <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
										
						 <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">To Date <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="tdate" class="form-control datepicker" value="<?php $dateTime=new DateTime($res->to_date); $tdate=date_format($dateTime,'d-m-Y' ); echo $tdate; ?>">
                              </div>
                              <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
						
						<fieldset>
                           <div class="form-group">
                             <label class="col-sm-2 control-label">Notes <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <textarea rows="4" cols="80" MaxLength="250" placeholder="MaxCharacters 250" name="notes" class="form-control"><?php echo $res->notes; ?></textarea>
                              </div>
							   <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
						
                        <div class="form-group">
                           <label class="col-sm-2 control-label">&nbsp;</label>
                           <div class="col-sm-4">
						    <input type="submit" id="save" class="btn btn-info btn-fill center"  value="SAVE">
                            
                           </div>
						   <div class="col-sm-6"></div>
                        </div>
                  
                     </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

</div>

</div>

<script type="text/javascript">
      $().ready(function(){
    $('#ondutymenu').addClass('collapse in');
   $('#stuonduty').addClass('active');
   $('#onduty2').addClass('active'); 
		 $('#ondutysection').validate({ // initialize the plugin
        rules: {
           reason:{required:true },
			notes:{required:true },
			fdate:{required:true },
			tdate:{required:true },
			status:{required:true }
			
        },
        messages: {
              reason: "This field cannot be empty!",
			   notes: "This field cannot be empty!",
			   fdate: "This field cannot be empty!",
			   tdate: "This field cannot be empty!",
			   status: "This field cannot be empty!",
			   
			  
            }
    });
	//demo.initFormExtendedDatetimepickers();
			
        $('.datepicker').datetimepicker({
          format: 'DD-MM-YYYY',
          icons: {
              time: "fa fa-clock-o",
              date: "fa fa-calendar",
              up: "fa fa-chevron-up",
              down: "fa fa-chevron-down",
              previous: 'fa fa-chevron-left',
              next: 'fa fa-chevron-right',
              today: 'fa fa-screenshot',
              clear: 'fa fa-trash',
              close: 'fa fa-remove'
          }
       });
      });
  </script>
