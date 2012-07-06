<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class user extends Controller {
 
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
			$crud->set_table('user');
			$crud->set_subject('User');
			$crud->display_as('ROLE','HAK AKSES');
			$crud->columns('USERNAME','NAMA_USER','EMAIL','ROLE');
			
			$crud->change_field_type('PASSWORD', 'password');
			$crud->add_fields('USERNAME','NAMA_USER','EMAIL','PASSWORD','CONFIRM_PASSWORD','ROLE');
			$crud->change_field_type('CONFIRM', 'password');
			//$crud->change_field_type('status','enum',array('active','private','spam','deleted'));
			//$crud->change_field_type('ROLE', 'enum',array('active','private','spam','deleted');
			$crud->edit_fields('USERNAME','NAMA_USER','EMAIL','PASSWORD','CONFIRM_PASSWORD','ROLE');
			
			$crud->set_rules('USERNAME','USERNAME','required');
			$crud->set_rules('EMAIL','EMAIL','valid_emails');
			$crud->set_rules('PASSWORD','PASSWORD','required|matches[konfirmpass]');
			$crud->required_fields('USERNAME','PASSWORD','NAMA','ROLE');
			
			$crud->callback_add_field('CONFIRM_PASSWORD',array($this,'_confirm_edit'));
			
			$crud->callback_add_field('ROLE',array($this,'_role_edit'));
			
			$data['judul']="<h5>test</h5>";
			$output = $crud->render();
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}   
    }
 	
    function _confirm_edit(){
    
    	return '<input type="password" name="konfirmpass"/>';   
    }
 	
    function _role_edit(){
		return ' <select name="ROLE">
					<option value=" ">------------</option>
					<option value="Super Admin">Super Admin</option>
					<option value="Super Admin">Bagian Rekrutmen</option>
				    <option value="Super Admin">Petugas Seleksi</option>
				</select>';	
    }
    
    function _example_output($output = null)
 
    {
        $this->load->view('v_data_master.php',$output);    
    }
    
	public function nama_unique($str)
	{
	  $num_row = $this->db->where('USERNAME',$str)->get('user')->num_rows();
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