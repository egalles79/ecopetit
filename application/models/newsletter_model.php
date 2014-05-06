<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class newsletter_model extends CI_Model {
 
    public function __construct()
	{
		parent::__construct();
	}


	function inserta($email )
	{
		$this->db->start_cache();
		$this->db->insert('mailing', array('email' => $email)); 
		$this->db->flush_cache();

	}
	
	function esborra($email) {

		$this->db->start_cache();
		$this->db->delete('mailing', array('email' => $email)); 
		$this->db->flush_cache();
	}    
		
	function comprova($email) {

		$this->db->start_cache();
		$this->db->select('email');
		$this->db->from('mailing');
		$this->db->where('email', $email);


		$this->db->flush_cache();
		
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}
	
}