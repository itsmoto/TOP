<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Upload Projects</title>
    <?php
    $this->load->view('admin/templates/head_tag');
    ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">                   
                    TOP admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo SITEURL.'user/logout';?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="<?php echo SITEURL.'user/';?>"><i class="fa fa-fw fa-home"></i>Home</a>
                    </li>
                    <li >
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_p"><i class="fa fa-laptop"></i> Projects <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_p" class="collapse">
                            <li>
                                <a href="<?php echo SITEURL.'user/upload_project';?>">Upload Project</a>
                            </li>
                            <li>
                                <a href="#">View Projects</a>
                            </li>
                      
                        </ul>
                    </li>
                    <li>
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.php"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.php"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.php"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_a"><i class="fa fa-user"></i> Administrator <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_a" class="collapse">
                           <li>
                            <a href="#"><i></i> Profile</a>
                           </li> 
                            <li>
                                <a href="<?php echo SITEURL.'user/register';?>">Add user</a>
                            </li>
                            <li>
                                <a href="<?php echo SITEURL.'user/view_users';?>">View Users</a>
                            </li>
                            <li>
                                <a href="#">Change Password</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.php"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.php"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                     <li>
                            <a href="<?php echo SITEURL.'user/logout';?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Users
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.html">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-user"></i> Administrator
                            </li>
                            <li class="active">
                                <i class="fa fa-eye"></i> View Users
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Users list</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($users as $user) {
                                      ?>
                                    <tr>
                                        <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo '$$$$$$$'; ?></td>
                                        <td><?php echo $user['token']; ?></td>
                                    </tr>
                                    
                                    <?php
                                        }
                                    ?>
                                                                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                    </div>
                    
                </div>
                <!-- /.row -->

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
