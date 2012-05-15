<?php 

class Dropdownmenu_model extends CI_Model {

    var $items   = '';
    var $content = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_entries()
    {
        $query = $this->db->get('entries');
        return $query->result();
    }

    function insert_entry()
    {
        $this->items   = $this->input->post('items'); // please read the below note
        $this->content = $this->input->post('content');

        $result = $this->db->insert('entries', $this);
		return $result;
    }
	
    function update_entry()
    {
        $this->items   = $this->input->post('items');
        $this->content = $this->input->post('content');

        $result = $this->db->update('entries', $this, array('id' => $this->input->post('id')));
		return $result;
    }
	
	function delete_entry()
	{
		$result = $this->db->delete('entries', array('id' => $this->input->post('id')));
		return $result;
	}
}