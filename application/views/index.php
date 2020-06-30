<?php
          $server_url = $_SERVER['HTTP_HOST'];
          $query="SELECT user_pic,school_id,name FROM edu_users WHERE user_type='1' ORDER BY user_id ASC LIMIT 1";
		  $objRs=$this->db->query($query);
		  $row=$objRs->result();
		  foreach ($row as $rows1)
		  {
			 $pic=$rows1->user_pic;
			 $sid=$rows1->school_id;
			 $sname=$rows1->name;
		  }
?>
    <!doctype html>
    <html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            <?php echo $sname; ?>
        </title>
		<link rel="icon" href="<?php echo base_url(); ?>assets/fav_icon.png" type="image/gif" sizes="32x32">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <!--  Light Bootstrap Dashboard core CSS    -->
        <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/stroke/css/pe-icon-7-stroke.css">

    </head>
    <style>
        body {
            background-image: url('<?php echo base_url(); ?>assets/bg-1.jpg');
            background-position: contain;
            background-size: 100%;
        }
        .alert button.close {
            position: relative;
            top: 10px;
        }

        .card .form-group > label {
            float: left;
        }
    </style>
    <body>
        <div class="wrapper">
            <div class="login-page">

                <div class="content" style="padding-top:12vh;">
                    <div class="container">
						<div class="row">
						<div class="col-md-2"></div>

						<div class="col-md-4 ">
						  <div class="border-box ">
							<div class="big_logo"><img src="<?php echo base_url();  ?>assets/ensyfi_logo.png" class="ensyfi_logo_big"></div>
						  </div>
						</div>

						<div class="col-md-4">
							<form method="post" action="<?php echo base_url(); ?>adminlogin/valid_code" id="myform">
							<div class="card">
								<?php if($this->session->flashdata('msg')): ?>
							<div class="alert alert-danger">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								  ×</button>
							  <?php echo $this->session->flashdata('msg'); ?>
							</div>
							<?php endif; ?>

							<?php if($pic!='') { ?>
								<div class="header text-center"><img src="<?php echo base_url(); ?>assets/admin/profile/<?php echo $pic; ?>" class="img-circle" style="width:150px;height: 150px;"> </div>
							<?php } else { ?>
								<div class="header text-center"><img src="<?php echo base_url(); ?>assets/main_logo.png" class="img-circle" style="width:150px;height:150px;"></div>
							<?php } ?>
							<div class="content">
								<div class="form-group">
									<label>Institute Code</label>
									<input type="text" placeholder="Enter Institute Code" name="inst_code" class="form-control" maxlength="12">
								</div>
							</div>
							<div class="footer text-center" style="padding: 15px 15px;">
								<button type="submit" class="btn btn-fill btn-warning btn-wd">LOGIN</button>
							</div>
							</div>
							</form>
                          </div>

						  <div class="col-md-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Forms Validations Plugin -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>

    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker.js"></script>

    <!--  Select Picker Plugin -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-selectpicker.js"></script>

    <!--  Checkbox, Radio, Switch and Tags Input Plugins -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-checkbox-radio-switch-tags.js"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

    <!-- Sweet Alert 2 plugin -->
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>

    <!-- Vector Map plugin -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-jvectormap.js"></script>

    <!-- Wizard Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.bootstrap.wizard.min.js"></script>

    <!--  Datatable Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-table.js"></script>

    <!--  Full Calendar Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>

    <!-- Light Bootstrap Dashboard Core javascript and methods -->
    <script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js"></script>

    <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.sharrre.js"></script> -->

    <!-- <script src="<?php echo base_url(); ?>assets/js/demo.js"></script> -->

    <script type="text/javascript">
     $(document).ready(function() {
		$('#myform').validate({ // initialize the plugin
			rules: {
				inst_code: {
					required: true
				}
			},
			messages: {
				inst_code: "Institute cannot be empty!"
			}
		});
     });
    </script>
    </html>
