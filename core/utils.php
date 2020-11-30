<?php 

function getMoedaReal($value) {
	return number_format($value,2,',','.');
}

function getMoedaUS($value) {
	return number_format($value,2,'.',',');
}

function getLimiteString($value) {
	if(isset($value)) {
		return substr($value, 0, 37).'...';	
	}
	return;
}

function anti_injection($string){
	$string = preg_replace('/[^[:alpha:]_]/', '', $string);
	return $string;
}

function getOS() { 
   global $user_agent;
   $os_platform  =  "SO desconhecido";
   $os_array  =  array(
                        '/windows nt 10/i'     =>  'Windows 10',
                        '/Windows NT 6.3/'     =>  'Windows 8.1',
                        '/windows nt 6.3/i'     =>  'Windows 8.1',
                        '/windows nt 6.2/i'     =>  'Windows 8',
                        '/windows nt 6.1/i'     =>  'Windows 7',
                        '/windows nt 6.0/i'     =>  'Windows Vista',
                        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                        '/windows nt 5.1/i'     =>  'Windows XP',
                        '/windows xp/i'         =>  'Windows XP',
                        '/windows nt 5.0/i'     =>  'Windows 2000',
                        '/windows me/i'         =>  'Windows ME',
                        '/win98/i'              =>  'Windows 98',
                        '/win95/i'              =>  'Windows 95',
                        '/win16/i'              =>  'Windows 3.11',
                        '/macintosh|mac os x/i' =>  'Mac OS X',
                        '/mac_powerpc/i'        =>  'Mac OS 9',
                        '/linux/i'              =>  'Linux',
                        '/ubuntu/i'             =>  'Ubuntu',
                        '/iphone/i'             =>  'iPhone',
                        '/ipod/i'               =>  'iPod',
                        '/ipad/i'               =>  'iPad',
                        '/android/i'            =>  'Android',
                        '/blackberry/i'         =>  'BlackBerry',
                        '/webos/i'              =>  'Mobile'
                    );
   foreach ($os_array as $regex => $value) { 
       if (preg_match($regex, $user_agent)) {
          $os_platform    =   $value;
       }
   }   
	return $os_platform;
}

function getIP() {
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		$_SERVER['REMOTE_ADDR'] = trim($ips[0]);
	} elseif ( isset($_SERVER['HTTP_X_REAL_IP']) && !empty($_SERVER['HTTP_X_REAL_IP'])){
		$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_REAL_IP'];
	} elseif ( isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])){
		$_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CLIENT_IP'];
	}
	echo $_SERVER['REMOTE_ADDR']; 
}

function refresh() {
	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0");	
}