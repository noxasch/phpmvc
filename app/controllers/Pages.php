<?php
    // each controller  have its own view folder
    class Pages extends Controller {
        public function __construct(){
            // echo 'Pages loaded';
        }

        // since Pages is default controller it must have index function
        public function index(){
            // $this->view('hello'); this will output view does not exists
            $data = [
                'title' => 'Welcome'
            ];
            $this->view('pages/index', $data);

        }

        public function about() {
            //echo 'This is about';
            $data = [
                'title' => 'About Us'
            ];

            $this->view('pages/about', $data);
        }
    }