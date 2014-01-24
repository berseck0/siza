<?php
function formateo($dato){
$dato=utf8_encode(strtoupper($dato));
$dato = rtrim($dato,' ');
return $dato;
}
function formatup($dato){
$dato=utf8_encode(strtoupper($dato));
return $dato;
}

?>