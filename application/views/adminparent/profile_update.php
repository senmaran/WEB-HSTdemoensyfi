<script src="<?php  echo base_url(); ?>assets/js/croppie.js"></script>
<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/croppie.css" />
<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-8">
               <div class="card">

                  <div class="content">

               <div class=" panel-default">
                   <h4 class="title">Change Profile Image</h4>
                   <div class="panel-body" align="center">
                     <input type="file" name="upload_image" id="upload_image" />

                     <div id="uploaded_image"></div>
                   </div>
                 </div>
               </div>

               <div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px;">
  						<br />
  						<br />
  						<br/>
						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>




                  <?php
                     foreach ($result as $rows) { }
                      ?>

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
                            <img class="avatar border-gray" src="http://localhost/ensyfi/assets/noimg.png">
                           <?php  }else{ ?>
                        <img class="avatar border-gray" id="output23" src="<?php echo base_url(); ?>assets/parents/profile/<?php echo $rows->user_pic; ?>" alt="..."/>
                         <?php } ?>
                        </a>
                        <h4 class="title" style="line-height:20px;"><?php echo $rows->name; ?></h4>
                        <br>
                        <p><a onclick="remove_img()" style="cursor: pointer;">Remove Picture</a>

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
    url:"<?php  echo base_url();  ?>parentprofile/remove_img",
    type: "POST",
    data:{"hi": "response"},
    success:function(data)
    {
      if(data=="success"){
          alert("Picture Removed");
          window.setTimeout(function(){location.reload()},1000)
      }else{
          alert("Something Went Wrong");
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
        url:"<?php  echo base_url();  ?>parentprofile/post_img",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          if(data=="success"){
              alert("Picture Updated");
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
