<?php class Lowongan extends Controller {
	function Lowongan() {
		parent::Controller(); 
		$this->load->model('MLowongan');
		$this->load->model('MPelamar');
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
				echo "gabole daftar";
				$data['error'] = 'Anda Sudah mendaftar sebanyak 3x!';
			} else {
				$setuju = $this->MPelamar->getPersetujuan($idpel['idpel']);
				if($setuju['setuju'] == 0){
					echo "gabole daftar juga";
					$data['error'] = 'Gagal Melamar pekerjaan, pernyataan belum disetujui!';
				} else {
					if(!$this->MLowongan->cekProgramStudi($idpel['idpel'], $rekrut, $bdg)){
						echo "ini juga gabole daftar";
						$data['error'] = 'Program Studi anda tidak sesuai dengan bidang yang dilamar!';
					} else {	
						echo "bole daftar";
						$this->MLowongan->addPeserta($idpel['idpel'], $rekrut, $bdg);
						$data['succes'] = 'Berhasil. Lamaran telah diajukan!';
					}
				}
			}
		} else {
			redirect('pelamar/login');
		}
	}
}
?>