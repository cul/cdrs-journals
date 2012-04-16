<?php
/*
	tmr_author.php
	3/28/12
	
	Get the list of author names from the database and change the order of the name so that it is "LAST NAME, FIRST NAME"
	instead of "FIRST NAME LAST NAME"
*/

function to_camel_case($str) {
	$str = strtolower($str);
   $str[0] = strtoupper($str[0]);
   
   echo "this is the string: ".$str."<br>";
   return $str;
}

$connect = mysql_connect("127.0.0.1","root","");
$chooseDB = mysql_select_db("tmr",$connect);

if (!$connect) {
	die("Could not connect: ".mysql_error());
}
if (!$chooseDB) {
	die("Could not connect to DB: ".mysql_error());
}

$selectAuthor = "SELECT wp_terms.name, wp_terms.term_id FROM wp_terms INNER JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id WHERE wp_term_taxonomy.taxonomy =  'author'";

$getAuthor = mysql_query($selectAuthor,$connect);
$authorList = array();
$authorID = array();

while($row=mysql_fetch_array($getAuthor)) {
	echo $row[1]."&nbsp;&nbsp;&nbsp;".$row[0]."<br>";
	$authorID[] = $row[1];
	$authorList[] = $row[0];
}

$authorListExplode = array();

for ($i=0; $i<sizeof($authorList); $i++) {
	$authorListExplode[] = explode(" ",$authorList[$i]);
}

$authorListChange = array();

echo "<br>";
echo "<table>";
for ($j=0; $j<sizeof($authorListExplode); $j++) {
	if (sizeof($authorListExplode[$j])==1) {
		$authorListExplode[$j][0] = to_camel_case($authorListExplode[$j][0]);

		$authorListChange[$j] = $authorListExplode[$j][0];
		echo "<tr><td>".$authorListChange[$j]."</td></tr>";
	}
	if (sizeof($authorListExplode[$j])==2) {
		$authorListExplode[$j][1] = to_camel_case($authorListExplode[$j][1]);
		$authorListExplode[$j][0] = to_camel_case($authorListExplode[$j][0]);
	
	
		$authorListChange[$j] = $authorListExplode[$j][1].", ".$authorListExplode[$j][0];
		echo "<tr><td>".$authorListChange[$j]."</td></tr>";
	}
	elseif (sizeof($authorListExplode[$j])==3) {
		$authorListExplode[$j][2] = to_camel_case($authorListExplode[$j][2]);
		$authorListExplode[$j][1] = to_camel_case($authorListExplode[$j][1]);
		$authorListExplode[$j][0] = to_camel_case($authorListExplode[$j][0]);
	
		$authorListChange[$j] = $authorListExplode[$j][2].", ".$authorListExplode[$j][0]." ".$authorListExplode[$j][1];
		echo "<tr><td>".$authorListChange[$j]."</td></tr>";
	}
	elseif (sizeof($authorListExplode[$j])==4) {
		$authorListExplode[$j][3] = to_camel_case($authorListExplode[$j][3]);
		$authorListExplode[$j][2] = to_camel_case($authorListExplode[$j][2]);
		$authorListExplode[$j][1] = to_camel_case($authorListExplode[$j][1]);
		$authorListExplode[$j][0] = to_camel_case($authorListExplode[$j][0]);
	
		$authorListChange[$j] = $authorListExplode[$j][3].", ".$authorListExplode[$j][0]." ".$authorListExplode[$j][1]." ".$authorListExplode[$j][2];
		echo "<tr><td>".$authorListChange[$j]."</td></tr>";
	}
}
echo "</table>";

for($q=0; $q<sizeof($authorListChange); $q++) {
	mysql_query("UPDATE `wp_terms` SET name='$authorListChange[$q]' WHERE `term_id`='$authorID[$q]'");
}

echo "DONE.";

mysql_close($connect);

?>