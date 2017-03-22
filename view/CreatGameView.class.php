<?php
	class CreatGameView extends View
	{			
		public function __construct($controller, $templateName,$args = array()) {
			$this->templateNames = array();
			$this->templateNames['head'] = 'head';
			$this->templateNames['top'] = 'top';
			$this->templateNames['menu'] = 'menuUser';
			$this->templateNames['foot'] = 'foot';
			$this->templateNames['content'] = $templateName;
			$this->args = $args;
			$this->args['controller'] = $controller;
		}
		
		public function render(){
			$this->loadTemplate($this->templateNames['head'], $this->args);
			$this->loadTemplate($this->templateNames['top'], $this->args);
			$this->loadTemplate($this->templateNames['menu'], $this->args);
			$this->loadTemplate($this->templateNames['content'], $this->args);
			$this->loadTemplate($this->templateNames['foot'], $this->args);
		}
	}
?>