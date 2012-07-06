<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class lokasi extends Controller {
 
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
			$crud->set_table('lokasi');
			$crud->set_subject('Lokasi Rekrutmen');
//			crud->display_as('NAMA_PT','NAMA PERGURUAN TINGGI');
			$crud->display_as('KODE_LOKASI','KODE LOKASI');
			$crud->display_as('NAMA_LOKASI','NAMA LOKASI');
			$crud->display_as('STATUS_LOKASI','STATUS');		
			$crud->set_rules('NAMA_LOKASI','NAMA LOKASI','alpha-numeric|required');
			$crud->set_rules('KODE_LOKASI','KODE LOKASI','required');
			$crud->required_fields('KODE_LOKASI','NAMA_LOKASI','STATUS_LOKASI');
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
    
	public function kode_unique($str)
	{
	  $num_row = $this->db->where('KODE_LOKASI',$str)->get('lokasi')->num_rows();
	  if ($num_row >= 1)
	  {
	   $this->form_validation->set_message('kode_unique', 'The %s already exists');
	   return FALSE;
	  }
	  else
	  {
	   return TRUE;
	  }
	}
	
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_LOKASI',$str)->get('lokasi')->num_rows();
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