<?php
session_start();
if(!isset($_SESSION['username'])){
 echo "<script>alert('未登录');window.location.href='index.html';</script>";
}
$num = $_GET['num'] ?  $_GET['num']:100;
$page = $_GET['page'] ? $_GET['page']:1;
$search = $_GET['search'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title> admin </title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<!-- Bootstrap -->
		<link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="/static/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
		<link href="/static/favicon.ico" rel="icon" type="image/x-icon">
		<style>.main {
	margin-top: 60px;
}</style>
		</link>
		</link>
		</meta>
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="nagivation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
					<span class="sr-only"> Toggle navigation </span>
					<span class="icon-bar"> </span>
					<span class="icon-bar"> </span>
					<span class="icon-bar"> </span>
					</button>
					<a class="navbar-brand" href="#">
						设备管理
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav pull-right">
						<li>
							<a href="#">
								admin
							</a>
						</li>
						<li>
						<li>
							<a href="index.html">
								退出
							</a>

						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container-fluid main">
			<div class="row">
				<div class="col-md-2">
					<ul class="nav nav-tabs nav-stacked" id="main-nav" style="">
						<li class="active">
							<a href="#">
								<i class="glyphicon glyphicon-th-large"> </i>
								首页
							</a>
						</li>
						<li>
							<a class="nav-header collapsed" data-toggle="collapse" href="#device">
								<i class="glyphicon glyphicon-folder-open"> </i>
								资产分类
								<span class="pull-right glyphicon glyphicon-chevron-down"> </span>
							</a>
							<ul class="nav nav-list collapse secondmenu" id="device" style="height: 0px;">
								<li>
									<a href="all.php">
										<i class="glyphicon glyphicon-hdd"> </i>
										全部资产
									</a>
								</li>
								<li>
									<a href="./shebei.php">
										<i class="glyphicon glyphicon-modal-window"> </i>
										设备
									</a>
								</li>
								<li>
									<a href="./jiaju.php">
										<i class="glyphicon glyphicon-bed"> </i>
										家具
									</a>
								</li>
								<li>
									<a href="./dizhi.php">
										<i class="glyphicon glyphicon-edit"> </i>
										低值
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a class="nav-header collapsed" data-toggle="collapse" href="#manage">
								<i class="glyphicon glyphicon-credit-card"> </i>
								资产管理
								<span class="pull-right glyphicon glyphicon-chevron-down"> </span>
							</a>
							<ul class="nav nav-list collapse secondmenu" id="manage" style="height: 0px;">
								<li>
									<a href="add.php">
										<i class="glyphicon glyphicon-yen"> </i>
										增加资产
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">
								<i class="glyphicon glyphicon-user"> </i>
								用户管理
								<span class="label label-info pull-right"> 1 </span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="glyphicon glyphicon-fire"> </i>
								关于系统
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-10">
					<div>
						<ol class="breadcrumb">
							<li>
								<span class="glyphicon glyphicon-home"> </span>
								<a href="guanli.php">
									主页
								</a>
							</li>
							<li class="active"></li>
						</ol>
					</div>
					<!--操作失败-->
					<div class="alert alert-danger alert-dismissable fade in">
						<button aria-hidden="true" class="close" data-dismiss="alert" type="button">
						×
						</button>
						操作失败
					</div>
					<!--操作成功-->
					<div class="alert alert-success alert-dismissable fade in">
						<button aria-hidden="true" class="close" data-dismiss="alert" type="button">
						×
						</button>
						操作成功
					</div>
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="panel-title">
								全部资产
							</div>
						</div>
						<div class="panel-body">
							<label> 显示
							<select class="select input-sm" id="select" onchange="window.location.href='./all.php?num='+this.value"  >
								<option value="100" <?php if($num==100) echo "selected";?>> 100 </option>
								<option value="200" <?php if($num==200) echo "selected";?> > 200 </option>
								<option value="300"  <?php if($num==300) echo "selected";?>> 300 </option>
                              <option value="500" <?php if($num==500) echo "selected";?>> 500 </option>					            
                              </select>条 </label>
							<form class="form-inline pull-right">
								<div class="form-group">
                                  <a href="daochu.php">
									导出
                                  </a>                             
                                 <label for="search"> 搜索资产名称 </label>
									<input class="input-sm form-control" id="search" type="search" name="search" />
								</div>
							</form>
							<table class="table ">
								<thead>
									<tr>
                                      <th width="50px">ID</th>
                                          <th>资产分类 </th>
										<th> 资产编号 </th>
										<th> 资产名称 </th>
										<th> 资产状态 </th>
										<th width="350px"> 查看详情 </th>
									</tr>
								</thead>
								<?php 
								$conn = new mysqli('localhost','gzgl','gzgl','gzgl');
    if ($conn->connect_error){
        echo '数据库连接失败！';
        exit(0);
    }else{  
if(!$search){ 	
    $sql = "select * from 有账有物";
    $result = $conn->query($sql); 	
	$arr = mysqli_fetch_all($result);
    $sql1 = "select count(*) from 有账有物";
	$result1 = mysqli_query($conn,$sql1);
	$rows = mysqli_fetch_row($result1);
	$rowcount = $rows[0];  
	$pages = $rowcount/$num+1;
	?>
								
								
								<tbody>
								<?php
								for($i=($page-1)*$num;$i<($page)*$num;$i++)
								
								{
									?>
                                  	<td><?php echo $arr[$i][0]; ?> </td>
									<td><?php echo $arr[$i][1]; ?></td>
									<td><?php echo $arr[$i][3]; ?> </td>
									<td><?php echo $arr[$i][4]; ?></td>
									<td><?php echo $arr[$i][18]; ?></td>
									<td>
										<div class="row">
											<div class="col-md-3">
												<button class="btn btn-primary btn-sm" data-target="#primary" data-toggle="modal" id="test" title=<?php echo $arr[$i][0];?> type="button">
												查看详情
												</button>
												<div aria-labelledby="ModalLabel" class="modal fade" id="primary" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button aria-label="Close" class="close" data-dismiss="modal" type="button">
																<span aria-hidden="true"> × </span>
																</button>
																<h4 class="modal-title text-center" id="ModalLabel"> 详细情况 </h4>
															</div>
															<div class="modal-body">
																<!--td中的值从数据库中导出-->
																<table class="table table-border table-bordered table-bg table-hover" id="aTable">
																	<tr>
																		<th width="200"> ID </th>
                                                                      <td width="80%">1</td>
																	</tr>
                                                                  <tr>
																		<th width="200"> 资产类型 </th>
																		<td width="80%"> 2 </td>
																	</tr>
																	<tr>
																		<th width="200"> 科室实验室 </th>
																		<td width="80%"> 3 </td>
																	</tr>
																	<tr>
																		<th width="200"> 资产编号 </th>
																		<td width="80%"></td>
																	</tr>
																	<tr>
																		<th width="200"> 资产名称 </th>
																		<td width="80%">  </td>
																	</tr>
																	<tr>
																		<th width="200"> 型号 </th>
																		<td width="80%">  </td>
																	</tr>
																	<tr>
																		<th width="200"> 规格 </th>
																		<td width="80%"> </td>
																	</tr>
																	<tr>
																		<th width="200"> 单价 </th>
																		<td width="80%"> </td>
																	</tr>
																	<tr>
																		<th width="200"> 单台附件总额 </th>
																		<td width="80%">  </td>
																	</tr>
																	<tr>
																		<th width="200"> 附件数量 </th>
																		<td width="80%">  </td>
																	</tr>
																	<tr>
																		<th width="200"> 数量 </th>
																		<td width="80%"></td>
																	</tr>
																	<tr>
																		<th width="200"> 计量单位 </th>
																		<td width="80%"></td>
																	</tr>
																	<tr>
																		<th width="200"> 总金额 </th>
																		<td width="80%">  </td>
																	</tr>
																	<tr>
																		<th width="200"> 购置日期 </th>
																		<td width="80%"></td>
																	</tr>
																	<tr>
																		<th width="200"> 生产厂家 </th>
																		<td width="80%">  </td>
																	</tr>
																	<tr>
																		<th width="200"> 存放地 </th>
																		<td width="80%"></td>
																	</tr>
																	<tr>
																		<th width="200"> 保管人 </th>
																		<td width="80%">  </td>
																	</tr>
																	<tr>
																		<th width="200"> 保管人_新 </th>
																		<td width="80%"> </td>
																	</tr>
																	<tr>
																		<th width="200"> 资产状况 </th>
																		<td width="80%"> </td>
																	</tr>
																	<tr>
																		<th width="200"> 存放地点_新 </th>
																		<td width="80%">  </td>
																	</tr>
																	<tr>
																		<th width="200"> 已匹配 </th>
																		<td width="80%"></td>
																	</tr>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<button class="btn btn-warning btn-sm" data-target="#edit" data-toggle="modal" id="upd" title=<?php echo $arr[$i][0];?> type="button">
												修改数据
												</button>
												<div aria-labelledby="myModalLabel" class="modal fade" id="edit" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button aria-label="Close" class="close" data-dismiss="modal" type="button">
																<span aria-hidden="true"> × </span>
																</button>
																<h4 class="modal-title text-center" id="ModalLabel"> 修改数据 </h4>
															</div>
															<form action="xiugai.php" class="form center-block" method="post" role="form">
																<div class="modal-body">
																	<!--td中的值从数据库中导出-->
																	<table class="table table-border table-bordered table-bg table-hover">
																		<tr>
																		<th width="200"> ID </th>
                                                                          <td width="80%"> <span id="iis"><?php echo $arr[$i][0]; ?></span> </td>
																	</tr>
                                                                      <tr>
																			<th width="200"> 资产类型 </th>
																			<td>
																				<input class="input-sm form-control" id="test1" name="test1" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 科室实验室 </th>
																			<td>
																				<input class="input-sm form-control" id="test2" name="test2" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 资产编号 </th>
																			<td>
																				<input class="input-sm form-control" id="test3" name="test3" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 资产名称 </th>
																			<td>
																				<input class="input-sm form-control" id="test4" name="test4" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 型号 </th>
																			<td>
																				<input class="input-sm form-control" id="test5" name="test5" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 规格 </th>
																			<td>
																				<input class="input-sm form-control" id="test6" name="test6" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 单价 </th>
																			<td>
																				<input class="input-sm form-control" id="test7" name="test7" type="text" value=/>
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 单台附件总额 </th>
																			<td>
																				<input class="input-sm form-control" id="test8" name="test8" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 附件数量 </th>
																			<td>
																				<input class="input-sm form-control" id="test9" name="test9" type="text" value=/>
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 数量 </th>
																			<td>
																				<input class="input-sm form-control" id="test10" name="test10" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 计量单位 </th>
																			<td>
																				<input class="input-sm form-control" id="test11" name="test11" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 总金额 </th>
																			<td>
																				<input class="input-sm form-control" id="test12" name="test12" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 购置日期 </th>
																			<td>
																				<input class="input-sm form-control" id="test13" name="test13" type="text" value=/>
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 生产厂家 </th>
																			<td>
																				<input class="input-sm form-control" id="test14" name="test14" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 存放地 </th>
																			<td>
																				<input class="input-sm form-control" id="test15" name="test15" type="text" value=/>
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 保管人 </th>
																			<td>
																				<input class="input-sm form-control" id="test16" name="test16" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 保管人_新 </th>
																			<td>
																				<input class="input-sm form-control" id="test17" name="test17" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 资产状况 </th>
																			<td>
																				<input class="input-sm form-control" id="test18" name="test18" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 存放地点_新 </th>
																			<td>
																				<input class="input-sm form-control" id="test19" name="test19" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 已匹配 </th>
																			<td>
																				<input class="input-sm form-control" id="test20" name="test20" type="text" value= />
																			</td>
																		</tr>
																	</table>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-default" data-dismiss="modal" type="button">
																	取消
																	</button>
																	<button class="btn btn-primary" type="submit">
																	保存更改
																	</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<button class="btn btn-danger btn-sm" data-target="#delete" data-toggle="modal" id="upd" title=<?php echo $arr[$i][0];?> type="button">
												删除数据
												</button>
												<div aria-labelledby="myModalLabel" class="modal fade" id="delete" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button aria-label="Close" class="close" data-dismiss="modal" type="button">
																<span aria-hidden="true"> × </span>
																</button>
																<h4 class="modal-title text-info" id="ModalLabel"> 提示信息 </h4>
															</div>
															<div class="modal-body text-danger">
																<h3> 确认删除? </h3>
															</div>
															<div class="modal-footer">
																<button class="btn btn-default" data-dismiss="modal" type="button">
																取消
																</button>
																<button class="btn btn-primary" onclick="window.location.href='delect.php';" type="button">
																确认
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div></td>
									</tr>
								</tbody>
<?php } ?>
							</table>
							<!--简单分页-->
							<nav aria-label="Page navigation" >
								<ul class="pagination pull-right">
									<li>
										<a aria-label="Previous" href="all.php?page=1&num=<?php echo $num;?>">
											<span aria-hidden="true"> « </span>
										</a>
									</li>
                                  
                                  <?php  
                          
		for($j=$page;$j<=$page+9;$j++){
                                    ?>
									<li>                                    
										<a href="all.php?page=<?php echo $j; ?>&num=<?php echo $num;?>">
											<?php echo $j; ?>
										</a>                                      
									</li>
                                  <?php  }  ?>
                                  <li>
										<a aria-label="Next" href="all.php?page=<?php echo intval($pages); ?>&num=<?php echo $num;?>">
											<span aria-hidden="true"> » </span>
										</a>
									</li>
								</ul>
							</nav>
		<?php  }else{
			 	
    $sql = "select * from 有账有物 where 资产名称 = '$search' ";
    $result = $conn->query($sql); 	
	$arr = mysqli_fetch_all($result);
    $sql1 = "select count(*) from 有账有物 where 资产名称 = '$search' ";
	$result1 = mysqli_query($conn,$sql1);
	$rows = mysqli_fetch_row($result1);
	$rowcount = $rows[0];  
	$pages = $rowcount/$num+1;
	?>
								
								
								<tbody>
								<?php
								for($i=($page-1)*$num;$i<($page)*$num;$i++)
								
								{
									?>
                                  <tr>
                                  	<td><?php echo $arr[$i][0]; ?> </td>
									<td><?php echo $arr[$i][1]; ?></td>
									<td><?php echo $arr[$i][3]; ?> </td>
									<td><?php echo $arr[$i][4]; ?></td>
									<td><?php echo $arr[$i][18]; ?></td>
									<td>
										<div class="row">
											<div class="col-md-3">
												<button class="btn btn-primary btn-sm" data-target="#primary" data-toggle="modal" type="button" id="test">
												查看详情
												</button>
						
											</div>
											<div class="col-md-3">
												<button class="btn btn-warning btn-sm" data-target="#edit" id="upd" title=<?php echo $arr[$i][0]?> data-toggle="modal" type="button">
												修改数据
												</button>
												<div aria-labelledby="myModalLabel" class="modal fade" id="edit" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button aria-label="Close" class="close" data-dismiss="modal" type="button">
																<span aria-hidden="true"> × </span>
																</button>
																<h4 class="modal-title text-center" id="ModalLabel"> 修改数据 </h4>
															</div>
															<form action="xiugai.php" class="form center-block" method="post" role="form">
																<div class="modal-body">
																	<!--td中的值从数据库中导出-->
																	<table class="table table-border table-bordered table-bg table-hover">
																		<tr>
																		<th width="200"> ID </th>
                                                                          <td width="80%" ><input class="input-sm" id="iis" type="text" disabled value=""></p></td>
																	</tr>
                                                                      <tr>
																			<th width="200"> 资产类型 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test1" type="text" value= />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 科室实验室 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test2" type="text" value=<?php echo $arr[$i][2]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 资产编号 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test3" type="text" value=<?php echo $arr[$i][3]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 资产名称 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test4" type="text" value=<?php echo $arr[$i][4]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 型号 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test5" type="text" value=<?php echo $arr[$i][5]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 规格 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test6" type="text" value=<?php echo $arr[$i][6]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 单价 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test7" type="text" value=<?php echo $arr[$i][7]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 单台附件总额 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test8" type="text" value=<?php echo $arr[$i][8]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 附件数量 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test9" type="text" value=<?php echo $arr[$i][9]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 数量 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test10" type="text" value=<?php echo $arr[$i][10]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 计量单位 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test11" type="text" value=<?php echo $arr[$i][11]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 总金额 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test12" type="text" value=<?php echo $arr[$i][12]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 购置日期 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test13" type="text" value=<?php echo $arr[$i][13]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 生产厂家 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test14" type="text" value=<?php echo $arr[$i][14]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 存放地 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test15" type="text" value=<?php echo $arr[$i][15]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 保管人 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test16" type="text" value=<?php echo $arr[$i][16]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 保管人_新 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test17" type="text" value=<?php echo $arr[$i][17]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 资产状况 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test18" type="text" value=<?php echo $arr[$i][18]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 存放地点_新 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test19" type="text" value=<?php echo $arr[$i][19]; ?> />
																			</td>
																		</tr>
																		<tr>
																			<th width="200"> 已匹配 </th>
																			<td>
																				<input class="input-sm form-control" id="test" name="test20" type="text" value=<?php echo $arr[$i][20]; ?> />
																			</td>
																		</tr>
																	</table>
																</div>
																<div class="modal-footer">
																	<button class="btn btn-default" data-dismiss="modal" type="button">
																	取消
																	</button>
																	<button class="btn btn-primary" type="submit">
																	保存更改
																	</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3">
												<button class="btn btn-danger btn-sm" data-target="#delete" data-toggle="modal" type="button">
												删除数据
												</button>
												<div aria-labelledby="myModalLabel" class="modal fade" id="delete" role="dialog" tabindex="-1">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button aria-label="Close" class="close" data-dismiss="modal" type="button">
																<span aria-hidden="true"> × </span>
																</button>
																<h4 class="modal-title text-info" id="ModalLabel"> 提示信息 </h4>
															</div>
															<div class="modal-body text-danger">
																<h3> 确认删除? </h3>
															</div>
															<div class="modal-footer">
																<button class="btn btn-default" data-dismiss="modal" type="button">
																取消
																</button>
																<button class="btn btn-primary" onclick="window.location.href='delect.php';" type="button">
																确认
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div></td>
                				  </tr>
             				 	<?php } ?>
								</tbody>

							</table>
							<!--简单分页-->
							<nav aria-label="Page navigation" >
								<ul class="pagination pull-right">
									<li>
										<a aria-label="Previous" href="all.php?page=1&num=<?php echo $num;?>">
											<span aria-hidden="true"> « </span>
										</a>
									</li>
                                  
                                  <?php  
                          
		for($j=$page;$j<=$page+9;$j++){
                                    ?>
									<li>                                    
										<a href="all.php?page=<?php echo $j; ?>&num=<?php echo $num;?>">
											<?php echo $j; ?>
										</a>                                      
									</li>
		<?php  }  ?>
									<li>
										<a aria-label="Next" href="all.php?page=<?php echo intval($pages); ?>&num=<?php echo $num;?>">
											<span aria-hidden="true"> » </span>
										</a>
									</li>
								</ul>
							</nav>
                  <?php } }?>
							<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js">
							</script>
							<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js">
							</script>
							<script>
                              	$(document).on('click','#test',function(){
                                	$.ajax({
                                      url:"2.php",
                                      data:{
                                        action:"upd",
                                        id:$(this).attr('title')
                                      },
                                      dataType:"json",
                                      success:function(data){
                                      	alert($('#aTable td').text())
                                      }
                                    })
                                })
                              
                              
								$(document).on('click','#upd',function () {
                                	$.ajax({
										url:"2.php",
										data:{
											action:"upd",
											id:$(this).attr('title')
										},
										dataType:"json",
										success:function(data){
                                          	$('#iis').text(data[0][0])
											$('input[name=test1]').val(data[0][1])
                                          	$('#test2').val(data[0][2])
                                          	$('#test3').val(data[0][3])
                                          	$('#test4').val(data[0][4])
                                          	$('#test5').val(data[0][5])
                                          	$('#test6').val(data[0][6])
                                          	$('#test7').val(data[0][7])
                                          	$('#test8').val(data[0][8])
                                          	$('#test9').val(data[0][9])
                                          	$('#test10').val(data[0][10])
                                          	$('#test11').val(data[0][11])
                                          	$('#test12').val(data[0][12])
                                          	$('#test13').val(data[0][13])
                                          	$('#test14').val(data[0][14])
                                          	$('#test15').val(data[0][15])
                                          	$('#test16').val(data[0][16])
                                          	$('#test17').val(data[0][17])
                                          	$('#test18').val(data[0][18])
                                         	 $('#test19').val(data[0][19])
                                         	 $('#test20').val(data[0][20])
                                            
                      
										}
									})
								})
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
