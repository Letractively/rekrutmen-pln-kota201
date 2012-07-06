<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class passing_grade extends Controller {
 
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

    		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('passinggrade');
			$crud->set_subject('Passing Grade Test');
			$crud->display_as('NAMATEST','NAMA TEST');
			$crud->set_rules('NAMATEST','NAMA TEST','alpha|required');
			$crud->set_rules('NILAI','NILAI','is_natural_no_zero|required');
			$crud->required_fields('NAMATEST','NILAI');
			$output = $crud->render();
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}   
    }
 
    function _example_output($output = null)
 
    {
        $this->load->view('v_data_master.php',$output);    
    }
    
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMATEST',$str)->get('passinggrade')->num_rows();
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