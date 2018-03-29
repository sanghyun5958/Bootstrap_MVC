<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class detailedQuote extends CI_Controller {


	function __construct(){
			parent::__construct();


   		$this->load->database();
   		$this->load->model('topic_model');
		}

  
function index(){

   
  echo 'detailed page2';
      
    }


    function getQuoteCommentsById($number){
    	 

            $quotecomments = $this->topic_model->get_quotecomments($number); 
   
    $response = array();
    $posts = array();
    foreach ($quotecomments as $quote) 
    { 
        $posts[] = array(
            "id"                 =>  $quote->id,
            "english_quote_view_id"          =>  $quote->english_quote_view_id,
            "user_id"            =>  $quote->user_id,
            "comment"            =>  $quote->comment,
            "created_at" =>  $quote->created_at
        );
    } 
    $data['quoteComments'] = $posts;
    $response['data'] = $data;
    echo json_encode($response,TRUE);

   
    }






       function insertQuoteComment(){
       
            $data = array(
                    'english_quote_view_id' => $this->input->post('english_quote_view_id'),
                    'user_id' => $this->input->post('user_id'),
                    'comment' => $this->input->post('comment'));

 
             $this->topic_model->insert_quotecomments($data); 
   
    }


  
}
?>