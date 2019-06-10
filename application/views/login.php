<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data_registro = array(
    array('type' => 'text','name' => 'nombre','placeholder' => 'Nombre Completo','class' => 'name number new-pwd','required' => 1),
    array('type' => 'text','name' => 'usuario','placeholder' => 'Usuario','class' => 'name form-control form-control-inline','required' => 1),
    array('type' => 'email','name' => 'email','placeholder' => 'Email','class' => 'name number new-pwd','required' => 1),
    array('type' => 'password','name' => 'password','placeholder' => 'Digite su contraseña','class' => 'name form-control form-control-inline','required' => 1),
    array('type' => 'date','name' => 'fecha_nacimiento','placeholder' => 'Fecha de nacimiento','class' => ' name form-control','required' => 1),
    array('type' => 'file','name' => 'archivo','class' => ' name form-control','required' => 1)
    );
?>
    <br><br>
    <div class="bg-color">
        <div class="container-fluid ">
            <div class="row" style="height: 100%;">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                    <div class=" col-xs-8 col-sm-8 col-md-8col-lg-8 custom-pad">
                        <h3 class="connect">FaceTec ayuda a conectarte con<br> personas en tu vida.
                        </h3>
                        <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yi/r/OBaVg52wtTZ.png" alt="image" class="world-img text-center">
                    </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 align">
                        <?php 
                            if (isset($_GET['error_login'])){
                                if ($_GET['error_login'] == 1)
                                    echo "<div class='alert alert-danger' style='width: 65%;'><b><center>Usuario Incorrecto</center></b></div>";
                                if ($_GET['error_login'] == 2)
                                    echo "<div class='alert alert-danger' style='width: 65%;'><b><center>Password Incorrecto</center></b></div>";
                            }
                            if (isset($_GET['error_message'])){
                                echo "<div class='alert alert-danger' style='width: 65%;'><b><center>".$_GET['error_message']."</center></b></div>";
                            }
                        ?>
                    <div class="text-left">    
                        <h1 class="heading">Crear una cuenta</h1>
                        <p class="paragraph">Es gratis para siempre.</p>
                        <?= form_open_multipart('login/registrarse',''); ?>
                            <br><br>
                            <?= form_input($data_registro[0]); ?>
                                <br><br>
                                <div class="row">
                                    
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                                        <?= form_input($data_registro[1]); ?>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-pad">
                                        <?= form_input($data_registro[3]); ?>
                                    </div>
                                </div>
                                <br><br>
                         
                        
                                <?= form_input($data_registro[2]); ?><br>
                                    <div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                                                <p class="birthday">Fecha de Nacimiento</p>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-pad">
                                                <?= form_input($data_registro[4]); ?>
                                            </div>
                                        </div>
                                        <br>
                                         <br>
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                                                <p class="birthday">Foto de perfil</p>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-pad">
                                                <?= form_input($data_registro[5]); ?>
                                            </div>
                                        </div>
                                        <br>
                                        <?=form_submit("Registrarse",'Registrarse', "class='btn btn-success sign-up' "); ?>
                                        <?=form_close(); ?>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
