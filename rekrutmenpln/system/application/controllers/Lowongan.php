<?php class Lowongan extends Controller {
	function Lowongan() {
		parent::Controller(); 
		$this->load->model('MLowongan');
		$this->load->model('MPelamar');
		$this->load->model('MPeserta');
		$this->load->library('session');
//		$this->output->enable_profiler(TRUE);
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
			$data['pesan'] = '';
			$idpel = $this->MPelamar->getIdPelamar($this->session->userdata("id_akun"));
			if(isset($idpel['idpel'])){
				if($this->MLowongan->studiPelamar($idpel['idpel'])){
					$jmlDaftar = $this->MPeserta->jmlPesertaGagal($idpel['idpel']);
					if($jmlDaftar['jml'] >= 3){				
						$data['pesan'] = 'Anda Sudah Gagal sebanyak 3x!';
					} else {
						$setuju = $this->MPelamar->getPersetujuan($idpel['idpel']);
						if($setuju['setuju'] == 0){
							$data['pesan'] = 'Gagal Melamar pekerjaan, pernyataan belum disetujui!';
						} else {	
								$test = '';
								$hasil = false;
								$hasil = $this->MLowongan->cekPersyaratanUmum($idpel['idpel'], 
											$this->input->post('ipk'), 
											$this->input->post('tingkat'), 
											$this->input->post('usia'),
											$rekrut, 
											$bdg);
								if($hasil == true){
									$test = $this->MPeserta->generateNoTest($idpel['idpel'], $rekrut, $bdg);
									if($test!=''){
										$this->MPeserta->addPeserta($idpel['idpel'], $rekrut, $bdg, $test, 0);
										$this->MPeserta->addPeserta($idpel['idpel'], $rekrut, $bdg, $test,1);
									}
								}else {
										$this->MPeserta->addPeserta($idpel['idpel'], $rekrut, $bdg, $test, 0);
										$this->MPeserta->addPeserta($idpel['idpel'], $rekrut, $bdg, $test, 2);
								}	
								$this->session->set_flashdata('message', 'Lamaran telah diajukan');
								redirect('lowongan');
							}
					} 
					}else {
						$this->session->set_flashdata('warning', 'Lengkapi data pendidikan PT untuk mengajukan Lamaran');
						redirect ('pelamar/addPendidikan');
				}
			} else {
				$this->session->set_flashdata('warning', 'Lengkapi data Pribadi untuk mengajukan Lamaran');
				redirect('pelamar');
			}
				$data['detail'] = $this->MLowongan->getDetailBidang($rekrut, $bdg);
				$data['idRekrutmen'] = $rekrut;
				$data['idBid'] = $bdg;
				$data['view'] = 'pelamar/v_detail_bidang';
				$data['title'] = 'Lowongan Dibuka';
				$this->load->view('pelamar/main_pelamar', $data);
		} else {
			redirect('lowongan');
		}
	}
	
}
?>