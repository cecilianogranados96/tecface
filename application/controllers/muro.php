<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Muro extends CI_Controller {
    
	public function index(){
        $this->load->model('muro_m');
        $this->load->view('cuenta/header');
		$this->load->view('cuenta/muro');
        $this->load->view('cuenta/fotter');  
	}
    
   	public function publicar(){
        $this->load->model('muro_m');
		$this->muro_m->publicar();
	}

    public function comentar(){
        $this->load->model('muro_m');
		$this->muro_m->comentar();
	}
    
    public function eliminar_amigo(){
        $this->load->model('muro_m');
		$this->muro_m->eliminar_amigo($this->uri->segment(3));
	}
    
    public function hacer_amigo(){
        $this->load->model('muro_m');
		$this->muro_m->hacer_amigo($this->uri->segment(3));
	}
    
    public function like(){
        $this->load->model('muro_m');
		$this->muro_m->like($this->uri->segment(3));
	}

    public function dislike(){
        $this->load->model('muro_m');
		$this->muro_m->dislike($this->uri->segment(3));
	}
    
    
}
