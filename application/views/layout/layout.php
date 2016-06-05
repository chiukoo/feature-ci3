<!DOCTYPE html>
<html lang="zh-Hant">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $layout['title'];?></title>
        <meta name="title" content="">
        <meta name="description" content="">
        <meta name="keywords" content="" >

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
						<a href="">
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
							<div class="form-btn">
								<a href="">
									<i class="fa fa-search"></i>
								</a>
							</div>
							<input type="search" class="form-input" placeholder="請輸入關鍵字">
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
                <li><a href="<?php echo base_url();?>contact"><?php echo $layout['contact'];?></a></li>
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
	    	<div class="foo-keyman">
	    		<?php echo $layout['keyman'];?>
	    	</div>
	    </footer>
	    <!-- /.footer -->
        <script src="<?php echo base_url();?>assets/js/slider.js"></script>
        <script src="<?php echo base_url();?>assets/js/main.js"></script>
    </body>
</html>