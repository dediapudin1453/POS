<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Franchise List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Franshise</th>
		<th>Kota Franchise</th>
		<th>Tlp Franchise</th>
		
            </tr><?php
            foreach ($franchise_data as $franchise)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $franchise->nama_franshise ?></td>
		      <td><?php echo $franchise->kota_franchise ?></td>
		      <td><?php echo $franchise->tlp_franchise ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>