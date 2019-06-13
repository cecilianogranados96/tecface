<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Muro extends CI_Controller {
    
	public function index(){
        $this->load->model('Muro_m');
        $this->load->view('cuenta/header');
		$this->load->view('cuenta/muro');
        $this->load->view('cuenta/fotter');  
	}

	public function editar(){
        $this->load->model('Muro_m');
        $this->load->view('cuenta/header');
		$this->load->view('cuenta/editar');
        $this->load->view('cuenta/fotter');  
	}
    
   	public function publicar(){
        $this->load->model('Muro_m');
		$this->Muro_m->publicar();
	}

    public function comentar(){
        $this->load->model('Muro_m');
		$this->Muro_m->comentar();
	}
    
    public function eliminar_amigo(){
        $this->load->model('Muro_m');
		$this->Muro_m->eliminar_amigo($this->uri->segment(3));
	}
    
    public function hacer_amigo(){
        $this->load->model('Muro_m');
		$this->Muro_m->hacer_amigo($this->uri->segment(3));
	}
    
    public function like(){
        $this->load->model('Muro_m');
		$this->Muro_m->like($this->uri->segment(3));
	}

    public function dislike(){
        $this->load->model('Muro_m');
		$this->Muro_m->dislike($this->uri->segment(3));
	}
    
    public function like_coment(){
        $this->load->model('Muro_m');
		$this->Muro_m->like_coment($this->uri->segment(3));
	}

    public function dislike_coment(){
        $this->load->model('Muro_m');
		$this->Muro_m->dislike_coment($this->uri->segment(3));
	}
    
    
    
}
