<?php
$data = array(
    'title' => 'Occupied - Insert Test Data',
    'page' => 'testdata',
    'username' => $username
);

$this->load->view('view_header', $data);
?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Insert own data</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Change Status
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Change Status</th>
                        </tr>
                        </thead>
                        <tbody data-bind="foreach: changeStatusTable">
                        <tr>
                            <td data-bind="text: name"></td>
                            <td data-bind="text: tstate"></td>
                            <td><span class="glyphicon glyphicon-plus glyphicon-btn" data-bind="attr: {'id': 'changebtn-' + id}"></span></td>
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
    <!-- row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
$this->load->view('view_footer'); ?>
</body>

</html>
