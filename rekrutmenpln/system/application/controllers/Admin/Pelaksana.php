<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class pelaksana extends Controller {
 
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
			$crud->set_table('pelaksana');
			$crud->set_subject('Pelaksana Rekrutmen');
			$crud->display_as('NAMA_PELAKSANA','NAMA PELAKSANA');
			$crud->display_as('STATUS_PELAKSANA','STATUS');
			$crud->set_rules('NAMA_PELAKSANA','NAMA PELAKSANA','alpha-numeric|required');
			$crud->required_fields('NAMA_PELAKSANA','STATUS_PELAKSANA');
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
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */