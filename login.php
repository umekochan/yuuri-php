<?php
    //セッションの開始
    session_start();

    $name = $_POST['name'];
    $password = $_POST['password'];
    ////ユーザー名の入力チェック
    if( empty($name) ) {
        echo "ユーザー名が入力されていません。";
        return;
    }
    //パスワードの入力チェック
    if( empty($password) ) {
        echo "パスワードが入力されていません。";
        return;
    }

    //db接続情報
    $db_name = "mysql:host=localhost; dbname=yuuridb;";
    $db_username = "root";
    $db_password = "";

    //db接続
    try {
        $db = new PDO($db_name, $db_username, $db_password);
    } catch( PDOException $e ) {
        //エラー処理
        $msg = $e->getMessage();
        echo "DB接続エラー__Error:";
        echo $msg;
        exit;
    }

    //SQL文の定義
    $sql = "SELECT * FROM login WHERE name = :name";
    //SQLステートメントの準備
    $statement = $db->prepare($sql);
    $statement->bindValue(':name', $name);
    //SQL実行
    $statement->execute();
    //結果の取得
    $result = $statement->fetch();

    if( !$result ) {
        echo "無効なユーザーです。";
        return;
    }

    //パスワードが一致するか
    if ( $password === $result['password'] ) {

        //セッションにログイン状態を保存
        $_SESSION['id'] = $result['id'];
        $_SESSION['name'] = $result['name'];
        echo '<p>ログインしました。</p>';

    } else {
        echo '<p>パスワードが間違っています。</p>';
    }
    echo '<a href="index.php">TOPへ</a>';
?>