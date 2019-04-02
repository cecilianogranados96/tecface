<?php 
function fecha(){
  date_default_timezone_set('America/Costa_Rica');
  $fecha = substr(date('d-m-Y H:i:s'), 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
    
}

function nombre_persona(){
    $ci=& get_instance();
    $ci->load->database();    
    $query = $ci->db->query("SELECT nombre FROM usuarios where id_usuario = '".$_SESSION['usuario']."' ");
    $row = $query->row_array();
    return $row['nombre'];
}

function nombre_persona_id($id){
    $ci=& get_instance();
    $ci->load->database();    
    $query = $ci->db->query("SELECT nombre FROM usuarios where id_usuario = '".$id."' ");
    $row = $query->row_array();
    return $row['nombre'];
}

function email_persona(){
    $ci=& get_instance();
    $ci->load->database();    
    $query = $ci->db->query("SELECT email FROM usuarios where id_usuario = '".$_SESSION['usuario']."' ");
    $row = $query->row_array();
    return $row['email'];
}

function email_persona_id($id){
    $ci=& get_instance();
    $ci->load->database();    
    $query = $ci->db->query("SELECT email FROM usuarios where id_usuario = '".$id."' ");
    $row = $query->row_array();
    return $row['email'];
}

function get_rol($id){
    $ci=& get_instance();
    $ci->load->database();    
    $query = $ci->db->query("SELECT tipo FROM usuarios where id_usuario = '".$id."' ");
    $row = $query->row_array();
    return $row['tipo'];
}


?>