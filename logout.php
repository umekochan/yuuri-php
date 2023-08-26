<?php 
    //セッションの開始
    session_start();
    //セッションをnull配列で上書き
    $_SESSION = array();
    //セッションの終了
    session_destroy();

    echo "ログアウトしました。";
    echo '<a href="index.php">TOPへ</a>';
?>