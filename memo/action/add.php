<?php

require '../../common/auth.php';
require '../../common/database.php';


if(!isLogin()){
  header('Location: ../login/');
  exit;
}

$user_id = getLoginUserId();
$database_handler = getDatabaseConnection();

try {
  $title = '新規メモ';
  if ($statement = $database_handler->prepare('INSERT INTO memos(user_id, title, content)VALUES(:user_id, :title, null)')) {

      $statement->bindParam(':user_id', $user_id);
      $statement->bindParam(':title', $title);
      $statement->execute();

      // ユーザー情報保持
      $_SESSION['select_memo'] = [
          'id' => $database_handler->lastInsertId(),
          'title' => $title,
          'content' => ''
      ];
  }
} catch (Throwable $e) {
  echo 'addの失敗<br>';
  echo $e->getMessage();
  exit;
}

// メモ投稿画面にリダイレクト
header('Location: ../../memo/');
exit;
