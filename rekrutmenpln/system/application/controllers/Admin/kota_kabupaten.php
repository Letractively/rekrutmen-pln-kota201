<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class kota_kabupaten extends Controller {
 
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
			$crud->set_table('kotakabupaten');
			$crud->set_subject('Kota Kabupaten');
			$crud->set_relation('ID_PROV','provinsi','NAMA_PROV');
			$crud->display_as('ID_PROV','PROVINSI');
			$crud->display_as('NAMA_KOTA','NAMA KOTA');
			$crud->display_as('STATUS_KOTA','STATUS KOTA');
			$crud->set_rules('NAMA_KOTA','NAMA KOTA','alpha-numeric|required');
			$crud->required_fields('ID_PROV','NAMA_KOTA','STATUS_KOTA');
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
        $data['title'] = "Daftar Kota kabupaten";
        $data['view'] = "v_data_master.php";
    	$this->load->view('admin/template_admin',$data);   
    }
    
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_KOTA',$str)->get('kotakabupaten')->num_rows();
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