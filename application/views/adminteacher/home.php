

<style>
   .fc-scroller{
   overflow-x: hidden;
   overflow-y: hidden;
   }
   .fc-ltr .fc-basic-view .fc-day-number{text-align: center;}
   .fc-today-button,.fc-month-button,.fc-basicWeek-button,.fc-basicDay-button{display:none;}
   .fc-month-button{display: none;}

.imgstyle{padding-bottom: 10px;}
ul li a img:active {
    background-color: yellow;
}
.test{padding-top:05px;text-align: center;padding-left:0px}
.name{padding-left:20px;
font-size: 30px;
font-weight: bold;}
 .plusicon
   {
	  display:inline-block;float:right;
   }
   .design{
	 color: white;
    font-size:30px;

   }
   .setcolor{
    background-color: #323546;
   }
   .rem{color:white;font-size:18px;text-transform: capitalize;}
</style>
<div class="main-panel">
<div class="content">
   <div class="container-fluid">

     <div class="card">
       <div class="row">
          <?php  foreach ($user_details as $rows) {}
                 $dateTime=new DateTime($rows->dob);
                 $fdate=date_format($dateTime,'d-m-Y' );
                 $dob1=$rows->dob;
                 $from = new DateTime($dob1);
                 $to   = new DateTime('today');
                 $currentage=$from->diff($to)->y;
            ?>
               <div class="col-md-4 text-center">
                   <div class="profile_detail ">
                     <?php $pic= $rows->user_pic; if(empty($pic)){?>
                       <img src="<?php echo base_url(); ?>assets/noimg.png" class="img-circle  "  style="width:125px;"/>
                      <?php  }else{  ?>
                     <img src="<?php echo base_url(); ?>assets/teachers/profile/<?php echo $rows->user_pic; ?>" class="img-circle" style="width:125px;">
                   <?php } ?>
                   <br>
                     <p class=""> <?php echo $rows->name; ?> </p>
                     <p><b>Class</b>  <?php echo $rows->class_name; ?>-<?php echo $rows->sec_name; ?> &nbsp; - &nbsp; <b>Core Subject</b>  <?php echo $rows->subject_name; ?> </p>
                   </div>
               </div>
           <div class="col-md-4">
             <div  class="textborder"></div>
               <div class="other_details">
                 <p><b>Gender</b> - <?php echo $rows->sex; ?> </p>
                 <p><b>DOB</b> - <?php echo $fdate; ?> </p>
                 <p><b>Age</b> - <?php echo $currentage; ?> </p>
                 <p><b>Contact</b> - <?php echo  $rows->phone; ?> </p>
                 <p><b>Email</b> - <?php echo  $rows->email; ?> </p>
               </div>
           </div>
           <div class="col-md-4">
             <div  class="textborder"></div>
               <div class="other_details">
                 <p class="address_style"><b>Address</b> - <?php echo $rows->address; ?> </p>

               </div>
           </div>
       </div>
     </div>




      <div class="col-md-12">
         <div class="col-md-6">
            <div class="card ">

               <div class="content" style="padding-top:0px;">
                  <div class="table-full-width">
                     <table class="table">
					 <thead class="setcolor">
						<th colspan="2" style="padding-bottom: 8px;"><span class="rem"> UpComing Events <a href="<?php echo base_url(); ?>teacherevent/home" >
						<img class="img-responsive plusicon" src="<?php echo base_url(); ?>assets/img/icons/view1.png"/></a></span></th>
								</thead>
                        <tbody>
                           <?php  if(empty($das_events)){
                              } else {
                              	 $i=1;
                              	foreach ($das_events as $rows) { ?>
                           <tr>
                              <td>
                                 <label class="checkbox">
                                 <?php echo $i; ?>
                                 </label>
                              </td>
                              <td><?php echo $new_date = date('d-m-Y', strtotime($rows->event_date));  ?> &nbsp; <?php echo $rows->event_name; ?></td>
                           </tr>
                           <?php  $i++; } 	}?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card">
               <div id="fullCalendar"></div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {

   	$('#dash').addClass('active');


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
   }
   ,

   {
   url: '<?php echo base_url() ?>teacherevent/view_all_reminder',
   color: 'red',
   textColor: 'white'
 },
 {
 url: '<?php echo base_url() ?>teacherevent/get_all_special_leave_staff',
 color: 'Green',
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

</script>
