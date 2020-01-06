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
                     <legend>On Duty Status</legend>
                  </div>
                  <div class="content">
                           <div class="fresh-datatables">
                        <table id="bootstrap-table" class="table">
                           <thead>
							<th>S.no</th>
							<th>Reason</th>
							<th>From</th>
							<th>To</th>
							<th>Status</th>
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
					 <?php }elseif($stu=='Denied'){?>
					 <button class="btn btn-danger btn-fill btn-wd">Denied</button>
					 <?php }else{ ?>
					 <button class="btn btn-success btn-fill btn-wd">Approved</button>
					 <?php }?>
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
     $('#ondutydetails').addClass('collapse in');
     $('#ondutydetails').addClass('active');
     $('#onduty2').addClass('active');
   
     $('#bootstrap-table').DataTable();
   });
</script>
