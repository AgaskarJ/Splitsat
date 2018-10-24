<?php 

$xsearch = $_POST['search'];
//$xscelect = $_POST['selcategories'];
$rssearch="SELECT id, Meaning, Word, Category, Type FROM Keywords WHERE Word COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') OR Category COLLATE utf8_unicode_ci LIKE CONCAT('%%',?,'%%') ORDER BY Word ASC";
$allexe=$conn->prepare($rssearch);
$allexe->bind_param('ss',$xsearch, $xsearch);
$allexe->execute();
$allexe->store_result();
$allexe->bind_result($id, $meaning, $word, $cate, $type);


function searchclose() {
	$allexe ->close();
}


?> 