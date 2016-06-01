		<div class="container">
			<aside class="pro-slider">
				<h2 class="pro-slider-ttl"><img src="<?php echo base_url();?>assets/images/web/pro-ttl.jpg" alt=""></h2>
				<nav class="pro-slider-nav">
					<ul class="list-ul">
						<?php foreach ($typeData as $data) { ?>
							<li><a href="<?php echo base_url();?>indexProduct/productList/project/<?php echo $project;?>/type/<?php echo $data['id'];?>"><?php echo $data['title'];?></a></li>
						<?php } ?>
					</ul>
				</nav>
			</aside>
			<section class="pro-overview">
				<header class="pro-header">
					<div class="pro-ttl">PRODUCT</div>
					<ol class="breadcrumbs">
						<li><a href="<?php echo base_url();?>">首頁</a></li>
						<li><a href="<?php echo base_url();?>indexProduct/index/project/<?php echo $project;?>"><?php echo $projectName;?></a></li>
						<li class="is-active"><a href="<?php echo base_url();?>indexProduct/productList/project/<?php echo $project;?>/type/<?php echo $type;?>"><?php echo $typeName;?></a></li>
						<li class="is-active"><a href="#"><?php echo $detailsData[0]['title'];?></a></li>
					</ol>
				</header>
				<div class="pro-dtl">
					<div class="pro-ttl"><?php echo $detailsData[0]['title'];?></div>
					<div class="pro-dtl-inner">
						<div class="pro-img">
							<img class="" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$detailsData[0]['img_url'];?>">
						</div>
						<div class="pro-description">
							<?php echo $detailsData[0]['content_sample'];?>
						</div>
					</div>
					<div class="pro-descriptions">
						<?php echo $detailsData[0]['content_details'];?>
					</div>
					<div class="btn-back">
						<a onclick="history.go(-1);">回上一頁</a>
					</div>
				</div>
			</section>
		</div>
		<!-- /.container -->