<?php
include SITE_ROOT . "/app/database/db.php";

$errMsg = '';
$id = '';
$name = '';
$description = '';

$topics = selectAll('topics');


// Код для форми реєстрації
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    if($name === '' || $description === ''){
        $errMsg = "Не всі поля заповнені!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Категорія повинна бути більше 2-ох символів";
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if($existence['name'] === $name){
            $errMsg = "Така категорія уже є в базі";
        }else{
            $topic = [
                'name' => $name,
                'description' => $description
            ];
            $id = insert('topics', $topic);
            $topic = selectOne('topics', ['id' => $id] );
            header('location: ' .'index.php');
        }
    }
}else{
    $name = '';
    $description = '';
}


// Редагування категорій
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if($name === '' || $description === ''){
        $errMsg = "Не всі поля заповнені!";
    }elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Категорія повинна бути більше 2-ох символів";
    }else{
        $topic = [
            'name' => $name,
            'description' => $description
        ];
        $id = $_POST['id'];
        $topic_id = update('topics', $id, $topic);
        header('location: ' . 'index.php');
    }
}

// Видалення категорії
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('topics', $id);
    header('location: ' . 'index.php');
}