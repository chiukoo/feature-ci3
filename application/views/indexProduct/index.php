
		<div class="container">
			<aside class="pro-slider">
				<h2 class="pro-slider-ttl"><img src="<?php echo base_url();?>assets/images/web/pro-ttl.jpg" alt=""></h2>
				<nav class="pro-slider-nav">
					<ul class="list-ul">
						<?php foreach ($typeData as $type) { ?>
							<li><a href="<?php echo base_url();?>indexProduct/productList/project/<?php echo $project;?>/type/<?php echo $type['id'];?>"><?php echo $type['title'];?></a></li>
						<?php } ?>
					</ul>
				</nav>
			</aside>
			<section class="pro-overview">
				<header class="pro-header">
					<div class="pro-ttl">OVERVIEW</div>
					<ol class="breadcrumbs">
						<li><a href="<?php echo base_url();?>">首頁</a></li>
						<li class="is-active"><a href="#"><?php echo $projectName;?></a></li>
					</ol>
				</header>
				<div class="pro-list">
					<ul>
						<?php foreach ($typeData as $type) { ?>
							<li class="pro-item">
								<a href="<?php echo base_url();?>indexProduct/productList/project/<?php echo $project;?>/type/<?php echo $type['id'];?>">
									<div class="pro-img">
										<img class="" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$type['img_url'];?>">
									</div>
									<div class="pro-ttl">產品分類1</div>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<!-- <nav class="pagination">
					<ul>
						<li class="is-acitve"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
					</ul>
				</nav> -->
			</section>
		</div>
		<!-- /.container -->