<html>
    <head>
        <title>TOP | Login</title>
        <?php
    $this->load->view('admin/templates/head_tag');
    ?>
        <style>
            body {
                background-color: #f6f6f6;
}

#loginbox {
    margin-top: 30px;
}

#loginbox > div:first-child {        
    padding-bottom: 10px;    
}

.iconmelon {
    display: block;
    margin: auto;
    text-align: center;
}

#form > div {
    margin-bottom: 25px;
}

#form > div:last-child {
    margin-top: 10px;
    margin-bottom: 10px;
}

.panel {    
    background-color: transparent;
}

.panel-body {
    padding-top: 30px;
    background-color: rgba(2555,255,255,.3);
}

#particles {
    width: 100%;
    height: 100%;
    overflow: hidden;
    top: 0;                        
    bottom: 0;
    left: 0;
    right: 0;
    position: absolute;
    z-index: -2;
}

.iconmelon,
.im {
  position: relative;
  width: 150px;
  height: 150px;
  display: block;
  fill: #525151;
}

.iconmelon:after,
.im:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
        </style> 

        </script>
    </head>
    <body>
<div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="row">                
            <div class="iconmelon">
                <img src="<?php echo FILEPATH; ?>images/favicon.png" alt="" width="100"/>
              
            </div>
        </div>
        
        <div class="panel panel-default"  >
           
            <div class="panel-heading" style="background: #363636;">
                <div class="panel-title text-center text-muted" style="color: white;">Tanzania Online Projects</div>
            </div>    
            

            <div class="panel-body" style="background: white;" >
                 <?php
            if (validation_errors() != NULL) {
                echo' <div class="alert alert-danger">
                <p><b>Please correct the following errors:</b></p>';
                echo validation_errors('<p>');
                echo '</div>';
            } elseif ($wrong_password != NULL) {
                echo' <div class="alert alert-danger">
                <p><b>Please correct the following errors:</b></p>';
                echo $wrong_password;
                echo '</div>';
            }
            ?>

                <form action="<?php echo SITEURL.('user/login')?>" name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                   
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">                                        
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                    </div>                                                                  

                    <div class="form-group">
                        <div class="col-sm-6 col-md-6">
                            <a href="<?php echo SITEURL.('projects/')?>" class="btn btn-link pull-left">Back to Home</a>                                
                        </div>
                        <!-- Button -->
                        <div class="col-sm-6 controls">
                            <button type="submit" name="btn" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
                        </div>
                    </div>

                </form>     

            </div>                     
        </div>  
    </div>
</div>

<div id="particles"></div>



    </body>
</html>