<?php 
    //セッション開始
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php 
            //セッションにユーザー情報が保存されていればログインしている
            if( isset($_SESSION['id']) ):
        ?>
            <p>こんにちは。<?= $_SESSION['name'] ?>さん</p>
        <?php else: ?>
            <p>はじめまして。ゲストさん</p>
        <?php endif; ?>
    </header>
    <main>
        <form action="login.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <label for="password">Password</label>
            <input type="text" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>