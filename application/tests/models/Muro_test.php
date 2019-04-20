<?php
class Muro_test extends UnitTestCase
{
    public function setUp(){
		$this->obj = $this->newModel('muro_m');
	}
    
    
	public function test_likes_total(){
      
        $resultado = $this->obj->likes_total(14);
        $esperado = 1;
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

}