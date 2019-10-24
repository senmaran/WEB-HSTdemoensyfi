<div class="main-panel">
<div class="content">



    <div class="">
      <h5>All Events</h5>
    <div class="row">
      <?php if(empty($res)){  ?>
        <p>No Event</p>
    <?php  }else{
        foreach($res as $rows){
          $event_date = new DateTime($rows->event_date);
          $e_date = $event_date->format('d');
          $e_mon = $event_date->format('M');
          $e_year = $event_date->format('Y');
          ?>
            <!-- <div class="col-sm-6">
              <ul class="event-list" >
                <li>
                  <time datetime="<?php $rows->event_date ?>">
                    <span class="day"><?php echo $e_date; ?></span>
                    <span class="month"><?php echo $e_mon; ?></span>
                    <span class="year"><?php echo $e_year; ?></span>
                  </time>
                    <div class="info">
                  <a href="<?php echo base_url(); ?>adminparent/view_event/<?php echo $rows->event_id; ?>">
                    <h2 class="title"><?php echo $rows->event_name;  ?></h2>
                  </a>
                  </div>
                </li>
              </ul>
            </div> -->



            <div class="col-md-2">
              <a href="<?php echo base_url(); ?>adminparent/view_event/<?php echo $rows->event_id; ?>">
              <div class="event_box">
                <div class="event_date"><?php echo $e_date; ?> <?php echo $e_mon; ?> <?php echo $e_year; ?></div>
                <div class="event_name"><?php echo $rows->event_name;  ?></div>
              </div>
            </a>
            </div>





    <?php  } }   ?>


          </div>
        </div>





</div>
</div>
<script>
$('#events').addClass('collapse in');
$('#events').addClass('active');
$('#events').addClass('active');
</script>
<style>

</style>
