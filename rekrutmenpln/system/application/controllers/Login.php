<?php class Login extends Controller {
	function Login() {
		parent::Controller(); $this->load->model('Mlogin');
		$this->load->library('session');
	}
	function index()
	{
		$this->output->enable_profiler(TRUE);
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');

		$base = 'required|trim|xss_clean';

		$this->form_validation->set_rules('email', 'Email', $base.'|max_length[40]');
		$this->form_validation->set_rules('password', 'Password', $base);

		$data = array(
            'login_error' => FALSE,
		);
		$data['title'] = 'Form Login';
		if ($this->form_validation->run())
		{
			$username = $this->input->post('email');
			$password = $this->input->post('password');

			if (FALSE !== ($user = $this->log_in($username, $password)))
			{			
				$data['view'] = 'pelamar/v_loginsukses';
				$data['title'] = 'Akun Pelamar';
				$data['email'] = $this->session->userdata('email');
				$this->load->view('pelamar/main_pelamar', $data);
			} else {
				$data['login_error'] = TRUE;
				$data['view'] = 'pelamar/v_member_login';
				$this->load->view('pelamar/main_pelamar', $data);
			}
		} else {
			$data['view'] = 'pelamar/v_member_login';
			$this->load->view('pelamar/main_pelamar', $data);
		}

		
	}

	function log_in($username, $password)
	{
		$qry = $this->db->select('ID_AKUN, EMAIL, PASSWORD, SALT')
		->where('EMAIL', $username)
		->where('STATUS_PENGGUNA', 1)
		->get('akunpelamar');

		// No results, we're done.
		if ($qry->num_rows() !== 1)
		{
			return FALSE;
		}

		if (sha1($password.$qry->row('SALT')) == $qry->row('PASSWORD'))
		{
			$data = array(
		            'id_akun'		=> $qry->row('ID_AKUN'),
					'email'      	=> $qry->row('EMAIL'),
		            'password'      => $qry->row('PASSWORD'),
		            'salt'          => $qry->row('SALT'),
					'login_state'	=> TRUE
			);

			$this->session->set_userdata($data);

			return $qry->row('EMAIL');
		}

		return FALSE;
	}

	function logout() {
		$this->session->sess_destroy(); echo "Anda telah keluar (logout)";
	}
} ?>