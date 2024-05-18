<?php

function connectarbanco()
{
    $conn = new PDO(
        "mysql:host=localhost; dbname=bancophp",
        "root",
        ""
    );
    return $conn;
}


function retornarCategoria()
{
    try {
        $sql = "SELECT * FROM tbl_categoria";
        $conn = connectarbanco();
        return $conn->query($sql);
    } catch (Exception $e) {
        return 0;
    }
}
