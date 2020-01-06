

<div class="main-panel">
   <div class="content">
      <div class="col-md-12">
         <!-- end card -->
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
                     <h4 class="title">View Marks Details <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right">BACK</button></h4>
					 <hr>
                  </div>
                  <div class="content">
                     <table id="bootstrap-table" class="table">
                        <thead style="width:100%;">
                           <th style="width:5%;font-size:14px;font-weight:bold;">S.No</th>
                           <th style="width:25%;font-size:14px;font-weight:bold;">Marks</th>
                           <th style="width:70%;font-size:14px;font-weight:bold;">Comments</th>
                        </thead>
                        <tbody>
                              <?php $i=1;
                                 foreach ($res as $rows)
                                 {
                                 	//$sub=$res->subject_name;
                                 	//$enr_id=$res->enroll_id;
                                 ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $rows->marks; ?></td>
                                 <td><?php echo $rows->remarks; ?></td>
                              </tr>
                              <?php $i++;  }?>

                           </tbody>

                     </table>
                  </div>
               </div>
            </div>
            <!-- end col-md-12 -->
         </div>
      </div>
   </div>
</div>



