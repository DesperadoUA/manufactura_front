<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 09.05.2020
 * Time: 11:15
 */
class Redirects {
	public static function run(){
		$redirects = Settings::getRedirects();
		$url = $_SERVER['REQUEST_URI'];
		foreach ($redirects as $redirect){
			if($redirect['text_1'] === $url) {
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: ".$redirect['text_2']);
				exit();
			}
		}
	}
}