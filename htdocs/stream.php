<?PHP

$imageData = $_POST['imageData'];
echo "{imageData:" + $imageData + "}";

$img = imagecreatefromstring(base64_decode($imageData));
// and process $img with your image library here


?>
