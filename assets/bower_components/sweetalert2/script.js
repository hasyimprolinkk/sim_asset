const flash = $('.flash-andro').data('flash');

if (flash) {
	Swal({
		title: 'Sukses ' + flash,
		text: 'Data berhasil ' + flash,
		type: 'success'
	});
}

$('.tombol-delete').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal({
		title: 'Apakah anda yakin?',
		text: 'Ingin menghapus data tersebut?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: 'd33',
		confirmButtonText: 'delete'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

$('.tombol-cancel').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal({
		title: 'Apakah anda yakin?',
		text: 'Ingin membatalkan data tersebut?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: 'd33',
		confirmButtonText: 'Ya'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

$('.tombol-setuju').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal({
		title: 'Apakah anda yakin?',
		text: 'Ingin setujui data tersebut?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: 'd33',
		confirmButtonText: 'Ya'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

$('.tombol-tolak').on('click', function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal({
		title: 'Apakah anda yakin?',
		text: 'Ingin menolak data tersebut?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: 'd33',
		confirmButtonText: 'Ya'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});