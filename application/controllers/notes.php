<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function create(){
		echo json_encode($this->note->create($this->input->post()));
	}

	public function update($id){
		echo json_encode($this->note->update($this->input->post(), $id));
	}

	public function delete($id){
		$this->note->delete($id);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */