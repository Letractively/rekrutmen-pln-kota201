<?php
class AkunPelamar extends Controller{
	function AkunPelamar(){
		parent::Controller();
		$this->load->helper(array('form','url','flash_message'));
		$this->load->library('form_validation');
		$this -> load -> plugin( 'captcha' );
		$this->load->model('mAkunPelamar');
		$this->load->library('session');
	}
	
	function index(){
//		$this->output->enable_profiler(TRUE);
		$this->displayFormRegister();
//$this->load->view('pelamar/v_isi_data');
	}
	
	function displayFormRegister(){
		$captcha_result = '';
		$data['title'] = "Form Pendaftaran";
		$data["cap_img"] = $this->generateKodeVerifikasi();
			if($this->cekFieldKosong()){
				if($this->cekVerifikasi()){
					$this->addAkunPelamar(	$this->input->post('ktp'),
											$this->input->post('email'),
											$this->input->post('pass'),
											$this->input->post('verifikasi')
											);
				}else {
					$captcha_result = 'Kode Verifikasi yang anda masukan salah.';
					$data["cap_msg"] = $captcha_result;
					$data['view'] = 'pelamar/v_akun_pelamar';
					$this->load->view('pelamar/main_pelamar',$data);
				}
			} else {
				$data["cap_msg"] = $captcha_result;
				$data['view'] = 'pelamar/v_akun_pelamar';
				$this->load->view('pelamar/main_pelamar',$data);
			}
	}
	
	function cekFieldKosong(){
		$this->form_validation->set_rules('ktp', 'NoKTP', 'required|numeric|callback_unique_ktp');
		$this->form_validation->set_rules('ktp2', 'Konfirmasi NoKTP', 'required|numeric|matches[ktp]');
		$this->form_validation->set_rules('email', 'Email', 'trim,required|valid_email|callback_unique_email');
		$this->form_validation->set_rules('email2', 'Konfirmasi Email', 'required|valid_email|matches[email]');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'required|matches[pass]');

		if($this->form_validation->run()==FALSE){
			return false;
		}
		else {
			return true;
		}
	}
	
    function unique_ktp($str)
    {
    	$this->form_validation->set_message('unique_ktp', 'NO KTP anda sudah terdaftar.');
        $query = $this->db->query("SELECT COUNT(*) AS dupe FROM akunpelamar WHERE NO_KTP = '$str'");
        $row = $query->row();
        return ($row->dupe > 0) ? FALSE : TRUE;
    }
    
    function unique_email($str)
    {
    	$this->form_validation->set_message('unique_email', 'Alamat E-Mail anda sudah terdaftar.');
        $query = $this->db->query("SELECT COUNT(*) AS dupe FROM akunpelamar WHERE EMAIL = '$str'");
        $row = $query->row();
        return ($row->dupe > 0) ? FALSE : TRUE;
    }
	
	function generateKodeVerifikasi()
	{
		$vals = array(
			    'img_path' => './captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
			    'img_url' => base_url().'captcha/', // URL for captcha img
			    'img_width' => 200, // width
			    'img_height' => 60, // height
				// 'font_path'    => '../system/fonts/2.ttf',
				// 'expiration' => 7200 ,
		);
		// Create captcha
		$cap = create_captcha( $vals );
		// Write to DB
		if ( $cap ) {
			$data = array(
		      'captcha_id' => '',
		      'captcha_time' => $cap['time'],
		      'ip_address' => $this -> input -> ip_address(),
		      'word' => $cap['word'] , 
			);
			$query = $this -> db -> insert_string( 'captcha', $data );
			$this -> db -> query( $query );
		}else {
			return "Umm captcha not work" ;
		}
		return $cap['image'] ;
	}
	
	function cekVerifikasi()
	{
		// Delete old data ( 2hours)
		$expiration = time()-7200 ;
		$sql = " DELETE FROM captcha WHERE captcha_time < ? ";
		$binds = array($expiration);
		$query = $this->db->query($sql, $binds);

		//checking input
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_POST['verifikasi'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ( $row -> count > 0 )
		{
			return true;
		}
		return false;

	}
	
	function sendActivation($email, $ktp, $aktiv){
		$this->load->library('email'); 
		$this->email->from('adnindevit@gmail.com', 'Admin PLN'); 
		$this->email->to($email); 
		$this->email->subject('Activation PLN Online-Selection Account'); 
		$this->email->message(base_url().'index.php/AkunPelamar/aktivasi/'.$ktp.'/'.$aktiv); 
		if ($this->email->send()) { 
			$data['view'] = 'pelamar/v_success_sendActivation';
			$data['title'] = 'Aktivasi Terkirim';
			$this->load->view('pelamar/main_pelamar', $data);
		} else { 
			$data['view'] = 'pelamar/v_failed_sendActivation';
			$data['title'] = 'Aktivasi Gagal Dikirim';
			$this->load->view('pelamar/main_pelamar', $data);
		}
	}
	
	function addAkunPelamar($ktp, $email, $pass, $verifikasi){
//		$this->load->library('sha1');
		$salt = $this->createSalt();
		$aktivasi = sha1($verifikasi.$salt);
		$pass = sha1($pass.$salt);

		$this->mAkunPelamar->addAkun($ktp, $email, $pass, $salt, $aktivasi);
		$this->sendActivation($email, $ktp, $aktivasi);
	}
	
	function createSalt(){
		$this->load->helper('string');
		return sha1(random_string('alnum', 32));
	}
	
	function aktivasi($ktp, $str){
		$dataAkun = $this->mAkunPelamar->getAkun($ktp);
		foreach ($dataAkun->result() as $row){
			$email = $row->EMAIL;
			$aktivasi = $row->KODE_AKTIFASI;
		}
		if($str == $aktivasi){
	   		$this->mAkunPelamar->updateStatus($ktp);
	   		$data['view'] = 'pelamar/v_success_activation';
			$data['title'] = 'Akun Diaktifkan';
			$this->load->view('pelamar/main_pelamar', $data);			
		} else {
			$data['view'] = 'pelamar/v_failed_activation';
			$data['title'] = 'Akun Gagal Diaktifkan';
			$this->load->view('pelamar/main_pelamar', $data);	
		}


	}
}