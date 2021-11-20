<section class="content-header">
	<h1><?=$title?>
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a><i class="fa fa-dashboard"></i></a></li>
		<li class="active"><?=$title?></li>
	</ol>
</section>

<section class="content">
	<?php if($this->session->userdata('level') == 1) { ?>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="ion ion-bag"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Items</span>
					<span class="info-box-number"><?=$this->fungsi->count_item()?></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Suppliers</span>
					<span class="info-box-number"><?=$this->fungsi->count_supplier()?></span>
				</div>
			</div>
		</div>

		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Customers</span>
					<span class="info-box-number"><?=$this->fungsi->count_customer()?></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Users</span>
					<span class="info-box-number"><?=$this->fungsi->count_user()?></span>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-header">
					<i class="fa fa-th"></i>
					<h3 class="box-title">Produk Terlaris Bulan Ini</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="hero-bar" class="graph"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/morris.js/morris.css">
<script src="<?=base_url()?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/morris.js/morris.min.js"></script>

<script>
Morris.Bar({
    element: 'hero-bar',
    data: [
		<?php foreach($row as $r => $data) {
			echo "{item: '".$data->name."', sold: ".$data->sold."},";
		} ?>
    ],
    xkey: 'item',
    ykeys: ['sold'],
    labels: ['Sold'],
    barRatio: 0.4,
    xLabelAngle: 35,
    hideHover: 'auto'
});
</script>