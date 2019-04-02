<div class="feed-content" style="width: 60%;">
    
    
    <div class="recentcontainer">
        <?= form_open('muro/publicar'); ?>
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
                <td style="width: 85%;">
                    <input class="input-tags" name="tags_post" id="input-tags" placeholder="Digite un tag y precione enter" >
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

<?php foreach($this->muro_m->get_post() as $row){ ?>
    <div class="recentcontainer" id="<?=$row->id_post;?>">
        <div class="newpostheader">
            <center>
                <span class="name"><h3><?= $row->nombre; ?></h3></span>
                <a class="date">Hace <?= $this->muro_m->tiempo($row->fecha); ?></a> - <?= $row->tipo; ?>
                </center>
        </div>
        <div class="postcontent">
            <h2> <?= $row->descripcion; ?></h2>
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

            <?php foreach($this->muro_m->get_comentario($row->id_post) as $comentarios){ ?>
            <table style="padding: 1%;">
                    <tr>
                        <td>
                            <b><?= $comentarios->nombre; ?></b> <?= $comentarios->comentario; ?> - <?= $this->muro_m->tags_format($comentarios->tags); ?> <br> 
                            Hace <?= $this->muro_m->tiempo($comentarios->fecha) ?>
                        </td>
                    </tr>
                </table>
            <hr>
            <?php } ?>
            <div class="input-group">
                <?= form_open('muro/comentar'); ?>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="2">
                            <textarea class="form-control" name="comentario" placeholder="Escribir un comentario..." style="width: 100%; height: 60px;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 88%;">
                            <input class="input-tags"  id="input-tags" name="tags_comentario" placeholder="Digite un tag y precione enter" style="width: 100%;">
                            <input  name="id_post" value="<?= $row->id_post; ?>" style="display:none;">
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
    <?php } ?>
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
             echo ' <li>
            <a href="">
                <h4><b>'.$row->nombre.'</b></h4><br>'; 
                if (!in_array($row->id_usuario, $amigos)){
                    echo '<center><a href="muro/hacer_amigo/'.$row->id_usuario.'" class="btn btn-info" style="position: inherit;" >Hacer Amigos</a></center>';
                }else{
                    echo '<center><a href="muro/eliminar_amigo/'.$row->id_usuario.'" class="btn btn-danger" style=";position: relative;" >Eliminar Amigo</a></center>';
                }
            echo '</a></li>';
            } ?>
    </ul>
    </div>
</div>

