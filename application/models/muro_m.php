<?php
class muro_m extends CI_Model {
    
    public function publicar(){
        $this->load->database();  
        $config['upload_path']          = './dist/img_publicaciones/';
        $config['allowed_types']        = '*';
        $config['file_name']        = rand().".png";
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('archivo_post')){
            $error = array('error' => $this->upload->display_errors());
            $config['file_name'] = ""; 
        }
        $data = array(
                'descripcion' => $this->input->post('descripcion_post'),
                'tags'        => $this->input->post('tags_post'),
                'tipo'        => $this->input->post('tipo_post'),
                'id_usuario'  => $_SESSION['usuario'],
                'img_post'  => $config['file_name']
        );
        $this->db->insert('post', $data);    
        redirect(base_url().'index.php/muro', 'Location');
    }
    
    public function comentar(){
        $this->load->database();
        $config['upload_path']          = './dist/img_publicaciones/';
        $config['allowed_types']        = '*';
        $config['file_name']        = rand().".png";
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('comentario_file')){
            $error = array('error' => $this->upload->display_errors());
            $config['file_name'] = ""; 
        }
        $data = array(
                'comentario' => $this->input->post('comentario'),
                'tags'       => $this->input->post('tags_comentario'),
                'id_post'    => $this->input->post('id_post'),
                'id_parent'    => $this->input->post('id_parent'),
                'id_usuario' => $_SESSION['usuario'],
                'img_comentario' => $config['file_name']
        );
        $this->db->insert('comentario', $data);
        redirect(base_url()."index.php/muro#".$this->input->post('id_post')."", 'Location');
    }   
    
    public function get_comentario($id){
        $this->load->database();
        $query = $this->db->query("SELECT comentario.id_comentario, comentario.comentario,comentario.id_usuario,comentario.img_comentario,comentario.id_comentario,comentario.tags,comentario.fecha,usuario.nombre FROM `comentario`,usuario WHERE comentario.id_usuario = usuario.id_usuario and comentario.id_post = '".$id."' and comentario.id_parent = 0 order by fecha");
        return $query->result();
    }
    
    public function get_comentario_parent($id){
        $this->load->database();
        $query = $this->db->query("SELECT comentario.comentario,comentario.id_usuario,comentario.img_comentario,comentario.id_comentario,comentario.tags,comentario.fecha,usuario.nombre FROM `comentario`,usuario WHERE comentario.id_usuario = usuario.id_usuario and comentario.id_parent = '".$id."' order by fecha");
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
            $valor = " día";
        }
        return $tiempo . $valor;
    } 
    
    public function like($post){
        $this->load->database();
        $query = $this->db->query("INSERT INTO `likes`(`id_post`, `id_usuario`) VALUES ('$post','".$_SESSION['usuario']."')");
        if ($query)
            redirect(base_url()."index.php/muro#$post", 'Location');
        else
            redirect(base_url()."index.php/muro#error", 'Location');
    }
    
    public function dislike($post){
        $this->load->database();
        $query = $this->db->query("DELETE FROM `likes` WHERE `id_post` = '$post' and `id_usuario` = '".$_SESSION['usuario']."'");
        if ($query)
            redirect(base_url()."index.php/muro#$post", 'Location');
        else
            redirect(base_url()."index.php/muro#error", 'Location');
    }
    
    public function like_coment($post){
        $this->load->database();
        $query = $this->db->query("INSERT INTO `like_comentario`(`id_comentario`, `id_usuario`) VALUES ('$post','".$_SESSION['usuario']."')");
         redirect(base_url()."index.php/muro#likes_coment_$post", 'Location');
    }
    
    public function dislike_coment($post){
        $this->load->database();
        $query = $this->db->query("DELETE FROM `like_comentario` WHERE `id_comentario` = '$post' and `id_usuario` = '".$_SESSION['usuario']."'");
         redirect(base_url()."index.php/muro#likes_coment_$post", 'Location');
    }

    public function likes_total($id){
        $this->load->database();
        $query = $this->db->query("SELECT id_post FROM likes where `id_post` = '$id'");
        return $query->num_rows();
    }
    
    public function likes_total_comentario($id){
        $this->load->database();
        $query = $this->db->query("SELECT id_comentario FROM like_comentario where `id_comentario` = '$id'");
        return $query->num_rows();
    }
    
    public function tags_format($tags){
        $tags = explode(",",$tags);
         $texto = "";
         foreach($tags as $valor){
            if ($valor != "")
                $texto .= "<a href='#$valor'>#$valor</a> -";
         }
        return "<i>".substr($texto,0,-1)."</i>";
    }
    
    public function get_likes($id_post){
       $this->load->database();
       $query = $this->db->query("SELECT usuario.nombre FROM likes,usuario WHERE likes.id_post = '$id_post' and usuario.id_usuario = likes.id_usuario");
       return $query->result();
    }
    
    public function get_likes_comentario($id_post){
       $this->load->database();
       $query = $this->db->query("SELECT usuario.nombre FROM like_comentario,usuario WHERE like_comentario.id_comentario = '$id_post' and usuario.id_usuario = like_comentario.id_usuario");
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
        redirect(base_url()."index.php/muro", 'Location');
    }
    
    public function boton_like_comentario($id){
        $this->load->database();
        $query = $this->db->query("SELECT id_comentario FROM like_comentario where `id_comentario` = '$id' and `id_usuario` = '".$_SESSION['usuario']."' ");
        if ($query->num_rows() == 0){
            return '<a href="muro/like_coment/'.$id.'"><i class="fa fa-thumbs-up" style="color:#3B5998;"></i> Like</a>';
        }else{
            return '<a href="muro/dislike_coment/'.$id.'"><i class="fa fa-thumbs-down" style="color:#3B5998;"></i> Dislike</a>';;
        } 
        redirect(base_url()."index.php/muro", 'Location');
    }
    
    public function get_post(){ //FUNCION DEL MURO 
        $this->load->database();
        $amigos = json_decode($this->get_lista_amigos()[0]->amigos);
        if(!empty($amigos)){
            $query_parts = "and (";
            foreach ($amigos as $val) {
                $query_parts .= "post.id_usuario LIKE '%".($val)."%' or ";
            }
            $query_parts .= "post.id_usuario LIKE '%".$_SESSION['usuario']."%')";
        }else{
            $query_parts = " and post.id_usuario LIKE '%".$_SESSION['usuario']."%'";
        }
        if($this->input->post('buscar') != ''){
            $query_parts = " and post.tags LIKE '%".$this->input->post('buscar')."%'"; 
        }
        
        $sql = "
        SELECT 
            post.id_post,
            post.descripcion,
            post.tags,
            post.img_post,
            if(post.tipo = 1,'<i class=\'fa fa-globe\'></i> Público',' <i class=\'fa fa-ban\'></i> Privado') as tipo, 
            TIMESTAMPDIFF(MINUTE,post.fecha,NOW()) as fecha,
            post.id_usuario,
            usuario.nombre 
        FROM 
            post,usuario 
        WHERE 
            usuario.id_usuario = post.id_usuario {$query_parts} ORDER BY RAND()"; 

        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function get_nombre(){
        $this->load->database();
        $query = $this->db->query("SELECT nombre from usuario where id_usuario = '".$_SESSION['usuario']."' ");
        return $query->result()[0]->nombre;
    }
    
    public function get_img_perfil($id,$width,$height){
        $this->load->database();
        $query = $this->db->query("SELECT usuario from usuario where id_usuario = '".$id."' ");
        $url = $_SERVER['DOCUMENT_ROOT']."/tecface/dist/img_perfil/".$query->result()[0]->usuario.".png";
        if (!file_exists($url)){
            $url = base_url()."dist/img_perfil/default.png";
        }else{
            $url = base_url()."dist/img_perfil/".$query->result()[0]->usuario.".png";
        }
        return "<img src='$url' style='width:".$width."px; height:".$height."px' class='rounded float-left'>";
    }
    
    public function get_usuarios(){
        $this->load->database();
        $query = $this->db->query("SELECT id_usuario,nombre from usuario where `id_usuario` != '".$_SESSION['usuario']."'");
        return $query->result();
    }
    
    public function remover($valor = 0,$arr){
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
        if($this->db->query("UPDATE `usuario` SET `amigos`='".$amigos."' WHERE  id_usuario = '".$_SESSION['usuario']."'"))
            redirect(base_url()."index.php/muro", 'Location');
        else
            redirect(base_url()."index.php/muro/error", 'Location');
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
        if($this->db->query("UPDATE `usuario` SET `amigos`='".$amigos."' WHERE  id_usuario = '".$_SESSION['usuario']."'")){
             redirect(base_url()."index.php/muro", 'Location');
        }else{
             redirect(base_url()."index.php/muro", 'Location');
        }
        
    }
    
    public function muro(){
        $this->load->database();
        $query = $this->db->query("SELECT amigos from usuario where id_usuario = '".$_SESSION['usuario']."'");
        $amigos = json_decode($query->result()[0]->amigos);
        array_push($amigos,(int) $id);
        $amigos = json_encode(array_values($amigos));
        $query = $this->db->query("UPDATE `usuario` SET `amigos`='".$amigos."' WHERE  id_usuario = '".$_SESSION['usuario']."'");
        redirect(base_url()."index.php/muro", 'Location');
    }
}
?>
