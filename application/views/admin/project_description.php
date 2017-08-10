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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo $this->session->userdata('username');?> <b class="caret"></b></a>
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
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo_p"><i class="fa fa-laptop"></i> Projects <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo_p" class="collapse">
                            <li>
                                <a href="<?php echo SITEURL.'user/upload_project';?>">Upload Project</a>
                            </li>
                            <li>
                                <a href="<?php echo SITEURL.'user/view_projects';?>">View Projects</a>
                            </li>
                      
                        </ul>
                    </li>
                  
                    <li>
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
                            View Projects
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="#">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-laptop"></i> Projects
                            </li>
                            <li class="active">
                                <i class="fa fa-eye"></i> View Project
                            </li>
                            <li class="active"> <?php foreach ($project as $project_n) {echo $project_n['project_name'];}?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Project Description</h2>
                        <?php
                                        foreach ($project as $current_project) {}
                                      ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                               
                                <tbody>
                                    
                                    <tr>
                                        <td>Project Name: </td> <td><?php echo $current_project['project_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td> <td><?php 
                                        $this->db->where('category_id',$current_project['category_id']);
                                        $cate  = $this->db->get('categories')->result_array();
                                        foreach ($cate as $row) {
                                           echo $row['category_name']; 
                                        }
                                         ?></td>
                                    </tr>
                                    <tr>
                                        <td>Upload Date:</td><td><?php echo date('m/d/Y ',$current_project['upload_date']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Uploader:</td><td><?php echo $current_project['uploader']; ?></td>
                                       </tr>
                                       <tr>
                                           <td>File:</td><td><?php 
                                        $this->db->where('project_id',$current_project['project_id']);
                                        $result  = $this->db->get('files')->result_array();
                                        foreach ($result as $row) {
                                            
                                           echo '<a href="'.FILEPATH.'project_files/'.$row['file_name'].'" download>'.$row['file_name'].'</a>'; 
                                          
                                        } ?></td>
                                       </tr>
                                    
                                   
                                                                        
                                </tbody>
                            </table>
                            <div class="well">
                                <h3 class="panel panel-primary" style="padding: 10px; background: #222222; color: white; border: 0; border-radius: 0;"> Description</h3>
                                <?php echo $current_project['description']; ?>
                            </div>
                            <div class="well">
                                  
                         
                                <h3 class="panel panel-primary" style="padding: 10px; background: #222222; color: white; border: 0; border-radius: 0;"> Screenshots</h3>  
                                <?php
                                echo $this->session->userdata('message');
                                   $this->session->unset_userdata('message');
                                 echo $this->session->userdata('error_upload');
                                 $this->session->unset_userdata('error_upload');
                               
                                ?>
                                
                                <form role="form" action="<?php $project_name = preg_replace('#[ -]+#', '-',$current_project['project_name']); echo SITEURL.'user/upload_image/'.$project_name.'/'.$current_project['upload_date'].'/'.$current_project['project_id'];?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>File input</label>
                                <input type="file" name="screenshot">
                                <p class="help-block">Example: image.jpeg.</p>
                            </div>                                                                        
                            <button type="submit" class="btn btn-primary">Add image</button>

                        </form>
                                <br>
                                <div class="row">
                                <?php 
                                        $this->db->where('project_id',$current_project['project_id']);
                                        $result  = $this->db->get('screenshots')->result_array();
                                        foreach ($result as $row) {
                                          ?>
                                <div class="thumbnail col-lg-3" style=" margin-left: 10px; margin-bottom: 10px;">
                                    <a href="#"><i class="btn btn-danger fa fa-remove" style=" position: absolute;"></i></a>
                                <img src="<?php echo FILEPATH.'images/thumbnails/'.$row['screenshot_name'];?>" alt="" class="img-responsive"/>
                                </div>
                              
                                <?php
                                        } ?>
                                </div>
                              </div>   
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

</body>

</html>
