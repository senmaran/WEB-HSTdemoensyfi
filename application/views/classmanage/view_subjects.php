<style>
th{
  text-align: center;
}
td{
  text-align: center;
}
</style>
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

                              <div class="header">
								<legend>View Subject For Class
								<a rel="" href="#myModal" data-id="<?php echo $class_master_id; ?>" title="Add Subjects" class="open-AddBookDialog btn btn-simple   btn-info  edit"  data-toggle="modal" data-target="#myModal" style="margin-bottom:10px;margin-left:10px;cursor: pointer;">ADD SUBJECT</a>
								<button class="btn btn-info  center" onclick="generatefromtable()" style="margin-bottom:10px;cursor: pointer;">GENERATE PDF</button>
								<button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;cursor: pointer;">BACK</button></legend>
                              </div>


                                <div class="fresh-datatables" style="margin-top:10px;">

                          <table id="bootstrap-table" class="table">
                              <thead>

                                  <th data-field="id">S.No</th>
                                  <th data-field="year"  data-sortable="true"> Class</th>
                                  <th data-field="no"  data-sortable="true">Subject </th>
                                  <th data-field="status"  data-sortable="true">Status</th>
                                  <th data-field="Section" data-sortable="true">Action</th>


                              </thead>
                              <tbody>
                                <?php
                                $i=1;
                                foreach ($res as $rows) {

                                ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows->class_name;?>-<?php echo $rows->sec_name; ?></td>
                                    <td><?php echo $rows->subject_name; ?></td>
                                    <td>
                                        <?php if($rows->status=='Active'){ ?>
                                          <button class="btn btn-success btn-fill btn-wd">Active</button>
                                      <?php  }else{ ?>
                                        <button class="btn btn-danger btn-fill btn-wd">Inactive</button>
                                      <?php } ?>
									</td>
                                    <td>
                                      <a href="<?php echo base_url(); ?>classmanage/edit_subjects_class/<?php echo $rows->id; ?>" rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
									</td>
                                  </tr>
                                  <?php $i++;  }  ?>
                              </tbody>
                          </table>
						  
                          <div id="myModal" class="modal fade" role="dialog">
                             <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                   <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Add Subject To Class</h4>
                                   </div>
                                   <div class="modal-body">
                                      <form action="" method="post" class="form-horizontal" id="subject_handling_form">
                                         <fieldset>
                                            <div class="form-group">
                                               <label class="col-sm-4 control-label">Subject <span class="mandatory_field">*</span></label>
                                               <div class="col-sm-6">
                                                  <select  name="subject_id[]" id="subject_id"  multiple  data-title="Select Subject" class="selectpicker" data-style=" btn-block" data-menu-style="dropdown-blue">
                                                     <?php foreach ($resubject as $rows) {  ?>
                                                     <option value="<?php echo $rows->subject_id; ?>"><?php echo $rows->subject_name; ?></option>
                                                     <?php      } ?>
                                                  </select>
                                                  <input type="hidden" name="class_master_id" id="class_master_id" class="form-control" value="">
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-sm-4 control-label">Module <span class="mandatory_field">*</span></label>
                                               <div class="col-sm-6">
                                                  <select   name="exam_flag" id="exam_flag" class="form-control">
                                                    <option value="0">Core</option>
                                                    <option value="1">Elective</option>
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-sm-4 control-label">Status <span class="mandatory_field">*</span></label>
                                               <div class="col-sm-6">
                                                  <select   name="status" id="status" class="form-control">
                                                     <option value="Active">Active</option>
                                                     <option value="Deactive">Inactive</option>
                                                  </select>
                                               </div>
                                            </div>
                                            <div class="form-group">
                                               <label class="col-sm-4 control-label">&nbsp;</label>
                                               <div class="col-sm-6">
											   <input type="submit" id="save" class="btn btn-info btn-fill center" value="CREATE">
                                               
                                               </div>
                                            </div>
                                         </fieldset>
                                      </form>
                                   </div>
                                   </div>
                             </div>
                          </div>

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
$('#mastersmenu').addClass('collapse in');
$('#master').addClass('active');
$('#masters5').addClass('active');


$(document).on("click", ".open-AddBookDialog", function () {
     var eventId = $(this).data('id');
     $(".modal-body #class_master_id").val( eventId );
});

$('#subject_handling_form').validate({ // initialize the plugin
  rules: {
      "subject_id[]":{required:true },
      exam_flag:{required:true },
      status:{required:true},

  },
  messages: {
        subject_id: "Select Subject",
        exam_flag:"Select Class",
        status:"Select Status"

      },
    submitHandler: function(form) {
      //alert("hi");
      swal({
                    title: "Are you sure?",
                    text: "You Want confirm this form",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes!',
                    cancelButtonText: "No!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
     $.ajax({
         url: "<?php echo base_url(); ?>classmanage/subject_to_class",
          type:'POST',
         data: $('#subject_handling_form').serialize(),
         success: function(response) {
           //alert(response);
             if(response=="success"){
              //  swal("Success!", "Thanks for Your Note!", "success");
                $('#subject_handling_form')[0].reset();
                swal({
         title: "Wow!",
         text: "Subject added to class!",
         type: "success"
     }, function() {
        location.reload();
     });
             }else{
               sweetAlert("Oops...",response, "error");
             }
         }
     });
   }else{
       swal("Cancelled", "Process Cancel :)", "error");
   }
 });
}
});
function generatefromtable() {
				var data = [], fontSize = 12, height = 0, doc;
				doc = new jsPDF('p', 'pt', 'a4', true);
				doc.setFont("times", "normal");
				doc.setFontSize(fontSize);
				doc.text(60,20, "Subjects");
				data = [];
				data = doc.tableToJson('bootstrap-table');
				height = doc.drawTable(data, {
					xstart : 30,
					ystart : 10,
					tablestart : 40,
					marginleft : 10,
					xOffset : 10,
					yOffset : 15
				});
				//doc.text(50, height + 20, 'hi world');
				doc.save("pdf.pdf");
			}


$('#bootstrap-table').DataTable();
</script>
