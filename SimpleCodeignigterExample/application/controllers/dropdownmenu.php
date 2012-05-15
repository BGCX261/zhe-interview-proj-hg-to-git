<?php 

class Dropdownmenu extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('dropdownmenu_model');
		
    }

	public function index()
	{
		$data['selectmenus'] = $this->dropdownmenu_model->get_entries();
		for ($mucnt=0; $mucnt<count($data['selectmenus']); $mucnt++) {
			$ary_items = explode("\n", $data['selectmenus'][$mucnt]->menu_item);
			/*for($itscnt=0; $itscnt<count($ary_items); $itscnt++) {
				$ary_items[$itscnt] = str_replace('[[Split]]', '|', $ary_items[$itscnt]);
			}*/
			$data['selectmenus'][$mucnt]->menu_item = $ary_items;
		}
		$this->load->view('dropdownmenu_view', $data);
	}
}