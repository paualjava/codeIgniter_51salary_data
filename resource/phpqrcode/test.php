<?php
include 'phpqrcode.php'; 
$errorCorrectionLevel = 'M';//容错级别   
$matrixPointSize = 9;//生成图片大小   
QRcode::png('http://www.wm18.com/',false, $errorCorrectionLevel,$matrixPointSize, $margin = 2);