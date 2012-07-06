<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class jabatan extends Controller {
 
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
			$crud->set_table('bidangjabatan');
			$crud->set_subject('Bidang Jabatan');
			$crud->display_as('KODE_BID','KODE BIDANG');
			$crud->display_as('NAMA_BID','NAMA BIDANG');
			$crud->set_relation('ID_TINGKAT','tingkatpendidikan','NAMA_TINGKAT');
			$crud->display_as('ID_TINGKAT','TINGKAT');
			$crud->set_relation('ID_JS','jenisstudi','NAMA_JS');
			$crud->display_as('ID_JS','JENIS STUDI');
			$crud->columns('KODE_BID','NAMA_BID','ID_TINGKAT','ID_JS','DESKRIPSI');
			$crud->set_rules('NAMA_BID','NAMA BIDANG','alpha-numeric|required');
			$crud->set_rules('KODE_BID','KODE BIDANG','required');
			$crud->required_fields('KODE_BID','NAMA_BID','ID_TINGKAT','ID_JS','STATUS_BIDANG');
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
	  $num_row = $this->db->where('KODE_BID',$str)->get('bidangjabatan')->num_rows();
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
	  $num_row = $this->db->where('NAMA_BID',$str)->get('bidangjabatan')->num_rows();
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