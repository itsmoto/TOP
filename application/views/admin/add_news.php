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
     <script src="<?php echo FILEPATH; ?>js/tinymice-editor/tinymce.min.js" type="text/javascript"></script>
    <script>tinymce.init({ 
          selector:'textarea'
      });
      </script>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i> <?php echo $this->session->userdata('username');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
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
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_p"><i class="fa  fa-fw fa-laptop"></i> Projects <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_p" class="collapse">
                            <li>
                                <a href="<?php echo SITEURL.'user/upload_project';?>">Upload Project</a>
                            </li>
                            <li>
                                <a href="<?php echo SITEURL.'user/view_projects';?>">View Projects</a>
                            </li>
                      
                        </ul>
                    </li>
                  <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_n"><i class="fa fa-newspaper-o"></i> News <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_n" class="collapse">
                           
                            <li>
                                <a href="<?php echo SITEURL.'user/add_news';?>">Add News</a>
                            </li>
                            <li>
                                <a href="<?php echo SITEURL.'user/list_news';?>">list News</a>
                            </li>
              
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_a"><i class="fa fa-fw fa-user"></i> Administrator <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_a" class="collapse">
                            <li>
                                <a href="<?php echo SITEURL.'user/register';?>">Add user</a>
                            </li>
                            <li>
                                <a href="#">Remove User</a>
                            </li>
                            <li>
                                <a href="#">Change Password</a>
                            </li>
                        </ul>
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
                            Upload Projects
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="<?php echo SITEURL.'user/';?>">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-laptop"></i> Projects
                            </li>
                            <li class="active">
                                <i class="fa fa-upload"></i> Upload Project
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                             <?php
            if (validation_errors() != NULL) {
                echo' <div class="alert alert-danger">
                <p><b>Please correct the following errors:</b></p>';
                echo validation_errors('<p>');
                echo '</div>';
            } 
            if($message !=NULL){
                echo $message;
            }
            
            ?>
                        <form role="form" action="<?php echo SITEURL.'user/add_news';?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>News Title:</label>
                                <input class="form-control" name="news_title" placeholder="News Title"  value="<?php echo set_value('news_title'); ?>">
                                <p class="help-block">Example: Ubuntu development in UK.</p>
                            </div>
                           
                          
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" rows="4" name="description"><?php echo set_value('description'); ?></textarea>
                                <p class="help-block">Provides the description of your news </p>
                            </div>

                                                    

                           
                            <button type="submit" class="btn btn-primary">Submit Button</button>
                            <button type="reset" class="btn btn-primary">Reset Button</button>

                        </form>

                    </div>
                   
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
