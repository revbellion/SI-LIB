<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $judul; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>theme/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>theme/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>theme/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

</style>

</head>

<body background="<?php echo base_url();?>theme/pattern.jpg">

    <div class="container">
        <div class="row"><h1 class="text-center text-primary"><strong><b>My E-Library Application</b></strong></h1>
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><h4 class="header blue lighter bigger text-center">

                            Please Enter Your Information
                        </h4></h3>
                        
                    </div>
                    <div class="panel-body">
                        <?php if ($this->session->flashdata('info')): ?>
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('info'); ?>
                            </div>
                        <?php endif ?>
                        
                        <form action="<?php echo base_url(); ?>login" method="POST">

                            <fieldset>
                                <div class="form-group">
                                 <?php if (validation_errors()): ?>
                                    <div class="alert alert-info alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo validation_errors(); ?>
                                    </div>
                                <?php endif ?>

                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="password" placeholder="Password" name="password" type="password">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="showhide" onclick="return show()"><i class="text-primary"> Show Password ?</i>
                            </div>

                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-block btn-primary" name="submit">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url();?>theme/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>theme/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>theme/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>theme/dist/js/sb-admin-2.js"></script>
<script type="text/javascript">
 function show(){
    if($("#password").attr("type")=="password")
    {
      $("#password").attr("type","text");
  }
  else
  {
      $("#password").attr("type","password");
  }
}
</script>

</body>

</html>
