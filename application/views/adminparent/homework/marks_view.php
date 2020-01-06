
<div class="main-panel">
<div class="content">
<div class="col-md-12">

                  <!-- end card -->
						
						
						 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">View Marks <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right">BACK</button></h4>
                            </div>
							<hr>
							 <div class="content">
                            <div class="fresh-datatables">
								<table id="bootstrap-table" class="table">
                                    <thead>
                                        <th style="font-weight:bold;font-size:14px;">S.No</th>
										<th style="font-weight:bold;font-size:14px;">Name</th>
                                    	<th style="font-weight:bold;font-size:14px;">Mark</th>
                                    	<th style="font-weight:bold;font-size:14px;">Comments</th>
                                    </thead>
                                    <tbody>
									<?php
									if(empty($res)){
									echo "No Marks Added";}else{
									$i=1;
									foreach ($res as $rows)
									{
										//$sub=$res->subject_name;
										$enr_id=$rows->enroll_mas_id;
										$sql="SELECT enroll_id,name FROM edu_enrollment WHERE enroll_id='$enr_id'";
									    $result=$this->db->query($sql);
										$res=$result->result();
										$sname=$res[0]->name;
									?>
                                        <tr>
                                        	<td style="width:5%;"><?php echo $i; ?></td>
										   <td style="width:30%;"><?php echo $sname; ?></td>
                                        	<td style="width:15%;"> <?php echo $rows->marks; ?></td>
                                        	<td style="width:50%;"><?php echo $rows->remarks; ?></td>
                                        </tr>
									<?php $i++;  } }?>

                                    </tbody>

                                </table>

                            </div>
							</div>
                        </div>
                    </div><!-- end col-md-12 -->
                </div>

                    </div>
</div>
</div>
<script type="text/javascript">

$(document).ready(function () {

   $('#homework').addClass('collapse in');
   $('#homework').addClass('active');
   $('#homework').addClass('active');
});
$('#bootstrap-table').DataTable({	});
</script>

