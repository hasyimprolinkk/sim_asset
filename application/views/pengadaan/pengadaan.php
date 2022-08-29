    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengadaan Asset
        <small>Pengadaan Asset</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-asset"></i> Pengadaan Asset</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
		    
    	<div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Tabel Pengadaan Asset</h3>
	              <div class="pull-right">
					  <a href="<?= base_url('pengadaan/addpengadaan'); ?>" class="btn btn-primary btn-flat">
					  	<i class="fa fa-user-plus"> Tambah Data</i>
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
						  <?php if ($user['level'] == '1') : ?>
						  <th>Opsi</th>
						  <?php endif; ?>
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
								<?php if ($user['level'] == '1') : ?>
								<td>
									<?php if ($p['status'] == "Belum diproses") : ?>
									<a href="<?= base_url('pengadaan/status/'. encrypt_url($p['id_pengadaan']) . '/disetujui'); ?>" class="btn btn-success btn-xs tombol-setuju"><i class="fa fa-undo"></i> setujui</a>
									<a href="<?= base_url('pengadaan/status/'. encrypt_url($p['id_pengadaan']) . '/ditolak'); ?>" class="btn btn-warning btn-xs tombol-tolak"><i class="fa fa-undo"></i> tolak</a>
									<?php endif;  ?>
									<a href="<?= base_url('pengadaan/delete/'. encrypt_url($p['id_pengadaan'])); ?>" class="btn btn-danger btn-xs tombol-delete"><i class="fa fa-trash-o"></i> delete</a>
								</td>
								<?php endif; ?>
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