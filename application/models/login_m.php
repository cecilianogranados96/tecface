<?php
class login_m extends CI_Model {
        
    public function registrarse(){
        $this->load->database();
        $datos = array(
            'nombre'           => $this->input->post('nombre'),
            'email'            => $this->input->post('email'),
            'password'         => md5($this->input->post('password')),
            'usuario'          => $this->input->post('usuario'),
            'fecha_nacimiento' => $this->input->post('fecha_nacimiento')
        );
        
        $config['upload_path']          = './dist/img_perfil/';
        $config['allowed_types']        = '*';
        $config['file_name']        = $this->input->post('usuario').".png";
        $this->load->library('upload', $config);
        $this->upload->do_upload('archivo');

        if(!$this->db->insert('usuario', $datos)){
            echo "<script>alert('ERROR Usuario registrado anteriormente');</script>";
        }else{
            echo "<script>alert('Usuario registrado con exito');</script>";
        }
        echo "<script>window.location.href = '../../index.php';</script>";
	}
    
    public function ingresar(){
        $this->load->database();
        $usuario = $this->input->post('usuario');
        $pass = md5($this->input->post('password'));
        $query = $this->db->query("SELECT usuario FROM usuario where usuario = '".$usuario."' ");
        if ($query->num_rows() == 0){
             redirect('../../index.php?error_login=1', 'Location');
        }else{
            $query = $this->db->query("SELECT password FROM usuario where password = '".$pass."' ");
            if ($query->num_rows() == 0){
                 redirect('../../index.php?error_login=2', 'Location');
            }else{
                $query = $this->db->query("SELECT usuario,password,id_usuario FROM usuario where password = '".$pass."' and usuario = '".$usuario."'  ");
                $row = $query->row_array();
                $_SESSION['usuario'] = $row['id_usuario'];
                redirect('../index.php/muro', 'Location');
            }
        }
	}
}
?>