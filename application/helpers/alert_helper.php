<?php 

	function alert_success($data, $message)
	{
		$CI =& get_instance();
		$alert = $CI->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
	        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
	        <i class="icon fa fa-check"></i>
	        '.$data.' data has been successfully <strong>'.$message.'!</strong>
        </div>');
        return $alert;
	}

	function alert_danger($data, $message)
	{
		$CI =& get_instance();
		$alert = $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
	        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
	        <i class="icon fa fa-check"></i>
	        <strong>Error!</strong> when '.$message.' '.$data.' data. 
        </div>');
        return $alert;
	}

	function alert_error_upload($data)
	{
		$CI =& get_instance();
		$alert = $CI->session->set_flashdata('error_upload', '<div class="alert alert-danger alert-dismissible">
	        <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
	        <i class="icon fa fa-check"></i> '.strip_tags(str_replace('</p>', '', $data)).' </div>');
        return $alert;
	}