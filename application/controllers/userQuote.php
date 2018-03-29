<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class userQuote extends CI_Controller {


	function __construct(){
			parent::__construct();


   		$this->load->database();
   		$this->load->model('topic_model');
		}

  function index(){

   
  echo 'inde page2';
   		
    }



    function insertUserQuote(){
    	 



          $data = array(
'id' => $this->input->post('user_id'),
'quote_text' => $this->input->post('quote_text')
);

 
  $this->topic_model->insert_userquote($data); 
   
    }


  
}
?>