<?php

	/**
	* 
	*/
	class Blog extends CI_Model
	{
		
		/*function __construct(argument)
		{
			# code...
		}*/

		public function getNote($a_page_id) {
			return "Page's id is " . $a_page_id;
		}

	}

?>