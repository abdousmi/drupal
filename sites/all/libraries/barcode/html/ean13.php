<?php
define('IN_CB', true);

include_once('include/function.php');

$code = "BCGean13";
// Check if the code is valid
if (file_exists('config' . DIRECTORY_SEPARATOR . $code . '.php')) {
    include_once('config' . DIRECTORY_SEPARATOR . $code . '.php');
}

$code_ean = "2072024000471"; // code ean 13

registerImageKey('filetype', 'JPEG');
registerImageKey('dpi', 72);
registerImageKey('scale', 1);
registerImageKey('rotation', 0);
registerImageKey('font_family', 'Arial.ttf');
registerImageKey('font_size', 8);
registerImageKey('text', stripslashes($code_ean));
registerImageKey('code', 'BCGean13');

$finalRequest = '';
foreach (getImageKeys() as $key => $value) {
    $finalRequest .= '&' . $key . '=' . urlencode($value);
}
if (strlen($finalRequest) > 0) {
    $finalRequest[0] = '?';
}
if ($imageKeys['text'] !== '') { ?>
	<img src="image.php<?php echo $finalRequest; ?>" alt="Barcode Image" />
<?php 
} 
?>


