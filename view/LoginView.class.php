<?php
	class LoginView extends View
	{			
		public function render(){
			$this->loadTemplate($this->templateNames['head'], $this->args);
			$this->loadTemplate($this->templateNames['top'], $this->args);
			$this->loadTemplate($this->templateNames['menu'], $this->args);
			$this->loadTemplate($this->templateNames['content'], $this->args);
			$this->loadTemplate($this->templateNames['foot'], $this->args);
		}
	}
?>