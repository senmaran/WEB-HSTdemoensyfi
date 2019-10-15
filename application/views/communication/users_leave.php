<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
	  <div class="col-md-12">
               <?php if($this->session->flashdata('msg')): ?>
         <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×</button> <?php echo $this->session->flashdata('msg'); ?>
         </div>
         <?php endif; ?>
         <div class="row">

               <div class="card">
                  <div class="header">
                     <legend>Staff Leave Details
					  <a href="<?php echo base_url(); ?>userleavemaster/home" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;">Create Leave Master</a>
					  </legend>
                  </div>
				  <form method="post" action="<?php echo base_url(); ?>enrollment/view" class="form-horizontal" enctype="multipart/form-data" id="search_year" name="search_year">
                        <fieldset>
                           <div class="form-group">
                              <div class="col-sm-4">
                                 <select name="ace_year" id="ace_year"  required class="selectpicker" >
								  							 <option value="">Select Year</option>
                                    <?php foreach($ace_years as $rows)
                                       {
                                       $fyear=$rows->from_month;
                                       $month= strtotime($fyear);

                                       $eyear=$rows->to_month;
                                       $month1= strtotime($eyear);
                                    ?>
                                    <option value="<?php  echo $rows->year_id; ?>"><?php  echo  date('Y',$month); ?> (To) <?php  echo  date('Y',$month1); ?></option>
                                    <?php } ?>
                                 </select> <script language="JavaScript">document.search_year.ace_year.value="<?php echo $search_year; ?>";</script>
                              </div>

                              <div class="col-sm-4">
                                  <button type="submit" id="search" class="btn btn-info btn-fill center">Search </button>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  <div class="content">
                           <div class="fresh-datatables">
                        <table id="bootstrap-table" class="table">
                           <thead>
                              <th>S.no</th>
                              <th>Users Name</th>
                              <th>Leave Type</th>
                              <th>From Leave Date</th>
							  <th>To Leave Date</th>
                              <th>Status</th>
                              <th>Action</th>
                           </thead>
                           <tbody>
                              <?php
                                 $i=1;
                                 foreach($result as $rows)
							     { $status=$rows->status;
								  $type=$rows->type_leave;
                                  ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $rows->name ; ?></td>
                                 <td><?php  echo $rows->leave_title ; //if($type==0){ echo "Permission"; }else{ echo "Leave"; } ?></td>
                                 <td><?php $date=date_create($rows->from_leave_date);
                                     echo date_format($date,"d-m-Y");?>
                									 <?php if($type==0)
                									 {?>
                									 <?php echo $rows->frm_time; ?> <?php echo $rows->to_time; ?>
                									 <?php }?>
                									 </td>
													 <td><?php $date=date_create($rows->to_leave_date);
                                     echo date_format($date,"d-m-Y");?> </td>
                                 <td><?php if($status=='Pending'){ ?>
                								 <button class="btn btn-warning btn-fill btn-wd" style="background-color:#E8BE1F;">Pending </button>
                								 <?php }else if($status=='Rejected'){?>
                								 <button class="btn btn-danger btn-fill btn-wd" > Reject</button>
                								 <?php }else{ ?>
                								   <button class="btn btn-success btn-fill btn-wd">Approved</button>
                								 <?php }?>
                								  </td>
                                   <td><?php //if($status=='A'){ ?>
								                  <a href="<?php echo base_url(); ?>communication/add_substitution/<?php echo $rows->leave_id; ?>" rel="tooltip" title="Add Substitution" class="btn btn-simple btn-info btn-icon table-action view" >
								                  <i class="fa fa-user-plus" aria-hidden="true"></i></a>
								                 <?php //}else{ echo "";} ?>
                                 <a href="<?php echo base_url();?>communication/user_leave_approval/<?php echo $rows->leave_id; ?>" title="Edit Details" rel="tooltip" class="btn btn-simple btn-warning btn-icon edit">
                                  <i class="fa fa-edit" aria-hidden="true"></i>
                                 </td>
                              </tr>
                              <?php $i++;  }  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>


      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
    $('#teachermenu').addClass('collapse in');
    $('#teacher').addClass('active');
    $('#teacher3').addClass('active');

    $('#myformsection').validate({ // initialize the plugin
       rules: {
         leave_type:{required:true },
   		 leave_date:{required:true },
   		 leave_description:{required:true },
        },
        messages: {
              leave_type:"Select Type Of Leave",
              leave_date:"Select Leave Date",
              leave_description:"Enter The Leave Description",
            }
    });
	demo.initFormExtendedDatetimepickers();
   });






   $().ready(function(){

     $('.datepicker').datetimepicker({
       format: 'DD-MM-YYYY',
	    minDate: new Date(),
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
   $('#bootstrap-table').DataTable();
</script>
