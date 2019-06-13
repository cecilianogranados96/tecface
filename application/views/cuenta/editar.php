<?php 

$datos = $this->Muro_m->get_datos_usuario();
?>
<div class="feed-content" style="width: 60%;">
    <div class="text-left">
        <h1 class="heading">Editar datos</h1>
        <center>
            <form action="../../../index.php/login/editar/" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <br><br>
                <table class="table" style="width: 60%;">
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" name="nombre" value="<?= $datos[0]->nombre; ?>" placeholder="Nombre Completo" class="form-control" required="1" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Email: </td>
                        <td><input type="email" name="email" value="<?= $datos[0]->email; ?>" placeholder="Email" class="form-control" required="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>Usuario: </td>
                        <td><input type="usuario" name="usuario" value="<?= $datos[0]->usuario; ?>" placeholder="Usuario" class="form-control" required="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password" placeholder="Digite su contraseña" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha Nacimiento: </td>
                        <td><input type="date" name="fecha_nacimiento" value="<?= $datos[0]->fecha_nacimiento; ?>" placeholder="Fecha de nacimiento" class="form-control" required="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>Foto: </td>
                        <td><input type="file" name="archivo" class="form-control" />
                        </td>
                    </tr>
                </table>

                <input type="submit" name="Registrarse" value="Registrarse" class='btn btn-success sign-up' />
            </form>
        </center>
    </div>
</div>



<div class="right-content">
    <div class="section-content">
        <h2>
            Personas<br>
        </h2>
        <ul>
            <?php 
        $amigos = json_decode($this->Muro_m->get_lista_amigos()[0]->amigos);
        if($amigos == ""){
            $amigos = array();
        }
         foreach($this->Muro_m->get_usuarios() as $row){
             echo ' <li>'.$this->Muro_m->get_img_perfil($row->id_usuario,50,50).' <h4> <b> <center>'.$row->nombre.'</center></b></h4><br>'; 
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
