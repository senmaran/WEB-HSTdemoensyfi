<div class="main-panel">
   <div class="content">

      <div class="card">
        <?php $sat=$result['status'];  if($sat=="success"){ foreach($result['eventview'] as $rows1) {} ?>
        <div class="typo-line1">
			  <blockquote style="border:0px;">
				<h4 class="title"><?php echo $rows1->event_name; ?></h4>
				<p><?php echo $rows1->event_details; ?>   </p>
				<p><?php echo $new_date = date('d-m-Y', strtotime($rows1->event_date)); ?></p>
			  </blockquote>
		  </div>
		  <?php }else{
		  } ?>
      </div>
      <div>
         <div class="row">
            <?php $sat=$res['status'];  if($sat=="success"){
               foreach($res['event_li'] as $rows){
				   $event_date = new DateTime($rows->event_date);
				   $e_date = $event_date->format('d');
				   $e_mon = $event_date->format('M');
				   $e_year = $event_date->format('Y');
               ?>
            <div class="col-md-3">
              <a href="#">
              <div class="event_box">
                <div class="event_date"><?php echo $e_date; ?> <?php echo $e_mon; ?> <?php echo $e_year; ?></div>
                <div class="event_name"><?php echo $rows->sub_event_name;  ?></div>
                <div class="event_co_name"><?php echo $rows->name;  ?><!--(<i class="fa fa-user" aria-hidden="true"></i>)--></div>
              </div>
            </a>
            </div>
            <?php  } } else{  ?>
            <div class="col-md-12">
               <p>No Sub Events Found</p>
            </div>
            <?php   } ?>
         </div>
      </div>
   </div>
</div>
<script>
   $('#events').addClass('collapse in');
   $('#events').addClass('active');
   $('#events').addClass('active');
</script>
