<?php
class Muro_post_test extends TestCase
{
    public function setUp(){
		$_SESSION['usuario'] = 8;
	}
    
    public function test_publicar_sin_parametros(){
        $output = $this->request('GET',['login', 'ingresar']);
        $this->assertRedirect('../../index.php?error_login=1', 302);
    }
    
    public function test_publicar_con_parametros(){
        $output = $this->request(
			'POST',
			['muro', 'publicar'],
			['descripcion_post' => 'DESCRIPCION',
             'tags_post' => 'test,test1',
             'tipo_post' => '1',
             'archivo_post' => 'archivo'
            ]
		);
        $this->assertRedirect('muro', 302);
    }

    public function test_comentar_con_archivo(){
        $output = $this->request(
			'POST',
			['muro', 'comentar'],
			['comentario' => 'COMENTARIO',
             'tags_comentario' => 'test,test1',
             'id_post' => '14',
             'id_parent' => '14',
             'comentario_file' => 'file'
            ]
		);
        $this->assertRedirect('muro#14', 302);
    }
    
    public function test_comentar_sin_archivo(){
        $output = $this->request(
			'POST',
			['muro', 'comentar'],
			['comentario' => 'COMENTARIO',
             'tags_comentario' => 'test,test1',
             'id_post' => '14',
             'id_parent' => '14',
             'comentario_file' => ''
            ]
		);
        $this->assertRedirect('muro#14', 302);
    }

    
    public function test_hacer_amigo_correcto(){
        $output = $this->request('POST',['muro', 'hacer_amigo','8']);
        $this->assertRedirect('muro', 302);
    }
    
    public function test_hacer_amigo_incorrecto(){
        $output = $this->request('POST',['muro', 'hacer_amigo','16']);
        $this->assertRedirect('muro', 302);
    }
    
    public function test_eliminar_amigo_correcto(){
        $output = $this->request('POST',['muro', 'eliminar_amigo','8']);
        $this->assertRedirect('muro', 302);
    }
    
    public function test_eliminar_amigo_incorrecto(){
        $output = $this->request('POST',['muro', 'eliminar_amigo','9']);
        $this->assertRedirect('muro', 302);
    }

    public function test_like_correcto(){
        $output = $this->request('POST',['muro', 'like','19']);
        $this->assertRedirect('muro#19', 302);
    }
    
    public function test_like_incorrecto(){
        $output = $this->request('POST',['muro', 'like','16']);
        $this->assertRedirect('muro#16', 302);
    }
    
    public function test_dislike_incorrecto(){
        $output = $this->request('POST',['muro', 'dislike','16']);
        $this->assertRedirect('muro#16', 302);
    }

    public function test_dislike_correcto(){
        $output = $this->request('POST',['muro', 'dislike','19']);
        $this->assertRedirect('muro#19', 302);
    } 
    
    public function test_like_comment_correcto(){
        $output = $this->request('POST',['muro', 'like_coment','19']);
        $this->assertRedirect('muro#likes_coment_19', 302);
    }
    
    public function test_like_comment_incorrecto(){
        $output = $this->request('POST',['muro', 'like_coment','16']);
        $this->assertRedirect('muro#likes_coment_16', 302);
    }
    
    public function test_dislike_comment_incorrecto(){
        $output = $this->request('POST',['muro', 'dislike_coment','16']);
        $this->assertRedirect('muro#likes_coment_16', 302);
    }

    public function test_dislike_comment_correcto(){
        $output = $this->request('POST',['muro', 'dislike_coment','19']);
        $this->assertRedirect('muro#likes_coment_19', 302);
    } 
    
    
    
    
}