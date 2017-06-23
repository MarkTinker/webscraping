<?php
ini_set('display_errors', '1');
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
		$max7=$_REQUEST["max7"];
		$max8=$_REQUEST["max8"];
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
		$max7=$_REQUEST["max7"];
		$max8=$_REQUEST["max8"];
        $obj=new yarns($idyarns);
        $obj->url=$url;
        $obj->name=$name;
        $obj->max1=$max1;
        $obj->max2=$max2;
        $obj->max3=$max3;
        $obj->max4=$max4;
        $obj->max5=$max5;
        $obj->max6=$max6;
		$obj->max7=$max7;
		$obj->max8=$max8;
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
		$max7=$obj->max7;
		$max8=$obj->max8;
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
										  <td>max42</td>
										  <td>
										  <input name="max6" type="text" class="form" value="'.$max7.'" >*</td>
										</tr>
										<tr>
										  <td>max48</td>
										  <td>
										  <input name="max6" type="text" class="form" value="'.$max8.'" >*</td>
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
											<td class="desc">max7</td>
											<td class="campo">
											<input name="max7" type="text" class="form" value="'.$max7.'" >*</td>
										</tr>
										<tr>
											<td class="desc">max8</td>
											<td class="campo">
											<input name="max8" type="text" class="form" value="'.$max8.'" >*</td>
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


';
				
                $where="";
                $arr_pag=yarns::selectarray_paginacion($where, 5000);
                        
                $arr_objetos=$arr_pag[0];
                $_pagi_navegacion=$arr_pag[1];
				$dates=['Monday',' Tuesday','Wednesday', 'Thursday','Friday','Saturday', 'Sunday'];
				
				$ordereddates=[];
				$curdate = $arr_objetos[0]->update_time;
				$curdatekey = array_search($curdate, $dates);
				$temp = 0;
				while ($temp < 8)
				{
					$ordereddates[] = $dates[$curdatekey];
					$curdatekey--;
					if($curdatekey < 0)
					{
						$curdatekey = 6;
					}
					$temp++;					
				}
				$substracts=[];
