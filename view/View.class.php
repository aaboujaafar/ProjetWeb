<?php
	abstract class View extends MyObject
	{			
		protected $args;
		protected $templateNames;
		protected $controller;
		
		public function __construct($controller, $templateName,$args = array()) {
			$this->templateNames = array();
			$this->templateNames['head'] = 'head';
			$this->templateNames['top'] = 'top';
			$this->templateNames['menu'] = 'menu';
			$this->templateNames['foot'] = 'foot';
			$this->templateNames['content'] = $templateName;
			$this->args = $args;
			$this->args['controller'] = $controller;
		}
		
		public function setArg($key, $val) {
			$this->args[$key] = $val;
		}
		
		public abstract function render();
		
		public function loadTemplate($name,$args=NULL) {
			$templateFileName = __ROOT_DIR . '/templates/'. $name . 'Template.php';
			if(is_readable($templateFileName)) {
				if(isset($args))
					foreach($args as $key => $value)
						$$key = $value;
						
						
				require_once($templateFileName);
			}
			else
				throw new Exception('undefined template "' . $name .'"');
		}
		
	}
?>