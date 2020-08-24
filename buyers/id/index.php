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

$user='root';
$password='';
$db='myinvoice';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");
if($_GET[id] == null){
	$myid=1;
}
else{
	$myid=(int)($_GET[id]);
};
$sql="Select * from buyers where id = ${myid}";
$query=$pdo->prepare($sql);
$query->execute();





while($row=$query->fetch(PDO::FETCH_ASSOC)){
				echo "
				<p>Ваше id $row[id]</p>
				<p>Ваше имя покупателя $row[name]</p>
				<p>Ваш средний чек $row[averageCheck]</p>
				<p>Ваше колво покупок $row[numberOfPurchases]</p>
				<p>Ваше общая выручка $row[totalRevenues]</p>";
};
?>
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