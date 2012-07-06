<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class ProgramStudi extends Controller {
 
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
 
    public function getAll()
    {
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_subject('Program Studi');
			$crud->set_table('programstudi');
//			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('STATUSAKTIFPROGRAMSTUDI','STATUS');
//			$crud->set_subject('Employee');
//			
//			$crud->required_fields('lastName');
//			
//			$crud->set_field_upload('file_url','assets/uploads/files');
			
			$output = $crud->render();

			$this->_example_output($output);     
    }
 
    function _example_output($output = null)
 
    {
        $this->load->view('our_template.php',$output);    
    }
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */