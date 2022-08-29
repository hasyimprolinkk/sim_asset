    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Pengadaan Asset
        <small>Laporan Pengadaan Asset</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-asset"></i> Laporan Pengadaan Asset</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
		    
    	<div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Tabel Laporan Pengadaan Asset</h3>
	              <div class="pull-right">
					  <a href="<?= base_url('pengadaan/print_all'); ?>" class="btn btn-info btn-flat">
					  	<i class="fa fa-print"> Print All</i>
					  </a>
				  </div>
	            </div>
					
	            <div class="box-body table-responsive">
	              <table id="example1" class="table table-bordered table-striped">
	              	<thead>
		                <tr>
						<th>#</th>
		                  <th>Nama Asset</th>
		                  <th>Tanggal Input</th>
		                  <th>Penginput</th>
		                  <th>Jumlah Pengadaan</th>
		                  <th>Tujuan Pengadaan</th>
		                  <th>Total Harga</th>
		                  <th>Status</th>
						  <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
	                	foreach ($pengadaan as $p) : ?>
		                	<tr>
							<td width="50px"><?= $i++; ?></td>
		                		<td><?= $p['nama_asset']; ?></td>
		                		<td><?= indo_timestamp($p['created_at']); ?></td>
		                		<td><?= $p['nama_user']; ?></td>
		                		<td><?= $p['jumlah']; ?></td>
		                		<td><?= $p['tujuan_pengadaan']; ?></td>
		                		<td><?= $p['total_harga']; ?></td>
		                		<td><?= $p['status']; ?></td>
								<td>
									<a href="<?= base_url('pengadaan/print/'. encrypt_url($p['id_pengadaan'])); ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i> print</a>
								</td>
		                	</tr>
		                <?php endforeach; ?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.box-body -->
	        </div>
	  <!-- /.box -->
		</div>

    </section>
    <!-- /.content -->