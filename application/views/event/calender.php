<style>
.fc-month-button{
	display: none;
	}
.fc-basicWeek-button{display: none;} .fc-basicDay-button{display: none;}
	</style>

	<div class="main-panel">

        <div class="content">
            <div class="container-fluid">
							<div class="content">
								<div class="header">
										<legend>Calendar </legend>
                           <?php if($this->session->flashdata('msg')): ?>
                             <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                           ×</button> <?php echo $this->session->flashdata('msg'); ?>
                   </div>
					<?php endif; ?>
								</div>
								<div class="container-fluid">
									<div class="row">
									<div class="col-md-8">
										<center>
											<div class="card card-calendar">
													<div class="content">
													  <div id="fullCalendar"></div>
													</div>
											</div>
										</center>
									</div>

											<div class="col-md-4">

										<div class="card">
                            <div class="header">Create Reminder</div>
                            <div class="content">
                                <form method="post" action="#" id="to_do_form">
                                    <div class="form-group">
                                        <label>Date <span class="mandatory_field">*</span></label>
                                        <input type="text" name="to_do_date"  class="form-control datepicker" placeholder="Date">
                                    </div>
                                    <div class="form-group">
                                        <label>Title <span class="mandatory_field">*</span></label>
                                        <input type="text" name="to_do_list" placeholder="Title" class="form-control" maxlength="30">
                                    </div>
								<div class="form-group">
                                        <label>Description <span class="mandatory_field">*</span></label>
                                        <textarea MaxLength="150" placeholder="Description - MaxCharacters 150" id="comments" name="to_do_notes" name="comments" class="form-control"></textarea>
                                    </div>

									 <div class="form-group">
                                        <label>Status <span class="mandatory_field">*</span></label>
                                       <select name="status"  class="selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
											  <option value="Active">Active</option>
											  <option value="Deactive">Inactive</option>
										</select>
                                    </div>
									<input type="submit" id="save" class="btn btn-info btn-fill center"  value="CREATE">
                                </form>
                            </div>
                        </div>
								</div> <!-- end card -->

							</div>
					</div>
			</div>
		  		  </div>
    		</div>
				</div>
				<script>

	$(document).ready(function() {
$('#eventmenu').addClass('collapse in');
$('#event').addClass('active');
$('#event1').addClass('active');
		$('#fullCalendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: new Date(),
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			// events:"<?php echo base_url() ?>event/getall_act_event",
			eventSources: [
	 {
		 url: '<?php echo base_url() ?>event/getall_act_event',
		 color: 'yellow',
		 textColor: 'black'
	 },
	 {
		 url: '<?php echo base_url() ?>leavemanage/get_all_special_leave',
		 color: '#9266d9',
		 textColor: 'white'
	 },
	 {
		url: '<?php echo base_url() ?>event/get_all_regularleave',
		color: 'blue',
		textColor: 'white'
	},
	  {
		url: '<?php echo base_url() ?>event/view_all_reminder',
		color: 'red',
		textColor: 'white'
	}
 ],
			eventMouseover: function(calEvent, jsEvent) {
    var tooltip = '<div class="tooltipevent" style="width:auto;height:auto;background-color:#000;color:#fff;position:absolute;z-index:10001;padding:20px;">' + calEvent.description + '</div>';
    var $tooltip = $(tooltip).appendTo('body');

    $(this).mouseover(function(e) {
        $(this).css('z-index', 10000);
        $tooltip.fadeIn('500');
        $tooltip.fadeTo('10', 1.9);
    }).mousemove(function(e) {
        $tooltip.css('top', e.pageY + 10);
        $tooltip.css('left', e.pageX + 20);
    });
},

eventMouseout: function(calEvent, jsEvent) {
    $(this).css('z-index', 8);
    $('.tooltipevent').remove();
},

		});

	});




	$('#to_do_form').validate({ // initialize the plugin
	    rules: {
			to_do_date:{required:true },
			to_do_list:{required:true },
			to_do_notes:{required:true },
	    },
	    messages: {
			to_do_date: "This field cannot be empty!",
			to_do_list:"This field cannot be empty!",
			to_do_notes:"This field cannot be empty!"

	        },
	      submitHandler: function(form) {
	        //alert("hi");
	        /* swal({
	                      title: "Are you sure?",
	                      text: "You Want Confirm this form",
	                      type: "success",
	                      showCancelButton: true,
	                      confirmButtonColor: '#DD6B55',
	                      confirmButtonText: 'Yes, I am sure!',
	                      cancelButtonText: "No, cancel it!",
	                      closeOnConfirm: false,
	                      closeOnCancel: false
	                  },
	                  function(isConfirm) {
	                      if (isConfirm) { */
	       $.ajax({
	           url: "<?php echo base_url(); ?>event/todolist",
	            type:'POST',
	           data: $('#to_do_form').serialize(),
	           success: function(response) {
	               if(response=="success"){
	                //  swal("Success!", "Thanks for Your Note!", "success");
	                  $('#to_do_form')[0].reset();
					  window.location = "<?php echo base_url(); ?>event/home";
					  
					  
	/*                   swal({
	           title: "Wow!",
	           text: "Message!",
	           type: "success"
	       }, *//*  function() {
						window.location = "<?php echo base_url(); ?>event/home";
				}); */
	              /*  }else{
	                 sweetAlert("Oops...", "Something went wrong!", "error");
	               } */
	           }
	       /* });
	     }else{
	         swal("Cancelled", "Process Cancel :)", "error");
			 */
	     }
	   }); 
	}
	});

		    </script>
