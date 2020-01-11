<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
                     <h4 class="title">On Duty Form</h4><hr>
                  </div>
                  <div class="content">
                     <form method="post" action="<?php echo base_url(); ?>teacheronduty/apply_onduty" class="form-horizontal" enctype="multipart/form-data" id="ondutysection" name="ondutysection">

                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Reason Out <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
							   <input type="text" name="reason" class="form-control" maxlength="30">
                              </div>
                              <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
						
						<fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">From Date <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="fdate" required class="form-control datepicker" value="">
                              </div>
							   <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
						
						 <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">To Date <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="tdate" required class="form-control datepicker" value="">
                              </div>
							   <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
						
						 <fieldset>
                           <div class="form-group">
							  <label class="col-sm-2 control-label">Notes <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <textarea rows="4" MaxLength="250" placeholder="MaxCharacters 250" cols="80" name="notes" class="form-control"></textarea>
                              </div>
							   <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
						
						<fieldset>
                           <div class="form-group">
							  <label class="col-sm-2 control-label"></label>
                              <div class="col-sm-4">
							  <input type="submit" id="save" class="btn btn-info btn-fill center"  value="SUBMIT">
                                
                              </div>
							   <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php if($this->session->flashdata('msg')): ?>
      <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
         ×</button> <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php endif; ?>
      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="content">
                       <h4 class="title">List of OnDuty</h4><hr>
                        <div class="fresh-datatables">
                           <table id="bootstrap-table" class="table">
                              <thead>
                                 <th>S.no</th>
                                 <th>Reason Out</th>
                                 <th>From Date</th>
                                 <th>To Date</th>
                                 <th>Status</th>
								 <th>Actions</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach ($result as $rows) { $stu=$rows->status;
                                     ?>
                                 <tr>
                                    <td><?php  echo $i; ?></td>
                                    <td><?php  echo $rows->od_for; ?></td>
                                    <td><?php $dateTime=new DateTime($rows->from_date); $fdate=date_format($dateTime,'d-m-Y' ); echo $fdate; ?></td>
                                    <td><?php $dateTime=new DateTime($rows->to_date); $tdate=date_format($dateTime,'d-m-Y' ); echo $tdate; ?></td>

								<td><?php if($stu=='Pending'){ ?>
								 <button class="btn btn-warning btn-fill btn-wd">Pending</button>
								 <?php }elseif($stu=='Rejected'){?>
								 <button class="btn btn-danger btn-fill btn-wd">Reject</button>
								 <?php }else{ ?>
								 <button class="btn btn-success btn-fill btn-wd">Approval</button>
								 <?php }?>
								  </td>

                                    <td><?php if($stu=='Approved' || $stu=='Rejected'){echo"-";}else{ ?>
                                       <a href="<?php echo base_url();  ?>teacheronduty/edit_onduty/<?php echo $rows->id; ?>" class="btn btn-simple btn-warning btn-icon edit" style="font-size:18px;" rel="tooltip" title="Edit">
									<i class="fa fa-edit"></i></a><?php }?>
                                    </td>
                                 </tr>
                                 <?php $i++;  }  ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- end content-->
                  </div>
                  <!--  end card  -->
               </div>
               <!-- end col-md-12 -->
            </div>
            <!-- end row -->
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
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
   });

  $('#bootstrap-table').DataTable();
</script>
<script type="text/javascript">
   $().ready(function(){

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
