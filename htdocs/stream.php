<?PHP

$imageData = $_POST['imageData'];
echo "{imageDate:" + $imageData + "}";

$img = imagecreatefromstring(base64_decode($imageData));
// and process $img with your image library here


?>
