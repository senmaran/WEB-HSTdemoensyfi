
<style>

</style>
<div class="main-panel">
<div class="content">

  <div class="">
    <h4 class="title">Events    (<i class="fa fa-user" aria-hidden="true"></i>) You have Been Allocated as Co-Ordinator </h4><span></span> <br><br>
  <div class="row">
    <?php
    foreach($res as $rows_event){
    $event_date = new DateTime($rows_event->event_date);
    $e_date = $event_date->format('d');
    $e_mon = $event_date->format('M');
    $e_year = $event_date->format('Y');
    // $ev_user_id=$rows->user_id;
    ?>
          <div class="col-md-2">
            <a href="<?php echo base_url(); ?>teacherevent/view_event/<?php echo $rows_event->event_id; ?>">
            <div class="event_box">
              <div class="event_date"><?php echo $e_date; ?> <?php echo $e_mon; ?> <?php echo $e_year; ?></div>
              <div class="event_name"><?php echo $rows_event->event_name;  ?></div>
            </div>
          </a>
          </div>
          <?php  } ?>
    </div>
  </div>

<div class="">
  <h4 class="title">List of all Event  </h4>
<div class="row">
  <?php
  foreach($event_all as $rows){
  $event_date = new DateTime($rows->event_date);
  $e_date = $event_date->format('d');
  $e_mon = $event_date->format('M');
  $e_year = $event_date->format('Y');
  // $ev_user_id=$rows->user_id;
  ?>
        <div class="col-md-2">
          <a href="<?php echo base_url(); ?>teacherevent/view_event/<?php echo $rows->event_id; ?>">
          <div class="event_box">
            <div class="event_date"><?php echo $e_date; ?> <?php echo $e_mon; ?> <?php echo $e_year; ?></div>
            <div class="event_name"><?php echo $rows->event_name;  ?></div>
          </div>
        </a>
        </div>
        <?php  } ?>
  </div>
</div>






</div>
</div>
<script>
$('#calendermenu').addClass('collapse in');
$('#calendar').addClass('active');
$('#calendar2').addClass('active');
</script>
<style>

</style>
