<?php class Lowongan extends Controller {
	function Lowongan() {
		parent::Controller(); 
		$this->load->model('MLowongan');
		$this->load->model('MPelamar');
		$this->load->model('MPeserta');
		$this->load->library('session');
		$this->output->enable_profiler(TRUE);
	}
	
	function index(){
		$data['lowongan'] = $this->MLowongan->getBidangDibuka();
		$data['view'] = 'pelamar/v_lowongan_bidang';
		$data['title'] = 'Lowongan Dibuka';
		$this->load->view('pelamar/main_pelamar', $data);
	}
	
	function detailBidang($rekrut, $bdg){
		$data['detail'] = $this->MLowongan->getDetailBidang($rekrut, $bdg);
		$data['idRekrutmen'] = $rekrut;
		$data['idBid'] = $bdg;
		$data['view'] = 'pelamar/v_detail_bidang';
		$data['title'] = 'Lowongan Dibuka';
		$this->load->view('pelamar/main_pelamar', $data);
	}
	
	function daftarkanPelamar($rekrut, $bdg){
		if($this->session->userdata('id_akun')){
			$data['error'] = '';
			$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
			$jmlDaftar = $this->MPelamar->getJmlDaftar($idpel['idpel']);
			if($jmlDaftar['jml'] > 2){				
				$data['error'] = 'Anda Sudah mendaftar sebanyak 3x!';
				echo $data['error'];
			} else {
				$setuju = $this->MPelamar->getPersetujuan($idpel['idpel']);
				if($setuju['setuju'] == 0){
					$data['error'] = 'Gagal Melamar pekerjaan, pernyataan belum disetujui!';
					echo $data['error'];
				} else {
					if(!$this->MLowongan->cekProgramStudi($idpel['idpel'], $rekrut, $bdg)){
						$data['error'] = 'Program Studi anda tidak sesuai dengan bidang yang dilamar!';
						echo $data['error'];
					} else {	
						$hasil = true;
						$hasil = $this->MLowongan->cekPersyaratanUmum($idpel['idpel'], 
									$this->input->post('ipk'), 
									$this->input->post('tingkat'), 
									$this->input->post('usia'),
									$rekrut, 
									$bdg);
						if($hasil == true){
							$test = $this->MPeserta->generateNoTest($idpel['idpel'], $rekrut, $bdg);
							if($test!='')
								$this->MPeserta->addPeserta($idpel['idpel'], $rekrut, $bdg, $test);
							$data['succes'] = 'Berhasil. Lamaran telah diajukan!';
							echo $data['succes'];
						}else {
							echo "gagal bos";
						}
						
					}
				}
			}
		} else {
			redirect('pelamar/login');
		}
	}
	
}
?>