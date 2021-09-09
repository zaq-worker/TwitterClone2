
<?php

/////////////////////////////////////
//便利な関数
/////////////////////////////////////

/**
 * 画像ファイル名から画像のURLを生成する
 * 
 * @param string $name 画像ファイル名
 * @param string $type user | tweet
 * @return string
 */

function buikdImagePath(string $name = null, string $type)
{
    if ($type === 'user' && !isset($name)) {
        return HOME_URL . 'Views/img/icon-default-user.svg';
    }

    return HOME_URL . 'views/img_uploaded/' . $type . '/' . htmlspecialchars($name);
}

/**
 * 指定した日時からどれだけ経過したかを取得
 * 
 * @param string $datetime 日時
 * @return string
 */
function convertToDayTimeAgo(string $datetime)
{
    $unix = strtotime($datetime);
    $now = time();
    $diff_sec = $now - $unix;

    if ($diff_sec < 60){
        $time = $diff_sec;
        $unix = '秒前';
    }elseif ($diff_sec < 3600) {
        $time = $diff_sec / 60;
        $unix = '分前';
    }elseif ($diff_sec < 86400) {
        $time = $diff_sec / 3600;
        $unix = '時間前';
    }elseif ($diff_sec < 2764800) {
        $time = $diff_sec / 86400;
        $unix = '日前';
    }else {

        if (date('Y') !== date('Y', $unix)) {
            $time = date('Y年n月j日', $unix);
        }else {
            $time = date('n月j日', $unix);
        }
        return $time;
    }

    return(int)$time . $unix;
}