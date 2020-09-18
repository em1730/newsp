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

            <!-- Main content  -->

            <!-- Main Content End -->

        </div>
        <!-- Content-Wrapper End -->

        <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>


</body>

</html>