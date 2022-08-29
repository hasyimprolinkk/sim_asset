    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengelolaan Asset
        <small>Pengelolaan Asset</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-asset"></i> Pengelolaan Asset</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
		    
    	<div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Tabel Pengelolaan Asset</h3>
	              <div class="pull-right">
					  <a href="<?= base_url('pengelolaan/addpengelolaan'); ?>" class="btn btn-primary btn-flat">
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
		                  <th>Tujuan Pengelolaan</th>
		                  <th>Status</th>
						  <?php if ($user['level'] == '1') : ?>
						  <th>Opsi</th>
						  <?php endif; ?>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
	                	foreach ($pengelolaan as $p) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><?= $p['nama_asset']; ?></td>
		                		<td><?= indo_timestamp($p['created_at']); ?></td>
		                		<td><?= $p['nama_user']; ?></td>
		                		<td><?= $p['tujuan_pengelolaan']; ?></td>
		                		<td><?= $p['status']; ?></td>
								<?php if ($user['level'] == '1') : ?>
								<td>
									<?php if ($p['status'] == "Diproses") : ?>
										<a href="<?= base_url('pengelolaan/cancel/'. encrypt_url($p['id_pengelolaan'])); ?>" class="btn btn-warning btn-xs tombol-cancel"><i class="fa fa-undo"></i> cancel</a>
										<a href="<?= base_url('pengelolaan/terima/'. encrypt_url($p['id_pengelolaan'])); ?>" class="btn btn-success btn-xs"><i class="fa fa-success"></i> terima</a>
									<?php endif;  ?>
									<a href="<?= base_url('pengelolaan/delete/'. encrypt_url($p['id_pengelolaan'])); ?>" class="btn btn-danger btn-xs tombol-delete"><i class="fa fa-trash-o"></i> delete</a>
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