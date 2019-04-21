<div class="feed-content" style="width: 60%;">
    
    <div class="recentcontainer">
        <?= form_open_multipart('muro/publicar'); ?>
        <ul class="newpostheader nav nav-tabs nav-justified">
            <li>
                <a href="javascript:void(0)">
          <i class="fa fa-pencil"></i>
          <span>Crear un Post</span>
        </a>
            </li>
        </ul>
        <div class="newpost">
            <textarea placeholder="En que estas pensando..." name="descripcion_post"></textarea>
        </div>
        <table class="table newpostfooter">
            <tr>
                <td colspan="3">
                     <input type="file" class="form-control" name="archivo_post">
                </td>
            </tr>
            <tr>
                <td style="width: 85%;">
                    <input class="input-tags" name="tags_post" id="input-tags" placeholder="Digite un tag y presione enter" >
                </td>
                <td style="width: 15%;">
                    <select class="form-control" style="height: 35px;" name="tipo_post">
                        <option value="1">Público</option>
                        <option value="2">Privado</option>
                    </select>
                </td>
                <td style="width: 15%;">
                    <center>
                        <?=form_submit("Publicar",'Publicar', "class='btn btn-success' style='height: 35px;' "); ?>
                    </center>
                </td>
            </tr>
        </table>
        <?=form_close(); ?>
    </div>

