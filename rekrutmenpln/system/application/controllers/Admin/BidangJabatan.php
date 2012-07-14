<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class BidangJabatan extends Controller {
 
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

    		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('bidangjabatan');
			$crud->set_subject('Bidang Jabatan');
			$crud->set_relation('ID_TINGKAT','tingkatpendidikan','NAMA_TINGKAT');
			$crud->display_as('ID_TINGKAT','TINGKAT');
			$crud->set_relation('ID_JS','jenisstudi','NAMA_JS');
			$crud->display_as('ID_JS','JENIS STUDI');
			$crud->where('STATUS_BIDANG',1);
			$crud->required_fields('KODE_BID','NAMA_BID','STATUS_BIDANG');
//			$crud->unset_columns('ID_BID');
			$crud->columns('KODE_BID','NAMA_BID','ID_TINGKAT','ID_JS','DESKRIPSI');
			
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
        $data['title'] = "Daftar Bidang Jabatan";
        $data['view'] = "v_data_master.php";
    	$this->load->view('admin/template_admin',$data);    
    }
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */