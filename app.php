<?php
//First set query parameters or fill with default
if(isset($_GET['q']))
  $q = urlencode($_GET['q']);
else
  $q = 'sandvich';

//Call the API with given query parameters
$response = file_get_contents('https://www.googleapis.com/customsearch/v1?q='.$q.'&cx=011424016810515199853:ps8fphzojes&searchType=image&key=AIzaSyB2wuE54WYz71ipj-2jjVnXJ_VhXyoWjfI&num=1&fields=items%2Flink');

//Decode API response to get image URL
$url = (((json_decode($response))->items)[0])->link;

// Display the image
header('Content-type: image/png');
echo file_get_contents($url);
?>