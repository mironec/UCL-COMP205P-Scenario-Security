<?php

function echos($str){
	echo htmlspecialchars($str);
}

function direscape($str){
	$str = str_replace('/', '_', $str);
	$str = str_replace('\\', '_', $str);
	$str = str_replace('<', '_', $str);
	$str = str_replace('>', '_', $str);
	$str = str_replace('*', '_', $str);
	$str = str_replace('?', '_', $str);
	$str = str_replace(':', '_', $str);
	$str = str_replace('"', '_', $str);
	$str = str_replace('|', '_', $str);
	return $str;
}