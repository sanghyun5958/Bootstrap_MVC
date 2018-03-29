<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {


	function __construct(){
			parent::__construct();


   		
       
		}

    function index(){

   $this->load->view('head');
  $this->load->view('main');
   		 $this->load->view('footer');
    }


    function getQuotes(){
    	  $quotes = $this->topic_model->get_quote(); 
   
    $response = array();
    $posts = array();
    foreach ($quotes as $quote) 
    { 
        $posts[] = array(
            "id"                 =>  $quote->id,
            "author"                  =>  $quote->author,
            "quote_text"            =>  $quote->quote_text,
            "created_at" =>  $quote->created_at,
        );
    } 
    $data['quotes'] = $posts;
    $response['data'] = $data;
    echo json_encode($response,TRUE);

 
   
    }


     function getUserQuotes(){
    	$user_quotes = $this->topic_model->get_userquote();

  $response = array();
    $posts = array();
    foreach ($user_quotes as $quote) 
    { 
        $posts[] = array(
            "id"                 =>  $quote->id,
            "author"                  =>  $quote->author,
            "quote_text"            =>  $quote->quote_text,
            "created_at" =>  $quote->created_at,
        );
    } 
    $data['quotes'] = $posts;
    $response['data'] = $data;
    echo json_encode($response,TRUE);

 
    	
 
   
    }
}
?>