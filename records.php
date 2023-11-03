<?php

include 'model.php';

$model = new Model();

$rows = $model->fetch();

echo json_encode($rows);


// var_dump($rows);