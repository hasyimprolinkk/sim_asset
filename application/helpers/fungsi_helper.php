<?php 

	function rupiah($number)
	{
		$convert = "Rp. " . number_format($number, 2, ',', '.');
		return $convert;
	}

	function indo_date($date)
	{
		$timestamp = strtotime($date);
		return date('d F Y', $timestamp);
	}

	function indo_timestamp($time)
	{
		$xplde = explode(' ', $time);
		$time = strtotime($xplde[0]);
		$date = date('d F Y', $time);
		return $date . ' ' . $xplde[1];
	}

	function pdfGenerator($html, $filename)
	{
		$dompdf = new Dompdf\Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->set_option('isRemoteEnabled', true);
		$dompdf->render();
		$dompdf->stream($filename, array('Attachment' => false));
	}

	function generateBarcode()
	{
		$CI      = & get_instance();
		$CI->db->order_by('barcode', 'DESC');
		$data    = $CI->db->get('tb_product_item', 1)->row();
		$barcode = $data->barcode;
		return ++$barcode . PHP_EOL;
	}

	function encrypt_url($value)
	{
		$output         = false;
		$security       = parse_ini_file("security.ini");
		$secret_key     = $security["encryption_key"];
		$secret_iv      = $security["iv"];
		$encrypt_method = $security["encryption_mechanism"];

		$key    = hash("sha256", $secret_key);
		$iv     = substr(hash("sha256", $secret_iv), 0, 16);
		$result = openssl_encrypt($value, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($result);
		return $output;
	}

	function decrypt_url($value)
	{
		$output         = false;
		$security       = parse_ini_file("security.ini");
		$secret_key     = $security["encryption_key"];
		$secret_iv      = $security["iv"];
		$encrypt_method = $security["encryption_mechanism"];

		$key    = hash("sha256", $secret_key);
		$iv     = substr(hash("sha256", $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($value), $encrypt_method, $key, 0, $iv);
		return $output;
	}