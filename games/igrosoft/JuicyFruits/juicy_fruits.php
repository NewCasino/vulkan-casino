<?php 
// Досутп тока скрипту
define ('CASINOENGINE', true);
// Запускаем сессии
session_start();
// Проверяем на вход и сессию
include_once('../../../engine/core/games/game_secure.php');
// Подключаем базу
include_once('../../../engine/config/config.php');
// Имя игры
$game_name = 'juicyfruits_new';
// Подключем функции
include_once('../../../engine/core/functions_games.php');
include_once('../../../engine/core/games/jackpots.php');

$login = $_SESSION['login'];
$mode = $_SESSION['mode'];
error_reporting(0);

$temp_action = $_POST['action'];
$temp_action = str_replace("-", "", $temp_action);
$temp_action = str_replace("`", "", $temp_action);
$temp_action = str_replace("'", "", $temp_action);
$temp_action = mysql_real_escape_string($temp_action);

function winlimit()
{
    $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
    $id_bank = $games['id_bank'];
    $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
    $winlimit = $bank['bank'];
    $winlimit = floor($winlimit);
    return $winlimit;
} 

function winlimitfun()
{
    global $login;
    $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
    $id_bank = $games['id_funbank'];
    $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
    $winlimit = $bank['bank'];
    $winlimit = floor($winlimit);
    return $winlimit;
} 

if ($mode == 'wmr') { $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) ); $user_balance = $row['cash']; }
if ($mode == 'fun') { $row = mysql_fetch_array( mysql_query( "select * from clients where login='".$login."'" ) ); $user_balance = $row['cashfun']; }
$user_balance = floor($user_balance);

$cl_asc = explode("|", $temp_action);
$test_bet = str_replace("bet=", "", $cl_asc[1]);
$test_lines = str_replace("lines=", "", $cl_asc[2]);
$test_allbet = $test_bet * $test_lines;

if ($user_balance < $test_allbet) {
    echo "error|" . $user_balance;
    die();
} 
if ($user_balance < 0) {
    echo "error|" . $user_balance;
    die();
} 

$_POST['action'] = $temp_action;
function vercard($dig)
{
    $c1 = array(0, 13, 26, 39);
    $c2 = array(1, 14, 27, 40);
    $c3 = array(2, 15, 28, 41);
    $c4 = array(3, 16, 29, 42);
    $c5 = array(4, 17, 30, 43);
    $c6 = array(5, 18, 31, 44);
    $c7 = array(6, 19, 32, 45);
    $c8 = array(7, 20, 33, 46);
    $c9 = array(8, 21, 34, 47);
    $c10 = array(9, 22, 35, 48);
    $c11 = array(10, 23, 36, 49);
    $c12 = array(11, 24, 37, 50);
    $c13 = array(12, 25, 38, 51);
    $mas = ${ "c".$dig };
    shuffle(&$mas);
    return $mas[0];
} 

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = "error";
} 

$row_bon = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
$g_cask = $row_bon['reserv1'];

$asc = explode("|", $action);
$action = str_replace("action=", "", $asc[0]);
$bet = str_replace("bet=", "", $asc[1]);
$lines = str_replace("lines=", "", $asc[2]);
$nado_card = $asc[1];
$betallt = $bet * $lines;

