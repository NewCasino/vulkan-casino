<?
error_reporting(0);
unset($l); 
session_start();
session_register($l);
if(!isset($l)){ 
header("Location: ../../../index.php"); 
exit; 
}
include ("../../../dbcon.php");
include ("../../../includes/config.php");
if ($cash < 0){$cash=0;}
if ($bet=="" && $bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $bet="0.20";}
$result=mysql_query("select * from jsgamingcenter_users where login='$l'", $casdb);
$row=mysql_fetch_array($result);
// ������
if ($mon==0 or $mon=="")
{	echo "&sp=1";	echo "&login=$l";	echo "&cash=$row[3]";
}
$num = array();
$szamok = array();
$num[0] = $num1;
$num[1] = $num2;
$num[2] = $num3;
$num[3] = $num4;
$num[4] = $num5;
$num[5] = $num6;
$num[6] = $num7;
$num[7] = $num8;$num[8] = $num9;$num[9] = $num10;$num[10] = $num11;$num[11] = $num12;$num[12] = $num13;$num[13] = $num14;$num[14] = $num15;$b0 = array(0, 0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);  $b1 = array(0, 3,0,0,0,0,0,0,0,0,0,0,0,0,0,0); $b2 = array(0, 1,9,0,0,0,0,0,0,0,0,0,0,0,0,0); $b3 = array(0, 1,2,14,0,0,0,0,0,0,0,0,0,0,0,0); $b4 = array(0, 0.5,2,5,15,0,0,0,0,0,0,0,0,0,0,0); $b5 = array(0, 0.5, 1, 3, 12, 50, 00 ,00, 0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ); $b6 = array(0, 0.5, 0.5, 3, 4, 18, 50 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ); $b7 = array(0, 0.5, 0.5, 1.5, 3, 15, 40 ,75 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ); $b8 = array(0, 0.5, 0.5, 1, 2.5, 7, 18 ,75 ,500 ,0 ,0 ,0 ,0 ,0 ,0 ,0 ); $b9 = array(0, 0.5, 0.5, 1, 1.5, 4, 12 ,35 ,60 ,750 ,0 ,0 ,0 ,0 ,0 ,0 ); $b10 = array(0, 0, 0.5, 0.5, 1.5, 4, 11 ,33 ,50 ,500 ,1000 ,0 ,0 ,0 ,0 ,0 ); $b11 = array(0, 0, 0.5, 0.5, 1, 3, 7 ,18 ,40 ,125 ,750 ,1000 ,0 ,0 ,0, 0 ); $b12 = array(0, 0, 0, 0.5, 1, 2.5, 6 ,12 ,25 ,50 ,250 ,750 ,2500 ,0 ,0 ,0 ); $b13 = array(0, 0, 0, 0.5, 1, 1.5, 5 ,6 ,12 ,40 ,200 ,500 ,2500 ,7500 ,0 ,0); $b14 = array(0, 0, 0, 0.5, 0.5, 1.5, 4, 5 ,8 ,35 ,100 ,250 ,1000 ,2500 ,7500 ,0 ); $b15 = array(0, 0, 0, 0.5, 0.5, 1,3 ,4 ,7 ,30 ,80 ,125 ,500 ,1000 ,2500, 10000 ); 
if ($mon==1 && $row[3]>=$bet)
{	$win=0;	$foglalt = array();	$randTomb = array();	for($i=0; $i<80; $i++)	{		$folglalt[$i] = 2;	}	$randNum = rand(1,80);	for($i=1; $i<21; $i++)	{		while($foglalt[$randNum] == 1)		{			$randNum = rand(1,80);		}
		$randTomb[$i] = $randNum;
		$foglalt[$randNum] = 1;
	}	$counter=0;	//for($ii=0; $ii<70; $ii++) echo " $foglalt[$ii]";	for($i=0; $i<15; $i++)	{		$a = $num[$i];		if($foglalt[$a] == 1) $counter++;	}	switch($num_counter)	{		case 1: $win=$b1[$counter]*$bet; break;		case 2: $win=$b2[$counter]*$bet; break;		case 3: $win=$b3[$counter]*$bet; break;		case 4: $win=$b4[$counter]*$bet; break;		case 5: $win=$b5[$counter]*$bet; break;		case 6: $win=$b6[$counter]*$bet; break;		case 7: $win=$b7[$counter]*$bet; break;		case 8: $win=$b8[$counter]*$bet; break;		case 9: $win=$b9[$counter]*$bet; break;		case 10: $win=$b10[$counter]*$bet; break;		case 11: $win=$b11[$counter]*$bet; break;		case 12: $win=$b12[$counter]*$bet; break;		case 13: $win=$b13[$counter]*$bet; break;		case 14: $win=$b14[$counter]*$bet; break;		case 15: $win=$b15[$counter]*$bet; break;	}	mysql_query("update jsgamingcenter_users set cash=cash-'$bet' where login='$l'", $casdb);	mysql_query("update jsgamingcenter_users set points = points + '$bet' where login='$l'");	if ($l!="guestlogin"){	$money_to_bank = $bet/100*$bank_percent;	$money_to_profit = $bet/100*$profit_percent;	mysql_query("update jsgamingcenter_bank set amount=amount+'$money_to_bank' where name='default'", $casdb);	mysql_query("update jsgamingcenter_profitpurse set currentprofit=currentprofit+'$money_to_profit'", $casdb);	}
	// ���� ���� ���� �� ��� ���
	$resultb=mysql_query("select * from jsgamingcenter_bank where name='default'", $casdb);	$rowb=mysql_fetch_array($resultb);	$bank = $rowb[1];	$proc = $rowb[2];	$caswin = $bank/100*$proc;	if ($win>=$caswin) 	{ 		$win=0;		for($i=0; $i<100; $i++)  //foglalts� null��a		{			$folglalt[$i] = 2;			$szamok[$i] = 2;		}		for($i=0; $i<15; $i++)  //sz�ok be��a a t�bbe		{			$foglalt[$num[$i]] = 1;		}		for($i=1; $i<21; $i++)		{			while(($foglalt[$randNum] == 1)) 			{				$randNum = rand(1,80);			}			$randTomb[$i] = $randNum;			$foglalt[$randNum] = 1;		}	}////////////////$date=date("d.m.y");$time=date("H:i:s");if ($win>0){	mysql_query("update jsgamingcenter_users set cash=cash+'$win' where login='$l'", $casdb);	if ($l!="guestlogin"){	mysql_query("update jsgamingcenter_bank set amount=amount-'$win' where name='default'", $casdb);	}	$sqls="INSERT INTO jsgamingcenter_gameplays VALUES('','$date','$time','$l','$row[3]','$bet','$win','0.00','KENO MASTER','NULL')";	mysql_query($sqls);}if ($win==0)	{	$sqls="INSERT INTO jsgamingcenter_gameplays VALUES('','$date','$time','$l','$row[3]','$bet','$win','$bet','KENO MASTER','NULL')";	mysql_query($sqls);	}for ($i = 1; $i<=300000; $i++){	$marat=$marat+10;
}$result=mysql_query("select * from jsgamingcenter_users where login='$l'", $casdb);$row=mysql_fetch_array($result);echo "&login=$l";echo "&cash={$row[3]}";echo "&rnum1={$randTomb[1]}";echo "&rnum2={$randTomb[2]}";echo "&rnum3={$randTomb[3]}";echo "&rnum4={$randTomb[4]}";echo "&rnum5={$randTomb[5]}";echo "&rnum6={$randTomb[6]}";echo "&rnum7={$randTomb[7]}";echo "&rnum8={$randTomb[8]}";echo "&rnum9={$randTomb[9]}";echo "&rnum10={$randTomb[10]}";echo "&rnum11={$randTomb[11]}";echo "&rnum12={$randTomb[12]}";echo "&rnum13={$randTomb[13]}";echo "&rnum14={$randTomb[14]}";echo "&rnum15={$randTomb[15]}";echo "&rnum16={$randTomb[16]}";echo "&rnum17={$randTomb[17]}";echo "&rnum18={$randTomb[18]}";echo "&rnum19={$randTomb[19]}";echo "&rnum20={$randTomb[20]}";echo "&win=$win";echo "&counter=$counter";echo "&bet=$bet";echo "&spins=1";echo "&sp=1";}
?>