
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
						<li class="is-active"><a href="#">關於我們</a></li>
					</ol>
				</header>
				<div class="about-content">
					<?php echo $userData[0]['content'];?>
				</div>
			</section>
		</div>
		<!-- /.container -->