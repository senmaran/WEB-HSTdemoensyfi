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
                     <div class="content" id="content1">
                        <div class="fresh-datatables">
                           <h4 class="title" style="padding-bottom: 30px;">Handling Subjects
								<button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" >BACK</button>
                          </h4>
                          <table id="example" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                              <thead>
                                 <th>S.No</th>
                                 <th>Name</th>
                                 <th>Class</th>
                                 <th>Subject</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </thead>
                              <tbody>
                                <?php $i=1; foreach($res as $rows){ ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $rows->name; ?></td>
                                    <td><?php echo $rows->class_name;?>-<?php echo $rows->sec_name; ?></td>
                                    <td><?php echo $rows->subject_name; ?></td>

                                    <td><?php
                                       if($rows->status=='Active'){?>
                                       <button class="btn btn-success btn-fill btn-wd">Active</button>
                                       <?php  }else{?>
                                       <button class="btn btn-danger btn-fill btn-wd">Inactive</button><?php }
                                          ?>
                                    </td>
                                    <td >
                                       <a href="<?php echo base_url(); ?>teacher/edit_subject_teacher/<?php echo $rows->id; ?>" rel="tooltip" title="Edit" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
                                    </td>
                                 </tr>
                                 <?php $i++; }
                                    ?>

                              </tbody>
                           </table>
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

</div>
</div>
<script type="text/javascript">
$('#teachermenu').addClass('collapse in');
$('#teacher').addClass('active');
$('#teacher2').addClass('active');
function getListClass(){

var subject_id=$('#subject_id').val();
//alert(subject_id);
$.ajax({
url:'<?php echo base_url(); ?>classmanage/getListClass',
method:"POST",
data:{subject_id:subject_id},
dataType: "JSON",
cache: false,
success:function(data)
{
var stat=data.status;
$("#class_master_id").empty();
if(stat=="success"){
var res=data.res;
//alert(res.length);
var len=res.length;

for (i = 0; i < len; i++) {
$('<option>').val(res[i].class_sec_id).text(res[i].class_name + res[i].sec_name).appendTo('#class_master_id');
}

}else{
$("#class_master_id").empty();
}
}
});

}
$('#subject_handling_form').validate({ // initialize the plugin
  rules: {
      subject_id:{required:true },
      class_master_id:{required:true },
  },
  messages: {
        subject_id: "Select Subject",
        class_master_id:"Select Class"
      },
    submitHandler: function(form) {
      //alert("hi");
      swal({
                    title: "Are you sure?",
                    text: "You Want confirm  this form",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
     $.ajax({
         url: "<?php echo base_url(); ?>teacher/subject_handling",
          type:'POST',
         data: $('#subject_handling_form').serialize(),
         success: function(response) {
           //alert(response);
             if(response=="success"){
              //  swal("Success!", "Thanks for Your Note!", "success");
                $('#subject_handling_form')[0].reset();
                swal({
         title: "Wow!",
         text: "Message!",
         type: "success"
     }, function() {
         window.location = "<?php echo base_url(); ?>teacher/view";
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
				 searchPlaceholder: "Search Teachers",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "25%%" },
					{ "width": "20%%" },
					{ "width": "20%" },
					{ "width": "20%" },
					{ "width": "8%" }
				  ]
         }); 

</script>
