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

                              <h4 class="title">List of Coordinator  <button style="float: right;" onclick="history.go(-1);" class="btn btn-wd btn-default">Go Back</button></h4> <br>


                                <div class="fresh-datatables">


                          <table id="bootstrap-table" class="table">
                              <thead>

                                  <th data-field="id">ID</th>
                                  <th data-field="year" data-sortable="true">Event Name</th>
                                  <th data-field="no" data-sortable="true">Sub Event Name</th>
                                  <th data-field="name" data-sortable="true">Coordinator Name</th>
                                  <th data-field="status" data-sortable="true">Status</th>
                                  <th data-field="Section" data-sortable="true">Action</th>


                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                foreach ($res as $rows) {
									$co_id=$rows->co_id;
									$a=$rows->event_id;
									$b=$rows->co_name_id;
									$query="SELECT c.*,e.event_name,e.event_id,t.teacher_id,t.name FROM edu_event_coordinator as c, edu_events as e, edu_teachers as t  WHERE e.event_id='$a' AND t.teacher_id='$b'";
									 $result=$this->db->query($query);
                                      $res=$result->result();
									  foreach($res as $row)
									  {}
                                ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->event_name; ?></td>
                                    <td><?php echo $rows->sub_event_name; ?></td>
									<td><?php echo $row->name; ?></td>
									<td>
									<?php if($rows->status=='Active') {?>
									<button class="btn btn-success btn-fill btn-wd">Active</button>
									<?php }else{?>
									<button class="btn btn-danger btn-fill btn-wd">Deactive</button>
									<?php } //echo $rows->status; ?>
									</td>
                                    <td>
                                      <a href="<?php echo base_url(); ?>event/sub_event_edit/<?php echo $rows->co_id; ?>" rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon edit"><i class="fa fa-edit"></i></a>
                                    </td>
                                  </tr>
                                  <?php $i++;  } ?>
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
$('#eventmenu').addClass('collapse in');
$('#event').addClass('active');
$('#event2').addClass('active');
  $('#bootstrap-table').DataTable();
</script>
