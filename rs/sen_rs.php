<?php 

function sentencefetch() {

global $id;

$sensearch="SELECT senid, sentence FROM Sentences WHERE senid = ?";
	$senexe=$conn->prepare($sensearch);
	$senexe->bind_param('s',$id);
	$senexe->execute();
	$senexe->store_result();
	$senexe->bind_result($senid, $sentence);
	$senexe->fetch();
	echo $sentence;
}

function sentenceclose() {
	$senexe ->close();
}


?> 