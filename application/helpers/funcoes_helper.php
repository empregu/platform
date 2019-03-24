<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('gerar_sessao')) {

	function gerar_sessao($model, $length = 30) {

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
        $randomString = '';
        
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
		if ($model->existe_sessao($randomString)) {
			return gerar_sessao($model);
		} else {
			return $randomString;
		}
	}
}
?>