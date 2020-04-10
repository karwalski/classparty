<?PHP

$data = file_get_contents('php://input');
echo $data;

// $img = imagecreatefromstring(base64_decode($data['imageData']));
// and process $img with your image library here


?>
