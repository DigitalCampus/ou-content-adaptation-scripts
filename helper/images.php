<?php

/*
 * 
 *
 */


include '../local_settings.php';

//connect to db
$db = new mysqli('localhost', $DB->DBUSER, $DB->DBPASS, $DB->DBNAME );

	
$file = "Figure.html";
$fh = fopen($file, 'w') or die("can't open file"); 
fwrite($fh, "<h2>Pages with 'caption img'</h2>");
$sql = "select cm.id, p.name from tmp_page p inner join mdl_course_modules cm On cm.instance = p.id where (p.content like '%Figure%' OR p.content like '%Box%' OR p.content like '%Table%' ) 
AND p.course IN ( 105, 97, 118, 106, 107, 108, 109, 110, 111, 112, 117, 113, 114, 158, 101, 120, 99, 115, 116, 100, 98,166, 167, 177, 175, 178, 173, 176, 174)";

$result = mysql_query($sql,$conn);

fwrite($fh, "<ol>");
while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
	fwrite($fh, "<li><a target='_blank' href='");
	fwrite($fh, $link.$row['id']."'>");
	fwrite($fh, $row['name']);
	fwrite($fh, "</a></li>");
}
fwrite($fh, "</ol>");




fclose($fh);

// db disconnect
$db->close();
