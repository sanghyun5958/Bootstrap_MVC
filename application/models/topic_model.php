<?php
class Topic_model extends CI_Model {

		function __construct(){
			parent::__construct();
		}

		public function get_quote(){
			return $this->db->query('SELECT * FROM quote')->result();
		}

		public function get_userquote(){
			return $this->db->query('SELECT * FROM userquote')->result();

		}

		public function insert_userquote($data){
			$this->db->insert('userquote', $data);

		}

		public function get_quotecomments($number){
			return $this->db->query('SELECT * FROM quotecomments WHERE english_quote_view_id = '.$number)->result();

		}


		public function get_userquotecomments(){
			return $this->db->query('SELECT * FROM userquotecomments')->result();

		}

		public function insert_quotecomments($data){
			$this->db->insert('quotecomments', $data);

		}




}
 
