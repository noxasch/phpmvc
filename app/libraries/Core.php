<?php
/**
 * 
 * read url and pull out stuff
 * decide what to load
 * App Core Class
 * mapping URLs to their controller
 * Create URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

 /** 
  * by default will load page controller
  * eg: baseaddress/
  */
 class Core {
     protected $currentController = 'Pages';
     protected $currentMethod = 'index';
     protected $params = []; 
     // put whatever in the url after baseurl into an array
     // eg: phpmvc/posts/add
     // arr[0] = posts
     // arr[1] = add

    public function __construct() {
        // $this->getUrl()
        // var_dump($this->getUrl());
        
        $url = $this->getUrl();

        // 1. look in controller for first url params
        // echo '../app/controllers/' . ucfirst($url[0]) . '.php';
        if(file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')){
            // if exists set as controller
            $this->currentController = ucfirst($url[0]);
            // unset url[0]
            unset($url[0]);
        }

        // 2. require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // 3. instantiate controller object: $pages = new $pages;
        $this->currentController = new $this->currentController;

        // 4. check for second url params
        if(isset($url[1])){
            // check if method exist in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];

                // unset url[0]
                unset($url[1]);
            }
        }
        

        // 5. Get Params
        // if url exist assign url to params : if not set it as empty array
        $this->params = $url ? array_values($url) : [];

        // 6. Call a callback with array of a params
        // call function inside given object with given parameters
        // this will call pages/about/33 
        // as we unset $url[0] and $url[1], all that left is $url[2] = 33 as params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        /**
         *  because we can't call it like this:
         *  $this->currentController->$this->currentMethod();
         */
        

    }

     public function getUrl(){
         // check if url params is set
         if(isset($_GET['url'])){
            // echo $_GET['url'];
            // 1. strip trailing slash ( "/" ) from end of the url
            $url = rtrim($_GET['url'], '/');
            // echo 'trim:' . $url;
            // 2. sanitize input url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // 3. break url param separated by (/) into an array
            $url = explode('/', $url); // this will output an array
            return $url;
         }
         
     }

 }