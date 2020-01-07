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
						<div class="header">
                           <h4 class="title">Student Fees Status
							<a href="<?php echo base_url(); ?>feesstructure/view_fees_master" class="btn btn-wd btn-default pull-right">BACK</a>
							<hr>
						 </h4>
						 </div>
                            <div class="content">

                                <div class="fresh-datatables">
                                 
								<table id="example" class="table">
                              <thead>
                                <th data-field="id" >S.No</th>
								<th data-field="Student"  data-sortable="true">Student</th>
                                <th data-field="year"  data-sortable="true">Year</th>
                                <th data-field="term"  data-sortable="true">Term</th>
                                <th data-field="class"  data-sortable="true">Class</th>
                                <th data-field="quota"  data-sortable="true">Quota</th>
								<th data-field="fees"  data-sortable="true">Fees</th>
                                <th data-field="status"  data-sortable="true">Status</th>
								<th data-field="Section"  data-sortable="true">Actions</th>
                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                foreach ($view as $rows) {
									 $stu=$rows->status;

                                ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
									<td ><?php echo $rows->name;?></td>
                                    <td><?php echo date('Y', strtotime($rows->from_month));  echo "-"; echo date('Y', strtotime( $rows->to_month));  ?></td>
                                    <td><?php echo $rows->term_name; ?></td>
                                    <td><?php echo $rows->class_name; ?> - <?php echo $rows->	sec_name; ?></td>
                  									<td><?php echo $rows->quota_name;?></td>
                  									<td><?php echo $rows->fees_amt;?></td>

                  									 <td><?php
                  									  if($stu=='Unpaid'){?>
                  									  <button class="btn btn-danger btn-fill btn-wd">Unpaid</button>
                  									 <?php  }else{?>
                  									   <button class="btn btn-success btn-fill btn-wd">Paid</button>

                  									  <?php } ?></td>

                                    <td>
                                        <a href="<?php echo base_url(); ?>feesstructure/edit_term_fees_status/<?php echo $rows->id; ?>" rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
                                    </td>
                                  </tr>
                                  <?php $i++;  }  ?>
                              </tbody>
                          </table>

                        </div>
                            </div><!-- end content-->
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div> <!-- end row -->

            </div>
        </div>

   </div>


</div>

<script type="text/javascript">

	   $('#feesmenu').addClass('collapse in');
        $('#payment').addClass('active');
        $('#fees1').addClass('active');
         //jQuery('#teachermenu').addClass('collapse in');
		 
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
				 searchPlaceholder: "Search",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "20%" },
					{ "width": "7%" },
					{ "width": "9%" },
					{ "width": "9%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "8%" }
				  ]
         }); 

</script>
