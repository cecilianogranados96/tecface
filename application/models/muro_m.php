<?php
class muro_m extends CI_Model {
    
    public function publicar(){
        $this->load->database();  
        $data = array(
                'descripcion' => $this->input->post('descripcion_post'),
                'tags' => $this->input->post('tags_post'),
                'tipo' => $this->input->post('tipo_post'),
                'id_usuario' => $_SESSION['usuario']
        );
        $this->db->insert('post', $data);
        echo "<script>alert('Insertado con exito');</script>";
        echo "<script>window.location.href = '../../index.php/muro';</script>";
    }
    
    public function comentar(){
        $this->load->database();
        $data = array(
                'comentario' => $this->input->post('comentario'),
                'tags' => $this->input->post('tags_comentario'),
                'id_post' => $this->input->post('id_post'),
                'id_usuario' => $_SESSION['usuario']
        );
        $this->db->insert('comentario', $data);
        echo "<script>alert('Comentado con exito');</script>";
        echo "<script>window.location.href = '../../index.php/muro';</script>";
    }   
    
    public function get_comentario($id){
        $this->load->database();
        $query = $this->db->query("SELECT comentario.comentario,comentario.tags,comentario.fecha,usuario.nombre FROM `comentario`,usuario WHERE comentario.id_usuario = usuario.id_usuario and comentario.id_post = '".$id."' ");
        return $query->result();
    }

    public function get_lista_amigos(){
        $this->load->database();
        $query = $this->db->query("SELECT amigos from usuario where id_usuario = '".$_SESSION['usuario']."'");
        return $query->result();
    }
    
    function tiempo($tiempo) {
        if ($tiempo < 60) {
            $tiempo = $tiempo;
            $valor = " minutos";
        } elseif ($tiempo > 60 && $tiempo < 1440) {
            $tiempo = $tiempo / 60;
            $tiempo = number_format($tiempo);
            $valor = " horas";
        } elseif ($tiempo > 1440) {
            $tiempo = $tiempo / 1440;
            $tiempo = number_format($tiempo);
            $valor = " días";
        }
        return $tiempo . $valor;
    } 
    
    public function like($post){
        $this->load->database();
        $query = $this->db->query("INSERT INTO `likes`(`id_post`, `id_usuario`) VALUES ('$post','".$_SESSION['usuario']."')");
        echo "<script>window.location.href = '../../muro';</script>";  
    }
    
    public function dislike($post){
        $this->load->database();
        $query = $this->db->query("DELETE FROM `likes` WHERE `id_post` = '$post' and `id_usuario` = '".$_SESSION['usuario']."'");
        echo "<script>window.location.href = '../../muro';</script>";  
    }
    
    public function likes_total($id){
        $this->load->database();
        $query = $this->db->query("SELECT id_post FROM likes where `id_post` = '$id'");
        return $query->num_rows();
    }
    
    
    public function tags_format($tags){
        return "<i>"."#".str_replace(",",", #",$tags)."</i>";
    }
    
    public function get_likes($id_post){
       $this->load->database();
       $query = $this->db->query("SELECT usuario.nombre FROM likes,usuario WHERE likes.id_post = '$id_post' and usuario.id_usuario = likes.id_usuario");
       return $query->result();
    }

    public function comentarios_total($id){
        $this->load->database();
        $query = $this->db->query("SELECT id_comentario FROM comentario where `id_post` = '$id'");
        return $query->num_rows();
    }
    
    public function boton_like($id){
        $this->load->database();
        $query = $this->db->query("SELECT id_post FROM likes where `id_post` = '$id' and `id_usuario` = '".$_SESSION['usuario']."' ");
        if ($query->num_rows() == 0){
            return '<a href="muro/like/'.$id.'"><i class="fa fa-thumbs-up" style="color:#3B5998;"></i> Like</a>';
        }else{
            return '<a href="muro/dislike/'.$id.'"><i class="fa fa-thumbs-down" style="color:#3B5998;"></i> Dislike</a>';;
        }
        echo "<script>window.location.href = '../../muro';</script>";  
    }
    
    public function get_post(){
        $this->load->database();
        $query = $this->db->query("SELECT post.id_post,post.descripcion,post.tags,if(post.tipo = 1,'<i class=\'fa fa-globe\'></i> Público',' <i class=\'fa fa-ban\'></i> Privado') as tipo, TIMESTAMPDIFF(MINUTE,post.fecha,NOW()) as fecha,post.id_usuario,usuario.nombre FROM post,usuario WHERE usuario.id_usuario = post.id_usuario");
        return $query->result();
    }
    
    public function get_usuarios(){
        $this->load->database();
        $query = $this->db->query("SELECT id_usuario,nombre from usuario");
        return $query->result();
    }
    
    public function remover($valor,$arr){
        foreach (array_keys($arr, $valor) as $key) {
            unset($arr[$key]);
        }
        return $arr;
    }
    
    public function eliminar_amigo($id){
        $this->load->database();
        $query = $this->db->query("SELECT amigos from usuario where id_usuario = '".$_SESSION['usuario']."'");
        $amigos = json_decode($query->result()[0]->amigos);
        $amigos = $this->remover($id,$amigos);
        $amigos = json_encode(array_values($amigos));
        $query = $this->db->query("UPDATE `usuario` SET `amigos`='".$amigos."' WHERE  id_usuario = '".$_SESSION['usuario']."'");
        echo "<script>alert('Eliminado con exito');</script>";
        echo "<script>window.location.href = '../../muro';</script>";  
    }

    public function hacer_amigo($id){
        $this->load->database();
        $query = $this->db->query("SELECT amigos from usuario where id_usuario = '".$_SESSION['usuario']."'");
        $amigos = json_decode($query->result()[0]->amigos);
        if($amigos == ""){
            $amigos = array();
        }
        array_push($amigos,(int) $id);
        $amigos = json_encode(array_values($amigos));
        $query = $this->db->query("UPDATE `usuario` SET `amigos`='".$amigos."' WHERE  id_usuario = '".$_SESSION['usuario']."'");
        echo "<script>alert('Amigo Agregado con exito');</script>";
        echo "<script>window.location.href = '../../muro';</script>";
    }
    
   public function muro(){
        $this->load->database();
        $query = $this->db->query("SELECT amigos from usuario where id_usuario = '".$_SESSION['usuario']."'");
        $amigos = json_decode($query->result()[0]->amigos);
        array_push($amigos,(int) $id);
        $amigos = json_encode(array_values($amigos));
        $query = $this->db->query("UPDATE `usuario` SET `amigos`='".$amigos."' WHERE  id_usuario = '".$_SESSION['usuario']."'");
        echo "<script>alert('Amigo Agregado con exito');</script>";
        echo "<script>window.location.href = '../../muro/';</script>";
    }

}
?>