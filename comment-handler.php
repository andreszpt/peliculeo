<?php 
session_start(); 

try{
    $pdo=new PDO('mysql:host=localhost;dbname=ai57', 'root', '1234');

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
};

$id_user = $_SESSION['id'];
$id_movie = $_POST['id_movie'];
$comment = $_POST['comment'];

$query = "INSERT INTO moviecomments (movie_id, user_id, comment)
VALUES('$id_movie', '$id_user', '$comment')";

$result=$pdo->query($query);
if ($result) {
    header("Location: movie.php?id=".$id_movie."&success=Comment was sent");
    exit();
}else {
    echo " User: ".$id_user;
    echo " Movie: ".$id_movie;
    echo " Comment: ".$comment;

    //header("Location: movie.php?error=unknown error occurred");
    //exit();
}


?>