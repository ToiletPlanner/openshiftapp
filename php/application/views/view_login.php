<?php
$data = array(
    'title' => 'Occupied - Dashboard',
    'page' => 'login'
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Occupied - Login</title> 
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'public/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'public/css/plugins/metisMenu/metisMenu.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'public/css/plugins/timeline.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'public/css/sb-admin-2.css'?>" rel="stylesheet">
    
    <style>
        body {
            background-color: #FFF;
        }
        
        .intrologo {
            width: 100%;
            margin-bottom: 40px;
        }
        
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }
          
          .col-lg-6 {
            margin-left: 25%;
          }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container vertical-center">
    <div class="col-lg-6 text-center">
        <img src="<?php echo base_url().'public/img/logo.png'?>" alt="logo" class="intrologo"/>
        <p><?php echo validation_errors(); ?></p>
        <?php echo form_open('verifylogin'); ?>
        <label for="username" class="sr-only">Username:</label>
        <input class="form-control" type="text" size="20" id="username" name="username" placeholder="Username" required="" autofocus=""/>
        <br/>
        <label for="password" class="sr-only">Password:</label>
        <input class="form-control" type="password" size="20" id="passowrd" name="password" placeholder="Password" required=""/>
        <br/>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login"/>
    </div>
</div>

<?php
$this->load->view('view_footer'); ?>