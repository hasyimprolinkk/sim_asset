    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Penghapusan Asset
        <small>Laporan Penghapusan Asset</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-asset"></i> Laporan Penghapusan Asset</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
		    
    	<div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Tabel Laporan Penghapusan Asset</h3>
	              <div class="pull-right">
					  <a href="<?= base_url('penghapusan/print_all'); ?>" class="btn btn-info btn-flat">
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
		                  <th>Tujuan Penghapusan</th>
		                  <th>Status</th>
						  <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
	                	foreach ($penghapusan as $p) : ?>
		                	<tr>
								<td width="50px"><?= $i++; ?></td>
		                		<td><?= $p['nama_asset']; ?></td>
		                		<td><?= indo_timestamp($p['created_at']); ?></td>
		                		<td><?= $p['nama_user']; ?></td>
		                		<td><?= $p['tujuan_penghapusan']; ?></td>
		                		<td><?= $p['status']; ?></td>
								<td>
									<a href="<?= base_url('penghapusan/print/'. encrypt_url($p['id_penghapusan'])); ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i> print</a>
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