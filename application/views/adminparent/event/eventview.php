<div class="main-panel">
<div class="content">

	<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	   <div class="card">
			<div class="header">
			   <h4 class="title" style="padding-bottom:10px;">Events</h4>
			</div>
<hr>
	
		<div class="row" style="padding:15px;">
		  <?php if(empty($res)){  ?>
			<p>No Event </p>
		<?php  }else{
			foreach($res as $rows){
			  $event_date = new DateTime($rows->event_date);
			  $e_date = $event_date->format('d');
			  $e_mon = $event_date->format('M');
			  $e_year = $event_date->format('Y');
			  ?>
				<div class="col-md-3">
				  <a href="<?php echo base_url(); ?>adminparent/view_event/<?php echo $rows->event_id; ?>">
				  <div class="event_box">
					<div class="event_date"><?php echo $e_date; ?> <?php echo $e_mon; ?> <?php echo $e_year; ?></div>
					<div class="event_name"><?php echo $rows->event_name;  ?></div>
				  </div>
				</a>
				</div>
		<?php  } 
			}   ?>
			 </div>
			
		</div>
	</div>
	</div>
	</div>

</div>
</div>
<script>
	$('#events').addClass('collapse in');
	$('#events').addClass('active');
	$('#events').addClass('active');
</script>
