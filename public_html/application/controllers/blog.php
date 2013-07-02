<?php

	/**
	* 
	*/
	class Blog extends CI_Controller
	{
		
		public function index($a_page_id)
		{
			$this->load->model("blog", "mod");
			print $this->mod->getNote($a_page_id);
		}
	}

?>