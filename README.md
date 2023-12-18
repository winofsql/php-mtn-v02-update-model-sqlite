# php-mtn-v02-update-model-sqlite

![image](https://github.com/winofsql/php-mtn-v02-update-model-sqlite/assets/1501327/2690cf24-65c7-4e01-a958-b645ffa68f8a)


- model.php を追加して処理を分化
- form のチェック用 JavaScript 関数を実装
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
