<?php 

class Managemenu extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('dropdownmenu_model');
		
    }

	public function index()
	{
		$data['entries'] = $this->dropdownmenu_model->get_entries();
		$this->load->view('managemenu_view', $data);
	}
	
	public function update()
	{
		echo $this->dropdownmenu_model->update_entry();
	}

	public function delete()
	{
		echo $this->dropdownmenu_model->delete_entry();
	}
	
	public function insert()
	{
		echo $this->dropdownmenu_model->insert_entry();
	}
}