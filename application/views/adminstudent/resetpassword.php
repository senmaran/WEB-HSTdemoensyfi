<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
.form_box{
  margin-bottom: 10px;
}
.left-inner-addon input{
  padding-left: 30px;
}

</style>
<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-8">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Change Password</h4>
                           <?php if($this->session->flashdata('msg')): ?>
                             <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                           ×</button> <?php echo $this->session->flashdata('msg'); ?>
                   </div>

             <?php endif; ?>
                       </div>
                       <?php
                       //print_r($result);
                       foreach ($result as $rows) {

                       }
                        ?>
                       <div class="content">
                           <form action="<?php echo base_url(); ?>studentprofile/changepwd" method="post" enctype="multipart/form-data" id="myformpass">
                               <div class="row">
                                   <div class="col-md-5">
                                       <div class="form-group">
                                           <label>Name</label>
											<input type="text" class="form-control" readonly placeholder="" name="name" value="<?php echo $rows->name; ?>">
											<input type="hidden" class="form-control" readonly placeholder="" name="user_id" value="<?php echo $rows->user_id; ?>">
											<input type="hidden" class="form-control" readonly placeholder="" name="user_pic_old" value="<?php echo $rows->user_pic; ?>">
											<input type="hidden" class="form-control" readonly placeholder="" name="user_password_old" value="<?php echo $rows->user_password; ?>">
                                       </div>
                                   </div>

                                   <div class="col-md-7">
                                       <div class="form-group">
                                           <label for="exampleInputEmail1">User Name</label>
                                           <input type="email" class="form-control" disabled placeholder="Email" value="<?php echo $rows->user_name; ?>">
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Current Password <span class="mandatory_field">*</span></label>
                                           <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Enter current password" value="" maxlength='12'><span toggle="#oldpassword" class="fa fa-fw fa-eye-slash field-icon oldpassword"></span>
                                       </div>
                                   </div>
                                   <div class="col-md-6"></div>
                               </div>
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>New Password <span class="mandatory_field">*</span></label>
                                           <input type="password" class="form-control"  name="newpassword" id="newpassword" placeholder="Enter new password" value="" maxlength='12'><span toggle="#newpassword" class="fa fa-fw fa-eye-slash field-icon newpassword"></span>
                                       </div>
                                   </div>
									<div class="col-md-6"></div>
                               </div>
							<div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Confirm New Password <span class="mandatory_field">*</span></label>
                                           <input type="password" class="form-control" name="retypepassword" id="retypepassword" placeholder="Confirm New Password" value="" maxlength='12'><span toggle="#retypepassword" class="fa fa-fw fa-eye-slash field-icon retypepassword"></span>
                                       </div>
                                   </div>
								   <div class="col-md-6"></div>
                               </div>

                               <div class="row">
                                 <div class="col-md-6">
                                       <div class="form-group">
									   <input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
                                   
                                 </div>
                               </div>
							   <div class="col-md-6"></div>
							</div>
                               <div class="clearfix"></div>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="col-md-4">
                   <!-- <div class="card card-user">
                       <div class="image">
                           <img src="<?php echo base_url(); ?>assets/img/full-screen-image-3.jpg" alt="..."/>
                       </div>
                       <div class="content">
                           <div class="author">
                                <a href="#">
                                  <img class="avatar border-gray" id="output" src="<?php echo base_url(); ?>assets/admin/profile/<?php echo $rows->user_pic; ?>" alt="..."/>

                               <h4 class="title"><?php echo $rows->name;  ?><br />
                                  <small><?php echo $rows->user_name;  ?></small>
                                 </h4>
                               </a>
                           </div>

                       </div>


                   </div> -->
               </div>

           </div>
       </div>
   </div>
</div>

<script type="text/javascript">
$(".oldpassword").click(function() {
  $(this).toggleClass("fa-eye-slash fa-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

$(".newpassword").click(function() {
  $(this).toggleClass("fa-eye-slash fa-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

$(".retypepassword").click(function() {
  $(this).toggleClass("fa-eye-slash fa-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script type="text/javascript">
var loadFile = function(event) {
 var output = document.getElementById('output');
 output.src = URL.createObjectURL(event.target.files[0]);
};
$(document).ready(function () {

 $('#myformpass').validate({ // initialize the plugin
     rules: {
         oldpassword:{required:true },
         newpassword:{required:true,maxlength:12,minlength:6  },
         retypepassword:{required:true,maxlength:12,minlength:6, equalTo: "#newpassword", },
     },
     messages: {
           oldpassword: "This field cannot be empty!",
           newpassword: "Password is Min. 6 and Max. 12 Characters",
           retypepassword: "Password doesn't match new password!",
         }
 });
});
</script>