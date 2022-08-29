    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Asset
        <small>Asset</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-asset"></i> Asset</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
		    
    	<div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Asset Table</h3>
	              <div class="pull-right">
					  <a href="<?= base_url('asset/addasset'); ?>" class="btn btn-primary btn-flat">
					  	<i class="fa fa-user-plus"> Add asset</i>
					  </a>
				  </div>
	            </div>
					
	            <div class="box-body table-responsive">
	              <table id="example1" class="table table-bordered table-striped">
	              	<thead>
		                <tr>
		                  <th>#</th>
		                  <th>Gambar</th>
		                  <th>Nama Aset</th>
		                  <th>Jenis</th>
		                  <th>Kategori</th>
		                  <th>Nopol</th>
		                  <th>KM Perjalanan</th>
		                  <th>Status</th>
						  <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
	                	foreach ($assets as $u) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><img width="80px" src="<?= base_url('uploads/asset/' . $u['gambar']) ?>" alt=""></td>
		                		<td><?= $u['nama_asset']; ?></td>
		                		<td><?= $u['jenis']; ?></td>
		                		<td><?= $u['kategori']; ?></td>
		                		<td><?= $u['nopol']; ?></td>
		                		<td><?= $u['km']; ?></td>
		                		<td><?= $u['status']; ?></td>
								<td style="width: 160px">
									<a href="<?= base_url('asset/update/'. encrypt_url($u['id_asset'])); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> update</a>
									<a href="<?= base_url('asset/delete/'. encrypt_url($u['id_asset'])); ?>" class="btn btn-danger btn-xs tombol-delete"><i class="fa fa-trash-o"></i> delete</a>
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