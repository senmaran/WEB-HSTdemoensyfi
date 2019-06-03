<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-8">
               <div class="card">
                  <div class="header">
                     <?php if($this->session->flashdata('msg')): ?>
                     <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×</button> <?php echo $this->session->flashdata('msg'); ?>
                     </div>
                     <?php endif; ?>
                     <h4 class="title">Update Profile Picture</h4>
                  </div>
                  <?php
                     // print_r($result);
                      foreach ($result as $rows) { }
                       ?>
                  <div class="content">
                     <form action="<?php echo base_url(); ?>teacherprofile/profileupdate" method="post" enctype="multipart/form-data" name="teacherform">
                        <div class="row">
                           <div class="col-md-5">
                              <div class="form-group">
                                <label for="exampleInputEmail1"> Name</label>
                                <input type="text" class="form-control no_text_box"  readonly name="name"  placeholder="Email" value="<?php echo $rows->name; ?>">

                                 <input type="hidden" class="form-control no_text_box" readonly placeholder="" name="user_id" value="<?php echo $rows->teacher_id; ?>">
                                 <input type="hidden" class="form-control no_text_box" readonly  placeholder="" name="user_pic_old" value="<?php echo $rows->user_pic; ?>">
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="form-group">
                                <label>Change Profile Picture</label>
                                <input type="file" name="user_pic" class="form-control no_text_box" onchange="loadFile(event)" accept="image/*" >
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-5">
                              <div class="form-group">
                                 <label>Gender</label>
                                 <input type="text"  name="sex"  readonly class="form-control no_text_box" value="<?php echo $rows->sex; ?>">

                                 <script language="JavaScript">document.teacherform.sex.value="<?php echo $rows->sex; ?>";</script>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="form-group">
                                 <label for="exampleInputEmail1"> Mobile</label>
                                 <input type="text" readonly  placeholder="Mobile Number"  name="mobile" class="form-control no_text_box" value="<?php echo $rows->phone; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">

                           <div class="col-md-5">
                              <div class="form-group">
                                 <label>Age</label>
                                 <input type="text" placeholder="Age" name="age" readonly id="age"  class="form-control no_text_box"  value="<?php echo $rows->age; ?>">
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="form-group">

                                 <label for="exampleInputEmail1"> Email</label>
                                 <input type="text" name="email" disabled class="form-control no_text_box " id="email" placeholder="Email Address" onblur="checkMailStatus()"  value="<?php echo $rows->email; ?>"/>
                              </div>
                           </div>
                        </div>


                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control no_text_box" readonly  rows="4" cols="100"><?php echo $rows->address; ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="text-center">
                              <button type="submit" class="btn btn-info btn-fill">Update Profile Picture</button>
                           </div>
                        </div>





                        <div class="clearfix"></div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card card-user">
                  <div class="image">
                     <img src="<?php echo base_url(); ?>assets/img/full-screen-image-3.jpg" alt="..."/>
                  </div>
                  <div class="content">
                     <div class="author">
                        <a href="#">
                           <img class="avatar border-gray" id="output" src="<?php echo base_url(); ?>assets/teachers/profile/<?php echo $rows->user_pic; ?>" alt="..."/>
                           <h4 class="title"><?php echo $rows->name;  ?><br />
                           </h4>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
.no_text_box{

}
</style>
<script type="text/javascript">
   var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
   };
</script>
