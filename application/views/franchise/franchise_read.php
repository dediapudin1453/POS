<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Franchise Detail</h3>
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
        <table class="table">
	    <tr><td>Nama Franshise</td><td><?php echo $nama_franshise; ?></td></tr>
	    <tr><td>Kota Franchise</td><td><?php echo $kota_franchise; ?></td></tr>
	    <tr><td>Tlp Franchise</td><td><?php echo $tlp_franchise; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('franchise') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>