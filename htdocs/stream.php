<?PHP

$data = json_decode(file_get_contents('php://input'), true);
echo "{imageData:" + $data['imageData'] + "}";

$img = imagecreatefromstring(base64_decode($data['imageData']));
// and process $img with your image library here


?>
