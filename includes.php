<?php


function GetIndefArt($string) {
    return (FALSE === stripos('aeiou', $string[0]) ? 'a' : 'an');
}

function getInsult($firstPos = null, $secondPos = null, $thirdPos = null)
{
	require 'words.php';

	if ($firstPos > count($first)-1 || $secondPos > count($second)-1 || $thirdPos > count($third)-1) {
		header('Location: ./');
	}


	if ($firstPos == null || $secondPos == null || $thirdPos == null) {
		$firstPos = array_rand($first);
		$secondPos = array_rand($second);
		$thirdPos = array_rand($third);
	} 
	
	$firstWord = $first[$firstPos];
	$secondWord = $second[$secondPos];
	$thirdWord = $third[$thirdPos];

	return [[$firstWord, $secondWord, $thirdWord],[$firstPos, $secondPos, $thirdPos]];
}

function getCombos()
{
	require 'words.php';

	return count($first) * count($second) * count($third);
}

function defineWord($word)
{
	require 'define.php';

	if (isset($definitions[$word])) {
		return $definitions[$word];
	} else {
		return "No definition yet";
	}
}

?>