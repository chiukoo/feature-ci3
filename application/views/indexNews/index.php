
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
			<section class="news-main">
				<header class="pro-header">
					<div class="pro-ttl">OVERVIEW</div>
					<ol class="breadcrumbs">
						<li><a href="<?php echo base_url();?>">首頁</a></li>
						<li class="is-active"><a href="#">最新消息</a></li>
					</ol>
				</header>
				<ul class="news-list">
					<li class="news-list-ttl td">
						<div class="news-label">標題</div>
						<div class="news-date">日期</div>
					</li>
					<?php foreach ($newsData as $data) { ?>
					<li>
						<a href="indexNews/details/id/<?php echo $data['id'];?>" class="td">
							<div class="news-label"><?php echo $data['title'];?></div>
							<div class="news-date"><?php echo date('Y-m-d', strtotime($data['create_dt']));?></div>
						</a>
					</li>
					<?php } ?>
				</ul>
			</section>
		</div>
		<!-- /.container -->