if ($bet < 0 || 25 < $bet) {
    $action = "error";
} 
if ($line < 0 || 9 < $line) {
    $action = "error";
} 
if ($user_balance < $betallt) {
    $action = "error";
} 
if ($action == "error") {
    echo "error|error";
} 
if ($action == "init") {
    echo "OK|" . $user_balance . "&extralife=10&";
} 
if ($action == "play") {
    $stat_txt = "juicyfruits_new";

    $date = date("d.m.y");
    $time = date("H:i:s");
    $allbet = $bet * $lines;
    $delitel = 225 / $allbet;
    $_SESSION['delitel'] = $delitel;
    $win1 = 0;
    $win2 = 0;
    $win3 = 0;
    $win4 = 0;
    $win5 = 0;
    $win6 = 0;
    $win7 = 0;
    $win8 = 0;
    $win9 = 0;
    $winall = 0;
    $w = 0; 
    // Режимы игры
    if ($mode == 'wmr') {
        mysql_query("update clients set cash=cash-'" . $allbet . "' where login='{$login}'");
        $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
        $id_bank = $games['id_bank'];
        $id_jp = $games['id_jp'];
        $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
        $jp = mysql_fetch_array(mysql_query("select * from games_jp where id='$id_jp'"));
        $proc4 = $bank['proc'];
        $allbet23 = ($allbet / 100) * $proc4;
        $proc5 = $jp ['proc'];
        $jp23 = ($allbet / 100) * $proc5 ;
        mysql_query("update games_bank set bank=bank+'" . $allbet23 . "' where id='$id_bank'");
        mysql_query("update games_jp set jp=jp+'" . $jp23 . "' where id='$id_jp'");
    } 

    if ($mode == 'fun') {
        mysql_query("update clients set cashfun=cashfun-'" . $allbet . "' where login='{$login}'");
        $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
        $id_bank = $games['id_funbank'];
        $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
        $proc4 = $bank['proc'];
        $allbet23 = ($allbet / 100) * $proc4;
        mysql_query("update games_bank set bank=bank+'" . $allbet23 . "' where id='$id_bank'");
    } 
    // Счёт игр, для статы и списка игр
    mysql_query("update games set totalgame=totalgame+1 where name='juicyfruits_new'");

    $row_bon = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
    $g_rezim = $row_bon['mode'];

    if ($g_rezim == 1) {
        $mx2 = array(0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 7, 7, 8, 8);
    } 
    if ($g_rezim == 2) {
        $mx2 = array(0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 8, 8);
    } 
    if ($g_rezim == 3) {
        $mx2 = array(0, 0, 0, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7, 8, 8);
    } 
    if ($g_rezim == 4) {
        $mx2 = array(0, 0, 0, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 8, 8);
    } 
    if ($g_rezim == 5) {
        $mx2 = array(0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 8, 8);
    } 
    $psym[0] = array(0, 0, 0, 100, 500, 2000); // ;tkn cnhe,fx 
    $psym[1] = array(0, 0, 0, 2, 3, 10); // вишня 
    $psym[2] = array(0, 0, 0, 3, 5, 20); //абрикос 
    $psym[3] = array(0, 0, 0, 5, 10, 50); // лимон
    $psym[4] = array(0, 0, 0, 10, 30, 100); // яблоко
    $psym[5] = array(0, 0, 0, 20, 50, 200); // груша
    $psym[6] = array(0, 0, 0, 30, 100, 500); // арбуз 
    $psym[7] = array(0, 0, 0, 200, 1000, 5000); // фруит 
    $psym[8] = array(0, 0, 0, 0, 0, 0); // клуб 
    $m_line = array(5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 10, 11, 12, 13, 14, 0, 6, 12, 8, 4, 10, 6, 2, 8, 14, 0, 1, 7, 3, 4, 10, 11, 7, 13, 14, 5, 11, 12, 13, 9, 5, 1, 2, 3, 9);
    $km2 = 0;
    $m_ln = 0;
    for (; $m_ln <= 8; ++$m_ln) {
        $km = 0;
        for (; $km <= 4; ++$km) {
            $lin[$m_ln][$km] = $m_line[$km2];
            ++$km2;
            continue;
        } 
    } 

    $row_bon = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
    $ooo1 = $row_bon['bonus'];
    $ooo2 = $row_bon['win'];
    $g_shansbon = $row_bon['ddouble'];
    $shs = explode("|", $ooo2);

    if ($lines == 1) {
        $ooo2 = $shs[0];
    } 
    if ($lines == 3) {
        $ooo2 = $shs[1];
    } 
    if ($lines == 5) {
        $ooo2 = $shs[2];
    } 
    if ($lines == 7) {
        $ooo2 = $shs[3];
    } 
    if ($lines == 9) {
        $ooo2 = $shs[4];
    } 

    if ($mode == 'wmr') {
        $casbank = winlimit();
    } 
    if ($mode == 'fun') {
        $casbank = winlimitfun();
    } 
    // Пользователи, ограничения
    $client_query = @mysql_fetch_array(mysql_query("select cashin,cashout from clients where login='" . $_SESSION['login'] . "'"));
    $settings_query = @mysql_fetch_array(mysql_query("select factorup,factordown from casino_settings"));
    $cashin = $client_query['cashin'];
    $cashout = $client_query['cashout']; 
    // Выясним множитель
    $factor = $cashout / $cashin; 
    // Если бабки не разу не выводились
    if ($factor > 2) {
        $ooo1 = $ooo1 * $factor;
        $ooo2 = $ooo2 * $factor;
    } 
    // Снял в 5ть раз больше чем положил
    if ($factor > 5) {
        $ooo1 = 7777;
        $ooo2 = 7777;
    } 

    $rnd_bonus = rand(1, floor($ooo1));
    $rnd_result = rand(1, floor($ooo2));

    if ($rnd_result == 1 && $rnd_bonus <> 1) {
        $mas_win = 1;
    } else {
        $mas_win = 0;
    } 
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if ($casbank <= $allbet * 3) {
        $mas_win = 0;
        $rnd_bonus = 0;
    }  
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $am = 0;
    while ($am < 100000) {
        $map_win1 = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $map_win2 = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $no = 0;
        srand((double)microtime() * 1000000);
        shuffle(&$mx2);
        $k = 0;
        for (; $k <= 14; ++$k) {
            $map[$k] = $mx2[$k];

            if ($rnd_bonus == 1 && $map[$k] = 8) {
                $map[$k] = rand(0, 7);
            } 
            if ($map[$k] == $map[$k-5]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-5]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-10]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-10]) {
                $map[$k] = rand(0, 7);
            } 
            if ($map[$k] == $map[$k-5]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-5]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-10]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-10]) {
                $map[$k] = rand(0, 7);
            } 
            if ($map[$k] == $map[$k-5]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-5]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-10]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-10]) {
                $map[$k] = rand(0, 7);
            } 
            if ($map[$k] == $map[$k-5]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-5]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-10]) {
                $map[$k] = rand(0, 7);
            } 

            if ($map[$k] == $map[$k-10]) {
                $map[$k] = rand(0, 7);
            } 
        } 
        $ln = 0;
        for (; $ln <= 8; ++$ln) {
            $s1 = $map[$lin[$ln][0]];
            $s2 = $map[$lin[$ln][1]];
            $s3 = $map[$lin[$ln][2]];
            $s4 = $map[$lin[$ln][3]];
            $s5 = $map[$lin[$ln][4]];
            if ($s1 == 0 && $s2 == $s3 && $s2 <> 7) {
                $s1 = $s2;
                $gg = $s2;
            } 
            if ($s2 == 0 && $s1 == $s3 && $s1 <> 7) {
                $s2 = $s3;
                $gg = $s3;
            } 
            if ($s3 == 0 && $s1 == $s2 && $s2 <> 7) {
                $s3 = $s2;
                $gg = $s2;
            } 
            if ($s1 == 0 && $s2 == 0 && $s3 <> 7) {
                $s1 = $s3;
                $s2 = $s3;
                $gg = $s3;
            } 
            if ($s2 == 0 && $s3 == 0 && $s1 <> 7) {
                $s2 = $s1;
                $s3 = $s1;
                $gg = $s1;
            } 
            if ($s1 == 0 && $s3 == 0 && $s2 <> 7) {
                $s1 = $s2;
                $s3 = $s2;
                $gg = $s2;
            } 
            if ($s1 == 0 && $s2 == $s3 && $s3 == $s4 && $s2 <> 7) {
                $s1 = $s2;
                $gg = $s2;
            } 
            if ($s2 == 0 && $s1 == $s3 && $s3 == $s4 && $s1 <> 7) {
                $s2 = $s3;
                $gg = $s3;
            } 
            if ($s3 == 0 && $s1 == $s2 && $s2 == $s3 && $s2 <> 7) {
                $s3 = $s2;
                $gg = $s2;
            } 
            if ($s4 == 0 && $s1 == $s2 && $s2 == $s3 && $s2 <> 7) {
                $s4 = $s2;
                $gg = $s2;
            } 
            if ($s1 == 0 && $s2 == 0 && $s3 == $s4 && $s3 <> 7) {
                $s1 = $s3;
                $s2 = $s3;
                $gg = $s3;
            } 
            if ($s1 == 0 && $s3 == 0 && $s2 == $s4 && $s2 <> 7) {
                $s1 = $s2;
                $s3 = $s2;
                $gg = $s2;
            } 
            if ($s1 == 0 && $s4 == 0 && $s2 == $s3 && $s2 <> 7) {
                $s1 = $s2;
                $s4 = $s2;
                $gg = $s2;
            } 
            if ($s2 == 0 && $s3 == 0 && $s1 == $s4 && $s1 <> 7) {
                $s2 = $s1;
                $s3 = $s1;
                $gg = $s1;
            } 
            if ($s2 == 0 && $s4 == 0 && $s1 == $s3 && $s1 <> 7) {
                $s2 = $s1;
                $s4 = $s1;
                $gg = $s1;
            } 
            if ($s3 == 0 && $s4 == 0 && $s1 == $s2 && $s1 <> 7) {
                $s3 = $s1;
                $s4 = $s1;
                $gg = $s1;
            } 
            if ($s1 == $s2 && $s2 == $s3) {
                $map_win1[$ln] = $psym[$s2][3];
            } 
            if ($s1 == $s2 && $s2 == $s3 && $s3 == $s4) {
                $map_win1[$ln] = $psym[$s3][4];
            } 
            if ($s1 == $s2 && $s2 == $s3 && $s3 == $s4 && $s4 == $s5) {
                $map_win1[$ln] = $psym[$s3][5];
            } 
        } 
        $ln = 0;
        for (; $ln <= 8; ++$ln) {
            $s1 = $map[$lin[$ln][0]];
            $s2 = $map[$lin[$ln][1]];
            $s3 = $map[$lin[$ln][2]];
            $s4 = $map[$lin[$ln][3]];
            $s5 = $map[$lin[$ln][4]];

            if ($s5 == 0 && $s4 == $s3 && $s4 <> 7) {
                $s5 = $s4;
                $gg = $s4;
            } 
            if ($s4 == 0 && $s5 == $s3 && $s5 <> 7) {
                $s4 = $s3;
                $gg = $s3;
            } 
            if ($s3 == 0 && $s5 == $s4 && $s5 <> 7) {
                $s3 = $s4;
                $gg = $s4;
            } 
            if ($s5 == 0 && $s4 == 0 && $s3 <> 7) {
                $s5 = $s3;
                $s4 = $s3;
                $gg = $s3;
            } 
            if ($s4 == 0 && $s3 == 0 && $s5 <> 7) {
                $s4 = $s5;
                $s3 = $s5;
                $gg = $s5;
            } 
            if ($s5 == 0 && $s3 == 0 && $s4 <> 7) {
                $s5 = $s4;
                $s3 = $s4;
                $gg = $s4;
            } 
            if ($s5 == 0 && $s4 == $s3 && $s3 == $s2 && $s4 <> 7) {
                $s5 = $s2;
                $gg = $s2;
            } 
            if ($s4 == 0 && $s5 == $s3 && $s3 == $s2 && $s5 <> 7) {
                $s4 = $s3;
                $gg = $s3;
            } 
            if ($s3 == 0 && $s5 == $s4 && $s4 == $s3 && $s5 <> 7) {
                $s3 = $s4;
                $gg = $s4;
            } 
            if ($s2 == 0 && $s5 == $s4 && $s5 == $s3 && $s5 <> 7) {
                $s2 = $s4;
                $gg = $s4;
            } 
            if ($s5 == 0 && $s4 == 0 && $s3 == $s2 && $s3 <> 7) {
                $s5 = $s3;
                $s4 = $s3;
                $gg = $s3;
            } 
            if ($s5 == 0 && $s3 == 0 && $s4 == $s2 && $s4 <> 7) {
                $s5 = $s4;
                $s3 = $s4;
                $gg = $s4;
            } 
            if ($s5 == 0 && $s2 == 0 && $s3 == $s4 && $s4 <> 7) {
                $s5 = $s4;
                $s2 = $s4;
                $gg = $s4;
            } 
            if ($s4 == 0 && $s3 == 0 && $s5 == $s2 && $s5 <> 7) {
                $s4 = $s5;
                $s3 = $s5;
                $gg = $s5;
            } 
            if ($s4 == 0 && $s2 == 0 && $s5 == $s3 && $s5 <> 7) {
                $s4 = $s5;
                $s2 = $s5;
                $gg = $s5;
            } 
            if ($s3 == 0 && $s2 == 0 && $s5 == $s4 && $s5 <> 7) {
                $s3 = $s5;
                $s2 = $s5;
                $gg = $s5;
            } 
            if ($s1 == 0 && $s2 == $s3 && $s3 == $s4 && $s4 == $s5 && $s2 <> 7) {
                $s1 = $s2;
                $gg = $s2;
            } 
            if ($s2 == 0 && $s1 == $s3 && $s3 == $s4 && $s4 == $s5 && $s1 <> 7) {
                $s2 = $s3;
                $gg = $s3;
            } 
            if ($s3 == 0 && $s1 == $s2 && $s2 == $s4 && $s4 == $s5 && $s1 <> 7) {
                $s3 = $s2;
                $gg = $s2;
            } 
            if ($s4 == 0 && $s1 == $s2 && $s2 == $s3 && $s3 == $s5 && $s1 <> 7) {
                $s4 = $s2;
                $gg = $s2;
            } 
            if ($s1 == 0 && $s2 == 0 && $s3 == $s4 && $s4 == $s5 && $s5 <> 7) {
                $s1 = $s3;
                $s2 = $s3;
                $gg = $s3;
            } 
            if ($s1 == 0 && $s3 == 0 && $s2 == $s4 && $s4 == $s5 && $s2 <> 7) {
                $s1 = $s2;
                $s3 = $s2;
                $gg = $s2;
            } 
            if ($s1 == 0 && $s4 == 0 && $s2 == $s3 && $s3 == $s5 && $s2 <> 7) {
                $s1 = $s2;
                $s4 = $s2;
                $gg = $s2;
            } 
            if ($s1 == 0 && $s5 == 0 && $s2 == $s3 && $s3 == $s4 && $s2 <> 7) {
                $s1 = $s2;
                $s5 = $s2;
                $gg = $s2;
            } 
            if ($s2 == 0 && $s3 == 0 && $s1 == $s4 && $s4 == $s5 && $s1 <> 7) {
                $s2 = $s1;
                $s3 = $s1;
                $gg = $s1;
            } 
            if ($s2 == 0 && $s4 == 0 && $s1 == $s3 && $s3 == $s5 && $s1 <> 7) {
                $s2 = $s1;
                $s4 = $s1;
                $gg = $s1;
            } 
            if ($s2 == 0 && $s5 == 0 && $s1 == $s3 && $s3 == $s4 && $s1 <> 7) {
                $s2 = $s1;
                $s5 = $s1;
                $gg = $s1;
            } 
            if ($s3 == 0 && $s4 == 0 && $s1 == $s2 && $s2 == $s5 && $s1 <> 7) {
                $s3 = $s1;
                $s4 = $s1;
                $gg = $s1;
            } 
            if ($s3 == 0 && $s5 == 0 && $s1 == $s2 && $s2 == $s4 && $s1 <> 7) {
                $s3 = $s1;
                $s5 = $s1;
                $gg = $s1;
            } 
            if ($s4 == 0 && $s5 == 0 && $s1 == $s2 && $s2 == $s3 && $s1 <> 7) {
                $s4 = $s1;
                $s5 = $s1;
                $gg = $s1;
            } 
            if ($s5 == $s4 && $s4 == $s3) {
                $map_win2[$ln] = $psym[$s4][3];
            } 
            if ($s5 == $s4 && $s4 == $s3 && $s3 == $s2) {
                $map_win2[$ln] = $psym[$s3][4];
            } 
            if ($s5 == $s4 && $s4 == $s3 && $s3 == $s2 && $s2 == $s1) {
                $map_win2[$ln] = $psym[$s3][5];
            } 

            if ($map_win2[$ln] > $map_win1[$ln]) {
                $map_win1[$ln] = 0;
            } 

            if ($map_win1[$ln] >= $map_win2[$ln]) {
                $map_win2[$ln] = 0;
            } 
        } 
        $k = 1;
        for (; $k <= 15; ++$k) {
            ${ "sym".$k } = $map[$k - 1];
        } 
        $k = 1;
        for (; $k <= 9; ++$k) {
            ${ "win_1".$k } = $bet * $map_win1[$k - 1];
        } 
        $k = 1;
        for (; $k <= 9; ++$k) {
            ${ "win_2".$k } = $bet * $map_win2[$k - 1];
        } 

        $winlinnn = 0;
        $ruslan = 0;
        $ls1 = 1;
        $ls2 = 2;
        $ls3 = 4;
        $ls4 = 8;
        $ls5 = 16;
        $ls6 = 32;
        $ls7 = 64;
        $ls8 = 128;
        $ls9 = 256;

        $k = 1;
        for (; $k <= 9; ++$k) {
            ${ "win".$k } = ${ "win_1".$k } + ${ "win_2".$k };
            if (${ "win".$k } > 0 && $k <= $lines) {
                $ruslan = $ruslan + ${ "ls".$k };
                $winlinnn = $winlinnn + 1;
                ${ "wines".$winlinnn } = "{$k}:${ "win".$k }";
            } 
        } 
        if ($lines == 1) {
            $win2 = 0;
            $win3 = 0;
            $win4 = 0;
            $win5 = 0;
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        } 
        if ($lines == 2) {
            $win3 = 0;
            $win4 = 0;
            $win5 = 0;
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        } 
        if ($lines == 3) {
            $win4 = 0;
            $win5 = 0;
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        } 
        if ($lines == 4) {
            $win5 = 0;
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        } 
        if ($lines == 5) {
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        } 
        if ($lines == 6) {
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        } 
        if ($lines == 7) {
            $win8 = 0;
            $win9 = 0;
        } 
        if ($lines == 8) {
            $win9 = 0;
        } 
        $winall = $win1 + $win2 + $win3 + $win4 + $win5 + $win6 + $win7 + $win8 + $win9;
        ++$am;
        if ($mas_win == 1 && $winall == 0) {
            $am = 10;
        } 
        if ($mas_win == 0 && $winall == 0) {
            $am = 120000;
        } 
        if ($mas_win == 0 && $winall == 0 && $rnd_bonus == 1) {
            $am = 120000;
            $startbon = 1;
        } 
        if ($mas_win == 1 && 0 < $winall) {
            $am = 120000;
        } 
        // ? 0 = 0?
        // 1 > 0 - заново
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        if ($winall > $casbank) {
            $am = 10;
        } 
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    } 
    ////////////////////////////////////////////////
        if ($mode == 'wmr') {
            $casbank = winlimit();
        } 
        if ($mode == 'fun') {
            $casbank = winlimitfun();
        }     
    ////////////////////////////////////////////////    
    if ($startbon == 1 && $allbet * 5 <= $casbank) {
        $w = 1;

        $tttb1 = array(1, 6, 11);
        $tttb2 = array(2, 7, 12);
        $tttb3 = array(3, 8, 13);
        $tttb4 = array(4, 9, 14);
        $tttb5 = array(5, 10, 15);
        shuffle(&$tttb1);
        $rnd_sym_bon1 = $tttb1[0];
        shuffle(&$tttb2);
        $rnd_sym_bon2 = $tttb2[0];
        shuffle(&$tttb3);
        $rnd_sym_bon3 = $tttb3[0];
        shuffle(&$tttb4);
        $rnd_sym_bon4 = $tttb4[0];
        shuffle(&$tttb5);
        $rnd_sym_bon5 = $tttb5[0];
        $bb_count_map = array(3, 3, 3, 3, 3, 4, 4, 5, 5);
        shuffle(&$bb_count_map);
        $goldsvet = $bb_count_map[0];
        if ($goldsvet == 3) {
            $goldsvet2 = rand(1, 4);
            if ($goldsvet2 == 1) {
                ${ "sym".$rnd_sym_bon3 } = 8;
                ${ "sym".$rnd_sym_bon4 } = 8;
                ${ "sym".$rnd_sym_bon5 } = 8;
            } 
            if ($goldsvet2 == 2) {
                ${ "sym".$rnd_sym_bon1 } = 8;
                ${ "sym".$rnd_sym_bon3 } = 8;
                ${ "sym".$rnd_sym_bon5 } = 8;
            } 
            if ($goldsvet2 == 3) {
                ${ "sym".$rnd_sym_bon1 } = 8;
                ${ "sym".$rnd_sym_bon2 } = 8;
                ${ "sym".$rnd_sym_bon4 } = 8;
            } 
            if ($goldsvet2 == 4) {
                ${ "sym".$rnd_sym_bon1 } = 8;
                ${ "sym".$rnd_sym_bon2 } = 8;
                ${ "sym".$rnd_sym_bon3 } = 8;
            } 
            $bb_win_map = array(0, 0, 0, 2, 2, 2, 5, 5, 5, 10, 10, 20, 50, 70, 100, 100, 100);
        } 
        if ($goldsvet == 4) {
            ${ "sym".$rnd_sym_bon2 } = 8;
            ${ "sym".$rnd_sym_bon3 } = 8;
            ${ "sym".$rnd_sym_bon4 } = 8;
            ${ "sym".$rnd_sym_bon5 } = 8;
            $bb_win_map = array(0, 0, 0, 2, 2, 2, 5, 5, 5, 10, 10, 20, 50, 70, 100, 100, 100, 100);
        } 
        if ($goldsvet == 5) {
            ${ "sym".$rnd_sym_bon1 } = 8;
            ${ "sym".$rnd_sym_bon2 } = 8;
            ${ "sym".$rnd_sym_bon3 } = 8;
            ${ "sym".$rnd_sym_bon4 } = 8;
            ${ "sym".$rnd_sym_bon5 } = 8;
            $bb_win_map = array(0, 2, 5, 10, 10, 20, 20, 50, 70, 70, 100, 100, 100, 100, 100);
        } 

        if ($mode == 'wmr') {
            $casbank = winlimit();
        } 
        if ($mode == 'fun') {
            $casbank = winlimitfun();
        } 

        $am444 = 0;
        while ($am444 < 1000000) {
            ++$am444;
            shuffle(&$bb_win_map);
            $bb_win = $bb_win_map[0];
            $bonus_win = $bb_win * $allbet;
            if ($bonus_win > 0) {
                $am444 = 1500000;
            } 
            if ($bonus_win > $casbank) {
                $am444 = 10;
            } 
        } 

        if ($bb_win == 0) {
            $bonus_win = 0;
            if ($goldsvet == 3) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = rand(2, 6);
                    $bs2 = rand(2, 6);
                    $bs3 = rand(2, 6);

                    $bonusik = "&reel=" . $bs1 . "|$bs2|$bs3|0|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $bonusik = "&reel=" . $bss1 . "|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(1, 2, 0, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];

                    $bs12 = array(0, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(2, 9, 15, 18, 22);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 
            } 
            if ($goldsvet == 4) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(1, 2, 0, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 
                if ($mega == 2) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(0, 7, 13, 20);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];

                    $bs12 = array(1, 2, 0, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(3, 10, 23);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(1, 2, 3, 4, 0, 6);
                    shuffle(&$bs1);
                    $bs01 = array(6);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];

                    $bs12 = array(1, 2, 3, 4, 5, 0);
                    shuffle(&$bs12);
                    $bs02 = array(19);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(1, 0, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(5, 11, 17, 24);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs15);
                    $bs05 = array(0, 7, 13, 20);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win|reel=$bss15|$bss25|$bss35|$bss05|$bonus_win";
                } 
            } 
            if ($goldsvet == 5) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(0, 7, 13, 20);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(0, 7, 13, 20);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];

                    $bs12 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(3, 10, 23);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs15);
                    $bs05 = array(0, 7, 13, 20);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win|reel=$bss15|$bss25|$bss35|$bss05|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(0, 7, 13, 20);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(1, 2, 3, 4, 5, 0);
                    shuffle(&$bs14);
                    $bs04 = array(19);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs15);
                    $bs05 = array(0, 7, 13, 20);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win|reel=$bss15|$bss25|$bss35|$bss05|$bonus_win";
                } 
            } 
        } 

        if ($bb_win == 2) {
            if ($goldsvet == 3) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 0;
                    } 
                    if ($vish == 2) {
                        $bss2 = 0;
                    } 
                    if ($vish == 3) {
                        $bss3 = 0;
                    } 

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 0;
                    } 
                    if ($vish == 2) {
                        $bss2 = 0;
                    } 
                    if ($vish == 3) {
                        $bss3 = 0;
                    } 

                    $bs14 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(3, 10, 23);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 6, 5);
                    shuffle(&$bs15);
                    $bs05 = array(1, 14);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs16);
                    $bs06 = array(5, 11, 17, 24);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];
                    $me = rand(1, 2);
                    if ($me == 1) {
                        $bonusik = "&reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss14|$bss24|$bss34|$bss04|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                    } 
                    if ($me == 2) {
                        $bonusik = "&reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss14|$bss24|$bss34|$bss04|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                    } 
                } 
            } 

            if ($goldsvet == 4) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 0;
                    } 
                    if ($vish == 2) {
                        $bss2 = 0;
                    } 
                    if ($vish == 3) {
                        $bss3 = 0;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 
                if ($mega == 2) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 0;
                    } 
                    if ($vish == 2) {
                        $bss2 = 0;
                    } 
                    if ($vish == 3) {
                        $bss3 = 0;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
            } 

            if ($goldsvet == 5) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 0;
                    } 
                    if ($vish == 2) {
                        $bss2 = 0;
                    } 
                    if ($vish == 3) {
                        $bss3 = 0;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 0;
                    } 
                    if ($vish == 2) {
                        $bss2 = 0;
                    } 
                    if ($vish == 3) {
                        $bss3 = 0;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 0;
                    } 
                    if ($vish == 2) {
                        $bss2 = 0;
                    } 
                    if ($vish == 3) {
                        $bss3 = 0;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs15);
                    $bs05 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs16);
                    $bs06 = array(19);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 
            } 
        } 

        if ($bb_win == 5) {
            if ($goldsvet == 3) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(0, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(2, 9, 15, 18, 22);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 1;
                    } 
                    if ($vish == 2) {
                        $bss2 = 1;
                    } 
                    if ($vish == 3) {
                        $bss3 = 1;
                    } 

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(2, 9, 15, 18, 22);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 1;
                    } 
                    if ($vish == 2) {
                        $bss2 = 1;
                    } 
                    if ($vish == 3) {
                        $bss3 = 1;
                    } 

                    $bs14 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(3, 10, 23);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 6, 5);
                    shuffle(&$bs15);
                    $bs05 = array(1, 14);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs16);
                    $bs06 = array(5, 11, 17, 24);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];
                    $me = rand(1, 2);
                    if ($me == 1) {
                        $bonusik = "&reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss14|$bss24|$bss34|$bss04|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                    } 
                    if ($me == 2) {
                        $bonusik = "&reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss14|$bss24|$bss34|$bss04|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                    } 
                } 
            } 

            if ($goldsvet == 4) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(0, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(2, 9, 15, 18, 22);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 1;
                    } 
                    if ($vish == 2) {
                        $bss2 = 1;
                    } 
                    if ($vish == 3) {
                        $bss3 = 1;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 
                if ($mega == 2) {
                    $bs1 = array(0, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(2, 9, 15, 18, 22);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 1;
                    } 
                    if ($vish == 2) {
                        $bss2 = 1;
                    } 
                    if ($vish == 3) {
                        $bss3 = 1;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
            } 

            if ($goldsvet == 5) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(0, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(2, 9, 15, 18, 22);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 1;
                    } 
                    if ($vish == 2) {
                        $bss2 = 1;
                    } 
                    if ($vish == 3) {
                        $bss3 = 1;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(2, 9, 15, 18, 22);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 1;
                    } 
                    if ($vish == 2) {
                        $bss2 = 1;
                    } 
                    if ($vish == 3) {
                        $bss3 = 1;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(0, 2, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(2, 9, 15, 18, 22);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 1;
                    } 
                    if ($vish == 2) {
                        $bss2 = 1;
                    } 
                    if ($vish == 3) {
                        $bss3 = 1;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 4, 5, 6);
                    shuffle(&$bs15);
                    $bs05 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs16);
                    $bs06 = array(19);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 
            } 
        } 

        if ($bb_win == 10) {
            if ($goldsvet == 3) {
                $mega = rand(1, 2);

                if ($mega == 1) {
                    $bs1 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(5, 11, 17, 24);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 2;
                    } 
                    if ($vish == 2) {
                        $bss2 = 2;
                    } 
                    if ($vish == 3) {
                        $bss3 = 2;
                    } 

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
                if ($mega == 2) {
                    $bs1 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(5, 11, 17, 24);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 2;
                    } 
                    if ($vish == 2) {
                        $bss2 = 2;
                    } 
                    if ($vish == 3) {
                        $bss3 = 2;
                    } 

                    $bs14 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(3, 10, 23);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 6, 5);
                    shuffle(&$bs15);
                    $bs05 = array(1, 14);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs16);
                    $bs06 = array(19);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];
                    $me = rand(1, 2);
                    if ($me == 1) {
                        $bonusik = "&reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss14|$bss24|$bss34|$bss04|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                    } 
                    if ($me == 2) {
                        $bonusik = "&reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss14|$bss24|$bss34|$bss04|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                    } 
                } 
            } 

            if ($goldsvet == 4) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(5, 11, 17, 24);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 2;
                    } 
                    if ($vish == 2) {
                        $bss2 = 2;
                    } 
                    if ($vish == 3) {
                        $bss3 = 2;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 
                if ($mega == 2) {
                    $bs1 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(5, 11, 17, 24);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 2;
                    } 
                    if ($vish == 2) {
                        $bss2 = 2;
                    } 
                    if ($vish == 3) {
                        $bss3 = 2;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
            } 

            if ($goldsvet == 5) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(5, 11, 17, 24);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 2;
                    } 
                    if ($vish == 2) {
                        $bss2 = 2;
                    } 
                    if ($vish == 3) {
                        $bss3 = 2;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(5, 11, 17, 24);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 2;
                    } 
                    if ($vish == 2) {
                        $bss2 = 2;
                    } 
                    if ($vish == 3) {
                        $bss3 = 2;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(5, 11, 17, 24);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 2;
                    } 
                    if ($vish == 2) {
                        $bss2 = 2;
                    } 
                    if ($vish == 3) {
                        $bss3 = 2;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 4, 0, 6);
                    shuffle(&$bs15);
                    $bs05 = array(6);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs16);
                    $bs06 = array(19);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 
            } 
        } 

        if ($bb_win == 20) {
            if ($goldsvet == 3) {
                $mega = rand(1, 2);

                if ($mega == 1) {
                    $bs1 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 3;
                    } 
                    if ($vish == 2) {
                        $bss2 = 3;
                    } 
                    if ($vish == 3) {
                        $bss3 = 3;
                    } 

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 3;
                    } 
                    if ($vish == 2) {
                        $bss2 = 3;
                    } 
                    if ($vish == 3) {
                        $bss3 = 3;
                    } 

                    $bs14 = array(0, 1, 2, 3, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(1, 14);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 6, 5);
                    shuffle(&$bs15);
                    $bs05 = array(1, 14);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs16);
                    $bs06 = array(19);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];
                    $me = rand(1, 2);
                    if ($me == 1) {
                        $bonusik = "&reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss14|$bss24|$bss34|$bss04|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                    } 
                    if ($me == 2) {
                        $bonusik = "&reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss14|$bss24|$bss34|$bss04|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                    } 
                } 
            } 

            if ($goldsvet == 4) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 3;
                    } 
                    if ($vish == 2) {
                        $bss2 = 3;
                    } 
                    if ($vish == 3) {
                        $bss3 = 3;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 
                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 3;
                    } 
                    if ($vish == 2) {
                        $bss2 = 3;
                    } 
                    if ($vish == 3) {
                        $bss3 = 3;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
            } 

            if ($goldsvet == 5) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 3;
                    } 
                    if ($vish == 2) {
                        $bss2 = 3;
                    } 
                    if ($vish == 3) {
                        $bss3 = 3;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 3;
                    } 
                    if ($vish == 2) {
                        $bss2 = 3;
                    } 
                    if ($vish == 3) {
                        $bss3 = 3;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 3;
                    } 
                    if ($vish == 2) {
                        $bss2 = 3;
                    } 
                    if ($vish == 3) {
                        $bss3 = 3;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 4, 0, 6);
                    shuffle(&$bs15);
                    $bs05 = array(6);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 2, 3, 6, 5);
                    shuffle(&$bs16);
                    $bs06 = array(1, 14);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 
            } 
        } 

        if ($bb_win == 50) {
            if ($goldsvet == 3) {
                $bs1 = array(0, 1, 2, 3, 5, 6);
                shuffle(&$bs1);
                $bs01 = array(1, 14);
                shuffle(&$bs01);
                $bss1 = $bs1[1];
                $bss2 = $bs1[2];
                $bss3 = $bs1[3];
                $bss0 = $bs01[0];
                $bs012 = array(0, 7, 13, 20);
                shuffle(&$bs012);
                $bss12 = $bs1[4];
                $bss22 = $bs1[5];
                $bss32 = $bs1[6];
                $bss02 = $bs012[0];
                $vish = rand(1, 3);
                if ($vish == 1) {
                    $bss1 = 4;
                } 
                if ($vish == 2) {
                    $bss2 = 4;
                } 
                if ($vish == 3) {
                    $bss3 = 4;
                } 

                $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
            } 

            if ($goldsvet == 4) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 3, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(1, 14);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 4;
                    } 
                    if ($vish == 2) {
                        $bss2 = 4;
                    } 
                    if ($vish == 3) {
                        $bss3 = 4;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 
                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 3, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(1, 14);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 4;
                    } 
                    if ($vish == 2) {
                        $bss2 = 4;
                    } 
                    if ($vish == 3) {
                        $bss3 = 4;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
            } 

            if ($goldsvet == 5) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 3, 2, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(1, 14);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 4;
                    } 
                    if ($vish == 2) {
                        $bss2 = 4;
                    } 
                    if ($vish == 3) {
                        $bss3 = 4;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 1, 3, 2, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(1, 14);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 4;
                    } 
                    if ($vish == 2) {
                        $bss2 = 4;
                    } 
                    if ($vish == 3) {
                        $bss3 = 4;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(0, 1, 3, 2, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(1, 14);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 4;
                    } 
                    if ($vish == 2) {
                        $bss2 = 4;
                    } 
                    if ($vish == 3) {
                        $bss3 = 4;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 4, 0, 5);
                    shuffle(&$bs15);
                    $bs05 = array(19);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs16);
                    $bs06 = array(5, 11, 17, 24);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 
            } 
        } 

        if ($bb_win == 70) {
            if ($goldsvet == 3) {
                $bs1 = array(0, 1, 3, 4, 2, 6);
                shuffle(&$bs1);
                $bs01 = array(6);
                shuffle(&$bs01);
                $bss1 = $bs1[0];
                $bss2 = $bs1[1];
                $bss3 = $bs1[2];
                $bss0 = $bs01[0];
                $bs012 = array(0, 7, 13, 20);
                shuffle(&$bs012);
                $bss12 = $bs1[3];
                $bss22 = $bs1[4];
                $bss32 = $bs1[5];
                $bss02 = $bs012[0];
                $vish = rand(1, 3);
                if ($vish == 1) {
                    $bss1 = 5;
                } 
                if ($vish == 2) {
                    $bss2 = 5;
                } 
                if ($vish == 3) {
                    $bss3 = 5;
                } 

                $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|0";
            } 

            if ($goldsvet == 4) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 2, 3, 4, 6);
                    shuffle(&$bs1);
                    $bs01 = array(6);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 5;
                    } 
                    if ($vish == 2) {
                        $bss2 = 5;
                    } 
                    if ($vish == 3) {
                        $bss3 = 5;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                } 
                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 3, 4, 6);
                    shuffle(&$bs1);
                    $bs01 = array(6);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 5;
                    } 
                    if ($vish == 2) {
                        $bss2 = 5;
                    } 
                    if ($vish == 3) {
                        $bss3 = 5;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
            } 

            if ($goldsvet == 5) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 2, 3, 4, 6);
                    shuffle(&$bs1);
                    $bs01 = array(6);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 5;
                    } 
                    if ($vish == 2) {
                        $bss2 = 5;
                    } 
                    if ($vish == 3) {
                        $bss3 = 5;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 3, 4, 6);
                    shuffle(&$bs1);
                    $bs01 = array(6);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 5;
                    } 
                    if ($vish == 2) {
                        $bss2 = 5;
                    } 
                    if ($vish == 3) {
                        $bss3 = 5;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(0, 1, 2, 3, 4, 6);
                    shuffle(&$bs1);
                    $bs01 = array(6);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 5;
                    } 
                    if ($vish == 2) {
                        $bss2 = 5;
                    } 
                    if ($vish == 3) {
                        $bss3 = 5;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 4, 0, 5);
                    shuffle(&$bs15);
                    $bs05 = array(19);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs16);
                    $bs06 = array(5, 11, 17, 24);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 
            } 
        } 

        if ($bb_win == 100) {
            if ($goldsvet == 3) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs1);
                    $bs01 = array(19);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 6;
                    } 
                    if ($vish == 2) {
                        $bss2 = 6;
                    } 
                    if ($vish == 3) {
                        $bss3 = 6;
                    } 

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|0";
                } 
                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs1);
                    $bs01 = array(3, 10, 23);
                    shuffle(&$bs01);
                    $bss1 = $bs1[0];
                    $bss2 = $bs1[1];
                    $bss3 = $bs1[2];
                    $bss0 = $bs01[0];
                    $bs012 = array(0, 7, 13, 20);
                    shuffle(&$bs012);
                    $bss12 = $bs1[3];
                    $bss22 = $bs1[4];
                    $bss32 = $bs1[5];
                    $bss02 = $bs012[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss1 = 3;
                    } 
                    if ($vish == 2) {
                        $bss2 = 3;
                    } 
                    if ($vish == 3) {
                        $bss3 = 3;
                    } 

                    $bs14 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(3, 10, 23);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss14 = 3;
                    } 
                    if ($vish == 2) {
                        $bss24 = 3;
                    } 
                    if ($vish == 3) {
                        $bss34 = 3;
                    } 

                    $bs13 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(3, 10, 23);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss13 = 3;
                    } 
                    if ($vish == 2) {
                        $bss23 = 3;
                    } 
                    if ($vish == 3) {
                        $bss33 = 3;
                    } 

                    $bs15 = array(1, 2, 4, 0, 5);
                    shuffle(&$bs15);
                    $bs05 = array(3, 10, 23);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss15 = 3;
                    } 
                    if ($vish == 2) {
                        $bss25 = 3;
                    } 
                    if ($vish == 3) {
                        $bss35 = 3;
                    } 

                    $bs16 = array(0, 1, 2, 4, 5, 6);
                    shuffle(&$bs16);
                    $bs06 = array(3, 10, 23);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];
                    $vish = rand(1, 3);
                    if ($vish == 1) {
                        $bss16 = 3;
                    } 
                    if ($vish == 2) {
                        $bss26 = 3;
                    } 
                    if ($vish == 3) {
                        $bss36 = 3;
                    } 

                    $bonus_win1 = $bonus_win / 5;
                    $bonus_win2 = $bonus_win1 + $bonus_win1;
                    $bonus_win3 = $bonus_win2 + $bonus_win1;
                    $bonus_win4 = $bonus_win3 + $bonus_win1;
                    $bonus_win5 = $bonus_win4 + $bonus_win1;

                    $bonusik = "&reel=$bss16|$bss26|$bss36|$bss06|$bonus_win1|reel=$bss15|$bss25|$bss35|$bss05|$bonus_win2|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win3|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win4|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win5|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
            } 

            if ($goldsvet == 4) {
                $mega = rand(1, 2);
                if ($mega == 1) {
                    $me = rand(1, 2);

                    if ($me == 1) {
                        $bs1 = array(0, 1, 2, 3, 4, 5);
                        shuffle(&$bs1);
                        $bs01 = array(19);
                        shuffle(&$bs01);
                        $bss1 = $bs1[1];
                        $bss2 = $bs1[2];
                        $bss3 = $bs1[3];
                        $bss0 = $bs01[0];
                        $vish = rand(1, 3);

                        if ($vish == 1) {
                            $bss1 = 6;
                        } 
                        if ($vish == 2) {
                            $bss2 = 6;
                        } 
                        if ($vish == 3) {
                            $bss3 = 6;
                        } 

                        $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                        shuffle(&$bs12);
                        $bs02 = array(0, 7, 13, 20);
                        shuffle(&$bs02);
                        $bss12 = $bs12[1];
                        $bss22 = $bs12[2];
                        $bss32 = $bs12[3];
                        $bss02 = $bs02[0];

                        $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                        shuffle(&$bs13);
                        $bs03 = array(0, 7, 13, 20);
                        shuffle(&$bs03);
                        $bss13 = $bs13[1];
                        $bss23 = $bs13[2];
                        $bss33 = $bs13[3];
                        $bss03 = $bs03[0];
                        $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                    } 

                    if ($me == 2) {
                        $bs1 = array(0, 1, 2, 3, 5, 6);
                        shuffle(&$bs1);
                        $bs01 = array(1, 14);
                        shuffle(&$bs01);
                        $bss1 = $bs1[1];
                        $bss2 = $bs1[2];
                        $bss3 = $bs1[3];
                        $bss0 = $bs01[0];
                        $vish = rand(1, 3);

                        if ($vish == 1) {
                            $bss1 = 4;
                        } 
                        if ($vish == 2) {
                            $bss2 = 4;
                        } 
                        if ($vish == 3) {
                            $bss3 = 4;
                        } 

                        $bs12 = array(0, 1, 2, 4, 5, 6);
                        shuffle(&$bs12);
                        $bs02 = array(3, 10, 23);
                        shuffle(&$bs02);
                        $bss12 = $bs12[1];
                        $bss22 = $bs12[2];
                        $bss32 = $bs12[3];
                        $bss02 = $bs02[0];
                        $vish = rand(1, 3);

                        if ($vish == 1) {
                            $bss12 = 3;
                        } 
                        if ($vish == 2) {
                            $bss22 = 3;
                        } 
                        if ($vish == 3) {
                            $bss32 = 3;
                        } 

                        $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                        shuffle(&$bs13);
                        $bs03 = array(0, 7, 13, 20);
                        shuffle(&$bs03);
                        $bss13 = $bs13[1];
                        $bss23 = $bs13[2];
                        $bss33 = $bs13[3];
                        $bss03 = $bs03[0];

                        $bs14 = array(0, 1, 2, 4, 5, 6);
                        shuffle(&$bs14);
                        $bs04 = array(3, 10, 23);
                        shuffle(&$bs04);
                        $bss14 = $bs12[1];
                        $bss24 = $bs12[2];
                        $bss34 = $bs12[3];
                        $bss04 = $bs02[0];
                        $vish = rand(1, 3);

                        if ($vish == 1) {
                            $bss14 = 3;
                        } 
                        if ($vish == 2) {
                            $bss24 = 3;
                        } 
                        if ($vish == 3) {
                            $bss34 = 3;
                        } 

                        $bs15 = array(0, 1, 3, 4, 5, 6);
                        shuffle(&$bs15);
                        $bs05 = array(5, 11, 17, 24);
                        shuffle(&$bs05);
                        $bss15 = $bs15[1];
                        $bss25 = $bs15[2];
                        $bss35 = $bs15[3];
                        $bss05 = $bs05[0];
                        $vish = rand(1, 3);

                        if ($vish == 1) {
                            $bss15 = 2;
                        } 
                        if ($vish == 2) {
                            $bss25 = 2;
                        } 
                        if ($vish == 3) {
                            $bss35 = 2;
                        } 

                        $bonus_win1 = $allbet * 50;

                        $bonus_win2 = $allbet * 20;
                        $bonus_win3 = $allbet * 20;
                        $bonus_win4 = $allbet * 10;
                        $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win1|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win2|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win3|reel=$bss15|$bss25|$bss35|$bss05|$bonus_win4|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win";
                    } 
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs1);
                    $bs01 = array(19);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 6;
                    } 
                    if ($vish == 2) {
                        $bss2 = 6;
                    } 
                    if ($vish == 3) {
                        $bss3 = 6;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];
                    $bonusik = "&reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win";
                } 
            } 

            if ($goldsvet == 5) {
                $mega = rand(1, 3);
                if ($mega == 1) {
                    $bs1 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs1);
                    $bs01 = array(19);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 6;
                    } 
                    if ($vish == 2) {
                        $bss2 = 6;
                    } 
                    if ($vish == 3) {
                        $bss3 = 6;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss12|$bss22|$bss32|$bss02|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 2) {
                    $bs1 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs1);
                    $bs01 = array(19);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 6;
                    } 
                    if ($vish == 2) {
                        $bss2 = 6;
                    } 
                    if ($vish == 3) {
                        $bss3 = 6;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss13|$bss23|$bss33|$bss03|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 

                if ($mega == 3) {
                    $bs1 = array(0, 1, 2, 3, 4, 5);
                    shuffle(&$bs1);
                    $bs01 = array(19);
                    shuffle(&$bs01);
                    $bss1 = $bs1[1];
                    $bss2 = $bs1[2];
                    $bss3 = $bs1[3];
                    $bss0 = $bs01[0];
                    $vish = rand(1, 3);

                    if ($vish == 1) {
                        $bss1 = 6;
                    } 
                    if ($vish == 2) {
                        $bss2 = 6;
                    } 
                    if ($vish == 3) {
                        $bss3 = 6;
                    } 

                    $bs12 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs12);
                    $bs02 = array(0, 7, 13, 20);
                    shuffle(&$bs02);
                    $bss12 = $bs12[1];
                    $bss22 = $bs12[2];
                    $bss32 = $bs12[3];
                    $bss02 = $bs02[0];

                    $bs13 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs13);
                    $bs03 = array(0, 7, 13, 20);
                    shuffle(&$bs03);
                    $bss13 = $bs13[1];
                    $bss23 = $bs13[2];
                    $bss33 = $bs13[3];
                    $bss03 = $bs03[0];

                    $bs14 = array(0, 1, 2, 3, 4, 5, 6);
                    shuffle(&$bs14);
                    $bs04 = array(0, 7, 13, 20);
                    shuffle(&$bs04);
                    $bss14 = $bs14[1];
                    $bss24 = $bs14[2];
                    $bss34 = $bs14[3];
                    $bss04 = $bs04[0];

                    $bs15 = array(1, 2, 3, 4, 6, 5);
                    shuffle(&$bs15);
                    $bs05 = array(4, 8, 12, 16, 21, 25);
                    shuffle(&$bs05);
                    $bss15 = $bs15[1];
                    $bss25 = $bs15[2];
                    $bss35 = $bs15[3];
                    $bss05 = $bs05[0];

                    $bs16 = array(0, 1, 3, 4, 5, 6);
                    shuffle(&$bs16);
                    $bs06 = array(5, 11, 17, 24);
                    shuffle(&$bs06);
                    $bss16 = $bs16[1];
                    $bss26 = $bs16[2];
                    $bss36 = $bs16[3];
                    $bss06 = $bs06[0];

                    $bonusik = "&reel=$bss12|$bss22|$bss32|$bss02|0|reel=$bss15|$bss25|$bss35|$bss05|0|reel=$bss13|$bss23|$bss33|$bss03|0|reel=$bss16|$bss26|$bss36|$bss06|0|reel=$bss1|$bss2|$bss3|$bss0|$bonus_win|reel=$bss14|$bss24|$bss34|$bss04|$bonus_win";
                } 
            } 
        } 

        if (0 < $bonus_win) {
            if ($mode == 'wmr') {
                mysql_query("update clients set cash=cash+'" . $bonus_win . "' where login='{$login}'");
                $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
                $id_bank = $games['id_bank'];
                mysql_query("update games_bank set bank=bank-'" . $bonus_win . "' where id='$id_bank'");
                $stat_txt = "juicyfruits_new_bonus";
            } 

            if ($mode == 'fun') {
                mysql_query("update clients set cashfun=cashfun+'" . $bonus_win . "' where login='{$login}'");
                $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
                $id_bank = $games['id_funbank'];
                mysql_query("update games_bank set bank=bank-'" . $bonus_win . "' where id='$id_bank'");
                $stat_txt = "juicyfruits_new_bonus";
            } 
        } 
        $winall = $bonus_win;
    } 

    if (0 < $winall && $startbon != 1) {
        if ($mode == 'wmr') {
            $winall44 = sprintf("%01.2f", $winall);
            mysql_query("update clients set cash=cash+'" . $winall44 . "' where login='$login'");
            $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
            $id_bank = $games['id_bank'];
            mysql_query("update games_bank set bank=bank-'" . $winall44 . "' where id='$id_bank'");
        } 

        if ($mode == 'fun') {
            $winall44 = sprintf("%01.2f", $winall);
            mysql_query("update clients set cashfun=cashfun+'" . $winall44 . "' where login='$login'");
            $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
            $id_bank = $games['id_funbank'];
            mysql_query("update games_bank set bank=bank-'" . $winall44 . "' where id='$id_bank'");
        } 

        $double_card = rand(2, 13);
        $double_card2 = vercard($double_card);
        $_SESSION['double_card'] = $double_card;
        $_SESSION['double_card2'] = $double_card2;
        $_SESSION['double_win'] = $winall;
    } else {
        $_SESSION['double_card'] = 0;
        $_SESSION['double_card2'] = "";
        $_SESSION['double_win'] = 0;
    } 

    if ($mode == 'wmr') {
        $row = mysql_fetch_array(mysql_query("select * from clients where login='" . $login . "'"));
        $user_balance = $row['cash'];
    } 
    if ($mode == 'fun') {
        $row = mysql_fetch_array(mysql_query("select * from clients where login='" . $login . "'"));
        $user_balance = $row['cashfun'];
    } 
    $user_balance = floor($user_balance);

    $winall44 = sprintf("%01.2f", $winall);
    if (0 < $winall) {
        $user_balance -= $winall;
    } 

    $winss = 0;

    if ($winlinnn == 1) {
        $winss = "$wines1";
    } 
    if ($winlinnn == 2) {
        $winss = "$wines1|$wines2";
    } 
    if ($winlinnn == 3) {
        $winss = "$wines1|$wines2|$wines3";
    } 
    if ($winlinnn == 4) {
        $winss = "$wines1|$wines2|$wines3|$wines4";
    } 
    if ($winlinnn == 5) {
        $winss = "$wines1|$wines2|$wines3|$wines4|$wines5";
    } 
    if ($winlinnn == 6) {
        $winss = "$wines1|$wines2|$wines3|$wines4|$wines5|$wines6";
    } 

    if ($winlinnn == 7) {
        $winss = "$wines1|$wines2|$wines3|$wines4|$wines5|$wines6|$wines7";
    } 

    if ($winlinnn == 8) {
        $winss = "$wines1|$wines2|$wines3|$wines4|$wines5|$wines6|$wines7|$wines8";
    } 
    if ($winlinnn == 9) {
        $winss = "$wines1|$wines2|$wines3|$wines4|$wines5|$wines6|$wines7|$wines8|$wines9";
    } 

    if ($w == 1) {
        echo "OK|" . $sym1 . "|{$sym6}|{$sym11}|{$sym2}|{$sym7}|{$sym12}|{$sym3}|{$sym8}|{$sym13}|{$sym4}|{$sym9}|{$sym14}|{$sym5}|{$sym10}|{$sym15}|{$winall}|{$user_balance}|{$double_card2}" . $bonusik;
    } 

    if ($w == 0) {
        echo "OK|" . $sym1 . "|{$sym6}|{$sym11}|{$sym2}|{$sym7}|{$sym12}|{$sym3}|{$sym8}|{$sym13}|{$sym4}|{$sym9}|{$sym14}|{$sym5}|{$sym10}|{$sym15}|{$winall}|{$user_balance}|{$double_card2}&winLines=$ruslan&fullWinLines=$winss" . $bonusik;
    } 

    $winall44 = sprintf("%01.2f", $winall);
    $allbet44 = sprintf("%01.2f", $allbet);
    $date = date("d.m.y");
    $time = date("H:i:s");
    if ($mode == 'wmr') {
        // Берём банк для статистики
        $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
        $id_bank = $games['id_bank'];
        $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
        mysql_query("INSERT INTO games_stats VALUES('NULL','" . $date . "','" . $time . "','" . $login . "','" . $user_balance . "', '" . $bank['bank'] . "','" . $allbet44 . "','" . $winall44 . "','" . $stat_txt . "','real')");
    } 
    if ($mode == 'fun') {
        $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
        $id_bank = $games['id_funbank'];
        $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
        mysql_query("INSERT INTO games_stats VALUES('NULL','" . $date . "','" . $time . "','" . $login . "','" . $user_balance . "', '" . $bank['bank'] . "','" . $allbet44 . "','" . $winall44 . "','" . $stat_txt . "','fun')");
    } 
} 
if ($action == "double") {
    $delitel = $_SESSION['delitel'];

    $double_card = $_SESSION['double_card'];
    $double_card2 = $_SESSION['double_card2'];
    $double_win = $_SESSION['double_win'];

    if ($mode == 'wmr') {
        mysql_query("update clients set cash=cash-'" . $double_win . "' where login='{$login}'"); 
        // anee i?iea?uou ?ani?aaaeyai n?aanoaa
        $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
        $id_bank = $games['id_bank'];
        $id_jp = $games['id_jp'];
        $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
        $jp = mysql_fetch_array(mysql_query("select * from games_jp where id='$id_jp'"));

        $proc4 = $bank['proc'];
        $allbet23 = ($double_win / 100) * $proc4;

        $proc5 = $jp ['proc'];
        $jp23 = ($double_win / 100) * $proc5 ;

        mysql_query("update games_bank set bank=bank+'" . $allbet23 . "' where id='$id_bank'");
        mysql_query("update games_jp set jp=jp+'" . $jp23 . "' where id='$id_bank'");
    } 

    if ($mode == 'fun') {
        mysql_query("update clients set cashfun=cashfun-'" . $double_win . "' where login='{$login}'"); 
        // anee i?iea?uou ?ani?aaaeyai n?aanoaa
        $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
        $id_bank = $games['id_funbank'];
        $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
        $proc4 = $bank['proc'];
        $allbet23 = ($double_win / 100) * $proc4;
        mysql_query("update games_bank set bank=bank+'" . $allbet23 . "' where id='$id_bank'");
    } 

    $stat_bet = $double_win;
    $dcard1 = $double_card2;
    $double_user_card = rand(1, 13);
    $double_user_card2 = vercard($double_user_card);
    $double_user_card777 = rand(1, 1);
    if ($double_card < $double_user_card) {
        $double_win *= 2;
    } 
    if ($double_user_card < $double_card) {
        $double_win = 0;
    } 
    if ($double_user_card == $double_card) {
        $double_win = $double_win;
    } 

    if ($mode == 'wmr') {
        $casbank = winlimit();
    } 
    if ($mode == 'fun') {
        $casbank = winlimitfun();
    } 

    if ($casbank < $double_win) {
        if ($double_card == 1) {
            $double_user_card = $double_card;
            $double_user_card2 = vercard($double_user_card);
            $double_win /= 2;
        } else {
            $m = rand (1, $double_card-1);
            $double_user_card = $double_card - $m;
            $double_user_card2 = vercard($double_user_card);
            $double_win = 0;
        } 
    } 
    $date = date("d.m.y");
    $time = date("H:i:s");
    $stat_win = $double_win;

    $stat_win44 = sprintf("%01.2f", $double_win);
    $stat_bet44 = sprintf("%01.2f", $stat_bet);
    $date = date("d.m.y");
    $time = date("H:i:s");
    if ($mode == 'wmr') {
        // Aa??i aaie aey noaoenoeee
        $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
        $id_bank = $games['id_bank'];
        $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
        mysql_query("INSERT INTO games_stats VALUES('NULL','" . $date . "','" . $time . "','" . $login . "','" . $user_balance . "', '" . $bank['bank'] . "','" . $stat_bet44 . "','" . $stat_win44 . "','juicyfruits_new_double','real')");
    } 
    if ($mode == 'fun') {
        $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
        $id_bank = $games['id_funbank'];
        $bank = mysql_fetch_array(mysql_query("select * from games_bank where id='$id_bank'"));
        mysql_query("INSERT INTO games_stats VALUES('NULL','" . $date . "','" . $time . "','" . $login . "','" . $user_balance . "', '" . $bank['bank'] . "','" . $stat_bet44 . "','" . $stat_win44 . "','juicyfruits_new_double','fun')");
    } 

    if (0 < $double_win) {
        $double_card_new = rand(1, 13);
        $double_card_new2 = vercard($double_card_new);
        $_SESSION['double_card'] = $double_card_new;
        $_SESSION['double_card2'] = $double_card_new2;
        $_SESSION['double_win'] = $double_win;

        if ($mode == 'wmr') {
            mysql_query("update clients set cash=cash+'" . $double_win . "' where login='{$login}'");
            $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
            $id_bank = $games['id_bank'];
            mysql_query("update games_bank set bank=bank-'" . $double_win . "' where id='$id_bank'");
        } 

        if ($mode == 'fun') {
            mysql_query("update clients set cashfun=cashfun+'" . $double_win . "' where login='{$login}'");
            $games = mysql_fetch_array(mysql_query("select * from games where name='juicyfruits_new'"));
            $id_bank = $games['id_funbank'];
            mysql_query("update games_bank set bank=bank-'" . $double_win . "' where id='$id_bank'");
        } 
    } else {
        $_SESSION['double_card'] = 0;
        $_SESSION['double_card2'] = "";
        $_SESSION['double_win'] = 0;
        $double_card_new2 = "";
    } 

    if ($mode == 'wmr') {
        $row = mysql_fetch_array(mysql_query("select * from clients where login='" . $login . "'"));
        $user_balance = $row['cash'];
    } 
    if ($mode == 'fun') {
        $row = mysql_fetch_array(mysql_query("select * from clients where login='" . $login . "'"));
        $user_balance = $row['cashfun'];
    } 
    $user_balance = floor($user_balance);

    if (0 < $double_win) {
        $user_balance -= $double_win;
    } 
    
    //Генерируем карты
    $ucardarrays = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51);
	$ucardarray = randoms(4,$ucardarrays);
	    
    if ($nado_card == 1) {
        $ucard1 = $double_user_card2;
    } else {
        $ucard1 = $ucardarray[1];
    } 
    if ($nado_card == 2) {
        $ucard2 = $double_user_card2;
    } else {
        $ucard2 = $ucardarray[2];
    } 
    if ($nado_card == 3) {
        $ucard3 = $double_user_card2;
    } else {
        $ucard3 = $ucardarray[3];
    } 
    if ($nado_card == 4) {
        $ucard4 = $double_user_card2;
    } else {
        $ucard4 = $ucardarray[4];
    } 

    echo "OK|" . $dcard1 . "|$ucard1|$ucard2|$ucard3|$ucard4|$double_win|$user_balance|$double_card_new2|";
} 

?>