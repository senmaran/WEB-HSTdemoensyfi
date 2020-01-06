<div class="main-panel">
<div class="content">

 <?php  foreach($res as $rows) {} ?>
<div class="card">
<div>
	<blockquote style="border:0px;">
		<h4 class="title"><?php echo $rows->event_name; ?></h4>
		<p><?php echo $rows->event_details; ?></p>
		<p> Date : <?php echo $new_date = date('d-m-Y', strtotime($rows->event_date)); ?></p>
	</blockquote>
</div>
</div>

<div class="content">
<div class="card">
<div class="row" style="padding:20px;">
  <?php $sub=$rows->sub_event_name; if(empty($sub)){

  } else{  foreach($res as $rows){
    $event_date = new DateTime($rows->event_date);
    $e_date = $event_date->format('d');
    $e_mon = $event_date->format('M');
    $e_year = $event_date->format('Y');
     ?>
              <div class="col-md-3">
                <div class="event_box">
                  <div class="event_date"><?php echo $e_date; ?> <?php echo $e_mon; ?> <?php echo $e_year; ?></div>
                  <div class="event_name"><?php echo $rows->sub_event_name;  ?></div>
                  <div class="event_co_name"><?php echo $rows->name;  ?>(<i class="fa fa-user" aria-hidden="true"></i>)</div>
                </div>
              </div>
<?php  } } ?>

</div>
</div>
</div>
</div>
</div>

<script>
$(document).ready(function() {
$('#events').addClass('collapse in');
$('#events').addClass('active');
$('#events').addClass('active');
})
</script>
