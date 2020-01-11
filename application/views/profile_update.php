<script src="<?php  echo base_url(); ?>assets/js/croppie.js"></script>
<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/croppie.css" />
 <?php
     foreach ($result as $rows) { }
?>
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
				
                   <h4 class="title">Edit Profile</h4>
                       </div>
                       <div class="content">
                           <form action="<?php echo base_url(); ?>adminlogin/profileupdate" method="post" id="profileedit" enctype="multipart/form-data">
                               <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label>Username</label>
											  <input type="text" class="form-control" readonly placeholder="" name="name" value="<?php echo $rows->user_name; ?>">
											  <input type="hidden" class="form-control" readonly placeholder="" name="user_id" value="<?php echo $rows->user_id; ?>">
                                       </div>
                                   </div>

                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <label for="exampleInputEmail1"> Name</label>
                                           <input type="text" class="form-control" name="sname" placeholder="" value="<?php echo $rows->name; ?>" maxlength="50">
                                       </div>
                                   </div>
                               </div>
							   
							   <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group">
                                        <input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
                                        
                                       </div>
                                   </div>
                                   <div class="col-md-6"></div>
                               </div>
                           </form>
						   <hr>
					              
						<div class="row" style="padding-bottom:30px;">
							<div class="col-md-6">
							<h4 class="title" style="padding-bottom:10px;">Profile Picture Upload</h4>
								<input type="file" name="upload_image" id="upload_image" />
								<div id="uploaded_image"></div>
							</div>
						 <div class="col-md-6"></div>
						 
							<div id="uploadimageModal" class="modal" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Upload & Crop Image</h4>
										</div>
										<div class="modal-body">
											<div class="row">
											<div class="col-md-2"></div>
												<div class="col-md-6 text-center">
													  <div id="image_demo" style="width:350px; margin-top:30px"></div>
												</div>
												<div class="col-md-4"></div>
											</div>
											<div class="row">
											<div class="col-md-3"></div>
												<div class="col-md-6 text-center">
													  <button class="btn btn-info btn-fill center crop_image" style="width:170px;cursor:pointer;">Crop & Upload Image</button>
												</div>
												<div class="col-md-3"></div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
		
						</div>		
						
                       </div>
                   </div>
               </div>
			   
			   
              <div class="col-md-4">
               <div class="card card-user">
                  <div class="image">
                     <img src="<?php echo base_url(); ?>assets/img/full-screen-image-3.jpg" alt="..." />
                  </div>
                  <div class="content">
                     <div class="author">
                        <a href="#">
                            <?php if(empty($rows->user_pic)){ ?>
								<img class="avatar border-gray" src="<?php echo base_url(); ?>assets/noimg.png">
                           <?php  }else{ ?>
								<img class="avatar border-gray" id="output23" src="<?php echo base_url(); ?>assets/admin/profile/<?php echo $rows->user_pic; ?>" alt="..."/>
                         <?php } ?>
                        </a>
                        <h4 class="title" style="line-height:30px;"><?php echo $rows->name; ?></h4>

                        <p><a onclick="remove_img()" style="cursor: pointer;">Remove Profile Picture</a>
                     </div>
                  </div>
               </div>
            </div>
           </div>
		   

       </div>
   </div>
</div>


<script type="text/javascript">
function remove_img(){
  $.ajax({
    url:"<?php  echo base_url();  ?>adminlogin/remove_img",
    type: "POST",
    data:{"hi": "response"},
    success:function(data)
    {
      if(data=="success"){
          alert("Profile picture removed");
          window.setTimeout(function(){location.reload()},1000)
      }else{
          alert("Please upload profile picture");
      }
    }
  });
}

$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"<?php  echo base_url();  ?>adminlogin/post_img",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          if(data=="success"){
              alert("Profile picture uploaded");
              window.setTimeout(function(){location.reload()},1000)
          }else{
              alert("Something Went Wrong");
          }
        }
      });
    })
  });

});
</script>
<script type="text/javascript">
var loadFile = function(event) {
 var output = document.getElementById('output');
 output.src = URL.createObjectURL(event.target.files[0]);
};

$('#profileedit').validate({ // initialize the plugin
    rules: {
        sname:{required:true,noSpace: true },
    },
    messages: {
        sname: "This field cannot be empty!"
    }
});
</script>