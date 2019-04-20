<?php
class Login_test extends TestCase
{
    public function setUp(){
		//$this->obj = $this->newModel('login_m');
	}

	public function test_login_ingresar_sin_parametros(){
        $output = $this->request('GET',['login', 'ingresar']);
        $this->assertRedirect('../../index.php?error_login=1', 302);
    }

    public function test_login_ingresar_usuario_correcto_pass_incorrecto(){
        $output = $this->request(
			'POST',
			['login', 'ingresar'],
			['usuario' => 'ceciliano','password' => 'admin2']
		);
        $this->assertRedirect('../../index.php?error_login=2', 302);
    }
    
    public function test_login_ingresar_usuario_correcto_pass_correcto(){
        $output = $this->request(
			'POST',
			['login', 'ingresar'],
			['usuario' => 'ceciliano','password' => 'admin']
		);
        $this->assertRedirect('../index.php/muro', 302);
    } 
    
    
}