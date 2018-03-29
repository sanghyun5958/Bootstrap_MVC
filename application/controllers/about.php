<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About extends CI_Controller {


	function __construct(){
		parent::__construct();




	}

	function index(){
$this->load->view('head');
		$this->load->view('aboutus');
		$this->load->view('footer');

	}


	function aboutus(){
		$this->load->view('head');
		$this->load->view('aboutus');
		$this->load->view('footer');
	}


	function aboutus_2(){
		$this->load->view('head');
		$this->load->view('aboutus_2');
		$this->load->view('footer');
	}

}
?>