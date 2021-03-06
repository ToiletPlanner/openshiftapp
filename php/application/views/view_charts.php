<?php
$data = array(
    'title' => 'Occupied - Charts',
    'page' => 'charts',
    'username' => $username
);

$this->load->view('view_header', $data);
?>


<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Charts</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Gebruik afgelopen week
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="weekchart" style="height: 250px;"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
$this->load->view('view_footer'); ?>
</body>

</html>
