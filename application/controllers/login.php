<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
        $this->load->view('header');
        $this->load->model('Login_m');
		$this->load->view('login');
        $this->load->view('fotter');
	}
        
    public function ingresar(){
        $this->load->model('Login_m');
		$this->login_m->ingresar();
	}
    
    public function ingresar_FB(){
        $this->load->model('Login_m');
		$this->login_m->ingresar_FB();
	}
    
    public function editar(){
        $this->load->model('Login_m');
		$this->login_m->editar();
	}
    
    
    public function registrarse(){
        $this->load->model('Login_m');
		$this->login_m->registrarse();
	}

    public function salir(){
        session_destroy();
        header('Location: '.base_url().'?error=1');
	}    
}
