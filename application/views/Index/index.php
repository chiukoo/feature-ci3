

		<div class="slider">
			<ul class="slider-list">
			<?php foreach ($indexData as $data) { ?>
				<li><img class="" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$data['img_url'];?>"></li>
			<?php } ?>
			</ul>
		</div>
		<!-- /.slider -->

		<div class="container">
			<div class="con-group">
				<section class="application">
					<div class="application-ttl">
						<div class="h1">application</div>
						<div class="h2">通風設備適合場所</div>
					</div>
					<div class="application-con">
						<p>任何場所都能適用，特別是容易產生熱氣、廢氣、油煙、粉塵等通風不良之場所，均能改善95%以上，效果顯卓。</p>
						<p>廠房悶熱、粉塵、煙霧、異味，徹底解決!</p>
					</div>
					<ul class="application-list">
						<li>
							<div class="h1">專業</div>
							<div class="h2">PROFESSIONAL</div>
						</li>
						<li>
							<div class="h1">效率</div>
							<div class="h2">EFFICIENCY</div>
						</li>
						<li>
							<div class="h1">品質</div>
							<div class="h2">QUALITY</div>
						</li>
					</ul>
				</section>
				<section class="video">
					<iframe width="400" height="250" src="<?php echo $youtube[0]['youtube']?>" frameborder="0" allowfullscreen></iframe>
				</section>
			</div>
			<div class="bg-gray pt2">
				<div class="con-group bg-white">
					<section class="home-news">
						<div class="news-inner">
							<div class="home-ttl">
								<span class="ch">最新消息</span>
								<span class="en">NEWS</span>
							</div>
							<div class="news-btn">
								<a href="">more</a>
							</div>
							<ul class="news-list">
								<li>
									<a href="" class="td">
										<div class="news-label">測試標題</div>
										<div class="news-date">2016-10-10</div>
									</a>
								</li>
								<li>
									<a href="" class="td">
										<div class="news-label">測試標題</div>
										<div class="news-date">2016-10-09</div>
									</a>
								</li>
								<li>
									<a href="" class="td">
										<div class="news-label">測試標題</div>
										<div class="news-date">2016-10-08</div>
									</a>
								</li>
							</ul>
							<ul class="contact-list">
								<li><img src="<?php echo base_url();?>assets/images/web/icon_qrcode.jpg"></li>
								<li><img src="<?php echo base_url();?>assets/images/web/icon_line.jpg"></li>
								<li><img src="<?php echo base_url();?>assets/images/web/icon_contact.jpg"></li>
							</ul>
						</div>
					</section>
					<section class="home-pro">
						<div class="home-ttl">
							<span class="ch">產品</span>
							<span class="en">PRODUCTS</span>
						</div>
						<ul class="home-pro-list">
						<?php foreach ($s_banner as $banner) { ?>
							<li class="pro-item">
								<a href="#">
									<div class="pro-img">
										<img class="" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$banner['img_url'];?>">
									</div>
									<div class="pro-ttl">
										<div class="h1"><?php echo $banner['title'];?></div>
									</div>
								</a>
							</li>
						<?php } ?>

						</ul>
					</section>
				</div>
			</div>
		</div>
		<!-- /.container -->