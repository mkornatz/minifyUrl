<?php
/**
 * @package MinifyUrl
 */
class MinifyUrl {

	protected $_scriptProperties = array();
	protected $_files = array();
	protected $_groups = array();

	/**
	 * Initialize
	 */
	public function __construct($modx, $scriptProperties){

		$this->_scriptProperties = $scriptProperties;

		//Accept string 'false' or 'off' as valid
		switch(@$this->_scriptProperties['fileVersions']){
			case 'false':
			case 'off':
			case false:
				$this->_scriptProperties['fileVersions'] = false;
				break;

			default:
				$this->_scriptProperties['fileVersions'] = true;
		}

		//Set base path
		if(!isset($this->_scriptProperties['baseFilePath'])){
			$this->_scriptProperties['baseFilePath'] = $modx->config['base_path'];
		}

		$this->addFiles($this->_scriptProperties['files']);
		$this->addGroups($this->_scriptProperties['groups']);
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
		return filemtime($this->_scriptProperties['baseFilePath'] . $file);
	}

	/**
	 * Render uri
	 */
	public function run(){

		//Return # for url if nothing specified
		if(empty($this->_files) && empty($this->_groups)){
			return '#';
		}

		$output = $this->_scriptProperties['minPath'] . '?';

		//Is versioning on and files specified?
		if($this->_scriptProperties['fileVersions'] && !empty($this->_files)){

			$version = '';

			foreach($this->_files as $file){
				$version += $this->getVersion($file);
			}

			//Use last 10 digits of total, and get 10 digits max
			$queryParts[] = '_v=' . substr($version, -10, 10);

		}

		//Files to include
		if(!empty($this->_files)){
			$queryParts[] = 'f=' . implode(',', $this->_files);
		}

		//Groups to include
		if(!empty($this->_groups)){
			$queryParts[] =  'g=' . implode(',', $this->_groups);
		}

		$output .= implode('&', $queryParts);

		return $output;
	}

}

?>
