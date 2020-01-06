<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title><?php  echo $this->session->userdata('name'); ?></title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
      <meta name="viewport" content="width=device-width" />
     
	  <!-- Bootstrap core CSS     -->
      <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
      
	  <!--  Light Bootstrap Dashboard core CSS    -->
      <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
      
	  <!--  CSS for Demo Purpose, don't include it in your project     -->
      <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
      
	  <!--     Fonts and icons     -->
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stroke/css/pe-icon-7-stroke.css">
 
	  <!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>


	  <!-- PDF / Excel  -->
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/buttons.dataTables.min.css">


	  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/pdfmake.min.js" type="text/javascript"></script>
	  <script src="<?php echo base_url(); ?>assets/js/vfs_fonts.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jszip.min.js" type="text/javascript"></script>
	  <script src="<?php echo base_url(); ?>assets/js/buttons.colVis.min.js" type="text/javascript"></script>
	  <script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jspdf.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jspdf.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/FileSaver.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jspdf.plugin.table.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js" type="text/javascript"></script>

      <!--  Forms Validations Plugin -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
      <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>


      <style>
         .navbar{
         margin-bottom:0px;}
         .caret{
         position: relative;
         top: -20px;
         float: right;
         }
         .alert button.close {
         position: relative;top:10px;
         }
         .error{
         color: red;
         font-weight: 500;
         }
         .title_ensyfi{
         color:#fff!important; margin-left: 10px!important; padding-left: 175px !important;
         }
         .abox{border: 1px solid grey;}
         .topbar{background-color:#642160 ;height:99px;}
         .imgclass{margin:0px;float:left;}

          .imgstyle1{width:40px;height:40px;    border: 4px solid #fff;}
         body{position: absolute;
         height: 100%;
         width: 100%;
         background-color: whitesmoke;}
         .sidemenubcolor{background-color: #1e202c;}
		 .menuimg{
           float: left;
           margin-right: 10px;
         }
		 table.dataTable thead .sorting{
           background: none;
         }
         table.dataTable thead .sorting_desc{
          background: none;
         }
         table.dataTable thead .sorting_asc{
         background: none;
         }
      </style>
   </head>
   <body>
      <div class="wrapper">
      <nav class="navbar navbar-default topbar">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>

               <a class="navbar-brand title_ensyfi" href="#" style="color:white; margin-left:10px; margin-top:25px; font-size:25px;">
			   <?php 
					$sql="SELECT name,user_id,user_type FROM edu_users WHERE user_id='1' AND user_type='1'";
					$res=$this->db->query($sql);
					$rows=$res->result();
					foreach ($rows as $rows3){} $uname=$rows3->name;
					echo $uname; 
				?>
				</a>
            </div>
            <div class="collapse navbar-collapse"  style="float:right;padding-top: 18px;">
               <ul class="nav navbar-nav navbar-right">
                  <li style="padding: 08px 10px;">
                     <a href="<?php echo base_url(); ?>adminparent/view_onduty" class="abox"style="padding:03px 15px;border-color: white;">
                        <p style="color: white;text-transform: uppercase;font-size: 12px;padding-left:0px;">Onduty</p>
                     </a>
                  </li>
                  <li class="dropdown dropdown-with-icons">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin:3px;">
                        <div class="photo">
                           <?php
                              $user_id=$this->session->userdata('user_id');
                              $user_type=$this->session->userdata('user_type');
                              $query="SELECT user_pic FROM edu_users WHERE user_id='$user_id' AND user_type='$user_type'";
                              $objRs=$this->db->query($query);
                              $row=$objRs->result();
                              foreach ($row as $rows1)
                              {
                               $pic=$rows1->user_pic;
                               if($pic!='')
                               {?>
                          <img src="<?php echo base_url(); ?>assets/parents/profile/<?php echo $pic; ?>" class="img-circle img-responsive imgstyle1"/>
                           <?php }else{
                              ?> <img src="<?php echo base_url(); ?>assets/noimg.png" class="img-circle img-responsive imgstyle1" />
                           <?php }} ?>
                        </div>
                        <b class="caret" style="margin-left:55px;color:white;"></b>
                     </a>
                     <ul class="dropdown-menu dropdown-with-icons">
                        <li> <a href="<?php echo base_url(); ?>parentprofile/profile_edit"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>parentprofile/pwd_edit"><i class="fa fa-cog" aria-hidden="true"></i> Change Password</a></li>
						<li><a href="<?php echo base_url(); ?>parentprofile/notification_status"><i class="fa fa-bell" aria-hidden="true"></i> Notification Settings</a></li>
						<li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>adminlogin/logout" class="text-danger"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="sidebar sidemenu">
         <div class="sidebar-wrapper">
            <div class="user" style="margin-top:10px;padding-bottom:22px;">
               <div class="imgclass photo" style="margin-left:20px;">
                  <?php
                     $user_id=$this->session->userdata('user_id');
                     $user_type=$this->session->userdata('user_type');
                     $query="SELECT user_pic FROM edu_users WHERE user_id='$user_id' AND user_type='$user_type'";
                     $objRs=$this->db->query($query);
                     $row=$objRs->result();
                     foreach ($row as $rows1)
                     {
                      $pic=$rows1->user_pic;
                      if($pic!='')
                      {?>
                  <img class="img-responsive" style="width:80px;height:80px;" src="<?php echo base_url(); ?>assets/parents/profile/<?php echo $pic; ?>" >
                  <?php }else{
                     ?> <img class="img-responsive" src="<?php echo base_url(); ?>assets/noimg.png"  />
                  <?php }} ?>
               </div>
               <div class="info">
                  <a  href="" style="padding-top:25px;">
                  <?php
                     $user_id=$this->session->userdata('user_id');
                     $user_type=$this->session->userdata('user_type');
                     $query="SELECT name FROM edu_users WHERE user_id='$user_id' AND user_type='$user_type'";
                     $objRs=$this->db->query($query);
                     $rows=$objRs->result();
                     foreach ($rows as $rows2)
                     { }echo '<p>'; echo"Welcome, "; echo $rows2->name; echo '</p>';?>
                  </a>
               </div>
            </div>
            <ul class="nav">
               <li id="dashboard">
                  <a href="<?php echo base_url(); ?>">
                     <i class="pe-7s-home"></i>
                     <p>Dashboard</p>
                  </a>
               </li>
               <li id="attendence">
                  <a href="<?php echo base_url(); ?>adminparent/attendance">
                    <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/Attendance.png"/>
                     <p>Attendance</p>
                  </a>
               </li>
               <li id="events">
                  <a href="<?php echo base_url(); ?>adminparent/event">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/calender.png"/>
                     <p>Events</p>
                  </a>
               </li>
               <li id="circular">
                  <a href="<?php echo base_url(); ?>adminparent/view_circular">
                    <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/circular.png"/>
                     <p>Circulars</p>
                  </a>
               </li>
               <li id="homework">
                  <a href="<?php echo base_url(); ?>adminparent/homework">
                   <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/homework&classtest.png"/>
                     <p>Homeworks and Tests</p>
                  </a>
               </li>
			    <li id="specialcls">
                  <a href="<?php echo base_url(); ?>adminparent/view_special_cls">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/specialclass.png"/>
                     <p>Special Classes</p>
                  </a>
               </li>
               <li id="fees">
                  <a href="<?php echo base_url(); ?>adminparent/fees_status">
                    <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/fees.png"/>
                     <p>Fees Status</p>
                  </a>
               </li>

               <li id="exam">
                  <a data-toggle="collapse"  href="#examinationmenu">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/Results.png"/>
                     <p>Examinations </p>
                     <b class="caret"></b>
                  </a>
                  <div class="collapse" id="examinationmenu">
                     <ul class="nav">
                        <li id="exam1">
                           <a href="<?php echo base_url(); ?>adminparent/exam_name_calender">Exam Schedule</a>
                        </li>
                        <li id="exam2">
                           <a href="<?php echo base_url(); ?>adminparent/exam_result">Results</a>
                        </li>
                     </ul>
                  </div>
               </li>

               <li id="timetable">
                  <a href="<?php echo base_url(); ?>adminparent/timetable">
                     <img class="menuimg" src="<?php echo base_url(); ?>assets/img/icons/timetable.png"/>
                     <p>Timetable</p>
                  </a>
               </li>
            </ul>
         </div>
      </div>
