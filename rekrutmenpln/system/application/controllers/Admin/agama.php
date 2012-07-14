<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class agama extends Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
        //$this->load->library('MY_Form_Validation');
        $this->load->library('Form_validation');
 
    }
 
    public function index()
    {
        $this->getAll();
    }
 
    public function crud()
    {
			$gridParams = array(
			'title' => 'data agama'
			);
    		$crud = new grocery_CRUD();
    		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('agama');
			$crud->set_subject('Agama');
			$crud->display_as('NAMA_AGAMA','NAMA AGAMA');
			$crud->display_as('STATUS_AGAMA','STATUS');
			$crud->set_rules('NAMA_AGAMA','NAMA AGAMA','alpha|required');
			//$this->form_validation->set_rules('emailaddress','Email Address','required|valid_email|unique[users.email]');
			$crud->required_fields('NAMA_AGAMA','STATUS_AGAMA');
			//$crud->callback_before_insert(array($this,'_my_callback'));
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
        $data['title'] = "Daftar Agama";
        $data['view'] = "v_data_master.php";
    	$this->load->view('admin/template_admin',$data);    
    }
	
    public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_AGAMA',$str)->get('agama')->num_rows();
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