<?php

class MinifyUrl {

	protected $_config = array();
	protected $_files = array();
	protected $_groups = array();

	/**
	 *
	 */
	public function __construct($config){
		$this->_config = $config;
	}

	/**
	 * Add files to be rendered
	 */
	public function addFiles($files){

		if(!is_array($files)){
			$files = array($files);
		}

		$this->_files = array_merge($this->_files, $files);
	}

	/**
	 * Add groups to be rendered
	 */
	public function addGroups($groups){
		if(!is_array($groups)){
			$groups = array($groups);
		}

		$this->_groups = array_merge($this->_groups, $groups);
	}

	/**
	 * Get "version" of file using modified time
	 * @param string $file Filename
	 */
	protected function getVersion($file){
		return filemtime($this->_config['baseFilePath'] . $file);
	}

	/**
	 * Render uri
	 */
	public function render(){

		if(empty($this->_files) && empty($this->_groups)){
			return false;
		}

		$output = $this->_config['minPath'];

		//Is versioning on and files specified?
		if($this->_config['useVersion'] && !empty($this->_files)){

			$version = 0;

			foreach($this->_files as $file){
				$version += $this->getVersion($file);
			}

			//Use last 10 digits of total, and get 10 digits max
			$output .= '?_v=' . substr($version, -10, 10) . '&';
		}

		if(!empty($this->_files)){
			$output .= 'f=' . implode(',', $this->_files);
		}

		if(!empty($this->_groups)){
			$output .= 'g=' . implode(',', $this->_groups);
		}

		return $output;
	}

}

?>
