<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wifi_in_ap extends CI_Controller {


	function __construct(){
		parent::__construct();


		
		
	}

	function index(){

		
	}

	function sri_lanka(){
		$this->load->view('head');
		$this->load->view('sri_lanka');
		$this->load->view('footer');
	}
	
	function cambodia(){
		$this->load->view('head');
		$this->load->view('cambodia');
		$this->load->view('footer');
	}

	function cis(){
		$this->load->view('head');
		$this->load->view('cis');
		$this->load->view('footer');
	}

	function bangladesh(){
		$this->load->view('head');
		$this->load->view('bangladesh');
		$this->load->view('footer');
	}

	function asean(){
		$this->load->view('head');
		$this->load->view('asean');
		$this->load->view('footer');
	}

	function armenia(){
		$this->load->view('head');
		$this->load->view('armenia');
		$this->load->view('footer');
	}
	
	function andhra_pradesh(){
		$this->load->view('head');
		$this->load->view('andhra_pradesh');
		$this->load->view('footer');
	}
	
	
}
?>