<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                  <div class="header">
                      Academic Year
                      <?php  foreach($res_year as $rows_year){}  echo date('Y', strtotime($rows_year->from_month));  echo "-"; echo date('Y', strtotime( $rows_year->to_month)); ?>
                      <a href="<?php echo base_url(); ?>promotion/home" class="btn btn  btn pull-right" style="margin-top:-10px;">Back to Promotion</a>

                  </div>
                  <hr>
                  <div class="content">
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