echo '
								<thead>
									<tr><th class="tabla_titulo" nowrap="nowrap">url</th>
					<th class="tabla_titulo" nowrap="nowrap">name</th>					
					<th class="tabla_titulo" nowrap="nowrap">'.$ordereddates[7].'(Past)</th>
					<th class="tabla_titulo" nowrap="nowrap">'.$ordereddates[6].'</th>
					<th class="tabla_titulo" nowrap="nowrap">'.$ordereddates[5].'</th>
					<th class="tabla_titulo" nowrap="nowrap">'.$ordereddates[4].'</th>
					<th class="tabla_titulo" nowrap="nowrap">'.$ordereddates[3].'</th>
					<th class="tabla_titulo" nowrap="nowrap">'.$ordereddates[2].'</th>
					<th class="tabla_titulo" nowrap="nowrap">'.$ordereddates[1].'</th>
					<th class="tabla_titulo" nowrap="nowrap">'.$ordereddates[0].'(Now)</th>
					<th nowrap="nowrap">Actions</th>
									</tr>
								</thead><tbody aria-relevant="all" aria-live="polite">';

				$cururl = $arr_objetos[0]->url;
				$curmax = [0, 0, 0, 0, 0, 0, 0, 0];
				$totalmax =[0, 0, 0, 0, 0, 0, 0 ,0];
                foreach ($arr_objetos as $key => $obj) {
					
					if($cururl != $obj->url)
					{
						$totalmax[0] += $curmax[0];
						$totalmax[1] += $curmax[1];
						$totalmax[2] += $curmax[2];
						$totalmax[3] += $curmax[3];
						$totalmax[4] += $curmax[4];
						$totalmax[5] += $curmax[5];
						$totalmax[6] += $curmax[6];
						$totalmax[7] += $curmax[7];
						echo '
				
						<tr role="row">
							<td>'.$cururl.'</td>
							<td>'.'_'.'</td>
							<td>'.$curmax[0].'</td>
							<td>'.$curmax[1].'('.($curmax[1]-$curmax[0]).')</td>
							<td>'.$curmax[2].'('.($curmax[2]-$curmax[1]).')</td>
							<td>'.$curmax[3].'('.($curmax[3]-$curmax[2]).')</td>
							<td>'.$curmax[4].'('.($curmax[4]-$curmax[3]).')</td>
							<td>'.$curmax[5].'('.($curmax[5]-$curmax[4]).')</td>
							<td>'.$curmax[6].'('.($curmax[6]-$curmax[5]).')</td>
							<td>'.$curmax[7].'('.($curmax[7]-$curmax[6]).')</td>

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

						$cururl = $obj->url;
						$curmax[0]= 0; 
						$curmax[1]= 0;
						$curmax[2]= 0;
						$curmax[3]= 0;
						$curmax[4]= 0; 
						$curmax[5]= 0; 
						$curmax[6]= 0; 
						$curmax[7]= 0;
					}
                    $max1=$obj->max1;
                    $max2=$obj->max2;
                    $max3=$obj->max3;
                    $max4=$obj->max4;
                    $max5=$obj->max5;
                    $max6=$obj->max6;
					$max7=$obj->max7;
					$max8=$obj->max8;

					

                    if ($max1==-1) {
                        $max1='0';
                    }
                    if ($max2==-1) {
                        $max2='0';
                    }
                    if ($max3==-1) {
                        $max3='0';
                    }
                    if ($max4==-1) {
                        $max4='0';
                    }
                    if ($max5==-1) {
                        $max5='0';
                    }
                    if ($max6==-1) {
                        $max6='0';
                    }
					if ($max7==-1) {
                        $max7='0';
                    }
					if ($max8==-1) {
                        $max8='0';
                    }

					$curmax[0] += $max1;
					$curmax[1] += $max2;
					$curmax[2] += $max3;
					$curmax[3] += $max4;
					$curmax[4] += $max5;
					$curmax[5] += $max6;
					$curmax[6] += $max7;
					$curmax[7] += $max8;
					
                    
                }
				$totalmax[0] += $curmax[0];
				$totalmax[1] += $curmax[1];
				$totalmax[2] += $curmax[2];
				$totalmax[3] += $curmax[3];
				$totalmax[4] += $curmax[4];
				$totalmax[5] += $curmax[5];
				$totalmax[6] += $curmax[6];
				$totalmax[7] += $curmax[7];
				echo '
				
						<tr role="row">
							<td>'.$cururl.'</td>
							<td>'.'_'.'</td>
							<td>'.$curmax[0].'</td>
							<td>'.$curmax[1].'('.($curmax[1]-$curmax[0]).')</td>
							<td>'.$curmax[2].'('.($curmax[2]-$curmax[1]).')</td>
							<td>'.$curmax[3].'('.($curmax[3]-$curmax[2]).')</td>
							<td>'.$curmax[4].'('.($curmax[4]-$curmax[3]).')</td>
							<td>'.$curmax[5].'('.($curmax[5]-$curmax[4]).')</td>
							<td>'.$curmax[6].'('.($curmax[6]-$curmax[5]).')</td>
							<td>'.$curmax[7].'('.($curmax[7]-$curmax[6]).')</td>

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
				echo '<tr role="row">
						<td>Total</td>
						<td>_</td>
						<td>'.$totalmax[0].'</td>
						<td>'.$totalmax[1].'('.($totalmax[1]-$totalmax[0]).')</td>
						<td>'.$totalmax[2].'('.($totalmax[2]-$totalmax[1]).')</td>
						<td>'.$totalmax[3].'('.($totalmax[3]-$totalmax[2]).')</td>
						<td>'.$totalmax[4].'('.($totalmax[4]-$totalmax[3]).')</td>
						<td>'.$totalmax[5].'('.($totalmax[5]-$totalmax[4]).')</td>
						<td>'.$totalmax[6].'('.($totalmax[6]-$totalmax[5]).')</td>
						<td>'.$totalmax[7].'('.($totalmax[7]-$totalmax[6]).')</td>
					</tr>
				';
                echo '</tbody>';
				
				echo '</table>
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
