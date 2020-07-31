<?php
include_once 'dbcon.php';
session_start();
	
 
	$title=$_POST['title'];
	$day=$_POST['day'];
	$starttime=date("H:i:s", strtotime($_POST['starttime']));
	$endtime=date("H:i:s", strtotime($_POST['endtime']));
	
	
	$diff = mysqli_query($con,"SELECT TIMEDIFF('$endtime','$starttime') as hours");
	while($row = mysqli_fetch_assoc($diff)) {
    $d = $row['hours'];
    }
  
  
  
  $max = '05:00:00'; // time interval of 5 hours
  
  if($d <= $max){
	mysqli_query($con,"insert into tbl_events (title, date, starttime, endtime) values ('$title', '$day', '$starttime', '$endtime') "); // query if event timing is less than or equal to 5 hours
	header('location:index.php');
 }




  else if (($d > $max) && ($d <= '10:00:00')){  // condition used when event timing is between 5 and 10 hours

  echo $starttime;
	
  $timestamp = strtotime($starttime) + 60*60*5;
  $endtimefive = date('H:i:s', $timestamp);
  echo $endtimefive;

	mysqli_query($con,"insert into tbl_events (title, date, starttime, endtime) values 
	('$title', '$day', '$starttime', '$endtimefive'),
    ('$title', '$day', '$endtimefive', '$endtime')
	");
	header('location:index.php');
 }




  else if (($d > '10:00:00') && ($d <= '15:00:00')){  // condition used when event timing is between 10 and 15 hours

  echo $starttime;
	
  $timestamp = strtotime($starttime) + 60*60*5;
  $firstfive = date('H:i:s', $timestamp);
  $timestamp1 = strtotime($starttime) + 60*60*10;
  $secondfive = date('H:i:s', $timestamp1);
  echo $endtimefive;

	mysqli_query($con,"insert into tbl_events (title, date, starttime, endtime) values 
	('$title', '$day', '$starttime', '$firstfive'),
	('$title', '$day', '$firstfive', '$secondfive'),
    ('$title', '$day', '$secondfive', '$endtime')
	");
	header('location:index.php');
 }
 
 
 
 
  else if (($d > '15:00:00') && ($d <= '20:00:00')){  // condition used when event timing is between 15 and 20 hours

  echo $starttime;
	
  $timestamp = strtotime($starttime) + 60*60*5;
  $firstfive = date('H:i:s', $timestamp);
  $timestamp1 = strtotime($starttime) + 60*60*10;
  $secondfive = date('H:i:s', $timestamp1);
  $timestamp2 = strtotime($starttime) + 60*60*15;
  $thirdfive = date('H:i:s', $timestamp2);
  echo $endtimefive;

	mysqli_query($con,"insert into tbl_events (title, date, starttime, endtime) values 
	('$title', '$day', '$starttime', '$firstfive'),
	('$title', '$day', '$firstfive', '$secondfive'),
	('$title', '$day', '$secondfive', '$thirdfive'),
    ('$title', '$day', '$thirdfive', '$endtime')
	");
	header('location:index.php');
 }
 
 
 
 
 
  else if (($d > '20:00:00') && ($d <= '23:59:59')){  // condition used when event timing is between 20 and 24 hours

  echo $starttime;
	
  $timestamp = strtotime($starttime) + 60*60*5;
  $firstfive = date('H:i:s', $timestamp);
  $timestamp1 = strtotime($starttime) + 60*60*10;
  $secondfive = date('H:i:s', $timestamp1);
  $timestamp2 = strtotime($starttime) + 60*60*15;
  $thirdfive = date('H:i:s', $timestamp2);
  $timestamp3 = strtotime($starttime) + 60*60*20;
  $thirdfive = date('H:i:s', $timestamp3);
  echo $endtimefive;

	mysqli_query($con,"insert into tbl_events (title, date, starttime, endtime) values 
	('$title', '$day', '$starttime', '$firstfive'),
	('$title', '$day', '$firstfive', '$secondfive'),
	('$title', '$day', '$secondfive', '$thirdfive'),
	('$title', '$day', '$thirdfive', '$fourthfive'),
    ('$title', '$day', '$fourthfive', '$endtime')
	");
	header('location:index.php');
 }
 
 
 
?>