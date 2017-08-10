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
    </head>
    <body>
        <div class="cp-top-wrapper">
            <header>
                <br>
                <div class="container">
                    <div class="row" >
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
                                                <a href="<?php echo SITEURL; ?>projects/free" title="Free Projects">Free Projects</a>
                                            </li>
                                            <li><a href="<?php echo SITEURL; ?>projects/paid" title="Paid Projects">Paid Projects</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">
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
                            <h4>Categories</h4>
                        </div>
                        <div class="side-menu col-xs-12">
                            <ul class="list-unstyled col-xs-push-1 col-xs-11">
                                <li>
                                    <a href="<?php echo SITEURL; ?>projects/">
                                        All category
                                    </a>
                                </li><li>
                                    <a href="<?php echo SITEURL; ?>projects/category1">
                                        Web Application
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>projects/category2">
                                        Android Application
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>projects/category2">
                                        Desktop Application
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>projects/free">
                                        Free Projects
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>projects/paid">
                                        Paid Project
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <br>
                    <div class="row left-side-panel  wrapper ">
                        <div class="title">
                            <h4>News</h4>
                        </div>
                        <div class="side-menu col-xs-12">
                            <ul class="list-unstyled col-xs-push-1 col-xs-11">
                               
                                    <?php
                                   $this->db->order_by('news_id', 'DESC');
                                   $this->db->limit(10);
                                    $query = $this->db->get("news");
                                    $resu = $query->result_array();
                                    foreach ($resu as $row):
                                    ?>
                                 <li>
                                    <a href="<?php echo SITEURL.'projects/read/'.$row['date']?>">
                                        <h5 style="color: black;"><?php echo $row['news_title']; ?></h5>
                                        <p style="text-align: justify;"><?php echo $row['description']; ?></p>
                                    </a>
                                 </li>
                                    <?php
                                endforeach;
                                    ?>
                                
                                

                            </ul>
                        </div>

                    </div>



                </div>
                <section class="col-xs-9">
                    <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="table-responsive">
                            
                            <div class="well">
                                <h3 class="panel panel-default" style="padding: 10px; border-radius: 0;"> 
                                   Abous Us
                                </h3>
                                <p> Ipsum modrn dsdsds</p>
                                
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
                                    <a href="<?php echo SITEURL; ?>projects/category2">
                                        Desktop Application
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>projects/category3">
                                        Android Application
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo SITEURL; ?>projects/category1">
                                        Web Application
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