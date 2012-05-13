<?php 

class Dropdownmenu extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('Dropdownmenu_model');
		
    }

	public function index()
	{
		$data['entries'] = $this->Dropdownmenu_model->get_entries();
		$this->load->view('dropdownmenu_view', $data);
	}

}