<?php
 if (count($result)>0) {
	foreach ($result as $rows) {}
		$ad_year = $rows->admisn_year;
 } else {
		$ad_year = "";
 }
?>
<style>
   .formdesign
   {
   padding-bottom: 48px;
   padding-top: 10px;
   border-radius: 12px;
   }
</style>
<div class="main-panel">
   <div class="content">
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
					  <h4 class="title" style="padding-bottom:10px;">Search by Years</h4>
								<form method="post" action="<?php echo base_url(); ?>admission/view" class="form-horizontal" enctype="multipart/form-data" id="search_class" name="search_class">

                        <fieldset>
                           <div class="form-group">

                              <div class="col-sm-4">
                                 <select name="years" id="years"  required class="selectpicker" >
								  <option value="">Select Years</option>
                                    <?php foreach($years as $rows) { ?>
                                    <option value="<?php  echo $rows->admisn_year; ?>"><?php  echo  $rows->admisn_year; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>

                              <div class="col-sm-4">
									<input type="submit" id="save" class="btn btn-info btn-fill center" value="SEARCH">
                              </div>
                           </div>
                        </fieldset>

                     </form><script language="JavaScript">document.search_class.years.value="<?php echo $ad_year; ?>";</script>
					 </div>
					                           
				</div>
									 </div>
				</div>
	  					 </div>
				</div>
      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="content">
                        <div class="fresh-datatables">
                           <h4 class="title" style="padding-bottom:20px;">List of Admission</h4>
								

                           <table id="example" class="table table-striped table-no-bordered table-hover" cellspacing="0" >
                              <thead>
                                 <th>S.No</th>
                                 <th>Name</th>
                                 <th>Admisn. No</th>
                                 <th>Parents Name</th>
                                 <th>Blood Group</th>
                                 <th>Gender</th>
                                 <th>Status</th>
                                 <th>Actions</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;

                                    foreach ($result as $rows)
                                     {
                                       $stu=$rows->status;
                                       $pname=$rows->parentsname;
                                      ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows->name; ?></td>
                                    <td><?php echo $rows->admisn_no; ?></td>
                                    <td><?php echo $pname; ?></td>
                                    <td><?php echo $rows->blood_group_name; ?></td>
                                    <td><?php echo $rows->sex; ?></td>
                                    <td><?php
                                       if($stu=='Active'){?>
                                       <button class="btn btn-success btn-fill btn-wd">Active</button>
                                       <?php  }else{?>
                                       <button class="btn btn-danger btn-fill btn-wd">Inactive</button><?php }
                                          ?>
                                    </td>
                                    <td>
                                       <?php
                                          $enrollment_status=$rows->enrollment;
                                          if($enrollment_status==0)
                                          {
                                          ?>
                                       <a href="<?php echo base_url(); ?>enrollment/add_enrollment/<?php echo $rows->admission_id; ?>" rel="tooltip" title="Allocate Class" class="btn btn-simple  btn-icon table-action view" href="javascript:void(0)">
                                          <i class="fa fa-address-book" aria-hidden="true" style="font-size:20px;"></i>
                                          <!--  <i class="fa fa-address-card-o" aria-hidden="true"></i> -->
                                       </a>
                                       <?php
                                          }
                                          else{
                                             ?>
                                       <a href="<?php echo base_url(); ?>enrollment/edit_enroll/<?php echo $rows->admission_id; ?>" rel="tooltip" title="Edit Class Allocation" class="btn btn-simple  btn-icon table-action view" href="javascript:void(0)">
                                       <i class="fa fa-address-card-o" aria-hidden="true" style="font-size:20px;"></i>
                                       </a>
                                       <?php
                                          }
                                          ?>
                                       <?php
                                          $parent_status=$rows->parents_status;
                                          if($parent_status==0)
                                          {
                                             ?>
                                       <a href="<?php echo base_url(); ?>parents/home/<?php echo $rows->admission_id; ?>" rel="tooltip" title="Add Parent Details" class="btn btn-simple  btn-icon table-action view" >
                                       <i class="fa fa-user-plus" aria-hidden="true" style="font-size:20px;"></i></a>
                                       <?php
                                          }
                                          else
                                          {
                                          ?>
                                       <!-- <a href="<?php echo base_url(); ?>parents/edit_parents/<?php echo $rows->admission_id; ?>" rel="tooltip" title="Already Added Parent Details" class="btn btn-simple btn-info btn-icon table-action view" >
                                       <i class="fa fa-id-card-o" aria-hidden="true"></i></a> -->

                                       <a href="<?php echo base_url(); ?>parents/view_parents_details/<?php echo $rows->admission_id; ?>" rel="tooltip" title="Edit Parent Details" class="btn btn-simple  btn-icon table-action view" >
                                       <i class="fa fa-id-card-o" aria-hidden="true" style="font-size:20px;"></i></a>
                                       <?php
                                          }
                                          ?>
                                       <a href="<?php echo base_url(); ?>admission/get_ad_id/<?php echo $rows->admission_id; ?>" rel="tooltip" title="Edit Admission" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit" style="font-size:20px;"></i></a>
                                    </td>
                                 </tr>
                                 <?php $i++;  } ?>
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
   $(document).ready(function() {
	   
		jQuery('#admissionmenu').addClass('collapse in');
	   $('#admission').addClass('active');
	   $('#admission2').addClass('active');
   
   	/* $('table').DataTable({
        "aLengthMenu": [[25, 50, 75, 100, -1], [25, 50, 75, 100, "All"]],
        "iDisplayLength": 25,
		"ordering": false,
		"bAutoWidth": false,
		"columns": [
					{ "width": "7%" },
					{ "width": "45%" },
					{ "width": "15%" },
					{ "width": "5%" },
					{ "width": "5%" },
					{ "width": "24%" }
				  ]
    }); */
	
	$('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                 {
                     extend: 'excelHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 },
                 {
                     extend: 'pdfHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 }
             ],
             "pagingType": "full_numbers",
			 "ordering": false,
             "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             responsive: true,
             language: {
				 search: "_INPUT_",
				 searchPlaceholder: "Search Students",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "18%" },
					{ "width": "9%" },
					{ "width": "25%" },
					{ "width": "9%" },
					{ "width": "6%" },
					{ "width": "10%" },
					{ "width": "11%" },
				  ]
         }); 
      });


</script>
