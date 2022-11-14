<?php
    include("conexao.php");

    $email = $_POST['email'];
    $texto = $_POST['texto'];

    $sql = "INSERT INTO mensagem(email_msg,texto_msg) VALUES ('$email','$texto');";
    mysqli_query($conexao,$sql);

    header("location: index.php");
?>