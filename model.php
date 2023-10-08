<?php
// **************************
// 社員コードで存在チェック
// **************************
function check( $sqlite ) {

    $query = "select * from 社員マスタ where 社員コード = :scode";

    try {
        $stmt = $sqlite->prepare($query);
        $stmt->bindValue( ':scode', $_POST["scode"], PDO::PARAM_STR );
        $stmt->execute();
    }
    catch ( PDOException $e ) {
        $GLOBALS["error"]["db"] .= $GLOBALS["dbname"];
        $GLOBALS["error"]["db"] .= " " . $e->getMessage();
    }

    if ( $GLOBALS["error"]["db"] == " " ) {
        $row = $stmt->fetch();
    }
    else {
        $row = null;
    }

    return $row;
}

// **************************
// 更新処理
// **************************
function update( $sqlite ) {

// ヒアドキュメント
    $query = <<<QUERY
update 社員マスタ set
    氏名 = :sname,
    フリガナ = :fname,
    所属 = :syozoku,
    性別 = :seibetsu,
    給与 = :kyuyo,
    手当 = :teate,
    管理者 = :kanri,
    生年月日 = :birth
where 社員コード = :scode
QUERY;

    try {
        $stmt = $sqlite->prepare($query);
        $stmt->bindValue( ':sname', $_POST["sname"], PDO::PARAM_STR );
        $stmt->bindValue( ':fname', $_POST["fname"], PDO::PARAM_STR );
        $stmt->bindValue( ':syozoku', $_POST["syozoku"], PDO::PARAM_STR );
        $stmt->bindValue( ':seibetsu', $_POST["seibetsu"]+0, PDO::PARAM_INT );
        $stmt->bindValue( ':kyuyo', intval($_POST["kyuyo"])+0, PDO::PARAM_INT );
        if ( $_POST["teate"] == "" ) {
            $stmt->bindValue( ':teate', null, PDO::PARAM_NULL );
        }
        else {
            $stmt->bindValue( ':teate', $_POST["teate"]+0, PDO::PARAM_INT );
        }
        if ( $_POST["kanri"] == "" ) {
            $stmt->bindValue( ':kanri', null, PDO::PARAM_NULL );
        }
        else {
            $stmt->bindValue( ':kanri', $_POST["kanri"], PDO::PARAM_STR );
        }
        $stmt->bindValue( ':birth', $_POST["birth"], PDO::PARAM_STR );
        $stmt->bindValue( ':scode', $_POST["scode"], PDO::PARAM_STR );
        $stmt->execute();
    }
    catch ( PDOException $e ) {
        $GLOBALS["error"]["db"] .= $GLOBALS["dbname"];
        $GLOBALS["error"]["db"] .= " " . $e->getMessage();
    }

}

// **************************
// デバッグ表示
// **************************
function debug_print() {

    print "<pre class=\"m-5\">";
    print_r( $_GET );
    print_r( $_POST );
    print_r( $_SESSION );
    print_r( $_FILES );
    print "</pre>";

}

