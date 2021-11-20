<section class="content-header">
    <h1><?=ucwords($title)?>
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
		<li><a><i class="fa fa-dashboard"></i></a></li>
		<li><a>Products</a></li>
        <li class="active"><?=ucwords($title)?></li>
    </ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?=ucfirst($page)?> Item</h3>
			<div class="pull-right">
				<a href="<?=site_url('item')?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php echo form_open_multipart('item/process') ?>
						<div class="form-group">
							<label for="barcode">Barcode *</label>
							<input type="hidden" name="id" value="<?=$row->item_id?>">
							<input type="text" name="barcode" id="barcode" value="<?=$row->barcode?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="name">Product Name *</label>
							<input type="text" name="name" id="name" value="<?=$row->name?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="category">Category *</label>
							<?php
							echo form_dropdown('category', $category, $selectedcategory, ['class' => 'form-control', 'id' => 'category', 'required' => 'required']);
							?>
						</div>
						<div class="form-group">
							<label for="unit">Unit *</label>
							<?php
							echo form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'id' => 'unit', 'required' => 'required']);
							?>
						</div>
						<div class="form-group">
							<label for="price">Price *</label>
							<input type="number" name="price" id="price" value="<?=$row->price?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="image">Upload</label>
							<?php if ($page == 'edit') {
								if ($row->image != null) { ?>
									<div>
										 <img src="<?php echo base_url('uploads/products/'.$row->image) ?>" style="width: 100px;">
									</div>
								<?php
								}
							} ?>
							<input type="file" name="image" id="image"  class="form-control">
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="<?=$page?>" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Save</button> 
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>



