<section class="content-header">
    <h1><?=ucwords($title)?>
        <small>Pemasok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active"><?=ucwords($title)?></li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Suppliers</h3>
            <div class="pull-right">
                <a href="<?=site_url('supplier/add')?>" class="btn btn-flat btn-primary">
                    <i class="fa fa-plus"></i> Add Supplier
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row as $r => $data) { ?>
                        <tr>
                            <td width="35px"><?=$no++?>.</td>
                            <td><?=$data->name?></td>
                            <td><?=$data->address?></td>
                            <td><?=$data->phone?></td>
                            <td><?=$data->description?></td>
                            <td class="text-center" width="160px">
                                <a href="<?=site_url('supplier/edit/'.$data->supplier_id)?>" class="btn btn-xs btn-primary">
                                    <i class="fa fa-pencil"></i> Update
                                </a>
                                <a href="<?=site_url('supplier/del/'.$data->supplier_id)?>" onclick="return confirm('Apakah Anda yakin?')"  class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>