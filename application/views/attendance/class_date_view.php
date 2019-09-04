<style>
   .txt{
   font-weight: 200;
   }
</style>
<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="col-md-12">
            <div class="">
               <div class="card">
                  <div class="content">

                     <h4 class="title"> List of Record </h4>
                        <p>  <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right">Go Back</button>  </p>
                     <div class="fresh-datatables">
                        <table id="bootstrap-table" class="table">
                           <thead>
                              <th data-field="id" class="text-center"  data-sortable="true">S.No</th>
                              <th data-field="date" class="text-center" data-sortable="true">Class name</th>
                              <th data-field="month" class="text-center" data-sortable="true">Class total</th>
                              <th data-field="year" class="text-center" data-sortable="true">No of present</th>
                              <th data-field="pp" class="text-center" data-sortable="true">No of absent </th>
							  <th data-field="status" class="text-center" data-sortable="true">Status</th>
                           </thead>
                           <tbody>
						   <p>Total Students : <?php echo $files['total_class']; ?> | Total Present : <?php echo $files['total_present']; ?> | Total Absent : <?php echo $files['total_absent']; ?></p>
						   <hr>
                              <?php
							  if (count($files)>0) {
                              $i=1;
                                 foreach ($files['data'] as $rows) {
									 $class_id = $rows->class_id;
                              ?>
                              <tr>
								
                                 <td class="text-center"><?php echo $i;  ?></td>
                                 <td class="text-center" ><?php echo $rows->class_name; ?></td>
								 <?php if ($class_id=="") { ?><td colspan="4" class="text-right" style="color:#cc0000;">Attendance not taken</td> <?php } else { ?>
                                 <td class="text-center"><?php echo $rows->class_total; ?></td>
                                 <td class="text-center"><?php echo $rows->no_of_present; ?></td>
								<td class="text-center"><?php echo $rows->no_of_absent; ?></td>
								<td class="text-center"><?php echo $rows->no_of_absent; ?></td>
								 <?php } ?>
								<!--<td>
								<a href="<?php //echo base_url(); ?>adminattendance/view_all/<?php //echo $rows->at_id; ?>/<?php //echo $rows->class_id; ?>" rel="tooltip" title="View Attendance " class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
								</td>-->
                              </tr>
                              <?php $i++;  }  
							  }
							?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- end content-->
               </div>
               <!--  end card  -->
               </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<script type="text/javascript">
	$('#bootstrap-table').DataTable();

	$('#attend').addClass('collapse in');
	$('#attendance').addClass('active');
	$('#attend3').addClass('active');
</script>
