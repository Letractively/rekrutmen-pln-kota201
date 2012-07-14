<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class jenis_studi extends Controller {
 
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
			$crud->set_table('jenisstudi');
			$crud->set_subject('Jenis Studi');
			$crud->display_as('NAMA_JS','NAMA JENIS STUDI');
			$crud->display_as('MIN_IPK','MINIMAL IPK');
			$crud->set_rules('NAMA_JS','NAMA JENIS STUDI','required|alpha-numeric');
			$crud->set_rules('MIN_IPK','MINIMAL IPK','numeric|required');
			$crud->required_fields('NAMA_JS','MIN_IPK');
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
        $data['title'] = "Daftar Jenis Studi";
        $data['view'] = "v_data_master.php";
    	$this->load->view('admin/template_admin',$data);    
    }
    
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('NAMA_JS',$str)->get('jenisstudi')->num_rows();
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