<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php
        $admin_dashboard = "active";
        $admin_manage_users = "";
        $admin_add_user = "";
        $admin_list_user = "";
        $admin_manage_mis = "";
        // $sb_sp_members = "";
        // $sb_committees = "";
        // $sb_account_settings = "";
        // $sb_my_profile = "";
        ?>
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Header End -->

            <section class="content">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header with-border">
                            <h3 class="card-title">List of End Users</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="get" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                            <div class="card-body">
                                <table id="maintable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Fullname</th>
                                            <th>Requesting Office</th>
                                            <th>Description</th>

                                            <th width="100">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($users_data = $get_all_users_data->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>
                                                <td><?php echo ($users_data['ref_no']) ?></td>
                                                <td><?php echo $users_data['date_received']; ?></td>
                                                <td><?php echo $users_data['office']; ?></td>
                                                <td><?php echo $users_data['description']; ?></td>

                                                <td>
                                                    <!-- <?php if (empty($users_data['Filenames'])) {
                                                                $btnhidden = "hidden";
                                                                $btnhidden2 = "";
                                                            } else {
                                                                $btnhidden = "";
                                                                $btnhidden2 = "hidden";
                                                            }
                                                            ?> -->
                                                    <a class="btn btn-outline-success btn-sm" href="update_ordinances.php?orno=<?php echo $users_data['OrdinanceNumber']; ?>" data-toggle="tooltip" data-placement="top" title="Update Ordinance"><i class="fa fa-pencil"></i></a>
                                                    <!-- <span <?php echo $btnhidden2 ?> style='opacity:0.5' class='btn btn-outline-warning btn-sm' data-toggle='popover' title='Warning!' data-content='no pdf uploaded'><i class='icon fa fa-search'></i></span>
                                                    <a <?php echo $btnhidden ?> class="btn btn-outline-success btn-sm" href="view_pdf.php?orno=<?php echo $ordinances_data['OrdinanceNumber']; ?>" data-toggle="tooltip" data-placement="top" title="View Scanned Ordinance"><i class="fa fa-search"></i></a> -->
                                                    <button <?php echo $disablebutton; ?> class="btn btn-outline-danger btn-sm" data-role="confirm_delete" data-id="<?php echo  $ordinances_data["OrdinanceNumber"]; ?>" data-toggle="tooltip" data-placement="top" title="Delete Ordinance"><i class="fa fa-trash-o"></i></button>


                                                </td>
                                            </tr>
                                            <div class="form-group">

                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </section>

            <!-- Main content  -->

            <!-- Main Content End -->

        </div>
        <!-- Content-Wrapper End -->

        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>


</body>

</html>