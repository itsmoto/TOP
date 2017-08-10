<!DOCTYPE html>
<html><head>
        <title> Tanzania Projects</title>
        <link rel='shortcut icon' type='image/x-png' href='<?php echo FILEPATH ?>images/favicon.png'/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="<?php echo FILEPATH . ('js/jquery.js') ?>"></script>
        <script src="<?php echo FILEPATH . ('js/bootstrap.min.js') ?>"></script>
        <link href="<?php echo FILEPATH; ?>css/base.css" rel="stylesheet">
        <link href="<?php echo FILEPATH; ?>css/main.css" rel="stylesheet">
        <script src="<?php echo FILEPATH; ?>css/main.js"></script>
        <link href="<?php echo FILEPATH; ?>css/imageviewer.css"  rel="stylesheet" type="text/css" />
        <script src="<?php echo FILEPATH; ?>js/imageviewer.js"></script>
        
<style>
    .gallery-items{
        float: left;
        height: 350px;
    }
</style>
        <script type="text/javascript">

$(function () {
    var viewer = ImageViewer();
    $('.gallery-items').click(function () {
        var imgSrc = this.src,
            highResolutionImage = $(this).data('high-res-img');
            viewer.show(imgSrc,highResolutionImage);
    });
});
</script>
    </head>
    <body>
        <div class="cp-top-wrapper">
            <header>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-2">
                            <a href="#">
                                <img src="<?php echo FILEPATH; ?>images/favicon.png">
                            </a>
                        </div>
                        <div class="col-xs-4 tagline text-left">
                            <h4 class="col-xs-12">
                                Tanzania online projects
                                <span class="col-xs-12 small text-left">
                                    Serving without scale
                                </span>
                            </h4>
                        </div>

                    </div>
                </div>
                <div class="cp-nav">
                    <div class="container">
                        <div class="row">
                            <nav class="cp-nav-custom navbar">
                                <ul class="nav navbar-nav pull-left">
                                    <li>
                                        <a href="<?php echo SITEURL; ?>projects/">
                                            Home
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Projects
                                        </a>
                                        <ul class="dropdown-menu" style="width: 15em;" role="menu">
                                            <li>
                                                <a href="#" title="Free Projects">Free Projects</a>
                                            </li>
                                            <li><a href="#" title="Paid Projects">Paid Projects</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="http://www.tovl.ac.tz/about-us">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">Login</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <main>
            <br>
            <form  action="http://www.tovl.ac.tz/search" method="get" role="form" accept-charset="UTF-8" enctype="application/x-www-form-urlencoded">
                <div class="col-xs-6 search-pane pull-right text-center">
                    <div class="input-group">
                        <input class="form-control cp-search-input" name="q" placeholder="Search by Project name , Developer" type="text" style="background-color: white">
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-sm" type="submit"> <span class="glyphicon glyphicon-search"></span> </button>
                        </span>
                    </div>
                </div>
            </form>
            <br>
            <div class="container">
                <div class="col-xs-3 pull-left left-side">
                    <div class="row left-side-panel  wrapper ">
                        <div class="title">
                            <h5>Categories</h5>
                        </div>
                        <div class="side-menu col-xs-12">
                            <ul class="list-unstyled col-xs-push-1 col-xs-11">
                                <li>
                                    <a href="http://www.tovl.ac.tz/about-us">
                                        Web Application
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/faq">
                                        Android Application
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/contact">
                                        Desktop Application
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <br><br>

                    <div class="row left-side-panel  wrapper ">
                        <div class="title">
                            <h5>Quick Links</h5>
                        </div>
                        <div class="side-menu col-xs-12">
                            <ul class="list-unstyled col-xs-push-1 col-xs-11">
                                <li>
                                    <a href="http://www.tovl.ac.tz/about-us">
                                        Web Application
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/faq">
                                        Android Application
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/contact">
                                        Desktop Application
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <section class="col-xs-9">
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
                                
                               
                                <br>
                                <div class="row">
                                <?php 
                                        $this->db->where('project_id',$current_project['project_id']);
                                        $result  = $this->db->get('screenshots')->result_array();
                                        foreach ($result as $row) {
                                          ?>
                                <div class="thumbnail col-lg-3" style=" margin-left: 10px; margin-bottom: 10px;">
                                    <a href="#"></a>
                                <img data-high-res-src="<?php echo FILEPATH.'images/thumbnails/'.$row['screenshot_name'];?>" src="<?php echo FILEPATH.'images/thumbnails/'.$row['screenshot_name'];?>" alt="" class="gallery-items img-responsive"/>
                                </div>
                              
                                <?php
                                        } ?>
                                </div>
                              </div>   
                        </div>
                    </div>
                </section>
            </div>


        </main>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="col-xs-8">
                            <ul class="list-unstyled">
                                <h4 class=" small">
                                    COMPANY
                                </h4>
                                <li>
                                    <a href="http://www.tovl.ac.tz/about-us">
                                        About PITCOL
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/privacy-policy">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/contact">
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="col-xs-8">
                            <ul class="list-unstyled">
                                <h4 class="small">
                                    PROJECT
                                </h4>
                                <li>
                                    <a href="http://www.tovl.ac.tz/browse?level=primary">
                                        Desktop Application
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/browse?level=secondary">
                                        Android Application
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/new-added">
                                        Web Application
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/my-favorites">
                                        IOS Application
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="col-xs-8">
                            <ul class="list-unstyled">
                                <h4 class=" small">
                                    SUPPORT
                                </h4>
                                <li>
                                    <a href="http://www.tovl.ac.tz/faq#account">
                                        My Account
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/faq#payments">
                                        Payments
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/faq#publishers">
                                        Developers
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.tovl.ac.tz/faq" title="Frequent Asked Questions">
                                        FAQ
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <address>
                            <div class="col-xs-12">
                                <ul class="list-unstyled">
                                    <h4 class="small">
                                        CONTACT US
                                    </h4>
                                    <li>
                                        P.O.Box **** Dar Es Salaam
                                    </li>
                                    <li>
                                        + 255 762 519 784 / +255 653 310 092
                                    </li>
                                    <li>
                                        <a href="">
                                            Pitcolcompany.ac.tz
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            Pitcolocomany@gmail.com
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </address>
                    </div>
                </div>
                <div class="center-block">
                    <div class="col-xs-12 small">
                        <div class="col-xs-4" style="padding-left: 3.5em">
                            <p> Copyright ©2017, Pitcol Company Limited </p>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </body></html>