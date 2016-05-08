<div class="page-title">
	
	<div class="title-env">
		<h1 class="title"><?php echo $account['main_title'];?></h1>
	</div>
	
	<div class="breadcrumb-env">
		
		<ol class="breadcrumb bc-1">
			<li>
				<a href="index"><i class="fa-home"></i><?php echo $account['nav_index'];?></a>
			</li>
			<li class="active">
				<strong><?php echo $account['main_title'];?></strong>
			</li>
		</ol>
					
	</div>
		
</div>

<!-- Removing search and results count filter -->
<div class="panel panel-default">
	<div class="panel-body">
		<div style="text-align: right;">
			<a href="accountAdd"><button class="btn btn-white"><?php echo $account['account_add'];?></button></a>
		</div>
		<table class="table table-bordered table-striped" id="dataList">
			<thead>
				<tr>
					<th class="no-sorting">
						<input type="checkbox" class="cbr">
					</th>
					<th><?php echo $account['table_list_name']; ?></th>
					<th><?php echo $account['table_list_create_dt']; ?></th>
					<th><?php echo $account['table_list_actions']; ?></th>
				</tr>
			</thead>
			
			<tbody class="middle-align">
				<?php foreach ($account_data as $value) {?>
					<tr>
						<td>
							<input type="checkbox" class="cbr">
						</td>
						<td><?php echo $value['username'];?></td>
						<td><?php echo $value['create_dt'];?></td>
						<td>
							<a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
								Edit
							</a>
							
							<a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
								Delete
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		
	</div>
</div>

<!--data list-->				
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$("#dataList").dataTable({
			dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
			aoColumns: [
				{bSortable: false},
				null,
				null,
				null,
			],
		});
		
		// Replace checkboxes when they appear
		var $state = $("#dataList thead input[type='checkbox']");
		
		$("#dataList").on('draw.dt', function()
		{
			cbr_replace();
			
			$state.trigger('change');
		});
		
		// Script to select all checkboxes
		$state.on('change', function(ev)
		{
			var $chcks = $("#dataList tbody input[type='checkbox']");
			
			if($state.is(':checked'))
			{
				$chcks.prop('checked', true).trigger('change');
			}
			else
			{
				$chcks.prop('checked', false).trigger('change');
			}
		});
	});
</script>