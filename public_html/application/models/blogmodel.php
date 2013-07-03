<?php

	/**
	* 
	*/
	class Blogmodel extends CI_Model
	{
		public function getCount()
		{
			$files = scandir($_SERVER['DOCUMENT_ROOT'] . "/content/blog/");
			array_shift($files);
			array_shift($files);
			return count($files);
		}

		public function getNote($a_page_id) {
			$this->load->helper("file");
			$filename = $_SERVER['DOCUMENT_ROOT'] . "/content/blog/" . $a_page_id . ".note";
			if (read_file($filename) != false) {
				$content = read_file($filename);
				$content = explode("[~===~]", $content);
				$data['id']      = $a_page_id;
				$data['title']   = $content[0];
				$data['content'] = $content[1];
				return $data;
			} else {
				return false;
			}
		}

		public function getNotes($a_count = 5, $a_start_id = 1)
		{
			$notes = array();
			for ($i = $a_start_id; $i < $a_start_id + $a_count + 1; $i++) {
				array_push($notes, $this->getNote($i));
			}
			return $notes;
		}

	}

?>