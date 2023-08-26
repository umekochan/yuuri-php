<?php 
    //db接続情報
    $db_name = "mysql:host=localhost; dbname=yuuridb;";
    $db_username = "root";
    $db_password = "";

    //db接続
    $db = new PDO($db_name, $db_username, $db_password);

    //SQL文の定義
    $sql = "SELECT * FROM login WHERE name = :name";
    //SQLステートメントの準備
    $statement = $db->prepare($sql);
    $statement->bindValue(':name', $_POST['name']);
    //SQL実行
    $statement->execute();
    //結果の取得
    $result = $statement->fetch();

    //パスワードが一致するか
    if ( $_POST['password'] === $result['password'] ) {
        echo '<p>ログインしました。</p>';
    } else {
        echo '<p>パスワードが間違っています。</p>';
    }
?>