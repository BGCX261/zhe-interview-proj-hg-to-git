<?php 

class Dropdownmenu_model extends CI_Model {

    var $items   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        parent::__construct();
    }
    
    /*function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }
	*/
	
    function get_entries()
    {
        $query = $this->db->get('entries');
        return $query->result();
    }

    function insert_entry()
    {
        $this->items   = $_POST['items']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->items   = $_POST['items'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}