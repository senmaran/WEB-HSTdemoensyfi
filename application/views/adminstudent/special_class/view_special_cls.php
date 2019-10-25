

<div class="main-panel">

      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="content">
                       <h4 class="title">Special Classes</h4><hr>
                        <div class="fresh-datatables">
                           <table id="bootstrap-table" class="table">
                              <thead>
                                 <th>S.no</th>
                                 <th>Class</th>
                                 <th>Teacher</th>
                                 <th>Subject</th>
								 <th>Topic</th>
                                 <th>Date</th>
                                 <th>Starting Time</th>
								  <th>Ending Time</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;
										foreach ($view as $rows) { 
										$stu=$rows->status;
                                     ?>
                                 <tr>
                                    <td><?php  echo $i; ?></td>
                                    <td><?php  echo $rows->class_name; ?> - <?php  echo $rows->sec_name; ?> </td>
                                    <td><?php  echo $rows->name; ?></td>
                                    <td><?php  echo $rows->subject_name	; ?></td>
									<td><?php  echo $rows->subject_topic	; ?></td>
                                    <td><?php $dateTime=new DateTime($rows->special_class_date); $tdate=date_format($dateTime,'d-m-Y' ); echo $tdate; ?></td>
									<td><?php  echo $rows->start_time; ?></td>
									<td><?php  echo $rows->end_time; ?></td>
                                 </tr>
                                 <?php $i++;  }  ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- end content-->
                  </div>
                  <!--  end card  -->
               </div>
               <!-- end col-md-12 -->
            </div>
            <!-- end row -->
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
 $('#bootstrap-table').DataTable();


 function checksubject(cid) {
  //alert(cid);//exit;
$.ajax({
	type: 'post',
	url: '<?php echo base_url(); ?>specialclass/checker',
	data: {
		classid:cid
	},
	dataType: "JSON",
	//cache: false,
	success: function(test1) {
		//var test=test1.status;
		//alert(test);
		 if (test1.status=='Success') {
			   var sub = test1.subject_name;
			   //alert(sub.length);
			   var sub_id=test1.subject_id;
			   var len=sub.length;
			   //alert(len);
			   var i;
			   var name='';
			   for (i = 0; i < len; i++) {
				//$("#child_selection").append("<option value=""+array_list[i].value+"">"+array_list[i].display+"</option>");
				   name +='<option value="'+sub_id[i]+'">'+sub[i]+'</option>';
				  $("#ajaxres").html(name);
			   }
		   } else {
			    //$('#msg').html('<span style="color:red;text-align:center;">Subject Not Found</p>');
				$("#ajaxres").html('');
				alert("Error");
		   }
	}
});
}
</script>
<script type="text/javascript">
   $().ready(function(){

     $('.datepicker').datetimepicker({
       format: 'DD-MM-YYYY',
       icons: {
           time: "fa fa-clock-o",
           date: "fa fa-calendar",
           up: "fa fa-chevron-up",
           down: "fa fa-chevron-down",
           previous: 'fa fa-chevron-left',
           next: 'fa fa-chevron-right',
           today: 'fa fa-screenshot',
           clear: 'fa fa-trash',
           close: 'fa fa-remove'
       }
    });
   });
</script>
