
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
					<div class="pro-ttl">NEWS</div>
					<ol class="breadcrumbs">
						<li><a href="#">首頁</a></li>
						<li><a href="<?php echo base_url();?>indexNews">最新消息</a></li>
						<li class="is-active"><a href="#"><?php echo $newsData[0]['title'];?></a></li>
					</ol>
				</header>
				<ul class="news-list">
					<li class="news-list-ttl td">
						<div class="news-label"><?php echo $newsData[0]['title'];?></div>
						<div class="news-date"><?php echo date('Y-m-d', strtotime($newsData[0]['create_dt']));?></div>
					</li>
				</ul>
				<div class="news-content">
					<?php echo $newsData[0]['content'];?>
				</div>
				<div class="btn-back">
					<a onclick="history.go(-1);">回上一頁</a>
				</div>
			</section>
		</div>
		<!-- /.container -->