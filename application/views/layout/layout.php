<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $layout['title'];?></title>
        <meta name="title" content="">
		<meta NAME="description" CONTENT="鼎津節能通風｜04-23126982｜抽風機、排風扇、排風機、冷風機、工業用風扇、工業風扇、散熱風扇、抽風扇、通風設備、水冷扇，在多國取得多項專利、行銷世界各地，今年公司響應全球節能減碳新推出DC無刷馬達可節能40(抽風機,排風扇,排風機,冷風機,工業用風扇,工業風扇,散熱風扇,抽風扇,通風設備,水冷扇)以多葉直接式負壓風機，取代傳統皮帶式風機，更獲得好評(抽風機,排風扇,排風機,冷風機,工業用風扇,工業風扇,散熱風扇,抽風扇,通風設備,水冷扇)。">
		<meta NAME="keywords" CONTENT="抽風機,排風扇,排風機,冷風機,工業用風扇,工業風扇,散熱風扇,抽風扇,通風設備,水冷扇">
        <link rel="icon" href="./images/favicon.ico" type="image/x-icon" >
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

        <link href="https://fonts.googleapis.com/css?family=Hammersmith+One" rel="tylesheet"
        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"><\/script>')</script>

        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
		<!--layout-->
		<div class="wrapper <?php echo $outClass;?>">
				<header class="header">
			<div class="header-bar">
				<div class="header-inner">
					<div class="btn-facebook">
						<a href="https://www.facebook.com/aircomfy.tw/" target="_blank">
							<img src="<?php echo base_url();?>assets/images/web/fb.png">
						</a>
					</div>
				</div>
			</div>
			<div class="header-group">
				<div class="logo">
					<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/web/logo.png" title=""></a>
				</div>
				<div class="search">
					<div class="form">
						<div class="form-group">
							<form id="searchForm" role="form" class="validate" method="post" action="<?php echo base_url('indexProduct/search'); ?>">
							<div class="form-btn">
								<a href="#">
									<i class="fa fa-search"></i>
								</a>
							</div>
								<input type="search" name="search" class="form-input" placeholder="請輸入關鍵字">
								<input type="hidden" name="<?php echo $layoutToken;?>" value="<?php echo $layoutHash;?>" />
							</form>
						</div>
					</div>
				</div>
				<div class="header-btn">
					<a href="#" id="btn-nav" class="fa fa-bars" aria-hidden="true"></a>
				</div>
			</div>
		</header>
		<!-- /.header -->
		<nav id="nav" class="nav">
            <ul class="nav-menu">
                <li class="<?php if ($outClass == 'index') { echo 'is-active'; };?>"><a href="<?php echo base_url();?>"><?php echo $layout['index'];?></a></li>
                <li class="<?php if ($outClass == 'about') { echo 'is-active'; };?>"><a href="<?php echo base_url();?>about"><?php echo $layout['about'];?></a></li>
                <?php foreach($layoutProject as $projects) { ?>
                	<?php if ($projects['title'] == '產品介紹') {?>
	                <li class="<?php if ($layoutProjectId == $projects['id']) {echo 'is-active';}?>">
	                    <a href="<?php echo base_url();?>indexProduct/index/project/<?php echo $projects['id'];?>"><?php echo $projects['title'];?></a>
	                    <div class="subNav">
	                        <ul>
	                        	<?php foreach($layoutType as $types) { ?>
	                        		<?php if ($projects['id'] == $types['project']) { ?>
	                            		<li><a href="<?php echo base_url();?>indexProduct/productList/project/<?php echo $projects['id'];?>/type/<?php echo $types['id'];?>"><?php echo $types['title'];?></a></li>
	                            	<?php } ?>
	                            <?php } ?>
	                        </ul>
	                    </div>
	                </li>
                	<?php } ?>
                <?php } ?>
                <li class="<?php if ($outClass == 'news') { echo 'is-active'; };?>"><a href="<?php echo base_url();?>indexNews"><?php echo $layout['news'];?></a></li>
                <?php foreach($layoutProject as $projects) { ?>
                	<?php if ($projects['title'] != '產品介紹') {?>
	                <li class="<?php if ($layoutProjectId == $projects['id']) {echo 'is-active';}?>">
	                    <a href="<?php echo base_url();?>indexProduct/index/project/<?php echo $projects['id'];?>"><?php echo $projects['title'];?></a>
	                    <div class="subNav">
	                        <ul>
	                        	<?php foreach($layoutType as $types) { ?>
	                        		<?php if ($projects['id'] == $types['project']) { ?>
	                            		<li><a href="<?php echo base_url();?>indexProduct/productList/project/<?php echo $projects['id'];?>/type/<?php echo $types['id'];?>"><?php echo $types['title'];?></a></li>
	                            	<?php } ?>
	                            <?php } ?>
	                        </ul>
	                    </div>
	                </li>
                	<?php } ?>
                <?php } ?>
                <li class="<?php if ($outClass == 'contact') { echo 'is-active'; };?>"><a href="<?php echo base_url();?>contact"><?php echo $layout['contact'];?></a></li>
            </ul>
        </nav>
        <!-- /.nav -->
        
		<?php if ($outClass != 'contact') { ?>
		<div class="slider">
			<ul class="slider-list">
			<?php foreach ($indexData as $data) { ?>
				<li><img class="" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$data['img_url'];?>"></li>
			<?php } ?>
			</ul>
		</div>
		<!-- /.slider -->
		<?php } ?>

		<?php echo $content;?>
		</div>

		<section class="location bg-gray">
			<div class="location-inner">
				<div class="home-ttl">
					<span class="ch"><?php echo $layout['location']?></span>
					<span class="en">LOCATION</span>
				</div>
				<ul class="location-list">
					<li>
						<div class="location-ttl">
							<span class="text-base"><?php echo $layout['tai'];?></span><?php echo $layout['mid'];?>
						</div>
						<ol>
							<li class="addr"><?php echo $layout['address'];?></li>
							<li class="tel"><?php echo $layout['tel'];?></li>
							<li class="fax"><?php echo $layout['fax'];?></li>
							<li class="mail"><?php echo $layout['mail'];?></li>
							<li class="user"><?php echo $layout['user'];?></li>
							<li class="tel-free"><?php echo $layout['tel5'];?></li>
						</ol>
					</li>
					<li>
						<div class="location-ttl">
							<span class="text-base"><?php echo $layout['new'];?></span><?php echo $layout['north'];?>
						</div>
						<ol>
							<li class="addr"><?php echo $layout['address2']?></li>
							<li class="tel"><?php echo $layout['tel2']?></li>
						</ol>
					</li>
					<li>
						<div class="location-ttl">
							<span class="text-base"><?php echo $layout['tao'];?></span><?php echo $layout['un'];?>
						</div>
						<ol>
							<li class="addr"><?php echo $layout['address3'];?></li>
							<li class="tel"><?php echo $layout['tel3'];?></li>
						</ol>
					</li>
					<li>
						<div class="location-ttl">
							<span class="text-base"><?php echo $layout['tai'];?></span><?php echo $layout['south'];?>
						</div>
						<ol>
							<li class="addr"><?php echo $layout['address4'];?></li>
							<li class="tel">06-3580073</li>
						</ol>
					</li>
					<li>
						<div class="location-ttl">
							<span class="text-base"><?php echo $layout['kao'];?></span><?php echo $layout['shiung'];?>
						</div>
						<ol>
							<li class="addr"><?php echo $layout['address5'];?></li>
							<li class="tel"><?php echo $layout['tel4'];?></li>
						</ol>
					</li>
				</ul>
			</div>
		</section>
		<footer class="footer">
	    	<div class="foo-content">
	    		<nav class="foo-nav">
					<ul class="foo-nav-menu">
		              	<li class="is-active"><a href="<?php echo base_url();?>"><?php echo $layout['index'];?></a></li>
		                <li><a href="<?php echo base_url();?>about"><?php echo $layout['about'];?></a></li>
		                <?php foreach($layoutProject as $projects) { ?>
		                	<?php if ($projects['title'] == '產品介紹') {?>
			                <li>
			                    <a href="<?php echo base_url();?>indexProduct/index/project/<?php echo $projects['id'];?>"><?php echo $projects['title'];?></a>
			                </li>
		                	<?php } ?>
		                <?php } ?>
		                <li><a href="<?php echo base_url();?>indexNews"><?php echo $layout['news'];?></a></li>
		                <?php foreach($layoutProject as $projects) { ?>
		                	<?php if ($projects['title'] != '產品介紹') {?>
			                <li>
			                    <a href="<?php echo base_url();?>indexProduct/index/project/<?php echo $projects['id'];?>"><?php echo $projects['title'];?></a>
			                </li>
		                	<?php } ?>
		                <?php } ?>
		                <li><a href="<?php echo base_url();?>contact"><?php echo $layout['contact'];?></a></li>
					</ul>
				</nav>
				<div class="copyright">
					Copyright © <a href="www.aircomfy.com">aircomfy.com</a> all right  reserved.
				</div>
	    	</div>
			<div style="display:none;"><em><a title="抽風機" href="http://www.aircomfy.com">抽風機</a></em></div>
			<div style="display:none;"><em><a title="排風扇" href="http://www.aircomfy.com">排風扇</a></em></div>
			<div style="display:none;"><em><a title="排風機" href="http://www.aircomfy.com">排風機</a></em></div>
			<div style="display:none;"><em><a title="冷風機" href="http://www.aircomfy.com">冷風機</a></em></div>
			<div style="display:none;"><em><a title="工業用風扇" href="http://www.aircomfy.com">工業用風扇</a></em></div>
			<div style="display:none;"><em><a title="工業風扇" href="http://www.aircomfy.com">工業風扇</a></em></div>
			<div style="display:none;"><em><a title="散熱風扇" href="http://www.aircomfy.com">散熱風扇</a></em></div>
			<div style="display:none;"><em><a title="抽風扇" href="http://www.aircomfy.com">抽風扇</a></em></div>
			<div style="display:none;"><em><a title="通風設備" href="http://www.aircomfy.com">通風設備</a></em></div>
			<div style="display:none;"><em><a title="水冷扇" href="http://www.aircomfy.com">水冷扇</a></em></div>
			<div style="display:none;"><strong><a title="抽風機" href="http://www.aircomfy.com">抽風機</a></strong></div>
			<div style="display:none;"><strong><a title="排風扇" href="http://www.aircomfy.com">排風扇</a></strong></div>
			<div style="display:none;"><strong><a title="排風機" href="http://www.aircomfy.com">排風機</a></strong></div>
			<div style="display:none;"><strong><a title="冷風機" href="http://www.aircomfy.com">冷風機</a></strong></div>
			<div style="display:none;"><strong><a title="工業用風扇" href="http://www.aircomfy.com">工業用風扇</a></strong></div>
			<div style="display:none;"><strong><a title="工業風扇" href="http://www.aircomfy.com">工業風扇</a></strong></div>
			<div style="display:none;"><strong><a title="散熱風扇" href="http://www.aircomfy.com">散熱風扇</a></strong></div>
			<div style="display:none;"><strong><a title="抽風扇" href="http://www.aircomfy.com">抽風扇</a></strong></div>
			<div style="display:none;"><strong><a title="通風設備" href="http://www.aircomfy.com">通風設備</a></strong></div>
			<div style="display:none;"><strong><a title="水冷扇" href="http://www.aircomfy.com">水冷扇</a></strong></div>
	    	<div class="foo-keyman">
	    		<center><table align="center" border="0" align="center" cellpadding="1" cellspacing="1" style="width: 90%;" summary="鼎津節能通風｜04-23126982｜抽風機、排風扇、排風機、冷風機、工業用風扇、工業風扇、散熱風扇、抽風扇、通風設備、水冷扇，在多國取得多項專利、行銷世界各地，今年公司響應全球節能減碳新推出DC無刷馬達可節能40(抽風機,排風扇,排風機,冷風機,工業用風扇,工業風扇,散熱風扇,抽風扇,通風設備,水冷扇)以多葉直接式負壓風機，取代傳統皮帶式風機，更獲得好評(抽風機,排風扇,排風機,冷風機,工業用風扇,工業風扇,散熱風扇,抽風扇,通風設備,水冷扇)。"><tbody><tr><td><samp style="display:inline; font-size:small; color:#5f5f5f;">鼎津節能通風｜04-23126982｜</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="抽風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">抽風機</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="排風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">排風扇</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="排風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">排風機</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="冷風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">冷風機</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="工業用風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">工業用風扇</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="工業風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">工業風扇</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="散熱風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">散熱風扇</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="抽風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">抽風扇</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="通風設備" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">通風設備</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">、</samp><h1 style="display:inline; font-size:small; color:#5f5f5f;"><a title="水冷扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">水冷扇</a></h1><samp style="display:inline; font-size:small; color:#5f5f5f;">，</samp><samp style="display:inline; font-size:small; color:#5f5f5f;">在多國取得多項專利、行銷世界各地，今年公司響應全球節能減碳新推出DC無刷馬達可節能40</samp><samp style="display:inline; font-size:small; color:#5f5f5f;"><samp style="display:inline; font-size:small; color:#5f5f5f;">(</samp></samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="抽風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">抽風機</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="排風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">排風扇</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="排風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">排風機</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="冷風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">冷風機</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="工業用風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">工業用風扇</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="工業風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">工業風扇</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="散熱風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">散熱風扇</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="抽風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">抽風扇</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="通風設備" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">通風設備</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h2 style="display:inline; font-size:small; color:#5f5f5f;"><strong><a title="水冷扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">水冷扇</a></strong></h2><samp style="display:inline; font-size:small; color:#5f5f5f;">)</samp><samp style="display:inline; font-size:small; color:#5f5f5f;">以多葉直接式負壓風機，取代傳統皮帶式風機，更獲得好評</samp><samp style="display:inline; font-size:small; color:#5f5f5f;">(</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="抽風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">抽風機</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="排風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">排風扇</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="排風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">排風機</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="冷風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">冷風機</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="工業用風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">工業用風扇</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="工業風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">工業風扇</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="散熱風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">散熱風扇</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="抽風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">抽風扇</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="通風設備" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">通風設備</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">,</samp><h3 style="display:inline; font-size:small; color:#5f5f5f;"><em><a title="水冷扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;">水冷扇</a></em></h3><samp style="display:inline; font-size:small; color:#5f5f5f;">)。</samp><p style="text-align: center;"><a title="抽風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="抽風機"></a><a title="排風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="排風扇"></a><a title="排風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="排風機"></a><a title="冷風機" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="冷風機"></a><a title="工業用風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="工業用風扇"></a><a title="工業風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="工業風扇"></a><a title="散熱風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="散熱風扇"></a><a title="抽風扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="抽風扇"></a><a title="通風設備" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"><img alt="通風設備"></a><a title="水冷扇" href="http://www.aircomfy.com" style="color:#5f5f5f;text-decoration: none;"></a></td></tr></tbody></table></center>
	    	</div>
	    </footer>

	    <!-- /.footer -->
        <script src="<?php echo base_url();?>assets/js/slider.js"></script>
        <script src="<?php echo base_url();?>assets/js/main.js"></script>
    </body>
</html>
<script>
$(".fa-search").click(function(e) {
	e.stopPropagation();
	$('#searchForm').submit();
});
</script>