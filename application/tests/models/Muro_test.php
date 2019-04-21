<?php
class Muro_test extends UnitTestCase
{
    public function setUp(){
		$this->obj = $this->newModel('muro_m');
        $_SESSION['usuario'] = 8;
	}
    
	public function test_likes_total(){      
        $resultado = $this->obj->likes_total(14);
        $esperado = 1;
        $this->assertEquals($resultado, $esperado);		
    }
    
	public function test_likes_total_incorrecto(){      
        $resultado = $this->obj->likes_total(1);
        $esperado = 0;
        $this->assertEquals($resultado, $esperado);		
    }
    
	public function test_likes_comentario_total(){      
        $resultado = $this->obj->likes_total_comentario(17);
        $esperado = 1;
        $this->assertEquals($resultado, $esperado);		
    }
    
	public function test_likes_total_comentario_incorrecto(){      
        $resultado = $this->obj->likes_total_comentario(1);
        $esperado = 0;
        $this->assertEquals($resultado, $esperado);		
    }
    
    public function test_tags_format_datos(){
        $resultado = $this->obj->tags_format("test1,test2");
        $esperado = "<i><a href='#test1'>#test1</a> -<a href='#test2'>#test2</a> </i>";
        $this->assertEquals($resultado, $esperado);		
    }
    
    public function test_tags_format_vacio(){
        $resultado = $this->obj->tags_format("");
        $esperado = "<i></i>";
        $this->assertEquals($resultado, $esperado);		
    }
    
    public function test_get_comentario_correcto(){
        $resultado = $this->obj->get_comentario(14);
        $resultado = $resultado[0]->comentario;
        $esperado = "ejemplo sin archivo";
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_get_comentario_incorrecto(){
        $resultado = $this->obj->get_comentario(1);
         if(is_array($resultado)){
              $resultado = 1;
         }else{
              $resultado = 2;
         }
        $esperado = 1;
        $this->assertEquals($resultado,$esperado);		
    }   

    public function test_get_comentario_parent_correcto(){
        $resultado = $this->obj->get_comentario_parent(15);
        $resultado = $resultado[0]->comentario;
        $esperado = "Respuesta con archivo";
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_get_comentario_parent_incorrecto(){
        $resultado = $this->obj->get_comentario_parent(1);
         if(is_array($resultado)){
              $resultado = 1;
         }else{
              $resultado = 2;
         }
        $esperado = 1;
        $this->assertEquals($resultado,$esperado);		
    } 
    
    public function test_lista_amigos_correcto(){
        $resultado = $this->obj->get_lista_amigos();
        $resultado = $resultado[0]->amigos;
        $resultado = is_array($resultado);
        $esperado = false;
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_lista_amigos_sin_amigos(){
        $resultado = $this->obj->get_lista_amigos();
        $resultado = $resultado[0]->amigos;
        $resultado = is_array($resultado);
        $esperado = false;
        $this->assertEquals($resultado,$esperado);		
    } 
    
    public function test_get_likes_correcto(){
        $resultado = $this->obj->get_likes(14);
        $resultado = $resultado[0]->nombre;
        $esperado = "José Andrés Ceciliano Granados";
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_get_likes_incorrecto(){
        $resultado = $this->obj->get_likes(15);
        if(is_array($resultado)){
              $resultado = 1;
         }else{
              $resultado = 2;
         }
        $esperado = 1;
        $this->assertEquals($resultado,$esperado);		
    }   
    
    public function test_get_likes_comentario_correcto(){
        $resultado = $this->obj->get_likes_comentario(17);
        $resultado = $resultado[0]->nombre;
        $esperado = "José Andrés Ceciliano Granados";
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_get_likes_comentario_incorrecto(){
        $resultado = $this->obj->get_likes_comentario(1);
        if(is_array($resultado)){
              $resultado = 1;
         }else{
              $resultado = 2;
         }
        $esperado = 1;
        $this->assertEquals($resultado,$esperado);		
    }   
    
    public function test_comentarios_total_correcto(){
        $resultado = $this->obj->comentarios_total(19);
        $esperado = 3;
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_comentarios_total_incorrecto(){
        $resultado = $this->obj->comentarios_total(1);
        $esperado = 0;
        $this->assertEquals($resultado,$esperado);		
    }   
  
    public function test_boton_like_correcto_like(){
        $resultado = $this->obj->boton_like(1);
        $esperado = '<a href="muro/like/1"><i class="fa fa-thumbs-up" style="color:#3B5998;"></i> Like</a>';
        $this->assertContains($resultado,$esperado);		
    }
    
    public function test_boton_like_correcto_dislike(){
        $resultado = $this->obj->boton_like(14);
        $esperado = '<a href="muro/dislike/14"><i class="fa fa-thumbs-down" style="color:#3B5998;"></i> Dislike</a>';
        $this->assertContains($resultado,$esperado);		
    }
    
    public function test_boton_like_comentario_correcto_like(){
        $resultado = $this->obj->boton_like(1);
        $esperado = '<a href="muro/like/1"><i class="fa fa-thumbs-up" style="color:#3B5998;"></i> Like</a>';
        $this->assertContains($resultado,$esperado);		
    }
    
    public function test_boton_like_comentario_correcto_dislike(){
        $resultado = $this->obj->boton_like(17);
        $esperado = '<a href="muro/like/17"><i class="fa fa-thumbs-up" style="color:#3B5998;"></i> Like</a>';
        $this->assertContains($resultado,$esperado);		
    }
    
    public function test_get_nombre(){
        $resultado = $this->obj->get_nombre();
        $esperado = "José Andrés Ceciliano Granados";
        $this->assertEquals($resultado,$esperado);		
    }  
    
    public function test_get_img_perfil(){
        $resultado = $this->obj->get_img_perfil(8,50,50);
        $esperado = "<img src='http://localhost/dist/img_perfil/default.png' style='width:50px; height:50px' class='rounded float-left'>";
        $this->assertEquals($resultado,$esperado);		
    } 
    
    public function test_get_usuarios(){
        $resultado = $this->obj->get_usuarios();
        $resultado = $resultado[0]->nombre;
        $esperado = "Silvia Calderón";
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_remover_correcto_1(){
        $arreglo = [1,2,3,4];
        $resultado = $this->obj->remover(1,$arreglo);
        $esperado = [1 => 2,2 => 3,3 => 4];
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_remover_correcto_2(){
        $arreglo = [1,2,3,4];
        $resultado = $this->obj->remover(4,$arreglo);
        $esperado = [0 => 1,1 => 2,2 => 3];
        $this->assertEquals($resultado,$esperado);		
    }
    
    public function test_remover_correcto_sin_valor(){
        $arreglo = [1,2,3];
        $resultado = $this->obj->remover(15,$arreglo);
        $esperado = [0 => 1,1 => 2,2 => 3];
        $this->assertEquals($resultado,$esperado);		
    }  
    
    public function test_remover_correcto_sin_parametro(){
        $arreglo = [1,2,3];
        $resultado = $this->obj->remover(0,$arreglo);
        $esperado = [0 => 1,1 => 2,2 => 3];
        $this->assertEquals($resultado,$esperado);		
    } 
    
    
}