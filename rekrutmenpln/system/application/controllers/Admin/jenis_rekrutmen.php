<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class jenis_rekrutmen extends Controller {
 
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
			
    		$crud = new grocery_CRUD();
    		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('jenisrekrutmen');
			$crud->set_subject('Jenis Rekrutmen');
			$crud->display_as('NAMA_JENIS_REKRUT','NAMA JENIS REKRUTMEN');
			$crud->display_as('KODE_JENIS_REKRUT','KODE JENIS REKRUTMEN');
			$crud->display_as('STATUS_JENIS_REKRUT','STATUS');
			
			$crud->set_rules('NAMA_JENIS_REKRUT','NAMA JENIS REKRUTMEN','required');
			$crud->required_fields('NAMA_JENIS_REKRUT','KODE_JENIS_REKRUT','STATUS_JENIS_REKRUT');
			
			//$crud->callback_add_field('CONFIRM',array($this,'_confirm_edit'));
			
			//$crud->callback_add_field('ROLE',array($this,'_role_edit'));
			
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
        $data['title'] = "Daftar Jenis Rekrutmen";
        $data['view'] = "v_data_master.php";
    	$this->load->view('admin/template_admin',$data);    
    }
    
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_JENIS_REKRUT',$str)->get('jenisrekrutmen')->num_rows();
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