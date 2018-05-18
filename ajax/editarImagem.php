<?php
// Uncomment if you want to allow posts from other domains
// header('Access-Control-Allow-Origin: *');
session_start();
require "conexao.php";
require_once('lib/slim.php');

// Get posted data, if something is wrong, exit
try {
    $images = Slim::getImages();
}
catch (Exception $e) {

    // Possible solutions
    // ----------
    // Make sure you're running PHP version 5.6 or higher

    Slim::outputJSON(array(
        'status' => SlimStatus::FAILURE,
        'message' => 'Unknown'
    ));

    return;
}

// No image found under the supplied input name
if ($images === false) {

    // Possible solutions
    // ----------
    // Make sure the name of the file input is "slim[]" or you have passed your custom
    // name to the getImages method above like this -> Slim::getImages("myFieldName")

    Slim::outputJSON(array(
        'status' => SlimStatus::FAILURE,
        'message' => 'No data posted'
    ));

    return;
}

// Should always be one image (when posting async), so we'll use the first on in the array (if available)
$image = array_shift($images);

// Something was posted but no images were found
if (!isset($image)) {

    // Possible solutions
    // ----------
    // Make sure you're running PHP version 5.6 or higher

    Slim::outputJSON(array(
        'status' => SlimStatus::FAILURE,
        'message' => 'No images found'
    ));

    return;
}

// If image found but no output or input data present
if (!isset($image['output']['data']) && !isset($image['input']['data'])) {

    // Possible solutions
    // ----------
    // If you've set the data-post attribute make sure it contains the "output" value -> data-post="actions,output"
    // If you want to use the input data and have set the data-post attribute to include "input", replace the 'output' String above with 'input'

    Slim::outputJSON(array(
        'status' => SlimStatus::FAILURE,
        'message' => 'No image data'
    ));

    return;
}



// if we've received output data save as file
if (isset($image['output']['data'])) {
	
	$caminhoPastaUsuario = '../img/';
    // get the name of the file

    // get the crop data for the output image
    $data = $image['output']['data'];

    // If you want to store the file in another directory pass the directory name as the third parameter.
    // $file = Slim::saveFile($data, $name, 'my-directory/');

    // If you want to prevent Slim from adding a unique id to the file name add false as the fourth parameter.
    // $file = Slim::saveFile($data, $name, 'tmp/', false);
	
	$arrayextensao = explode('.',$image['output']['name']); //cria um array com as strings separadas por ponto
	$extensao = '.'.end($arrayextensao); // end retorna o último valor do array e concatena com ponto ex: .jpg
	$name = 'profile-'.$_SESSION['id'].$extensao;
	
	$data = $image['output']['data'];
	
	$output = Slim::saveFile($data, $name, $caminhoPastaUsuario, false);
	$_SESSION['img'] = $name;
	
	try{
		$stmt = $conn->prepare("UPDATE usuario SET img = :img WHERE idusuario = :id;");
		$stmt->bindParam(':img', $name);
		$stmt->bindParam(':id', $_SESSION['id']);
		$stmt->execute();
	}catch(PDOException $e){
		echo($e);
	}
}

// if we've received input data (do the same as above but for input data)
if (isset($image['input']['data'])) {

    $caminhoPastaUsuario = '../img/';
    // get the name of the file

    // get the crop data for the output image
    $data = $image['output']['data'];
	$file = Slim::saveFile($data, $name, 'tmp/', false);
	
	$arrayextensao = explode('.',$image['output']['name']); //cria um array com as strings separadas por ponto
	$extensao = '.'.end($arrayextensao); // end retorna o último valor do array e concatena com ponto ex: .jpg
	$name = 'profile-'.$_SESSION['id'].$extensao;
	
	$data = $image['output']['data'];
	
	$input = Slim::saveFile($data, $name, $caminhoPastaUsuario, false);
	$_SESSION['img'] = $name;
	try{
		$stmt = $conn->prepare("UPDATE usuario set img = :img WHERE id = :id;");
		$stmt->bindParam(':img', $name);
		$stmt->bindParam(':id', $_SESSION['id']);
		$stmt->execute();
	}catch(PDOException $e){
		
	}
}



//
// Build response to client
//
$response = array(
    'status' => SlimStatus::SUCCESS
);

if (isset($output) && isset($input)) {

    $response['output'] = array(
        'file' => $output['name'],
        'path' => $output['path']
    );

    $response['input'] = array(
        'file' => $input['name'],
        'path' => $input['path']
    );

}
else {
    $response['file'] = isset($output) ? $output['name'] : $input['name'];
    $response['path'] = isset($output) ? $output['path'] : $input['path'];
}

// Return results as JSON String
Slim::outputJSON($response);
?>