<?php 
    if (empty($this->muro_m->get_post()) and $this->input->post('buscar') == ''){
        echo "<center><h2>¡Haz amigos primero!</h2></center>";
    }else if (empty($this->muro_m->get_post()) and $this->input->post('buscar') != ''){
        echo "<center><h2>Sin Resultados :(</h2></center>";
    }else {
        foreach($this->muro_m->get_post() as $row){ ?>
    <div class="recentcontainer" id="<?=$row->id_post;?>">
        <div class="newpostheader">
                <table class="table" border="0">
                    <tr>
                        <td style="width: 10%;"><?= $this->muro_m->get_img_perfil($row->id_usuario,80,80); ?></td>
                        <td>
                            <center>
                                <span class="name"><h3><?= $row->nombre; ?></h3></span>
                                <a class="date">Hace <?= $this->muro_m->tiempo($row->fecha); ?></a> - <?= $row->tipo; ?>
                            </center>
                        </td>  
                    </tr>
                </table>
           
        </div>
       
        <div class="postcontent">
            <?php 
            if($row->img_post != '' ){ 
                echo "<center><img src='".base_url()."dist/img_publicaciones/".$row->img_post."' width='50%' ></center>";
            }
            ?>
            <h2> <?= parse_smileys( $row->descripcion, base_url().'dist/smileys'); ?></h2>
            <h4> <?= $this->muro_m->tags_format($row->tags); ?></h4>
        </div>
        <div class="commentpost" style="padding: 1%;">
            <br>
            <table style='width: 100%;'>
                <tr>
                    <td> 
                        <center>
                            <a data-toggle="collapse" href="#likes_post_<?=$row->id_post;?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                (<?= $this->muro_m->likes_total($row->id_post) ?>)
                            </a>
                            <?= $this->muro_m->boton_like($row->id_post) ?>
                        </center>
                        <div class="collapse" id="likes_post_<?=$row->id_post;?>">
                        <?php 
                            foreach($this->muro_m->get_likes($row->id_post) as $likes){ 
                                echo "- ".$likes->nombre."<br>";
                            } 
                        ?>
                        </div>
                    </td>
                    <td> 
                        <center>(<?= $this->muro_m->comentarios_total($row->id_post) ?>) <i class="fa fa-comments" style="color:#FF0000;"></i> Comentarios </center>
                    </td>
                </tr>
            </table>
            <hr>
           
            <?php foreach($this->muro_m->get_comentario($row->id_post) as $comentarios){  ?>
            <table style="padding: 1%;">
                    <tr>
                        <td>
                              <?= $this->muro_m->get_img_perfil($comentarios->id_usuario,50,50); ?>          
                        </td>                
                        <td>
                            <b><?= $comentarios->nombre; ?></b>
                            <?= parse_smileys( $comentarios->comentario, base_url().'dist/smileys'); ?> 
                            <?= $this->muro_m->tags_format($comentarios->tags); ?> <br> 
                            <?php
                                if($comentarios->img_comentario != '' ){ 
                                    echo "<center><img src='".base_url()."dist/img_publicaciones/".$comentarios->img_comentario."' style='width:200px;height: 200px;'></center> <br>";
                                }
                            ?>
                            
                            Hace <?= $this->muro_m->tiempo($comentarios->fecha); ?> <a href="<?php echo base_url()."index.php/muro?id=".$comentarios->id_comentario."#comentar_".$row->id_post; ?>">Comentar</a> 
                        </td>
                    </tr>
                </table>
            <hr>
                <?php foreach($this->muro_m->get_comentario_parent($comentarios->id_comentario) as $comentarios_parent){  ?>
                    <table style="padding: 5%;margin-left: 10%;" id=likes_coment_<?=$comentarios_parent->id_comentario;?>>
                            <tr>
                                <td>
                                      <?= $this->muro_m->get_img_perfil($comentarios_parent->id_usuario,50,50); ?>          
                                </td>                
                                <td>
                                    <b><?= $comentarios_parent->nombre; ?></b>
                                    <?= parse_smileys( $comentarios_parent->comentario, base_url().'dist/smileys'); ?> 
                                    <?= $this->muro_m->tags_format($comentarios_parent->tags); ?> <br> 
                                    <?php
                                        if($comentarios_parent->img_comentario != '' ){ 
                                            echo "<center><img src='".base_url()."dist/img_publicaciones/".$comentarios_parent->img_comentario."' style='width:200px;height: 200px;'></center> <br>";
                                        }
                                    ?>
                                    Hace <?= $this->muro_m->tiempo($comentarios_parent->fecha); ?>
                                    
                                <a data-toggle="collapse" href="#likes_coment_<?=$comentarios_parent->id_comentario; ?>" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                    (<?= $this->muro_m->likes_total_comentario($comentarios_parent->id_comentario) ?>)
                                </a>
                                    <?= $this->muro_m->boton_like_comentario($comentarios_parent->id_comentario) ?>
                                <div class="collapse" id="likes_coment_<?=$comentarios_parent->id_comentario;?>">
                                <?php 
                                    foreach($this->muro_m->get_likes_comentario($comentarios_parent->id_comentario) as $likes){ 
                                        echo "- ".$likes->nombre."<br>";
                                    } 
                                ?>
                                </div>                                    
                                </td>
                            </tr>
                        </table>
            <hr>
            
                <?php } ?>
            
            <?php } ?>
            <div class="input-group" id="comentar_<?php echo $row->id_post; ?>">
                <?= form_open_multipart('muro/comentar'); ?>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3">
                             <input type="file" class="form-control" name="comentario_file" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea class="form-control" name="comentario" placeholder="Escribir un comentario..." style="width: 100%; height: 60px;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 88%;">
                            
                            <input class="input-tags"  id="input-tags" name="tags_comentario" placeholder="Digite un tag y precione enter" style="width: 100%;">
                            <input  name="id_post" value="<?= $row->id_post; ?>" style="display:none;">
                            <?php if(isset($_GET['id'])){
                                $id_parent = $_GET['id'];
                            }else{
                                $id_parent = 0;
                            } ?>
                            <input  name="id_parent" value="<?= $id_parent; ?>" style="display:none;">
                        </td>
                        <td>
                            <center><?=form_submit("Publicar",'Publicar', "class='btn btn-success' style='height: 35px;' "); ?></center>
                        </td>
                    </tr>
                </table>
                 <?=form_close(); ?>
            </div>
        </div>
    </div> 
    <?php } }  ?>
</div>

<div class="right-content">
    <div class="section-content">
     <h2>
      Personas<br>
    </h2>
    <ul>
        <?php 
        $amigos = json_decode($this->muro_m->get_lista_amigos()[0]->amigos);
        if($amigos == ""){
            $amigos = array();
        }
         foreach($this->muro_m->get_usuarios() as $row){
             echo ' <li>'.$this->muro_m->get_img_perfil($row->id_usuario,50,50).' <h4> <b> <center>'.$row->nombre.'</center></b></h4><br>'; 
                if (!in_array($row->id_usuario, $amigos)){
                    echo '<center><a href="muro/hacer_amigo/'.$row->id_usuario.'" class="btn btn-info" style="position: inherit;" >Hacer Amigos</a></center>';
                }else{
                    echo '<center><a href="muro/eliminar_amigo/'.$row->id_usuario.'" class="btn btn-danger" style=";position: relative;" >Eliminar Amigo</center>';
                }
            echo '</a></li>';
            } ?>
    </ul>
    </div>
</div>

