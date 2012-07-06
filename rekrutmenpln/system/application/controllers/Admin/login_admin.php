<?php class login_admin extends Controller {
	function login_admin() {
		parent::Controller(); $this->load->model('m_user');
		$this->load->library('session');
	}
	function index()
	{
		//$this->output->enable_profiler(TRUE);
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');

		$base = 'required|trim|xss_clean';

		$this->form_validation->set_rules('username', 'username', $base.'|max_length[40]');
		$this->form_validation->set_rules('password', 'Password', $base);

		$data = array(
            'login_error' => FALSE,
		);
		
		if ($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if (FALSE !== ($user = $this->log_in($username, $password)))
			{			
				
			} else {
				$data['login_error'] = TRUE;
				$this->load->view('v_login_admin',$data);
			}
		} else {
			$this->load->view('v_login_admin',$data);
		}

		
	}

	function log_in($username, $password)
	{
		$qry = $this->db->select('*')
		->where('username', $username)
		->get('user');

		// No results, we're done.
		if ($qry->num_rows() !== 1)
		{
			return FALSE;
		}

		if ($password == $qry->row('PASSWORD'))
		{
			$data = array(
		            'id_user'		=> $qry->row('ID_USER'),
					'username'      => $qry->row('USERNAME'),
		            'password'      => $qry->row('PASSWORD'),
					'login_state'	=> TRUE
			);

			$this->session->set_userdata($data);

			return $qry->row('username');
		}

		return FALSE;
	}

	function logout() {
		$this->session->sess_destroy(); echo "Anda telah keluar (logout)";
	}
} ?>