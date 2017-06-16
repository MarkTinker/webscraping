<?php
    session_start();
function __autoload($class_name)
{
    require_once "class/class.".strtolower($class_name) . '.php';
}
    $action=$_REQUEST['action'];
switch ($action) {
    case "add":
        $url=$_REQUEST["url"];
        $name=$_REQUEST["name"];
        $max1=$_REQUEST["max1"];
        $max2=$_REQUEST["max2"];
        $max3=$_REQUEST["max3"];
        $max4=$_REQUEST["max4"];
        $max5=$_REQUEST["max5"];
        $max6=$_REQUEST["max6"];
        $obj=new yarns();
        $obj->url=$url;
        $obj->name=$name;
        $obj->max1=$max1;
        $obj->max2=$max2;
        $obj->max3=$max3;
        $obj->max4=$max4;
        $obj->max5=$max5;
        $obj->max6=$max6;
        $obj->insert();
        header('location:admin_yarns.php');
        exit;
    break;
    case "save":
        $idyarns=$_REQUEST["idyarns"];
        $url=$_REQUEST["url"];
        $name=$_REQUEST["name"];
        $max1=$_REQUEST["max1"];
        $max2=$_REQUEST["max2"];
        $max3=$_REQUEST["max3"];
        $max4=$_REQUEST["max4"];
        $max5=$_REQUEST["max5"];
        $max6=$_REQUEST["max6"];
        $obj=new yarns($idyarns);
        $obj->url=$url;
        $obj->name=$name;
        $obj->max1=$max1;
        $obj->max2=$max2;
        $obj->max3=$max3;
        $obj->max4=$max4;
        $obj->max5=$max5;
        $obj->max6=$max6;
        $obj->update();
        header('location:admin_yarns.php');
        exit;
    break;
    case "delete":
        $idyarns=$_REQUEST["idyarns"];
        $obj=new yarns($idyarns);
        $obj->delete();
        header('location:admin_yarns.php');
        exit;
    break;
    case "empty":
        $obj=yarns::deleteall();
        header('location:admin_yarns.php');
        exit;
    break;
    case "edit":
        $idyarns=$_REQUEST["idyarns"];
        $obj=new yarns($idyarns);
        $url=$obj->url;
        $name=$obj->name;
        $max1=$obj->max1;
        $max2=$obj->max2;
        $max3=$obj->max3;
        $max4=$obj->max4;
        $max5=$obj->max5;
        $max6=$obj->max6;
        break;
    default:
        break;
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
            
            
        <?php
        switch ($action) {
            case "new":
                echo '        
                            <div class="panel-heading">
                                <h3 class="panel-title"> New yarns</h3>
                            </div>
                            <div class="panel-body">

							<form action="admin_yarns.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="">
							<input type="hidden" name="action" value="add"/>
                                <div class="table-responsive">
                                    <table role="grid" class="tablesorter table table-bordered table-hover table-striped tablesorter-bootstrap hasFilters">

										<tr>
										  <td>url</td>
										  <td>
										  <input name="url" type="text" class="form" value="'.$url.'" >*</td>
										</tr>
										<tr>
										  <td>name</td>
										  <td>
										  <input name="name" type="text" class="form" value="'.$name.'" >*</td>
										</tr>
										<tr>
										  <td>max6</td>
										  <td>
										  <input name="max1" type="text" class="form" value="'.$max1.'" >*</td>
										</tr>
										<tr>
										  <td>max12</td>
										  <td>
										  <input name="max2" type="text" class="form" value="'.$max2.'" >*</td>
										</tr>
										<tr>
										  <td>max18</td>
										  <td>
										  <input name="max3" type="text" class="form" value="'.$max3.'" >*</td>
										</tr>
										<tr>
										  <td>max24</td>
										  <td>
										  <input name="max4" type="text" class="form" value="'.$max4.'" >*</td>
										</tr>
										<tr>
										  <td>max30</td>
										  <td>
										  <input name="max5" type="text" class="form" value="'.$max5.'" >*</td>
										</tr>
										<tr>
										  <td>max36</td>
										  <td>
										  <input name="max6" type="text" class="form" value="'.$max6.'" >*</td>
										</tr>
										<tr>
											<td colspan="2" align="center">
											<input type="submit"  name="guardar" id="guardar" value="Submit" /> <input type="button" id="button4" value="Cancel" onclick="window.location.href=\'admin_yarns.php\'"/>
											</td>
										</tr>
									</table>               
								</div>
							</form>
          
                            </div>
';
                break;
            case "edit":
                echo '        
                            <div class="panel-heading">
                                <h3 class="panel-title"> Edit yarns</h3>
                            </div>
                            <div class="panel-body">

							<form action="admin_yarns.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="">
							<input type="hidden" name="action" value="save"/>
							<input type="hidden" name="idyarns" value="'.$idyarns.'"/>
								<div class="table-responsive">
									<table role="grid" class="tablesorter table table-bordered table-hover table-striped tablesorter-bootstrap hasFilters">

										<tr>
											<td class="desc">url</td>
											<td class="campo">
											<input name="url" type="text" class="form" value="'.$url.'" >*</td>
										</tr>
										<tr>
											<td class="desc">name</td>
											<td class="campo">
											<input name="name" type="text" class="form" value="'.$name.'" >*</td>
										</tr>
										<tr>
											<td class="desc">max1</td>
											<td class="campo">
											<input name="max1" type="text" class="form" value="'.$max1.'" >*</td>
										</tr>
										<tr>
											<td class="desc">max2</td>
											<td class="campo">
											<input name="max2" type="text" class="form" value="'.$max2.'" >*</td>
										</tr>
										<tr>
											<td class="desc">max3</td>
											<td class="campo">
											<input name="max3" type="text" class="form" value="'.$max3.'" >*</td>
										</tr>
										<tr>
											<td class="desc">max4</td>
											<td class="campo">
											<input name="max4" type="text" class="form" value="'.$max4.'" >*</td>
										</tr>
										<tr>
											<td class="desc">max5</td>
											<td class="campo">
											<input name="max5" type="text" class="form" value="'.$max5.'" >*</td>
										</tr>
										<tr>
											<td class="desc">max6</td>
											<td class="campo">
											<input name="max6" type="text" class="form" value="'.$max6.'" >*</td>
										</tr>
										<tr>
											<td colspan="2" class="tabla_botones" align="center">
											<input type="submit"  name="guardar" id="guardar" value="Submit" /> <input type="button" id="button4" value="Cancel" onclick="window.location.href=\'admin_yarns.php\'"/>
											</td>
										</tr>
									</table>               
								</div>
							</form>
							</div>
';
                break;
            default:
                echo '
                            <div class="panel-heading">
                                <h3 class="panel-title">yarns</h3>
                            </div>
                            <div class="panel-body">
									<div class="row">
										<div class="col-md-6 ">&nbsp;
										</div>
										<div class="col-md-6 text-right ">
											<button type="button" class="btn btn-success js-user-create" onclick="window.location.href=\'admin_yarns.php?action=empty\'">
												Delete all yarns
											</button>
											<button type="button" class="btn btn-success js-user-create" onclick="window.location.href=\'admin_yarns.php?action=new\'">
												Create New yarns
											</button>
										</div>
									</div>
									<br/>
                                <div class="table-responsive">

            
								<table role="grid" class="tablesorter table table-bordered table-hover table-striped">


';echo '
								<thead>
									<tr><th class="tabla_titulo" nowrap="nowrap">url</th>
					<th class="tabla_titulo" nowrap="nowrap">name</th>
					<th class="tabla_titulo" nowrap="nowrap">max6</th>
					<th class="tabla_titulo" nowrap="nowrap">max12</th>
					<th class="tabla_titulo" nowrap="nowrap">max18</th>
					<th class="tabla_titulo" nowrap="nowrap">max24</th>
					<th class="tabla_titulo" nowrap="nowrap">max30</th>
					<th class="tabla_titulo" nowrap="nowrap">max36</th>
					<th nowrap="nowrap">Actions</th>
									</tr>
								</thead><tbody aria-relevant="all" aria-live="polite">';
            
                $where="";
                $arr_pag=yarns::selectarray_paginacion($where, 5000);
                        
                $arr_objetos=$arr_pag[0];
                $_pagi_navegacion=$arr_pag[1];
                foreach ($arr_objetos as $obj) {
                    $max1=$obj->max1;
                    $max2=$obj->max2;
                    $max3=$obj->max3;
                    $max4=$obj->max4;
                    $max5=$obj->max5;
                    $max6=$obj->max6;
                    if ($max1==-1) {
                        $max1='-';
                    }
                    if ($max2==-1) {
                        $max2='-';
                    }
                    if ($max3==-1) {
                        $max3='-';
                    }
                    if ($max4==-1) {
                        $max4='-';
                    }
                    if ($max5==-1) {
                        $max5='-';
                    }
                    if ($max6==-1) {
                        $max6='-';
                    }
                    echo '
				
				<tr role="row"><td>'.$obj->url.'</td>
<td>'.$obj->name.'</td>
<td>'.$max6.'</td>
<td>'.$max5.'</td>
<td>'.$max4.'</td>
<td>'.$max3.'</td>
<td>'.$max2.'</td>
<td>'.$max1.'</td>

							<td nowrap="nowrap" width="20">
								<div class="btn-group">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
										Actions
										<span class="caret"></span>
									</button>            
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="admin_yarns.php?action=edit&idyarns='.$obj->idyarns.'">
												Edit
											</a>
										</li>
										<li>
											<a href="admin_yarns.php?action=delete&idyarns='.$obj->idyarns.'">
												Delete
											</a>
										</li>
									</ul>
								</div>
							</td>
		   </tr>
';
                }
                echo '</tbody>
				</table>
			<table border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			   <td height="6"></td>
			</tr>
			<tr>
				<td class="texto">'.$_pagi_navegacion.'</td>
			</tr>
			</table>		   
								</div>
								</div>


';
                break;
        }
        
    ?>
    
            
    
    
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
