<?php
/**
 * home - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class LoginController extends MainController
{

	/**
	 * Carrega a página "/views/home/index.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Home';

        $modeloPessoa = $this->load_model('pessoa');
        $modeloFace = $this->load_model('face');


        $this->title = 'Login';


        require ABSPATH . '/views/_includes/login.php';
		
    } // index


    /**
     * Carrega a página "/views/home/index.php"
     */
    public function login() {

        $this->title = 'Login';


        require ABSPATH . '/views/_includes/login.php';


    } // index
	
} // class HomeController