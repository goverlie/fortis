<?php
namespace core\libs;


class Navigation {
	
	private $_module = null;
	public $menuItems = null;
	
	function __construct () {
		$this->_module = new Module();
		
		$this->menuItems = $this->_module->getUserModules(Session::get('user_id'));
		//see what modules are loaded?
		$this->loadedModules = $this->_module->loadModuleSettings(Session::get('user_id'));
	}
	
	public function init () {}
	

}
?>
