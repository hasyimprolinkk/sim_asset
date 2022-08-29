    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pemakaian Asset
        <small>Pemakaian Asset</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-asset"></i> Pemakaian Asset</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    	<div class="flash-andro" data-flash="<?= $this->session->flashdata('message'); ?>"></div>
		    
    	<div class="row"> 		
			<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Tabel Pemakaian Asset</h3>
	              <div class="pull-right">
					  <a href="<?= base_url('pemakaian/addpemakaian'); ?>" class="btn btn-primary btn-flat">
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
		                  <th>Tujuan Pemakaian</th>
		                  <th>Tanggal Pemakaian</th>
		                  <th>Status</th>
						  <th>Opsi</th>
		                </tr>
	                </thead>
	                <tbody>
	                	<?php $i = 1;
	                	foreach ($assets as $u) : ?>
		                	<tr>
		                		<td width="50px"><?= $i++; ?></td>
		                		<td><?= $u['nama_asset']; ?></td>
		                		<td><?= indo_timestamp($u['created_at']); ?></td>
		                		<td><?= $u['nama_user']; ?></td>
		                		<td><?= $u['tujuan_pemakaian']; ?></td>
		                		<td><?= indo_date($u['tanggal_pemakaian']); ?></td>
		                		<td><?= $u['status']; ?></td>
								<td>
									<a href="#<?=encrypt_url($u['id_pemakaian'])?>"
										class="btn btn-default btn-xs"
										id="detail_pemakaian" data-toggle="modal" data-target="#modal-detail"
										data-namaasset="<?= $u['nama_asset'] ?>"
										data-tglinput="<?= indo_timestamp($u['created_at']) ?>"
										data-user="<?= $u['nama_user'] ?>"
										data-tujuan="<?= $u['tujuan_pemakaian'] ?>"
										data-deskripsi="<?= $u['deskripsi'] ?>"
										data-tanggal="<?= indo_date($u['tanggal_pemakaian']) ?>"
										data-status="<?= $u['status'] ?>"
										>
										<i class="fa fa-eye"></i> detail
									</a>
									<?php if ($user['level'] == '1') : ?>
										<?php if ($u['status'] == "Diproses") : ?>
											<a href="<?= base_url('pemakaian/cancel/'. encrypt_url($u['id_pemakaian'])); ?>" class="btn btn-warning btn-xs tombol-cancel"><i class="fa fa-undo"></i> cancel</a>
											<a href="<?= base_url('pemakaian/terima/'. encrypt_url($u['id_pemakaian'])); ?>" class="btn btn-success btn-xs"><i class="fa fa-success"></i> terima</a>
										<?php elseif($u['status'] == "Disetujui") : ?>
											<a href="<?= base_url('pemakaian/kembali/'. encrypt_url($u['id_pemakaian'])); ?>" class="btn btn-warning btn-xs"><i class="fa fa-undo"></i> kembalikan</a>
										<?php endif;  ?>
									<a href="<?= base_url('pemakaian/delete/'. encrypt_url($u['id_pemakaian'])); ?>" class="btn btn-danger btn-xs tombol-delete"><i class="fa fa-trash-o"></i> delete</a>
									<?php endif; ?>
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

	<div class="modal fade" id="modal-detail">
    	<div class="modal-dialog modal-md">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    				<h4 class="modal-title">Detail Pemakaian</h4>
    			</div>
    			<div class="modal-body table-responsive">
    				<table class="table table-bordered table-striped">
    					<tbody>
    						<tr>
    							<th>Nama Asset</th>
    							<td><span id="namaasset"></span></td>
    						</tr>
    						<tr>
    							<th>Tangal Input</th>
    							<td><span id="tglinput"></span></td>
    						</tr>
    						<tr>
    							<th>Penginput</th>
    							<td><span id="user"></span></td>
    						</tr>
    						<tr>
    							<th>Tujuan Pemakaian</th>
    							<td><span id="tujuan"></span></td>
    						</tr>
    						<tr>
    							<th>Deskripsi</th>
    							<td><span id="deskripsi"></span></td>
    						</tr>
							<tr>
    							<th>Tanggal Pemakaian</th>
    							<td><span id="tanggal"></span></td>
    						</tr>
							<tr>
    							<th>Status</th>
    							<td><span id="status"></span></td>
    						</tr>
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>

    <script>
    	$(document).ready(function() {
    		$(document).on('click', '#detail_pemakaian', function() {
    			let namaasset = $(this).data('namaasset')
    			let tglinput = $(this).data('tglinput')
    			let user = $(this).data('user')
    			let tujuan = $(this).data('tujuan')
    			let jumlah = $(this).data('jumlah')
    			let deskripsi = $(this).data('deskripsi')
    			let tanggal = $(this).data('tanggal')
    			let status = $(this).data('status')

    			$('#namaasset').text(namaasset)
    			$('#tglinput').text(tglinput)
    			$('#user').text(user)
    			$('#tujuan').text(tujuan)
    			$('#jumlah').text(jumlah)
    			$('#deskripsi').text(deskripsi)
    			$('#tanggal').text(tanggal)
    			$('#status').text(status)
    		})
    	})
    </script>