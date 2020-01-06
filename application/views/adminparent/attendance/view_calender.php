<style>
.fc-month-button{
	display: none;
}
.fc-event {
		background-color:red;
}
.fc-basicWeek-button{display: none;} 
.fc-basicDay-button{display: none;}
.red{    
	background-color: red;
    color: red;
    padding-left: 10px;
}
.Words{
	padding-left: 10px;
    font-size: 20px;
}
</style>

	<div class="main-panel">

        <div class="content">
            <div class="container-fluid">
							<div class="content">
								<div class="header">
										<legend>View Attendance</legend>
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
										<div class="row">
											<h5>Total Working days:
											<?php if(empty($total)){
												$total = 0;
												echo "Nil";
											} else{
												echo $total = count($total);
											}?> </h5>
										</div>
										
										<div class="row">
											<h5>Absent / Leave:
											<?php if(empty($ableavedays)){
												$leaves = 0;
												echo "Nil";
											} else{
												echo $leaves = count($ableavedays);
											}?> </h5>
										</div>
										
										<div class="row">
											<h5>Days present:
											<?php 
												echo $present = ($total - $leaves);
											?> </h5>
										</div>
										
										
										<div class="noote" style="display: inline-flex; padding-top:100px;">
										<div class="notice">
											<p class="red">1</p>
										</div>
										<div class="Words">Absent / Leave</div>
									</div>
										</div>

							</div>
					</div>
			</div>
		  		  </div>
    		</div>
				</div>

<script>
$(document).ready(function() {
	$('#attendence').addClass('collapse in');
	$('#attendence').addClass('active');
	$('#attendence').addClass('active');
 
	$('#fullCalendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		defaultDate: new Date(),
		editable: false,
		eventLimit: true, // allow "more" link when too many events
		events: 	<?php  echo json_encode($res); ?>,

		eventMouseover: function(calEvent, jsEvent) {
		var tooltip = '<div class="tooltipevent" style="width:auto;height:auto;background-color:#000;color:#fff;position:absolute;z-index:10001;padding:20px;">' + calEvent.description + '</div>';
		var $tooltip = $(tooltip).appendTo('body');

		$(this).mouseover(function(e) {
			$(this).css('z-index', 10000);
			$tooltip.fadeIn('500');
			$tooltip.fadeTo('10', 1.9);
			})
		.mousemove(function(e) {
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

</script>
