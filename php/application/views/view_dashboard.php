<?php
$data = array(
    'title' => 'Occupied - Dashboard',
    'page' => 'dashboard',
    'username' => $username
);

$this->load->view('view_header', $data);
?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Availability
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody data-bind="foreach: statusTable">
                            <tr>
                                <td data-bind="text: stateid"></td>
                                <td data-bind="text: name"></td>
                                <td data-bind="text: tstate"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Number of visits for each room today
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Aantal keren gebruikt</th>
                        </tr>
                        </thead>
                        <tbody data-bind="foreach: usageTable">
                        <tr>
                            <td data-bind="text: usageid"></td>
                            <td data-bind="text: name"></td>
                            <td data-bind="text: tusage"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#wrapper -->

<?php $this->load->view('view_footer'); ?>
