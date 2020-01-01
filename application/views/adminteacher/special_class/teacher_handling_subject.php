
<div class="main-panel">
   <div class="content">
      <div class="col-md-12">

         <div class="card">
            <div class="content">
               <div class="row">
                  <div class="col-md-12">
                     <div class="">
                        <div class="">
                             <h4 class="title">My Subjects </h4>
                             <hr>
                           <div class="fresh-datatables">
                              <table id="bootstrap-table" class="table">
                                 <thead>
                                    <th data-field="id">S.No</th>
                                    <th data-field="year"  data-sortable="true">Class tutor</th>
                                    <th data-field="status"  data-sortable="true">Specialized subject</th>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $i=1;
                                       foreach ($res as $rows) {
                                       ?>
                                    <tr >
                                       <td><?php echo $i; ?></td>
                                       <td><?php echo $rows->class_name.'&nbsp;'.$rows->sec_name; ?></td>
                                       <td><?php echo $rows->subject_name;  ?></td>
                                        </tr>
                                    <?php $i++; } ?>
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
   </div>
</div>
<script type="text/javascript">
   $('#bootstrap-table').DataTable();
         $('#classhandle').addClass('collapse in');
         $('#classhandling').addClass('active');
         $('#classhandle1').addClass('active');
</script>
