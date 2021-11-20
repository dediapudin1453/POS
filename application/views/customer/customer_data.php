<section class="content-header">
    <h1><?=ucwords($title)?>
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active"><?=ucwords($title)?></li>
    </ol>
</section>

<section class="content">
    <!-- <div class="row">
        <div class="col-lg-12"> -->
            <div class="box">

                <div class="box-header">
                   <div class="row" style="margin-bottom: 10px">
                        <div class="col-xs-12 col-md-4">
                            <?php echo anchor(site_url('customer/add'), '<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div style="margin-top: 4px"  id="message">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4 text-right">
                            <?php echo anchor(site_url('franchise/printdoc'), '<i class="fa fa-print"></i> Print Preview', 'class="btn bg-maroon"'); ?>
                            <?php echo anchor(site_url('franchise/excel'), '<i class="fa fa-file-excel"></i> Excel', 'class="btn btn-success"'); ?>
                            <?php echo anchor(site_url('franchise/word'), '<i class="fa fa-file-word"></i> Word', 'class="btn btn-primary"'); ?>
                    
                        </div>
                      </div>
                </div>
                <div class="box-body table-responsive">
                    <table id="table1"  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width=""></th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Actions</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row as $r => $data) { ?>
                                <tr>
                                    <td  style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id" value="<?= $data->customer_id?>" />&nbsp;</td>
                                    <td width="35px"><?=$no++?>.</td>
                                    <td><?=$data->name?></td>
                                    <td><?=$data->gender?></td>
                                    <td><?=$data->phone?></td>
                                    <td><?=$data->address?></td>
                                    <td class="text-center" width="160px">
                                        <a href="<?=site_url('customer/edit/'.$data->customer_id)?>" class="btn btn-xs btn-primary">
                                            <i class="fa fa-search"></i> 
                                        </a>
                                        <a href="<?=site_url('customer/edit/'.$data->customer_id)?>" class="btn btn-xs btn-warning">
                                            <i class="fa fa-pencil"></i> 
                                        </a>
                                        <a href="<?=site_url('customer/del/'.$data->customer_id)?>" onclick="return confirm('Apakah Anda yakin?')"  class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash"></i> 
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data Terpilih</button> <a href="#" class="btn bg-yellow">Total Record : </a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div>
    </div> -->
</section>