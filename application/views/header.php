<?php $data_email = array(
            array('type' => 'text','name' => 'usuario','class' => ' form-control','placeholder' => 'Usuario'),
            array('type' => 'password','name' => 'password','class' => 'form-control','placeholder' => 'Contraseña')
            );
?>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>/dist/img/logo.jpg">
    <link href="<?php echo base_url(); ?>dist/css/estilo.css" rel="stylesheet">
</head>

<body>
    <header class="blue-container container-fluid">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class=" col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                <div class="  col-xs-8 col-sm-8 col-md-8 col-lg-8 custom-pad">
                    <h1 class="white-text"><b>FaceTec</b></h1>
                </div>
            </div>
            <div class=" col-xs-6 col-sm-6 col-md-6 col-lg-4">
            
                    <div class="login-wrapper pull-right">
                        <?= form_open('login/ingresar','class="form-inline form" '); ?>
                            <div class="form-group ">
                                <label class="white-text mail" for="email ">Email</label><br>
                                <?= form_input($data_email[0]); ?>
                            </div>
                            <div class="form-group white-text ">
                                <label class="white-text mail" for="pwd">Contraseña</label><br>
                                <?= form_input($data_email[1]); ?>
                            </div>
                        <div class="form-group white-text ">
                                 <?=form_submit("Ingresar",'Ingresar', "class='btn ui-button blue-background white-text' "); ?>
                            </div>
                           
                                <?=form_close(); ?>
                    
                    </div>
                </div>
           
            </div>
    
    </header>
