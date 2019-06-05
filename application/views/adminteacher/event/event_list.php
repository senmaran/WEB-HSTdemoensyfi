<div class="main-panel">
<div class="content">


  <div class="card">
    <?php $sat=$result['status'];  if($sat=="success"){ foreach($result['eventview'] as $rows1) {} ?>
                <div class="typo-line1">

                      <blockquote>
                        <h5><?php echo $rows1->event_name; ?><span> <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;">Go Back</button> </span> </h5> 
                       <p>
                  <?php echo $rows1->event_details; ?>   </p>
                       <small>
                      <?php echo $new_date = date('d-m-Y', strtotime($rows1->event_date)); ?>
                       </small>
                      </blockquote>
                  </div>
                  <?php }else{

                  } ?>




  </div>
<div class="">


<div class="">


<?php $sat=$res['status'];  if($sat=="success"){
foreach($res['event_li'] as $rows){
$event_date = new DateTime($rows->event_date);
$e_date = $event_date->format('d');
$e_mon = $event_date->format('M');
$e_year = $event_date->format('Y');
?>



                <div class="col-md-2">
                  <a href="<?php echo base_url(); ?>teacherevent/view_event/<?php echo $rows->event_id; ?>">
                  <div class="event_box">
                    <div class="event_date"><?php echo $e_date; ?> <?php echo $e_mon; ?> <?php echo $e_year; ?></div>
                    <div class="event_name"><?php echo $rows->sub_event_name;  ?></div>
                    <div class="event_co_name"><?php echo $rows->name;  ?></div>
                  </div>
                </a>
                </div>



        <?php  } } else{  ?>
          <div class="col-md-6"><p>No Sub Event Found</p></div>
      <?php   } ?>

      </div>
    </div>







</div>
</div>
<script>
$('#calendermenu').addClass('collapse in');
$('#calendar').addClass('active');
$('#calendar2').addClass('active');

</script>
