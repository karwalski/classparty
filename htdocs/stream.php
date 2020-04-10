<?PHP

$imageData = $_POST['imgageData'];
$img = imagecreatefromstring(base64_decode($imageData));
// and process $img with your image library here
echo $imageData;

?>
