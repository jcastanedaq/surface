<?php
include_once('simple_html_dom.php');
if(isset($_GET['button'])){
$lat = $_GET['lat'];
$lon = $_GET['lon'];
$url = 'https://eosweb.larc.nasa.gov/cgi-bin/sse/grid.cgi?&num=083113&hgt=100&submit=Submit&veg=17&sitelev=&email=skip@larc.nasa.gov&p=grid_id&p=swv_dwn&step=2&lon='.$lon.'&lat='.$lat;
echo $url;
$html = file_get_html($url);
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Obtener informacion de la nasa</title>
  </head>
  <body>
    <form name="form1" action="index.php" method="get">
      <label for="lat">Latitud:</label>
      <input type="text" name="lat" value="">
      <label for="lon">Logitud:</label>
      <input type="text" name="lon" value="">
      <button type="summit" name="button">Enviar</button>
    </form>
  </body>
</html>
