<? 


class Controller_Ajax extends Controller_Rest{


	public function get_sort_newest()
	{
		return $this->response(array(
           'hello world' => 'banana grams',
           'phoebe'      => 'goldie puppy'
        ));
	}

}