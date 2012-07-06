<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class program_studi extends Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        $this->getAll();
    }
 
    public function crud()
    {
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_subject('Program Studi');
			$crud->set_table('programstudi');
			$crud->display_as('NAMA_PS','NAMA PROGRAM STUDI');
			$crud->display_as('STATUSAKTIFPROGRAMSTUDI','STATUS');
			$crud->set_rules('NAMA_PS','NAMA PROGRAM STUDI','alpha-numeric|required|callback_nama_unique');
			$crud->required_fields('NAMA_PS','STATUSAKTIFPROGRAMSTUDI');
			$output = $crud->render();
			$this->_example_output($output);     
    }
 
    function _example_output($output = null)
 
    {
        $this->load->view('v_data_master.php',$output);    
    }
	
    public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_PS',$str)->get('programstudi')->num_rows();
	  if ($num_row >= 1)
	  {
	   $this->form_validation->set_message('nama_unique', 'The %s already exists');
	   return FALSE;
	  }
	  else
	  {
	   return TRUE;
	  }
	}
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */