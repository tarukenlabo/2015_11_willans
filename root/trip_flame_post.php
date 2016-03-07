<?php
	require_once("./db_connect.php");
	require_once("./functions.php");
	
	//セッション開始
	session_start();
	
	//データベースに登録するものをサニタイジング＆変数に格納
	$u_id = h($_SESSION['u_id']);
	$cate =h($_POST["cate"]);
	$title = h($_POST["o_title"]);
	$sday = h($_POST["start_date"]);
	
	
	$db = new cls_db();
	$dbh = $db->db_connect();
	$dbh->query('SET NAMES utf8');
	
	//旅行のしおり（大枠）の登録
	$sql = "INSERT INTO post(U_ID,P_CAT,P_TITLE,P_SDAY) VALUES(:u_id,:cate,:title,:sday)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(array(
		'u_id'=>$u_id,
		'cate'=>$cate,
		'title'=>$title,
		'sday'=>$sday
	));
	
