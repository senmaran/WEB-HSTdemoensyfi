
<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="content">
                     <div class="header"> Message History<a href="<?php echo base_url(); ?>teacherprofile/grouping" class="btn btn pull-right">BACK</a></div>
					 <hr>
                  
                  <table id="bootstrap-table" class="table">
                     <thead>
                        <th data-field="id">S.No</th>
                        <th data-field="name" data-sortable="true">Group Name</th>
                        <th data-field="Section" data-sortable="true">Type</th>
                        <th data-field="actions" class="td-actions text-left" data-events="operateEvents">Notes</th>
                     </thead>
                     <tbody>
                        <?php $i=1; foreach ($list_of_message as $rowsclass) {  ?>
                        <tr>
                           <td><?php echo $i;  ?></td>
                           <td><?php echo $rowsclass->group_title;  ?>
                             <small><?php echo "<br>"; echo $new_date = date('d-m-Y H:i:s', strtotime($rowsclass->created_at));  ?></small></td>
                           <td><?php echo $rowsclass->notification_type;  ?></td>
                           <td><?php echo $rowsclass->notes;  ?>
                           </td>
                        </tr>
                        <?php $i++;  }  ?>
                     </tbody>
                  </table>
				  </div>
               </div>
               <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $('#grouping').addClass('active');

    $('#bootstrap-table').DataTable({	});

</script>
