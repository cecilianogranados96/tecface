<?php $data_email = array(
            array(
                'type' => 'email',
                'name' => 'email',
                'class' => 'form-control form-control-user',
                'placeholder' => 'Digite su nombre email'
            )
        );
?>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Recuperar la contraseña</h1>
                    <p class="mb-4">Lo sabemos estas cosas pasan. Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña.</p>
                  </div>
                    <?= form_open('login/recuperar',"class = 'user' "); ?>
                    <div class="form-group">
                    <?= form_input($data_email[0]); ?>
                    </div>
                    <?=form_submit("Ingresar",'Ingresar', "class = 'btn btn-primary btn-user btn-block' "); ?>
                  <hr>
                    <a href="<?php echo base_url(); ?>index.php/login/registro" class="btn btn-success btn-user btn-block">
                      Crear una cuenta
                    </a>
                    <a href="<?php echo base_url(); ?>" class="btn btn-danger btn-user btn-block">
                      Ya tienes cuenta, ingresa
                    </a>
                    <?=form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


