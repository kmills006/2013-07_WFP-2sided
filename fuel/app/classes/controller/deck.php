<?

class Controller_Deck extends Controller_Template{
	

	public function action_create(){
		$data['username'] = Session::get('username');

		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_in/header', $data);
		$this->template->content = View::forge('deck/index');
		$this->template->footer  = View::forge('includes/footer');
	}


}