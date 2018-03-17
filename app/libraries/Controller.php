<?php
/**
 * Core Controller Class
 * Base Controller Class
 * Load Models and View
 * every Controller class will extends this class
 * have only 2 method: model and view
 */

 class Controller {
    // Load model
    public function model($model){
        // whatever model requested, it will call (require) that model from model folder
        // 1. require model file
        require_once '../app/models/' . $model . '.php';

        // 2. instantiate the mdoel
        return new $model();
    }

    // Load View
    // data array is passed from controller
    public function view($view, $data = []){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            // view does not exist
            die('View does not exists');
        }

    }
 }