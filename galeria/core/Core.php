<?php

	class Core{

		public function run(){			
			// $url = explode("index.php", $_SERVER['PHP_SELF']);
			// $url = end($url);

			$url = '/'.((isset($_GET['q'])) ? $_GET['q'] : '');	

			$params = array();
			if(!empty($url) && $url !=  '/'){
				$url = explode('/', $url);
				array_shift($url);
				
				$currentController = $url[0].'Controller';
				array_shift($url);

				if(isset($url[0]) && !empty($url[0])){
					$currentAction = $url[0];
					array_shift($url);
				}else{
					$currentAction = 'index';
				}

				if(count($url) > 0){
					$params = $url;
				}
				
			}else{
				$currentController = 'homeController';
				$currentAction = 'index';
			}			

			// require_once 'core/controller.php';			

			// Muda o $currentController pelo nome do controller que eu passar
			$c = new $currentController();
			// passa parametros para a minha action
			call_user_func_array(array($c, $currentAction), $params); 

			// Verifica chamada do controller e sua action
			// echo "CONTROLLER: " .$this->currentController;
			// echo "<br/>ACTION: " .$this->currentAction;		
			// echo "<br/>PARAMS: ";
			// print_r($params);
		}

	}

?>