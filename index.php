<?php
include_once('simple_html_dom.php');
if(isset($_GET['lon']) and !isset($_GET_['lon'])){
  $lat = $_GET['lat'];
  $lon = $_GET['lon'];
  $url = 'https://eosweb.larc.nasa.gov/cgi-bin/sse/grid.cgi?&num=083113&hgt=100&submit=Submit&veg=17&sitelev=&email=skip@larc.nasa.gov&p=grid_id&p=swv_dwn&step=2&lon='.$lon.'&lat='.$lat;
  $html = file_get_html($url);
  $ret = $html->find('table');
  $datos = $ret[4];
  //var_dump($datos);
  //echo $datos;
  $val = [
    "latitud" => $lat,
    "longitud" => $lon,
    1 => '',
    2 => '',
    3 => '',
    4 => '',
    5 => '',
    6 => '',
    7 => '',
    8 => '',
    9 => '',
    10 => '',
    11 => '',
    12 => '',
    13 => '',
  ];
  //var_dump($datos);
  $dat = [];
  foreach($datos->find('td') as $element){
    $dat[] = strip_tags($element);
  }
  //var_dump($dat);
  for($i=1; $i<=13; $i++){
    $b = $i+14;
    $val[$i] = [$dat[$i] => $dat[$b]];
  }
  echo print_r(json_encode($val));
}
?>
