<div class="main-panel">
<div class="content">
       <div class="container-fluid">


           <div class="row">
             <div class="col-md-12">
                 <div class="card">

                           <div class="header">
                             Send Message
                              <a href="<?php echo base_url(); ?>grouping/message_history" class="btn btn pull-right">Message History</a>
							  <hr>
                           </div>

					 
					<div class="content">
                     <div class="fresh-datatables">
                     <table id="bootstrap-table" class="table">
                         <thead>

                           <th data-field="id" class="text-left">S.No</th>
                           <th data-field="name" class="text-left" data-sortable="true">Group Name</th>
                           <th data-field="Section" class="text-left" data-sortable="true">Admin</th>
                           <th data-field="status" class="text-left" data-sortable="true">Status</th>
                           <th data-field="actions" class="td-actions text-left" data-events="operateEvents">Actions</th>
                         </thead>
                         <tbody>
                           <?php $i=1; foreach ($list_of_grouping as $rowsclass) { $sta=$rowsclass->status; ?>
                             <tr>
                                <td><?php echo $i;  ?></td>
                               <td><?php echo $rowsclass->group_title;  ?></td>
                               <td><?php echo $rowsclass->name;  ?></td>
                                <td>
                                    <?php
                                    if($sta=='Active'){?>
                                    <button class="btn btn-success btn-fill btn-wd">Active</button>
                                    <?php  }else{?>
                                    <button class="btn btn-danger btn-fill btn-wd">Inactive</button>
                                    <?php } ?>
                                  </td>
                               <td>
                                    <a href="#myModal" data-toggle="modal" data-target="#myModal"  data-id="<?php echo $rowsclass->id; ?>" rel="tooltip" title="Send Message"  class="open-AddBookDialog btn btn-simple btn-warning btn-icon edit" style="font-size:18px;"><i class="fa fa-paper-plane"> </i></a>
                               </td>
                             </tr>
                             <?php $i++;  }  ?>
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
                                 <h4 class="modal-title">Send Message</h4>
                              </div>
                              <div class="modal-body">
                                 <form action="" method="post" class="form-horizontal" id="send_msg">
                                    <fieldset>
                                       <div class="form-group">
                                          <label class="col-sm-4 control-label">Message type <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-6">

                                            <select multiple name="circular_type[]" id="circular_type" data-title="Select message type" class="selectpicker form-control">
                                              <option value="SMS">SMS</option>
                                              <option value="Mail">Mail</option>
                                              <option value="Notification">Push Notification</option>
                                          </select>
                                             <input type="hidden" name="group_id" id="group_id" class="form-control" value="">
                                          </div>
                                       </div>

                                        <input type="hidden" name="group_id" id="group_id" class="form-control" value="">
                                       <div class="form-group">
                                          <label class="col-sm-4 control-label">Notes <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-6">

                                            <textarea name="notes" MaxLength="160" placeholder="Maximum 160 characters" id="notes" class="form-control"  rows="4" cols="80"></textarea>

                                          </div>
                                       </div>

                                       <div class="form-group">
                                          <label class="col-sm-4 control-label">&nbsp;</label>
                                          <div class="col-sm-6">
											<input type="submit" id="save" class="btn btn-info btn-fill center" value="SEND">
                                  
                                          </div>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                             
                           </div>
                        </div>
                     </div>

                       </div><!--  end card  -->
             </div> <!-- end col-md-12 -->
    <div id="loading">
       <center><img src="<?php echo base_url(); ?>assets/loader.gif" id="loading" style="position: absolute;    top: 50%;    left: 80%;"></center>
    </div>
           </div>

       </div>
   </div>


</div>

<script type="text/javascript">
jQuery('#groupingmenu').addClass('collapse in');
$('#grouping').addClass('active');
$('#group2').addClass('active');
  $("#loading").hide();
    // $("#loading").show();
$('#send_msg').validate({ // initialize the plugin
  rules: {
      "circular_type[]":{required:true },
      notes:{required:true },

  },
  messages: {
        "circular_type[]": "Please choose an option!",
        notes:"This field cannot be empty!"


      },

submitHandler: function(form) {



 //alert("hi");
 swal({
              title: "Are you sure?",
              text: "You Want Confirm this form",
              type: "success",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Yes',
              cancelButtonText: "No",
              closeOnConfirm: false,
              closeOnCancel: false,

  },
          function(isConfirm) {
              if (isConfirm) {
              $("#loading").show();

$.ajax({
    url: "<?php echo base_url(); ?>grouping/send_msg",
     type:'post',
    data: $('#send_msg').serialize(),
    success: function(response) {
      //alert(response);
      $("#loading").show();
        if(response=="success"){
            $("#loading").hide();
         //  swal("Success!", "Thanks for Your Note!", "success");
          $('#send_msg')[0].reset();
          swal({
    title: "Wow!",
    text: "Message sent",
    type: "success"
}, function() {
     location.reload();
});
        }else{
          sweetAlert("Oops...",response , "error");
        }
    }
});
}else{
    $("#loading").hide();
  swal("Cancelled", "Process Cancel :)", "error");
}
});


}

});



		$('#bootstrap-table').DataTable();
      $(document).on("click", ".open-AddBookDialog", function () {
           var eventId = $(this).data('id');
           $(".modal-body #group_id").val( eventId );
      });

</script>
