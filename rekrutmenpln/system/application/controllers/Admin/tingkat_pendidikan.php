<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class tingkat_pendidikan extends Controller {
 
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
			$crud->set_table('tingkatpendidikan');
			$crud->set_subject('Tingkat Pendidikan');
			$crud->display_as('NAMA_TINGKAT','NAMA TINGKAT','STATUS_TINGKAT','STATUS');
			$crud->display_as('STATUS_TINGKAT','STATUS');
			$crud->set_rules('NAMA_TINGKAT','NAMA TINGKAT','alpha-numeric|required');
			$crud->required_fields('NAMA_TINGKAT','STATUS_PT','STATUS_TINGKAT');
			$crud->callback_add_field('STATUS_PT',array($this,'_status_pt_edit'));
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}   
    }
 	function _status_pt_edit(){
		return ' <input type="radio" name="STATUS_PT" value=1>PT</input>
				 <input type="radio" name="STATUS_PT" value=0>NON PT</input>';	
    }
    function _example_output($output = null)
 
    {
        $this->load->view('v_data_master.php',$output);    
    }
    
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_TINGKAT',$str)->get('tingkatpendidikan')->num_rows();
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