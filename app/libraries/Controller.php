<?php
/**
 * This is the Class (short) Description
 * Core Controller Class
 * Base Controller Class
 * Load Models and View
 * every Controller class will extends this class
 * have only 2 method: model and view
 * 
 * Long description for file (if any)
 * 
 * LICENSE: 
 * 
 * PHP version 7
 * 
 * @category    CategoryName
 * @package     packageName
 * @author      Noxasch <noxasch@gmail.com>
 * @copyright   none
 * @license     MIT 
 * @version     GIT
 * @link        somelink
 * @see         https://stackoverflow.com/questions/1310050/php-function-comments
 * @since       File available since Release 0.3.0
 * @deprecated  if file release is deprecated state since when
 */

 class Controller {
    // Load model

    /**
     * This is function description
     * - load the given model
     * @param string $model string of model name
     * @access public
     * @author Noxasch <noxasch@gmail.com>
     */
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