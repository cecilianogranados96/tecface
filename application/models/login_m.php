<?php
class login_m extends CI_Model {
        
    public function registrarse()
	{
        $this->load->database();
        $datos = array(
            'nombre' => $this->input->post('nombre'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'usuario' => $this->input->post('usuario'),
            'fecha_nacimiento' => $this->input->post('fecha_nacimiento')
        );
        //$this->db->db_debug = false;
        if(!$this->db->insert('usuario', $datos)){
            echo "<script>alert('ERROR Usuario registrado anteriormente');</script>";
        }else{
            echo "<script>alert('Usuario registrado con exito');</script>";
        }
        echo "<script>window.location.href = '../../index.php';</script>";
	}
    
    public function ingresar()
    {
        $this->load->database();
        $usuario = $this->input->post('usuario');
        $pass = md5($this->input->post('password'));
        $query = $this->db->query("SELECT usuario FROM usuario where usuario = '".$usuario."' ");
        if ($query->num_rows() == 0){
            header('Location: ../../?error_login=1');
        }else{
            $query = $this->db->query("SELECT password FROM usuario where password = '".$pass."' ");
            if ($query->num_rows() == 0){
               header('Location: ../../?error_login=2'); 
            }else{
                $query = $this->db->query("SELECT usuario,password,id_usuario FROM usuario where password = '".$pass."' and usuario = '".$usuario."'  ");
                $row = $query->row_array();
                $_SESSION['usuario'] = $row['id_usuario'];
                header('Location: ../muro');
            }
        }
	}
    
    public function recuperar()
    {
        $this->load->database();
        $this->load->library('email');
        $this->load->helper('string');
        $query = $this->db->query("SELECT email FROM usuarios where email = '".$this->input->post('email')."'");
        if(count($query->result_array())){
            $nuevo_pass = random_string('alnum', 8);
            $query = $this->db->query("UPDATE `usuarios` SET `password`='".$nuevo_pass."' WHERE `email`='".$this->input->post('email')."'");
            $msg = 'Hemos actalizado la contraseña por motivos de seguridad a: '.$nuevo_pass.' Para cambiar esta contraseña de a la opcion de cuenta';
            $this->email->from('noreplay@gmail.com')->to($email)->subject("Password Olvidado")->message($msg)->send();
            echo "<script>alert('Verifica tu email');</script>";
        }else{
             echo "<script>alert('ERROR Email no encontrado');</script>";
           
        }
         echo "<script>window.location.href = '../../index.php';</script>";    
	}


    public function actualizar_usuario()
    {
        $this->load->database();
        if ($this->input->post('password') == ''){
            $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->input->post('nombre')."', tipo = '".$this->input->post('rol')."'  WHERE `id_usuario` = ".$this->uri->segment(3)."");
        }else{
            $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->input->post('nombre')."',`password`='".md5($this->input->post('password'))."', tipo = '".$this->input->post('rol')."' WHERE `id_usuario` = ".$this->uri->segment(3)."");
        }
        echo "<script>alert('Actualizado con exito');</script>";
        echo "<script>window.location.href = '../usuarios';</script>";      
	} 
        
    
    public function actualizar()
    {
        $this->load->database();
        if ($this->input->post('password') == ''){
            $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->input->post('nombre')."' WHERE `id_usuario` = ".$_SESSION['usuario']."");
        }else{
            $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->input->post('nombre')."',`password`='".md5($this->input->post('password'))."' WHERE `id_usuario` = ".$_SESSION['usuario']."");
        }
        echo "<script>alert('Actualizado con exito, ingresa nuevamente para ver reflejados los cambios');</script>";
        echo "<script>window.location.href = '../../index.php/login/salir';</script>";      
	}
}
?>