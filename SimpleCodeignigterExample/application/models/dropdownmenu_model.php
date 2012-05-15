<?php 

class Dropdownmenu_model extends CI_Model {

    var $menu_name   = '';
    var $menu_item = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_entries()
    {
        $query = $this->db->get('selectmenus');
        return $query->result();
    }

    function insert_entry()
    {
        $this->menu_name   = $this->input->post('menu_name'); // please read the below note
        $this->menu_item = $this->input->post('menu_item');

        $result = $this->db->insert('selectmenus', $this);
		return $result;
    }
	
    function update_entry()
    {
        $this->menu_name   = $this->input->post('menu_name');
        $this->menu_item = $this->input->post('menu_item');

        $result = $this->db->update('selectmenus', $this, array('id' => $this->input->post('id')));
		return $result;
    }
	
	function delete_entry()
	{
		$result = $this->db->delete('selectmenus', array('id' => $this->input->post('id')));
		return $result;
	}
}