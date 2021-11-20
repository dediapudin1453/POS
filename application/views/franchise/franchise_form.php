<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Franchise</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Franshise <?php echo form_error('nama_franshise') ?></label>
            <input type="text" class="form-control" name="nama_franshise" id="nama_franshise" placeholder="Nama Franshise" value="<?php echo $nama_franshise; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota Franchise <?php echo form_error('kota_franchise') ?></label>
            <input type="text" class="form-control" name="kota_franchise" id="kota_franchise" placeholder="Kota Franchise" value="<?php echo $kota_franchise; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tlp Franchise <?php echo form_error('tlp_franchise') ?></label>
            <input type="text" class="form-control" name="tlp_franchise" id="tlp_franchise" placeholder="Tlp Franchise" value="<?php echo $tlp_franchise; ?>" />
        </div>
	    <input type="hidden" name="franshice_id" value="<?php echo $franshice_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('franchise') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>