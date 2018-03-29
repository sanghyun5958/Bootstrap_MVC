<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Materials extends CI_Controller {


	function __construct(){
		parent::__construct();




	}

	function index(){


	}


	function training_module(){
		$this->load->view('head');
		$this->load->view('training_module');
		$this->load->view('footer');
	}


	function mobile_learning(){
		$this->load->view('head');
		$this->load->view('mobile_learning');
		$this->load->view('footer');
	}

		function dica(){
		$this->load->view('head');
		$this->load->view('dica');
		$this->load->view('footer');
	}


}
?>