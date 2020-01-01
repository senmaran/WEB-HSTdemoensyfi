<div class="main-panel">
<div class="content">
       <div class="container-fluid">

         <div class="card">


             <div class="content">
			   <h4 class="title">Attendance for <?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?> <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:0px;">BACK</button></h4>
                            <hr>
							
              

                 <div class="fresh-datatables">


           <table id="bootstrap-table" class="table">
               <thead>

                   <th data-field="id" class="">S.No</th>
                      <th data-field="date" class="" data-sortable="true">Date</th>
                     <th data-field="year" class="" data-sortable="true">Strength </th>
                       <th data-field="no" class="" data-sortable="true">Present Students</th>
                 <th data-field="name" class="" data-sortable="true">Absent Students</th>

              <th data-field="taken" class="" data-sortable="true">Attendance By</th>
                 <th data-field="Section" class="" data-sortable="true">Actions</th>


               </thead>
               <tbody>
                 <?php
                 $i=1;
                 foreach ($result as $rows) {

                 ?>
                   <tr>
                     <td><?php echo $i; ?></td>
                     <td><?php  $dateTime = new DateTime($rows->created_at); echo   $cur_d=$dateTime->format("d-m-Y :A");  ?></td>
                     <td><?php echo $rows->class_total; ?></td>
                     <td><?php echo $rows->no_of_present; ?></td>

                     <td><?php echo $rows->no_of_absent; ?></td>
                      <td><?php echo $rows->name; ?></td>



                     <td>

                       <a href="<?php echo base_url(); ?>teacherattendence/view_all/<?php echo $rows->at_id; ?>/<?php echo $rows->class_id; ?>" rel="tooltip" title="View Students" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-list-ol" aria-hidden="true"></i></a>

                         </td>
                   </tr>
                   <?php $i++;  }  ?>
               </tbody>
           </table>

         </div>
             </div><!-- end content-->
         </div><!--  end card  -->



          </div>
       </div>
   </div>
</div>


<script type="text/javascript">
$('#attendmenu').addClass('collapse in');
$('#atten').addClass('active');
$('#atten2').addClass('active');
 $('#bootstrap-table').DataTable();
</script>
