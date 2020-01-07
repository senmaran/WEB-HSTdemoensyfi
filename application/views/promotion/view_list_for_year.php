 <?php
 if (count($res_list)>0) {
	foreach ($res_list as $rows) {}
	$search_class = $rows->class_sec_id;
 } else {
	 $search_class = "";
 }
?>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                  <div class="header">
                      Academic Year
                      <?php  foreach($res_year as $rows_year){ }  $year_id = $rows_year->year_id;  echo date('Y', strtotime($rows_year->from_month));  echo "-"; echo date('Y', strtotime( $rows_year->to_month)); ?>
                      <a href="<?php echo base_url(); ?>promotion/home" class="btn btn  btn pull-right">Back to Promotion</a>

                  </div>
				  
                  <hr>
                  <div class="content">
				  <form method="post" action="<?php echo base_url(); ?>promotion/view_list_for_year/<?php echo $year_id; ?>" class="form-horizontal" enctype="multipart/form-data" id="search_class" name="search_class">

                        <fieldset>
                           <div class="form-group">
                            
                              <div class="col-sm-4">
                                 <select name="classes" id="classes"  required class="selectpicker" >
								  <option value="">Select Classes</option>
                                    <?php foreach($res_classes as $rows) { ?>
                                    <option value="<?php  echo $rows->class_sec_id; ?>"><?php  echo  $rows->class_name; ?> <?php  echo  $rows->sec_name; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                              
                              <div class="col-sm-4">
                                  <button type="submit" id="search" class="btn btn-info btn-fill center" style="cursor:pointer;">Search </button>
                              </div>
                           </div>
                        </fieldset>

                     </form><script language="JavaScript">document.search_class.classes.value="<?php echo $search_class; ?>";</script>
                    <div class="fresh-datatables">

                        <table id="bootstrap-table" class="table">
                            <thead>
                                <th data-field="id">S.No</th>
                                <th data-field="Name" data-sortable="true"> Name </th>
                                <th data-field="date" data-sortable="true">Admission No. </th>

                                <th data-field="Class" data-sortable="true">Class </th>
                                <th data-field="gender" data-sortable="true">Gender </th>

                            </thead>
                            <tbody>
                                <?php
                              $i=1;
                              foreach ($res_list as $rows) {

                              ?>
                                    <tr>
                                        <td class="btn-simple btn-icon">
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $rows->name;?>
                                        </td>
                                        <td>
                                            <?php echo $rows->admisn_no;?>
                                        </td>
                                        <td>
                                            <?php echo $rows->class_name; ?>-
                                                <?php echo $rows->sec_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $rows->sex;?>
                                        </td>
                                    </tr>
                                    <?php $i++;  }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                  </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
$('#promotionmenu').addClass('collapse in');
$('#promotion').addClass('active');
$('#promo1').addClass('active');
   $('#bootstrap-table').DataTable();

</script>
