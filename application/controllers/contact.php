<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact extends CI_Controller {


	function __construct(){
		parent::__construct();




	}

	function index(){
$this->load->view('head');
		$this->load->view('contact');
		$this->load->view('footer');

	}



}
?>