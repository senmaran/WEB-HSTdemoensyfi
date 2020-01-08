<style>
   .txt{
   font-weight: 200;
   }
</style>
<?php
 foreach ($res as $rows) {}
 $smonth =  date("F", strtotime('00-'.$month.'-01'));
?>
								 
<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="col-md-12">
            <div class="">
               <div class="card">
                  <div class="content">
				  
                     <h4 class="title"> 
					 <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right">BACK</button>
					 <?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?> Attendance In <?php echo $smonth;?> </h4>
                        
						<hr>
                     <div class="fresh-datatables">
						<p>Total Working Days <?php if($res_total['status']=="success"){echo $wrk= $res_total['result']; }else{echo "No data"; $wrk = '0'; } ?></p>
                        <table id="example" class="table">
                           <thead>
                              <th data-field="id">S.No</th>
                              <th data-field="date">Name</th>
                              <th data-field="month">Month</th>
                              <th data-field="year">Leaves</th>
                              <th data-field="pp">Days Present </th>
                              <th data-field="check">Actions</th>
                           </thead>

                           <tbody>
                              <?php
                                 $i=1;
                                 foreach ($res as $rows) {
                              ?>
                              <tr>
                                 <td><?php echo $i;  ?></td>
                                 <td><?php echo $rows->name; ?></td>
                                  <td><?php  echo date("F", strtotime('00-'.$month.'-01')); ?></td>
                                 <td><?php echo $ab=$rows->leaves; ?></td>
                                 <td><?php echo $pp=$wrk-$ab; ?></td>
                                  <td>
                                    <input type="hidden" name="month_id" id="month_id" value="<?php echo $month;  ?>">
                                    <input type="hidden" name="year_id" id="year_id" value="<?php echo $year;  ?>">

                                    <button class="btn" onclick="list_dates(<?php echo $rows->enroll_id;   ?>)" value="">Leave Details</button> </td>
                              </tr>
                              <?php $i++;  }  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- end content-->
               </div>
               <!--  end card  -->
               </tbody>
               </table>
            </div>
         </div>
                 <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Leave Details </h4>
              </div>
              <div class="modal-body">
              <table id="bootstrap-table" class="table">
                 <thead>
                <tr>
                  <th>Date</th><th>Status</th>
                </tr>
              </thead>
              <tbody id="leavesdates12">

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
<script type="text/javascript">
function list_dates(student_id){
  //alert("hi");
  var month_id=$("#month_id").val();
  var year_id=$("#year_id").val();
  var student_id=student_id;
//  alert(student_id);
  $.ajax({
    type: 'POST',
    url: '<?php  echo base_url(); ?>adminattendance/view_dates_id',
    data: {month_id: month_id, year_id: year_id,student_id:student_id},
    dataType: "JSON",
    cache: false,
    success: function(response) {
//alert(response)
     $("#leavesdates12").empty();
      $('#myModal').modal('show');
       var res=response.res;
       var stat=response.status;
       var len=res.length;

        if(stat=="success"){
          for (i = 0; i < len; i++) {
          var markup = "<tr><td>" + res[i].abs_date + "</td><td>" + res[i].a_status + "</td></tr>";
          $("#leavesdates12").append(markup);
          }
        }else if(stat=="nodata"){
          $("#leavesdates12").empty();
          var markup = "<tr><td>No Record</td><td>No Record</td></tr>";
          $("#leavesdates12").append(markup);
        }
        else{
          var markup = "no data";
          $("#leavesdates12").append(markup);
        }
    }
});
}

         $('#attend').addClass('collapse in');
         $('#attendance').addClass('active');
         $('#attend2').addClass('active');
		 
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
					{ "width": "50%" },
					{ "width": "15%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "8%" }
				  ]
         }); 
</script>
