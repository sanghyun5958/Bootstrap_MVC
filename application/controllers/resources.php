<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resources extends CI_Controller {


	function __construct(){
		parent::__construct();




	}

	function index(){


	}


	function ict_skills(){
		$this->load->view('head');
		$this->load->view('ict_skills');
		$this->load->view('footer');
	}


	function business_skills(){
		$this->load->view('head');
		$this->load->view('business_skills');
		$this->load->view('footer');
	}

	function financial_literacy_skills(){
		$this->load->view('head');
		$this->load->view('financial_literacy_skills');
		$this->load->view('footer');
	}

	function case_study(){
		$this->load->view('head');
		$this->load->view('case_study');
		$this->load->view('footer');
	}


}
?>