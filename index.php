
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8"/>
    <title>admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="/static/favicon.ico"
	type="image/x-icon"/>
<link  rel="icon" href="/static/favicon.ico"
 type="image/x-icon">


	<style>
		.main{
			margin-top:60px;
		}
	</style>

  </head>
  <body>
    
<div class="navbar navbar-inverse navbar-fixed-top" role="nagivation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle"
			data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
	 			<span class="icon-bar"></span>
	 			<span class="icon-bar"></span>
	 			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">设备管理</a>	
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav pull-right">
				
	<li><a href='#'>admin</a></li>
	<li><a href='#'>退出</a></li>

			</ul>
		</div>
	</div>
</div>

    
<div class="container-fluid main">
   
        
        <div class="row">
            <div class="col-md-2">
                <ul id="main-nav" class="nav nav-tabs nav-stacked" style="">
                    <li class="active">
                        <a href="#">
                            <i class="glyphicon glyphicon-th-large"></i>
                            首页
                        </a>
                    </li>
                    <li>
                        <a href="#device" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-folder-open"></i>
                            资产分类
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul id="device" class="nav nav-list collapse secondmenu" style="height: 0px;">
                            <li><a href="./devices"><i class="glyphicon glyphicon-hdd"></i>全部资产</a></li>
                            <li><a href="./device"><i class="glyphicon glyphicon-modal-window"></i>设备</a></li>
                            <li><a href="./jiaju"><i class="glyphicon glyphicon-bed"></i>家具</a></li>
                            <li><a href="./dizhi"><i class="glyphicon glyphicon-edit"></i>低值</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#manage" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-credit-card"></i>
                            资产管理
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul id="manage" class="nav nav-list collapse secondmenu" style="height: 0px;">
                            <li><a href="#"><i class="glyphicon glyphicon-yen"></i>增加资产</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i>
                            用户管理
                            <span class="label label-info pull-right">1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-fire"></i>
                            关于系统
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <div>
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span>&nbsp;
                            <a href="#">主页</a>
                        </li>
                        <li class="active"></li>
                    </ol>
                </div>
                
<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
		&times;
	</button>
	欢迎回来！
</div>
<div class="col-md-5 panel panel-info col-md-offset">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="glyphicon glyphicon-apple"></i>
			资产分类
		</div>
	</div>
	<div class="panel-body"><!-- width的百分比从数据库中求出来-->
		<div class="progress progress-striped active">
			<label>设备</label>
			<div class="progress-bar" role="progressbar" aria-valuenow="60%" 
				aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
				<span class="sr-only">40% 完成</span>
			</div>
		</div>
		<div class="progress progress-striped active">
			<label>家具</label>
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60%" 
				aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
				<span class="sr-only">10% 完成</span>
			</div>
		</div>
		<div class="progress progress-striped active">
			<label>低值</label>
			<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60%" 
				aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
				<span class="sr-only">50%</span>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6 panel panel-info col-md-offset-1">
	<div class="panel-heading">
		<div class="panel-title">
			<i class="glyphicon glyphicon-apple"></i>
			资产情况
		</div>
	</div>
	<div class="panel-body">
		<div class="progress progress-striped active">
			<label>有账有物在用</label>
			<div class="progress-bar" role="progressbar" aria-valuenow="60%" 
				aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
				<span class="sr-only">40% 完成</span>
			</div>
		</div>
		<div class="progress progress-striped active">
			<label>有账有物待报废</label>
			<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60%" 
				aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
				<span class="sr-only">10% 完成</span>
			</div>
		</div>

		<div class="progress progress-striped active">
			<label>有账无物待匹配</label>
			<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60%" 
				aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
				<span class="sr-only">50%</span>
			</div>
		</div>

		<div class="progress progress-striped active">
			<label>无状态</label>
			<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60%" 
				aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
				<span class="sr-only">10% 完成</span>
			</div>
		</div>
	</div>
</div>


            </div>
        </div>
    </div>



    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
