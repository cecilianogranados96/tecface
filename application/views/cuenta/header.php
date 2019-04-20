
<html lang='es'></html>
<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <link rel='stylesheet prefetch' href='//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/css/selectize.default.css"></script>
    <link href="<?php echo base_url(); ?>dist/css/wall.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>dist/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/jqueryui.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/standalone/selectize.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/index.js"></script>
</head>
<body>
    <div class="topbar">
    <a class="logo" href="<?php echo base_url(); ?>index.php/muro" style="margin-left: 10%;">
    <img alt="" src="<?php echo base_url(); ?>/dist/img/logoTF.png"  style=' width: 35px;margin-top: -3.5%;'/>
    </a>
        <div class="search-box">
            <div class="input-group">
                 <?= form_open('muro'); ?>
                    <input aria-describedby="basic-addon2" name="buscar" class="form-control" placeholder="Buscar en Face-Tec" type="text"  <?php if($this->input->post('buscar') != ''){echo 'value="'.$this->input->post('buscar').'"'; }?>/>
                <?=form_close(); ?>
            </div>
        </div>
        <div class="right-group">
            <div class="link-group">
                <a href="<?php echo base_url(); ?>index.php/muro">  <?= $this->muro_m->get_img_perfil($_SESSION['usuario'],50,50); ?> <i class="fa fa-user"></i> <?= $this->muro_m->get_nombre(); ?></a>
            </div>
            <div class="notification-group">
                <div class="link-group">
                    <a class="freqnotif" href=""></a>
                </div>
            </div>
             <div class="link-group">
                <a href="<?php echo base_url(); ?>index.php/login/salir">Salir</a>
            </div>
        </div>
    </div>
    

