<?php

class Ru2EnTranslit {
	private static $ru_str = 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯІЇЄабвгдеёжзийклмнопрстуфхцчшщъыьэюяіїє(),.; "+/*?!@';
	private static $en_str = array(
		'a','b','v','g','d','e','jo','zh','z','i','j','k','l','m','n','o','p','r','s','t','u','f',
		'h','c','ch','sh','shh','','i','','je','ju','ja','i','ji','e',
		'a','b','v','g','d','e','jo','zh','z','i','j','k','l','m','n','o','p','r','s','t','u','f',
		'h','c','ch','sh','shh','','i','','je','ju','ja','i','ji','e',
		'', '','', '', '',' ','','','','','','',''
	);

	public static function translit($org_str) {
		$tmp_str = "";

		for($i = 0, $l = mb_strlen($org_str, "UTF-8"); $i < $l; $i++) {
			$s = mb_substr($org_str, $i, 1, "UTF-8");
			$n = mb_strpos(self::$ru_str, $s, 0, "UTF-8");

			if($n !== false && $n >= 0) {
				$tmp_str .= self::$en_str[$n];
			} else {
				$tmp_str .= $s;
			}
		}

		return strtolower($tmp_str);
	}

	/*
		1. TRIM INPUT STRING
		2. LOWERCASE STRING
		3. REPLACE WHITESPACE ( ) TO DASH (-)
		LET ALONE (DON'T REPLACE) SYMBOLS: a-z 0-9 _ -
	*/

	public static function prepare_en_url($str) {
		return preg_replace("/[^-_a-z0-9.]+/i", "", str_replace(" ", "-", strtolower(trim($str))));
	}

	public static function translit_and_url($str) {
		return self::prepare_en_url(self::translit($str));
	}
}