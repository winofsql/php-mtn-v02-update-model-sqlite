# php-mtn-v02-update-model-sqlite

![image](https://github.com/winofsql/php-mtn-v02-update-model-sqlite/assets/1501327/2690cf24-65c7-4e01-a958-b645ffa68f8a)

- SQLに対する入力値の埋め込みは、[bindValue](https://www.php.net/manual/ja/pdostatement.bindvalue.php)
  ```php
  $query = "select * from 社員マスタ where 社員コード = :scode";
  
  try {
      $stmt = $sqlite->prepare($query);
      $stmt->bindValue( ':scode', $_POST["scode"], PDO::PARAM_STR );
      $stmt->execute();
  }
  ```
- model.php を追加して処理を分化\
  ✅ model.php 
  ```php
  // **************************
  // 社員コードで存在チェック
  // **************************
  function check( $sqlite ) {
  }
  
  // **************************
  // 更新処理
  // **************************
  function update( $sqlite ) {
  }
  ```
  ✅ syain.php
  ```php
  // データ表示処理
  if ( $_POST["btn"] == "確認" ) {
  
      $row = check($sqlite);
      if ( $row ) {
          // 存在したので修正用処理
      }
      else {
          // 存在しなかったので新規用処理
          $_POST["message"] = "新規登録です";
      }
  }
  
  // データ更新処理
  if ( $_POST["btn"] == "更新" ) {
  
      update( $sqlite );
  
  }
  ```
- form のチェック用 JavaScript 関数を実装\
  ✅ syain-view.php
  ```JavaScript
  // ******************************
  // 確認ボタンの時の送信チェック
  // ******************************
  function check(){
      var scode = $("#scode").val();
      if ( scode.length != 4 ) {
          alert("社員コードを4桁入力してください");
          return false;
      }
  
      return true;
  }
  ```
  - [$("#scode").val()](https://api.jquery.com/val/)
  - [scode.length](https://developer.mozilla.org/ja/docs/Web/JavaScript/Reference/Global_Objects/String/length)
  ```html
  <form method="post"
      onsubmit="return check()">
  ```
- 更新ボタンの横にメッセージエリアを追加
  ```html
  <div class="mt-4">
      <input type="submit" name="btn" id="btn" class="btn btn-primary" value="更新">
      <span class="ms-5"><?= $_POST["message"] ?></span>
  </div>
  ```
- 社員コード入力に HTML 側でチェック処理を追加
  ```html
  <input class="form-control"
      required
      maxlength="4"
      pattern="[0-9]+"
      placeholder="9999"
      type="text"
      name="scode"
      id="scode"
      value="<?= $_POST["scode"] ?>">
  ```
