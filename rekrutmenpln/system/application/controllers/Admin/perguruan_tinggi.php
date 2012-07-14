<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class perguruan_tinggi extends Controller {
 
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
			$crud->set_table('perguruantinggi');
			$crud->set_subject('Perguruan Tinggi');
			$crud->display_as('NAMA_PT','NAMA PERGURUAN TINGGI');
			$crud->display_as('STATUS_PT','STATUS');
			$crud->display_as('NEGARA_PT','NEGARA');
			$crud->add_fields('NAMA_PT','NEGARA_PT','STATUS_PT');
			$crud->columns('NAMA_PT','NEGARA_PT','STATUS_PT');
			$crud->set_rules('NAMA_PT','NAMA PERGURUAN TINGGI','alpha-numeric|required');
			$crud->set_rules('NEGARA_PT','NEGARA PERGURUAN TINGGI','alpha-numeric|required');
			$crud->required_fields('NAMA_PT','STATUS_PT','NEGARA_PT');
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}   
    }
 
    function _example_output($output = null)
 
    {
        $data = array();
    	$data['output'] = $output;
        $data['title'] = "Daftar Perguruan Tinggi";
        $data['view'] = "v_data_master.php";
    	$this->load->view('admin/template_admin',$data);    
    }
    
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_PT',$str)->get('perguruantinggi')->num_rows();
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