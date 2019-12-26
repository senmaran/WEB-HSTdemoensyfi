<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Edit Academic Term</h4>
                       </div>
						<?php foreach($res as $row){}	?>
                       <div class="content">
                            <form method="post" action="<?php echo base_url(); ?>years/update_term" class="form-horizontal" enctype="multipart/form-data" id="myformsection" name="myformsection">
						      			<input type="hidden" name="terms_id" required class="form-control" value="<?php echo $row->term_id?>">
						           
								   <fieldset>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">Year <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-4">
                                            <select name="year_id"  required class="selectpicker" data-title="Select From & To Year " data-style="btn-default btn-block" data-menu-style="dropdown-blue">

                                        <?php
                                          $tea_name=$row->year_id;
										  $sQuery = "SELECT * FROM edu_academic_year ";
										  $objRs=$this->db->query($sQuery);
										  $row=$objRs->result();
										  foreach ($row as $rows1)
										  {
												 $s= $rows1->year_id;
												 $fyear=$rows1->from_month;
												 $month= strtotime($fyear);
												 $sec=date('Y',$month);

												 $eyear=$rows1->to_month;
												 $month1= strtotime($eyear);
												 $sec1=date('Y',$month1);

												 $arryPlatform = explode(",",$tea_name);
												 $sPlatform_id  = trim($s);
												 $sPlatform_name  = trim($sec);
												 $sPlatform_name1  = trim($sec1);
												 if (in_array($sPlatform_id, $arryPlatform ))
												  {
													   echo "<option  value=\"$s\" selected  /> $sec-$sec1&nbsp;&nbsp; </option>";
												  }
												 else {
												echo "<option value=\"$s\" />$sec-$sec1&nbsp;&nbsp;</option>";
												 }
										  }
														?>
                                  </select>
											<?php foreach($res as $row){}	?>
                                          </div>
                                          <label class="col-sm-2 control-label">Term <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-4">
												<input type="text" name="terms" required class="form-control" value="<?php echo $row->term_name; ?>" maxlength="20">
                                          </div>
                                      </div>
                                  </fieldset>

								<fieldset>
								  <div class="form-group">
									  <label class="col-sm-2 control-label">From <span class="mandatory_field">*</span></label>
									  <div class="col-sm-4">
										  <input type="text" name="from_month" required class="form-control datepicker" value="<?php $date=date_create($row->from_date); echo date_format($date,"d-m-Y");  ?>">
									  </div>
									  
									  <label class="col-sm-2 control-label">To <span class="mandatory_field">*</span></label>
									  <div class="col-sm-4">
										  <input type="text" value="<?php $date=date_create($row->to_date); echo date_format($date,"d-m-Y");  ?>" name="end_month" required class="form-control datepicker"  />
									  </div>
								  </div>
								</fieldset>
                                
							<div class="form-group">
								<label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
								<div class="col-sm-4">
								   <select name="status" class="selectpicker form-control">
									  <option value="Active">Active</option>
									  <option value="Deactive">Inactive</option>
									</select><script language="JavaScript">document.myformsection.status.value="<?php echo $row->status; ?>";</script>
                                 </div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label"></label>
								<div class="col-sm-4">
								  <input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
                                 </div>
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
   $(document).ready(function () {
   $('#mastersmenu').addClass('collapse in');
   $('#master').addClass('active');
   $('#masters2').addClass('active');
   
   $('#myformsection').validate({ // initialize the plugin
        rules: {
            year_id:{required:true },
			terms:{required:true },
			from_month:{required:true },
			end_month:{required:true },

        },
        messages: {
			year_id: "Please choose an option!",
			terms: "This field cannot be empty!",
			from_month: "This field cannot be empty!",
			end_month: "This field cannot be empty!",

            }
    });
   });


</script>
<script type="text/javascript">
   $().ready(function(){
       $('#bootstrap-table').DataTable();

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
