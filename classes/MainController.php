<?php

class MainController extends UserLogin {

    public $db;


    public $title;

    public $login_required = false;

    public $permission_required = 'any';

    public $parametros = array();
    

    public function __construct($parametros = array()) {

        $this->db = new DB();


        $this->parametros = $parametros;

        $this->check_userlogin();
    }

    public function load_model($model_name = false) {

        if (!$model_name)
            return;

        $model_name = strtolower($model_name);

        $model_path = ABSPATH . '/models/' . $model_name . '.php';

        if (file_exists($model_path)) {

            require_once $model_path;

            $model_name = ucfirst( $model_name);

            if (class_exists($model_name)) {

                return new $model_name($this->db, $this);
            }

            return;
        } 
    }

}