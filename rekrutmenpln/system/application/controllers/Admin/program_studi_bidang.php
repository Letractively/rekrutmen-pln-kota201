<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class program_studi_bidang extends Controller {
 
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
			$crud->set_table('programstudiperbidang');
			$crud->set_subject('Bidang program Studi perbidang');
			
			//$crud->callback_add_field('ID_REKRUTMEN',array($this,'item_id_callback'));
			//$crud->set_relation_n_n('PROGRAM_STUDI', 'bidangprogramstudi', 'programstudi', 'ID_REKRUTMEN', 'ID_BID', 'NAMA_PS','ID_PS');	
    	    //$crud->set_relation_n_n('DAFTAR_PROGRAM_STUDI', 'bidangjabatandibuka', 'programstudi','ID_BID', 'ID_PS', 'NAMA_PS','QUOTA');	
			
			$crud->set_relation('ID_BID','bidangjabatan','NAMA_BID');
			$crud->display_as('ID_BID','NAMA BIDANG');
			$crud->set_relation('ID_REKRUTMEN','rekrutmen','NAMA_REKRUTMEN');
			$crud->display_as('ID_REKRUTMEN','NAMA REKRUTMEN');
			$crud->set_relation('ID_PS','programstudi','NAMA_PS');
			$crud->display_as('ID_PS','NAMA PROGRAM STUDI');
			
			$crud->required_fields('ID_BID','ID_REKRUTMEN','ID_PS');
			$crud->callback_before_insert(array($this,'field_unique'));
			
			
			
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}   
    }
	
   
    
 	
	function field_unique($post_array)
	{
	  $num_row1 = $this->db->where('ID_BID',$post_array['ID_BID'])->get('bidangprogramstudi')->num_rows();
	  $num_row2 = $this->db->where('ID_REKRUTMEN',$post_array['ID_REKRUTMEN'])->get('bidangprogramstudi')->num_rows();
	  $num_row3 = $this->db->where('ID_PS',$post_array['ID_PS'])->get('bidangprogramstudi')->num_rows();
	  
	  if ($num_row1 >= 1 && $num_row2 >= 1 && $num_row3 >= 1 )
	  {
	   return FALSE;
	  }
	  else
	  {
	   return TRUE;
	  }
	}
	
    function _example_output($output = null)
 
    {
        $this->load->view('v_data_master.php',$output);    
    }
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */