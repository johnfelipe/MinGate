<?
include 'inc/header.php';
?>
<body bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
<BR>
<TABLE>
<TR>
	<TD bgcolor="#4d942d">
<B>BEHANDLET</B>
	</TD>
	<TD bgcolor="#d2c715">
<B>TIL BEHANDLET</B>
	</TD>	
		<TD bgcolor="#932117">
<B><FONT COLOR="#FFFFFF">IKKE BEHANDLET</B>
	</TD>
		<TD bgcolor="#000000">
<B><FONT COLOR="#FFFFFF">AVVIST</FONT></B>
	</TD>
</TR>

<TR>
	<TD valign="top">
<?
require "../config.php";    

$page_name="index.php";
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 50;           
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


$queryB=" SELECT * FROM fiksgrafitti";
$resultB=mysql_query($queryB);
echo mysql_error();
$nume=mysql_num_rows($resultB);

echo "<TABLE width=240 align=left cellpadding=0 cellspacing=0> <tr>";

$query=" SELECT * FROM fiksgrafitti where status like 'behandlet' order by id desc limit $eu, $limit ";
$result=mysql_query($query);
echo mysql_error();


while($noticia = mysql_fetch_array($result))
{
if($bgcolor=='#F0F3F9'){$bgcolor='#ffffff';}
else{$bgcolor='#F0F3F9';}

echo "<tr >";
echo "<td align=left bgcolor=$bgcolor id='title'>";

if ($noticia[status] == "ubehandlet")
			print " <img src=\"../img/bullet_red.png\" alt=\"Ubehandlet\">";

	if ($noticia[status] == "behandlet")
			print " <img src=\"../img/bullet_green.png\" alt=\"Behandlet\">";

	if ($noticia[status] == "tilbehandling")
			print " <img src=\"../img/bullet_orange.png\" alt=\"Til behandling\">";

echo "<B><font face='Verdana' size='1'>Dato: $noticia[dato]<br>Saken gjelder: $noticia[feil]</B><br><B>Adresse</B>: $noticia[sted]<br><font face='Verdana' size='1'><B>Problem</B>: $noticia[problem]<br><B>Innmelder</B>:$noticia[navn]<br>$noticia[epost]<br><B>Tlf: </B>$noticia[tlf]<br><font face='Verdana' color=red size='1'>Kommentar: $noticia[kommentar]<br></td>"; 

echo "</tr>";
}
echo "</table>";

if($nume > $limit ){ 


echo "<table align = 'center' width='240'><tr><td  align='left' width='30%'>";

if($back >=0) { 
print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>Forrige side</font></a>"; 
} 

echo "</td><td align=center width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='2' color=red><B>$l</B></font>";}    
$l=$l+1;
}


echo "</td><td  align='right' width='30%'>";

if($this1 < $nume) { 
print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>Neste side</font></a>";} 
echo "</td></tr></table>";

}
?>

</body>



	</TD>
	<TD valign="top">
<?


$page_name="index.php"; 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 50;               
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 



$query2=" SELECT * FROM fiksgrafitti";
$result2=mysql_query($query2);
echo mysql_error();
$nume=mysql_num_rows($result2);



echo "<TABLE width=240 align=left cellpadding=0 cellspacing=0> <tr>";

$query=" SELECT * FROM fiksgrafitti where status like 'tilbehandling' order by id desc limit $eu, $limit ";
$result=mysql_query($query);
echo mysql_error();


while($noticia = mysql_fetch_array($result))
{
if($bgcolor=='#F0F3F9'){$bgcolor='#ffffff';}
else{$bgcolor='#F0F3F9';}

echo "<tr >";
echo "<td align=left bgcolor=$bgcolor id='title'>";

if ($noticia[status] == "ubehandlet")
			print " <img src=\"../img/bullet_red.png\" alt=\"Ubehandlet\">";

	if ($noticia[status] == "behandlet")
			print " <img src=\"../img/bullet_green.png\" alt=\"Behandlet\">";

	if ($noticia[status] == "tilbehandling")
			print " <img src=\"../img/bullet_orange.png\" alt=\"Til behandling\">";

echo "<B><font face='Verdana' size='1'>Dato: $noticia[dato]<br>Saken gjelder: $noticia[feil]</B><br><B>Adresse</B>: $noticia[sted]<br><font face='Verdana' size='1'><B>Problem</B>: $noticia[problem]<br><B>Innmelder</B>:$noticia[navn]<br>$noticia[epost]<br><B>Tlf: </B>$noticia[tlf]<br><font face='Verdana' color=red size='1'>Kommentar: $noticia[kommentar]<br></td>"; 


echo "</tr>";
}
echo "</table>";


if($nume > $limit ){ 


echo "<table align = 'center' width='240'><tr><td  align='left' width='30%'>";

if($back >=0) { 
print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>Forrige side</font></a>"; 
} 

echo "</td><td align=center width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='2' color=red><B>$l</B></font>";}   
$l=$l+1;
}


echo "</td><td  align='right' width='30%'>";

if($this1 < $nume) { 
print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>Neste side</font></a>";} 
echo "</td></tr></table>";

}
?>
  
</body>


	</TD>	
	<TD valign="top">
<?


$page_name="index.php"; 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 50;              
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 



$query2=" SELECT * FROM fiksgrafitti";
$result2=mysql_query($query2);
echo mysql_error();
$nume=mysql_num_rows($result2);

echo "<TABLE width=240 align=left cellpadding=0 cellspacing=0> <tr>";

$query=" SELECT * FROM fiksgrafitti where status like 'ubehandlet' order by id desc limit $eu, $limit ";
$result=mysql_query($query);
echo mysql_error();


while($noticia = mysql_fetch_array($result))
{
if($bgcolor=='#F0F3F9'){$bgcolor='#ffffff';}
else{$bgcolor='#F0F3F9';}

echo "<tr >";
echo "<td align=left bgcolor=$bgcolor id='title'>";

if ($noticia[status] == "ubehandlet")
			print " <img src=\"../img/bullet_red.png\" alt=\"Ubehandlet\">";

	if ($noticia[status] == "behandlet")
			print " <img src=\"../img/bullet_green.png\" alt=\"Behandlet\">";

	if ($noticia[status] == "tilbehandling")
			print " <img src=\"../img/bullet_orange.png\" alt=\"Til behandling\">";

echo "<B><font face='Verdana' size='1'>Dato: $noticia[dato]<br>Saken gjelder: $noticia[feil]</B><br><B>Adresse</B>: $noticia[sted]<br><font face='Verdana' size='1'><B>Problem</B>: $noticia[problem]<br><B>Innmelder</B>:$noticia[navn]<br>$noticia[epost]<br><B>Tlf: </B>$noticia[tlf]<br><font face='Verdana' color=red size='1'>Kommentar: $noticia[kommentar]<br></td>"; 


echo "</tr>";
}
echo "</table>";


if($nume > $limit ){ 


echo "<table align = 'center' width='240'><tr><td  align='left' width='30%'>";

if($back >=0) { 
print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>Forrige side</font></a>"; 
} 

echo "</td><td align=center width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='2' color=red><B>$l</B></font>";}    
$l=$l+1;
}


echo "</td><td  align='right' width='30%'>";

if($this1 < $nume) { 
print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>Neste side</font></a>";} 
echo "</td></tr></table>";

}
?>

</body>

</html>

	</TD>
	<TD valign="top">
<?

$page_name="index.php"; 
$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


$eu = ($start - 0); 
$limit = 50;                 
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 



$query2=" SELECT * FROM fiksgrafitti";
$result2=mysql_query($query2);
echo mysql_error();
$nume=mysql_num_rows($result2);



echo "<TABLE width=240 align=left cellpadding=0 cellspacing=0> <tr>";

$query=" SELECT * FROM fiksgrafitti where status like 'avvist' order by id desc limit $eu, $limit ";
$result=mysql_query($query);
echo mysql_error();


while($noticia = mysql_fetch_array($result))
{
if($bgcolor=='#F0F3F9'){$bgcolor='#ffffff';}
else{$bgcolor='#F0F3F9';}

echo "<tr >";
echo "<td align=left bgcolor=$bgcolor id='title'>";

if ($noticia[status] == "ubehandlet")
			print " <img src=\"../img/bullet_red.png\" alt=\"Ubehandlet\">";

	if ($noticia[status] == "behandlet")
			print " <img src=\"../img/bullet_green.png\" alt=\"Behandlet\">";

	if ($noticia[status] == "tilbehandling")
			print " <img src=\"../img/bullet_orange.png\" alt=\"Til behandling\">";

echo "<B><font face='Verdana' size='1'>Dato: $noticia[dato]<br>Saken gjelder: $noticia[feil]</B><br><B>Adresse</B>: $noticia[sted]<br><font face='Verdana' size='1'><B>Problem</B>: $noticia[problem]<br><B>Innmelder</B>:$noticia[navn]<br>$noticia[epost]<br><B>Tlf: </B>$noticia[tlf]<br><font face='Verdana' color=red size='1'>Kommentar: $noticia[kommentar]<br></td>"; 


echo "</tr>";
}
echo "</table>";


if($nume > $limit ){ 


echo "<table align = 'center' width='240'><tr><td  align='left' width='30%'>";

if($back >=0) { 
print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>Forrige side</font></a>"; 
} 

echo "</td><td align=center width='30%'>";
$i=0;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
}
else { echo "<font face='Verdana' size='2' color=red><B>$l</B></font>";}   
$l=$l+1;
}


echo "</td><td  align='right' width='30%'>";

if($this1 < $nume) { 
print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>Neste side</font></a>";} 
echo "</td></tr></table>";

}
?>

</body>

</html>

	</TD>
</TR>
</TABLE>


