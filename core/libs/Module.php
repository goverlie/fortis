<?php
namespace core\libs;


class Module {
	
	private $_model = null;
	
	/* Please use init  */
	function __construct () {
		$this->_model = new Model();
	}
	
	public  function init () {
		
	}
	
	public function loadModuleSettings($user_id = NULL) {
		$userModules = array();
		$coreModules = $this->getCoreModules();
		$externalModules = $this->getExternalModules();
		$allModules = array_merge($coreModules,$externalModules);
		$test = '';
		foreach ($allModules as $module) {
			//Create a settings and load in the defaults
			$defaultSettings = $this->_model->db->select('
				SELECT module_setting_id, module_setting_name, module_setting_common_name, module_setting_value as module_setting_value
				FROM ' . DB_TABLE_PREFIX . 'module_settings
				WHERE module_id = ' . $module['module_id']
			);

			//Check if a user is logged in
			if (!empty($user_id)) {
				//Hold the user settings
				$userSettings = $this->_model->db->select('
				SELECT ums.module_setting_id, module_setting_name, module_setting_common_name, ums.module_setting_value
				FROM f_module_settings ms
				INNER JOIN f_user_module_settings ums
				ON ms.module_setting_id = ums.module_setting_id
				WHERE ums.user_id = ' . $user_id . ' AND ums.module_setting_id = ms.module_setting_id AND ms.module_id = '.$module['module_id'].''
				);
				$module['settings'] = array_replace($defaultSettings,$userSettings);
			}
			else {
				$module['setting'] = $defaultSettings;
			}
			
			array_push($userModules,$module);
		}
		return $userModules;
	}
	
	public function getCoreModules() {
		return $this->_model->db->select('SELECT m.module_id, m.module_name, m.module_common_name, m.module_type
								FROM ' . DB_TABLE_PREFIX . 'modules m
								WHERE m.module_type = "core"');
	}
	
	public function getExternalModules () {
		return $this->_model->db->select('SELECT m.module_id, m.module_name, m.module_common_name, m.module_type
								FROM ' . DB_TABLE_PREFIX . 'modules m
								WHERE m.module_type = "external"');
	}

	public function getUserModules($user_id = NULL) {
		if (empty($user_id)) {
				return false;
		}
		return $modules = $this->_model->db->select('SELECT m.module_id, m.module_name, m.module_common_name,  m.module_type
								FROM ' . DB_TABLE_PREFIX . 'modules m
								INNER JOIN ' . DB_TABLE_PREFIX . 'user_modules um
								ON um.module_id = m.module_id
								WHERE um.user_id = :user_id
								AND m.module_type = "external"',
								   	array(':user_id' => $user_id)
								  );
	}
	
	public function loadIntoSession () {
		
	
	}

}
