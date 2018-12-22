<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('gerarStringsAleatorias')) {
	function gerarStringsAleatorias($model1, $model2, $length = 30) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		if ($model1->existe_sessao($randomString) or $model2->existe_sessao($randomString)) {
			return gerarStringsAleatorias();
		} else {
			return $randomString;
		}
	}
}

if(!function_exists('gerarNick')) {
	function gerarNick($string){
    return str_replace(' ', '_', strtolower(preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string)));
	}
}

?>