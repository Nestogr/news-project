<?php

require_once 'bd.php';


$id = $_POST['id'];

$json = eliminar_comentario($id);

echo json_encode($json);
