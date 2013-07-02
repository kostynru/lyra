<?php

	/**
	* @author Ildar Karymov
	* @version 2.5 alpha
	*/

	class Lyra {

		private $m_tokens;
		private $m_code;
		private $t_classpaths;
		private $t_vars;
		private $t_functions;
		private $t_classes;
		private $t_constants;

		public function __construct()
		{
			// Pre-defining:
			$this->m_tokens     = array();
			$this->t_classpaths = array("std");
			$this->t_vars       = array();
			$this->t_functions  = array(
				"sleep" => function(seconds) {
					if (is_int($seconds)) sleep($seconds);
				}
			);
			$this->t_classes    = array();
			$this->t_constants  = array(
				"LYRA_VERSION" => "2.5", 
				"LYRA_STATUS" => "alpha",
				"LYRA_e14516d0f98fc0ea189fcb247ffb6cf8" => "PHP R.I.P."
			);
		}

		private function addImport($a_path) {
			$path = str_replace(".", "/", $a_path);
			$filename_lyra = $path . ".lyra";
			$filename_php  = $path . ".php";

			if (file_exists($_SERVER['DOCUMENT_ROOT'] . $filename_lyra)) {
				require $filename_lyra;
				array_push($this->t_classpaths, $path);
			}
			elseif (file_exists($_SERVER['DOCUMENT_ROOT'] . $filename_php)) {
				require $filename_php;
				array_push($this->t_classpaths, $path);
			}
			else {
				// @TODO: Calling degugger
				# Debugger atata
			}
		}

		public function Start($a_code)
		{
			$this->m_code = explode("\n", $a_code);

			for ($i = 0; $i < count($this->m_code); $i++) {
				// Parsing imports:
				if (preg_match("/(\s|\t)*import(\s)((\w)+\.)+(\w)+;(\s|\t)*/", $this->m_code[$i])) {
					// @TODO: Implemention with a single regexp
					$classpath = preg_replace("/(\s|\t)*import(\s)/", "", $this->m_code[$i]);
					$classpath = preg_replace("/;(\s|\t)*", "", $classpath);
					$this->addImport($classpath);
				}

				// Parsing classes:
				if (preg_match("/(\s|\t)*class(\s)+(\w)(\s|\t)*\{(\s|\t)*", $this->m_code[$i]) {
					# To be continued...
				}
				
			}
		}

	}
