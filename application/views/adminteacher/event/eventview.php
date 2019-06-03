
<style>

</style>
<div class="main-panel">
<div class="content">
<div class="">
  <h4 class="title">List of Event  </h4><span><small>  (<i class="fa fa-user" aria-hidden="true"></i>) You have Been Allocated as Co-Ordinator</small></span> <br><br>
<div class="row">

<?php
foreach($event_all as $rows){
$event_date = new DateTime($rows->event_date);
$e_date = $event_date->format('d');
$e_mon = $event_date->format('M');
$e_year = $event_date->format('Y');
$ev_user_id=$rows->user_id;
?>



        <div class="col-md-2">
          <a href="<?php echo base_url(); ?>teacherevent/view_event/<?php echo $rows->event_id; ?>">
          <div class="event_box">
            <div class="event_date"><?php echo $e_date; ?> <?php echo $e_mon; ?> <?php echo $e_year; ?></div>
            <div class="event_name"><?php echo $rows->event_name;  ?></div>
            <p class="event_co"><?php $session_user_id=$this->session->userdata('user_id'); if($session_user_id==$ev_user_id){ ?>
              <i class="fa fa-user" aria-hidden="true"></i>
            <?php }else{ ?>
              &nbsp;
          <?php  } ?></p>
          </div>
        </a>
        </div>





        <?php  } ?>

      </div>
    </div>


    <!-- <div class="">
      <h5>List of All Events </h5>
    <div class="row">
      <?php $sat=$event_all['status'];  if($sat=="success"){

        foreach($event_all['event_li'] as $rows){
          $event_date = new DateTime($rows->event_date);
          $e_date = $event_date->format('d');
          $e_mon = $event_date->format('M');
          $e_year = $event_date->format('Y');
          ?>
            <div class="col-sm-6">
              <ul class="event-list" >
                <li>
                  <time datetime="<?php $rows->event_date ?>">
                    <span class="day"><?php echo $e_date; ?></span>
                    <span class="month"><?php echo $e_mon; ?></span>
                    <span class="year"><?php echo $e_year; ?></span>
                  </time>
                  <div class="info">
                  <a href="<?php echo base_url(); ?>teacherevent/view_event/<?php echo $rows->event_id; ?>"> <h2 class="title"><?php echo $rows->event_name;  ?></h2></a>
                  </div>
                </li>
              </ul>
            </div>






            <?php } } else{  ?>
              <div class="col-md-6"><p>NO Event Found</p></div>
          <?php   } ?>

          </div>
        </div> -->





</div>
</div>
<script>
$('#calendermenu').addClass('collapse in');
$('#calendar').addClass('active');
$('#calendar2').addClass('active');
</script>
<style>

</style>
