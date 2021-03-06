<?php
class Login_test extends TestCase
{
    public function setUp(){
		//$this->obj = $this->newModel('Login_m');
        session_start();
	}
    
    public function test_index(){
        $output = $this->request('GET', '');
        $this->assertContains('<h1 class="white-text"><b>FaceTec</b></h1>', $output);
    }
    
    public function test_index_404(){
        $this->request('GET', ['nocontroller', 'noaction']);
		$this->assertResponseCode(404);
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
    
//----------------------------------------------------------------------------------------------------
   public function test_login_facebook(){
        $output = $this->request(
			'POST',
			'login/ingresar_FB?email=cecilianogranados96@hotmail.com'
		);
       
       $this->assertRedirect('../index.php?error_message=Usuario no registrado&error=1', 302);
    }
    
    public function test_login_facebook_no_correcto(){
        $output = $this->request(
			'POST',
			'login/ingresar_FB?email=ceciliano@hotmail.com'
		);
       $this->assertRedirect('../index.php?error_message=Usuario no registrado&error=1', 302);
    }
    
    
    
    
}