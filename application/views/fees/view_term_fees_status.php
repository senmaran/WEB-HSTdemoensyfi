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

                                <div class="fresh-datatables">
                                  <h4 class="title">Fees Status</h4> <br>
                          <table id="bootstrap-table" class="table">
                              <thead>
                                 <th data-field="id" >S.No</th>
								  <th data-field="notes"  data-sortable="true">Student Name</th>
                                <th data-field="year"  data-sortable="true">Year</th>
                                <th data-field="term"  data-sortable="true">Term Name</th>
                                <th data-field="class"  data-sortable="true">Class</th>
                                <th data-field="quota"  data-sortable="true">Quota</th>
								<th data-field="fees"  data-sortable="true">Fees Amount</th>
                                <th data-field="status"  data-sortable="true">Status</th>
								<th data-field="Section"  data-sortable="true">Action</th>
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
                  									  <button class="btn btn-danger btn-fill btn-wd">UnPaid</button>
                  									 <?php  }else{?>
                  									   <button class="btn btn-success btn-fill btn-wd">Paid</button>

                  									  <?php } ?></td>

                                    <td>
                                        <a href="<?php echo base_url(); ?>feesstructure/edit_term_fees_status/<?php echo $rows->id; ?>" rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
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

 $('#bootstrap-table').DataTable();
		   $('#feesmenu').addClass('collapse in');
        $('#payment').addClass('active');
        $('#fees1').addClass('active');
         //jQuery('#teachermenu').addClass('collapse in');

</script>
