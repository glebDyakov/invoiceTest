<html>
<head>
<style>
table{
background:white;
}
#asideItem{
	height:140px;
	box-sizing:border-box;
	border:4px solid brown;
}
#header{
font-size:35px;
font-weight:bolder;
display:flex;
justify-content:center;
align-items:center;
height:150px;
background:red;
}
table, h1, a{
margin:auto;
}
#article{
height:700px;
width:70%;
background:blue;
float:left;
}
#aside{
height:700px;
width:15%;
background:green;
float:left;
}
#footer{
height:150px;
background:yellow;
clear:both;
}
</style>
</head>
<body>
<div id="header">invoice</div>
<div id="aside">
<div id="asideItem">
</div>
<div id="asideItem">
</div>
<div id="asideItem">
</div>
<div id="asideItem">
</div>
<div id="asideItem">
</div>
</div>
<div id="article">
	<?php
if($_GET[page]===null){
	$_GET[page]=1;
};
$i=0;
$user='root';
$password='';
$db='myinvoice';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");
if($_GET[order]===null){
$order="name";
}else{
$order=$_GET[order];
}
if($_GET[limit]===null){
	$limit=15;
}else{
	$limit=(int)$_GET[limit];
}
if($limit == 5){
	$sqlpre="Select * from buyers";
	$querypre=$pdo->prepare($sqlpre);
	$querypre->execute();
	while($row=$querypre->fetch(PDO::FETCH_ASSOC)){
				$i++;
	};
	$j=$i / 5;
	$l=0;
	while($l<$j){
	$l++;
	echo "<a href=index.php?limit=5&page=${l}>${l}</a>";
	};
	$myvaro=(int)($_GET[page] * 5 - 5);
	$myvart=(int)($_GET[page] * 5);
	$sql="Select * from buyers where id > ${myvaro} and id <= ${myvart} order by ${order}";
}else{
	$sql="Select * from buyers order by ${order} limit ${limit}";
};
$query=$pdo->prepare($sql);
$query->execute();
echo "<table border=1>
<tr>
<td>id покупателя</td>
<td>имя покупателя</td>
<td>средний чек</td>
<td>количество покупок</td>
<td>общая выручка</td>
</tr>";
while($row=$query->fetch(PDO::FETCH_ASSOC)){

				echo "<tr>
				<td><a href=./id/index.php?id=$row[id]>$row[id]</a></td>
				<td>$row[name]</td>
				<td>$row[averageCheck]</td>
				<td>$row[numberOfPurchases]</td>
				<td>$row[totalRevenues]</td></tr>";
};
echo "</table>";
?>
<h1>упорядочить по:</h1>
<a href="index.php?order=name">имя покупателя</a>
<a href="index.php?order=averageCheck">средний чек</a>
<a href="index.php?order=numberOfPurchases">количество покупок</a>
<a href="index.php?order=totalRevenues">общая выручка</a>

<h1>отобразить по:</h1>
<a href="index.php?limit=5">5</a>
<a href="index.php?limit=10">10</a>
<a href="index.php?limit=15">15</a>

</div>
<div id="aside" class="asideRight">
<div id="asideItem">
</div>
<div id="asideItem">
</div>
<div id="asideItem">
</div>
<div id="asideItem">
</div>
<div id="asideItem">
</div>
</div>
<div id="footer"></div>

</body>
</html>