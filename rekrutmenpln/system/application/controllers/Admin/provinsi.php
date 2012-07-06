<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class provinsi extends Controller {
 
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
			$crud->set_table('provinsi');
			$crud->set_subject('Provinsi');
			$crud->display_as('NAMA_PROV','NAMA PROVINSI');
			$crud->display_as('STATUS_PROV','STATUS PROVINSI');
			$crud->set_rules('NAMA_PROV','NAMA PROVINSI','alpha-numeric|required');
			$crud->required_fields('NAMA_PROV','STATUS_PROV');
			$output = $crud->render();
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' salah coy'.$e->getTraceAsString());
		}   
    }
 
    function _example_output($output = null)
 
    {
        $this->load->view('v_data_master.php',$output);    
    }
    
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_PROV',$str)->get('provinsi')->num_rows();
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