<!DOCTYPE html>
<html>

<head>
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="syain.css?_=<?= time() ?>">
<script>
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
</script>
</head>

<body>
<h3 class="alert alert-primary">
    社員マスタメンテ <?= $error["db"] ?>
    <a href=".." style="float:right;text-decoration:none;">📂</a>
</h3>
<div id="content">

    <form method="post"
        onsubmit="return check()">
    <div>
        <div class="entry left">社員コード</div>
        <div class="entry right">
            <input class="form-control"
                required
                maxlength="4"
                pattern="[0-9]+"
                placeholder="9999"
                type="text"
                name="scode"
                id="scode"
                value="<?= $_POST["scode"] ?>">
        </div>
        <input type="submit" name="btn" id="btn" class="btn btn-primary ms-4" value="確認">
    </div>

        <div>
        <div class="entry left">氏名
        </div>
        <div class="entry right">
            <input class="form-control"
                type="text"
                name="sname"
                id="sname"
                value="<?= $_POST["sname"] ?>">
        </div>
    </div>
    <div>
        <div class="entry left">フリガナ
        </div>
        <div class="entry right">
            <input class="form-control"
                type="text"
                name="fname"
                id="fname"
                value="<?= $_POST["fname"] ?>">
        </div>
    </div>
    <div>
        <div class="entry left">所属
        </div>
        <div class="entry right">
            <input class="form-control"
                type="text"
                name="syozoku"
                id="syozoku"
                value="<?= $_POST["syozoku"] ?>">
        </div>
    </div>
    <div>
        <div class="entry left">性別
        </div>
        <div class="entry right">
            <input class="form-control"
                type="text"
                name="seibetsu"
                id="seibetsu"
                value="<?= $_POST["seibetsu"] ?>">
        </div>
    </div>
    <div>
        <div class="entry left">給与
        </div>
        <div class="entry right">
            <input class="form-control"
                type="text"
                name="kyuyo"
                id="kyuyo"
                value="<?= $_POST["kyuyo"] ?>">
        </div>
    </div>
    <div>
        <div class="entry left">手当
        </div>
        <div class="entry right">
            <input class="form-control"
                type="text"
                name="teate"
                id="teate"
                value="<?= $_POST["teate"] ?>">
        </div>
    </div>
    <div>
        <div class="entry left">管理者
        </div>
        <div class="entry right">
            <input class="form-control"
                type="text"
                name="kanri"
                id="kanri"
                value="<?= $_POST["kanri"] ?>">
        </div>
    </div>
    <div>
        <div class="entry left">生年月日
        </div>
        <div class="entry right">
            <input class="form-control"
                type="text"
                name="birth"
                id="birth"
                value="<?= $_POST["birth"] ?>">
        </div>
    </div>

    <div class="mt-4">
        <input type="submit" name="btn" id="btn" class="btn btn-primary" value="更新">
        <span class="ms-5"><?= $_POST["message"] ?></span>
    </div>

    </form>

</div>

</body>
</html>
