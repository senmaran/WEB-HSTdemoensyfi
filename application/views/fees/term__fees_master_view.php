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
                                  <h4 class="title">Fees Status</h4>
                                  <table id="example" class="table table-fixed">
                              <thead>
                                 <th data-field="id" >S.No</th>
                                <th data-field="year"  data-sortable="true">Year</th>
                                <th data-field="term"  data-sortable="true">Term</th>
                                <th data-field="class"  data-sortable="true">Class</th>
                                <th data-field="quota"  data-sortable="true">Quota</th>
								<th data-field="fees"  data-sortable="true">Fees</th>
                                <th data-field="date_from"  data-sortable="true">Issue Date</th>
                                <th data-field="date_to"  data-sortable="true">Due Date</th>
                                <!-- <th data-field="notes"  data-sortable="true">Notes</th> -->
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
                                    <td ><?php echo $i; ?></td>
                                    <td ><?php echo date('Y', strtotime($rows->from_month));  echo "-"; echo date('Y', strtotime( $rows->to_month));  ?></td>
                                    <td ><?php echo $rows->term_name; ?></td>
                                    <td ><?php echo $rows->class_name; ?> - <?php echo $rows->	sec_name; ?></td>
                  									<td ><?php echo $rows->quota_name;?></td>
                  									<td ><?php echo $rows->fees_amount;?></td>
                  									<td ><?php $date=date_create($rows->due_date_from);
                                                         echo date_format($date,"d-m-Y");?></td>
                  									<td ><?php $date=date_create($rows->due_date_to);
                                                         echo date_format($date,"d-m-Y");?></td>
                  									<!-- <td ><?php //echo $rows->notes;?></td>-->
                  									 <td><?php
                  									  if($stu=='Active'){?>
                  									   <button class="btn btn-success btn-fill btn-wd">Active</button>
                  									 <?php  }else{?>
                  									  <button class="btn btn-danger btn-fill btn-wd">De-Active</button>
                  									  <?php } ?></td>

                                    <td >
                                        <a href="<?php echo base_url(); ?>feesstructure/view_term_fees/<?php echo $rows->id; ?>" rel="tooltip" title="Student Fees Status" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
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
        },
        'colvis'
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    responsive: true,
    language: {
    search: "_INPUT_",
    searchPlaceholder: "Search records",
  },
  "fixedHeader" : {
                  header : true,
                  footer : true
              }
});



</script>
