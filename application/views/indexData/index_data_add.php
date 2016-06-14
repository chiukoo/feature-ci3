<div class="page-title">
	<div class="title-env">
		<h1 class="title"><?php echo $lang['main_title'];?></h1>
	</div>
	<div class="breadcrumb-env">
		<ol class="breadcrumb bc-1">
			<li>
				<a href="<?php echo base_url('admin/accountList'); ?>"><i class="fa-home"></i><?php echo $lang['nav_index'];?></a>
			</li>
			<li class="active">
				<strong><?php echo $lang['main_title'];?></strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form role="form" class="validate" method="post" action="<?php echo base_url('indexData/indexDataAddPost'); ?>">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" ><?php echo $lang['title']?></label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="imgUrl" name="img_url" placeholder="<?php echo $lang['title'];?>" readonly="readonly"/>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-success btn-sm" onclick="BrowseServer('imgUrl');"><?php echo $lang['select_img'];?></button>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" ></label>
							<div class="col-sm-10">
								<?php echo $lang['img_size']; ?>
							</div>
						</div>
						<div class="form-group-separator"></div>
					</div>
					<div class="form-group col-sm-offset-2">
						<button type="submit" class="btn btn-success"><?php echo $lang['add_submit'];?></button>
						<button type="reset" onclick="history.go(-1)" class="btn btn-white"><?php echo $lang['add_reset'];?></button>
					</div>
					<input type="hidden" name="<?php echo $token;?>" value="<?php echo $hash;?>" />
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Imported scripts on this page -->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>