<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $this->load->view('header');
        $this->load->model('login_m');
		$this->load->view('login');
        $this->load->view('fotter');
	}
        
    public function ingresar()
	{
        $this->load->model('login_m');
		$this->login_m->ingresar();
	}
    
    public function registrarse()
	{
        $this->load->model('login_m');
		$this->login_m->registrarse();
	}
    
    public function registro()
	{
        $this->load->view('header');
        $this->load->view('registro');
	}
        
    public function pass_olvidado()
	{
        $this->load->view('header');
        $this->load->view('pass_olvidado');
	}

    public function recuperar()
	{
        $this->load->model('login_m');
		$this->login_m->recuperar();
	}
    
    public function actualizar()
	{
        $this->load->model('login_m');
		$this->login_m->actualizar();
	}

    public function salir()
	{
        session_destroy();
        header('Location: '.base_url().'');
	}    
}
