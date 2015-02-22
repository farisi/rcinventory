<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{title}</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo mytheme("css"); ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo mytheme("css"); ?>bootstrap-glyphicons.css">
    <link rel="stylesheet" href="<?php echo mytheme("css"); ?>select2.css" />
    <link rel="stylesheet" href="<?php echo mytheme("css"); ?>unicorn.main.css">
    <link rel="stylesheet" href="<?php echo mytheme("css"); ?>unicorn.grey.css" class="skin-color">
    <style>
        tr td.angka {
            text-align: right;
        }
    </style>
    
    <script src="<?php echo mytheme("js"); ?>excanvas.min.js" type="text/javascript"></script>
    <script id="loader" src="<?php echo mytheme("js"); ?>jquery.min.js" type="text/javascript"></script>
    <script id="loader" src="<?php echo mytheme("js"); ?>jquery-ui.custom.js" type="text/javascript"></script>
    <script id="loader" src="<?php echo mytheme("js"); ?>bootstrap.min.js" type="text/javascript"></script>
    
    <!-- <script id="loader" src="<?php //echo mytheme("js"); ?>jquery.flot.min.js" type="text/javascript"></script>
    <script id="loader" src="<?php //echo mytheme("js"); ?>jquery.flot.resize.min.js" type="text/javascript"></script> -->
    <script id="loader" src="<?php echo mytheme("js"); ?>jquery.sparkline.min.js" type="text/javascript"></script>
    <script id="loader" src="<?php echo mytheme("js"); ?>jquery.jpanelmenu.min.js" type="text/javascript"></script>
    <script id="loader" src="<?php echo mytheme("js"); ?>unicorn.js" type="text/javascript"></script>    
    <script id="loader" src="<?php echo mytheme("js"); ?>jquery.validate.js" type="text/javascript"></script>
  <body> 
  <div id="header">
			<h1><a href="./dashboard.html">Human Resource Department</a></h1>	
			<a id="menu-trigger" href="#"><i class="glyphicon glyphicon-align-justify"></i></a>	
		</div>
		
		<div id="search">
			<input type="text" placeholder="Search here..."/><button type="submit" class="tip-right" title="Search"><i class="glyphicon glyphicon-search"></i></button>
		</div>
		<div id="user-nav">
            <ul class="btn-group">
                <li class="btn" ><a title="" href="{base_url}index.php/pegawai/profile?pegawaiid={profile}"><i class="glyphicon glyphicon-user"></i> <span class="text">Profile</span></a></li>
                <li class="btn dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="glyphicon glyphicon-envelope"></i> <span class="text">Messages</span> <span class="label label-danger">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">new message</a></li>
                        <li><a class="sInbox" title="" href="#">inbox</a></li>
                        <li><a class="sOutbox" title="" href="#">outbox</a></li>
                        <li><a class="sTrash" title="" href="#">trash</a></li>
                    </ul>
                </li>
                <li class="btn"><a title="" href="#"><i class="glyphicon glyphicon-cog"></i> <span class="text">Settings</span></a></li>
                <li class="btn"><a title="" href="{base_url}index.php/user/logout"><i class="glyphicon glyphicon-share-alt"></i> <span class="text">Logout</span></a></li>
            </ul>
        </div>
            
		<div id="sidebar">
			<!--<a href="#" class="hide"><i class="glyphicon glyphicon-home"></i> Dashboard</a>-->
			<ul>
				<li class="active"><a href="index.html"><i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a></li>
				<li class="submenu">
					<a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Form elements</span> <span class="label">3</span></a>
					<ul>
						<li><a href="form-common.html">Common elements</a></li>
						<li><a href="form-validation.html">Validation</a></li>
						<li><a href="form-wizard.html">Wizard</a></li>
					</ul>
				</li>
				<li><a href="buttons.html"><i class="glyphicon glyphicon-tint"></i> <span>Buttons &amp; icons</span></a></li>
				<li><a href="interface.html"><i class="glyphicon glyphicon-pencil"></i> <span>Interface elements</span></a></li>
				<li><a href="tables.html"><i class="glyphicon glyphicon-th"></i> <span>Tables</span></a></li>
				<li><a href="grid.html"><i class="glyphicon glyphicon-th-list"></i> <span>Grid Layout</span></a></li>
				<li class="submenu">
					<a href="#"><i class="glyphicon glyphicon-file"></i> <span>Sample pages</span> <span class="label">4</span></a>
					<ul>
						<li><a href="invoice.html">Invoice</a></li>
						<li><a href="chat.html">Support chat</a></li>
						<li><a href="calendar.html">Calendar</a></li>
						<li><a href="gallery.html">Gallery</a></li>
					</ul>
				</li>
				<li>
					<a href="charts.html"><i class="glyphicon glyphicon-signal"></i> <span>Charts &amp; graphs</span></a>
				</li>
				<li>
					<a href="widgets.html"><i class="glyphicon glyphicon-inbox"></i> <span>Widgets</span></a>
				</li>
			</ul>
		
		</div>
		
		<div id="style-switcher">
			<i class="glyphicon glyphicon-arrow-left"></i>
			<span>Style:</span>
			<a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
            <a href="#light-blue" style="background-color: #8399b0;"></a>
			<a href="#blue" style="background-color: #2D2F57;"></a>
			<a href="#red" style="background-color: #673232;"></a>
            <a href="#red-green" style="background-image: url('<?php echo mytheme("img"); ?>/demo/red-green.png');background-repeat: no-repeat;"></a>
		</div>
		
		<div id="content">
			<div id="content-header">
				<h1>{class}</h1>
				<div class="btn-group">
					<a class="btn"><i class="glyphicon glyphicon-file"></i></a>
					<a class="btn" title="Manage Users"><i class="glyphicon glyphicon-user"></i></a>
					<a class="btn"><i class="glyphicon glyphicon-comment"></i><span class="label label-danger">5</span></a>
					<a class="btn"><i class="glyphicon glyphicon-shopping-cart"></i></a>
				</div>
			</div>
                        <div id="breadcrumb">
				<a href="{base_url}index.php" title="Go to Home" class="tip-bottom"><i class="glyphicon glyphicon-home"></i> Home</a>
				<a href="{base_url}index.php/{class}/index" {cclass}>{show_class}</a>
                                {amethod}
			</div>
			<div class="container-fluid">
			{maincontent}
                        </div>

		</div>
		<div class="row">
			<div id="footer" class="col-12">
				2012 - 2013 &copy; Unicorn Admin. Brought to you by <a href="https://wrapbootstrap.com/user/diablo9983">diablo9983</a>
			</div>
		</div>
    
  </body>
</html>


