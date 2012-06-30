<?php class BaseController extends Controller {
	
  function BaseController() {
    parent::Controller();
    $this->load->helper('url');
    $this->load->library('session');
    // ensure already signed in
    if ( $this->session->userdata('login_state') == FALSE ) {
      redirect( "Login" );
    }
  }
}
?>