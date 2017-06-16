<?php 
	session_start();
	function __autoload($class_name) {
		require_once "class/class.".strtolower($class_name) . '.php';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
	<head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>elbruninh</title>


        <link rel="stylesheet" href="temp_files/font-awesome-4.css" type="text/css">
        <link rel="stylesheet" href="temp_files/font-starcraft.css" type="text/css">
        <link rel="stylesheet" href="temp_files/bootstrap-3.css" type="text/css">
        <link rel="stylesheet" href="temp_files/bootstrap-custom.css" type="text/css">
        <link rel="stylesheet" href="temp_files/bootstrap-switch.css" type="text/css">
        <link rel="stylesheet" href="temp_files/metisMenu.css" type="text/css">
        <link rel="stylesheet" href="temp_files/theme_002.css" type="text/css">
        <link rel="stylesheet" href="temp_files/jquery.css" type="text/css">
        <link rel="stylesheet" href="temp_files/select2.css" type="text/css">
        <link rel="stylesheet" href="temp_files/select2-bootstrap.css" type="text/css">
        <link rel="stylesheet" href="temp_files/bootstrapradio.css" type="text/css">

        <link rel="stylesheet" href="temp_files/theme.css" type="text/css">

    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-userfrosting navbar-fixed-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">CMS v1.0</a>
                </div>
                <div class="sidebar-wrapper">
                    <div class="navbar-inverse navbar-userfrosting sidebar" role="navigation">
						<?php include("includes/menu.php");?>
                    </div>
                    <!-- /.navbar-static-side -->        
                </div>
            </nav>
            <div style="min-height: 556px;" id="page-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
			
			
    
    
                        </div>
                    </div>
                </div>
                <footer>
                    <div class="container">
                        <p>
                            © <a href="">CMS v1.0</a>, 2015
                        </p>
                    </div>
                </footer>
<script src="temp_files/config.js"></script>
<script src="temp_files/jquery-1.js"></script>
<script src="temp_files/bootstrap-3.js"></script>
<script src="temp_files/formValidation.js"></script>
<script src="temp_files/bootstrap.js"></script>
<script src="temp_files/jquery.js"></script>
<script src="temp_files/tables.js"></script>
<script src="temp_files/jquery_003.js"></script>
<script src="temp_files/jquery_002.js"></script>
<script src="temp_files/select2.js"></script>
<script src="temp_files/bootstrapradio.js"></script>
<script src="temp_files/bootstrap-switch.js"></script>
<script src="temp_files/metisMenu.js"></script>
<script src="temp_files/sb-admin-2.js"></script>
<script src="temp_files/userfrosting.js"></script>
<script src="temp_files/widget-users.js"></script>

            </div>
        </div>
    </body>
</html>
