<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class template_rekrutmen extends Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
        $this->load->library('Form_validation');
 
    }
 
    public function index()
    {
        $this->getAll();
    }
 
    public function crud()
    {
			$Params = array(
			'title' => 'data agama'
			);
    		$crud = new grocery_CRUD();
    		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('templaterekrutmen');
			$crud->set_subject('Template Rekrutmen');
			$crud->display_as('NAMA_TEMPLATE','NAMA TEMPLATE');
			$crud->display_as('DESKRIPSI','ISI');
			$crud->set_rules('NAMA_TEMPLATE','TEMPLATE','required');
			//$crud->set_rules('DESKRIPSI','ISI','required');
			//$this->form_validation->set_rules('emailaddress','Email Address','required|valid_email|unique[users.email]');
			$crud->required_fields('NAMA_TEMPLATE','DESKRIPSI');
			//$crud->callback_before_insert(array($this,'_my_callback'));
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
	  $num_row = $this->db->where('NAMA_TEMPLATE',$str)->get('templaterekrutmen')->num_rows();
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