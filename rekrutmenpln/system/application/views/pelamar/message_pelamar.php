<span><?php if($this->session->flashdata('message')) {
	echo '<div class=“message”> ';
	echo ''.$this->session->flashdata('message').'';

	$this->session->keep_flashdata('message');

	echo'</div>';
}?></span>
<span><?php if($this->session->flashdata('error')) {
	echo '<div class=“error”> ';
	echo ''.$this->session->flashdata('error').'';

	$this->session->keep_flashdata('error');

	echo'</div>';
}?></span>