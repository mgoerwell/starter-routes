<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}

	public function shucks()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';

		// build the list of authors, to pass on to our view
        $record = $this->quotes->get(2);
        $this->data = array_merge($this->data, $record);
		$this->render();
	}

	public function random(){
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$rand = rand (1, 5);

        $record = $source[$rand];
        $this->data = array_merge($this->data, $record);
		$this->render();
	}
}
