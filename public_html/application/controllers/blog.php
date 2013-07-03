<?php

	/**
	* 
	*/
	class Blog extends CI_Controller
	{
		
		public function index()
		{
			$this->load->model("blogmodel", "mod");
			$count = $this->mod->getCount();
			$notes = $this->mod->getNotes(5, $count-5);
			$this->load->view("header", array("title" => "Home"));
			$this->load->view("viewlist", array("notes" => $notes));
			$this->load->view("footer");
		}

		public function read($a_page_id = 1)
		{
			$this->load->model("blogmodel", "mod");
			$note = $this->mod->getNote($a_page_id);
			if ($note != false) {
				$this->load->view("header", $note);
				$this->load->view("viewnote", $note);
				$this->load->view("footer");
			}
			else {
				print "Это пиздец какой-то";
			}
		}
	}

?>