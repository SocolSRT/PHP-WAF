<?php
//if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.0') {
//    http_response_code(403);
//    exit;
//}
$ubm = array("PURGE", "DELETE", "PATCH", "CONNECT", "TRACE"); // "PUT", "OPTIONS"
if (in_array($_SERVER['REQUEST_METHOD'], $ubm)) {
    http_response_code(403);
    exit;
}
if (stripos($_SERVER['HTTP_ACCEPT'], 'application/javascript') !== false) {
    http_response_code(403);
    exit;
}
if ($_SERVER['HTTP_ACCEPT_ENCODING'] == '') {
    http_response_code(403);
    exit;
}
$bXFOR = array("192.0.", ".0.0");
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    foreach ($bXFOR as $bipxfor) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], $bipxfor) === 0 || substr($_SERVER['HTTP_X_FORWARDED_FOR'], -strlen($bipxfor)) === $bipxfor) {
            http_response_code(403);
            exit;
        }
    }
}
if (stripos($_SERVER['HTTP_USER_AGENT'], 'bot') == false) {
    if ($_SERVER['HTTP_USER_AGENT'] == 'Mozilla/5.0 (X11; Linux x86_64; rv:104.0) Gecko/20100101 Firefox/104.0') {
        http_response_code(403);
        exit;
    }
    if ($_SERVER['HTTP_USER_AGENT'] == 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)') {
        http_response_code(403);
        exit;
    }
    if ($_SERVER['HTTP_ACCEPT_LANGUAGE'] == '') {
        http_response_code(403);
        exit;
    }
    $full_fledged_browsers = array('Chrome', 'Firefox', 'Safari', 'Opera', 'Edge');
    $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
    foreach ($full_fledged_browsers as $browser) {
        if (strpos($user_agent, $browser) !== false) {
            require_once('mlog.php');
            http_response_code(403);
            exit;
        }
    }
	if (isset($_COOKIE)) {} else {
        require_once('mlog.php');
        http_response_code(403);
        exit;
    }
}
if (preg_match('/bot/i', $_SERVER['HTTP_USER_AGENT'])) {
    $botKeywords = array(
        'googlebot', 'yandex', 'mail.ru', 'bingbot', 'duckduckgo', 'yahoo'
    );
    
    $isBot = false;
    
    foreach ($botKeywords as $keyword) {
        if (stripos($_SERVER['HTTP_USER_AGENT'], $keyword) !== false) {
            $isBot = true;
            break;
        }
    }
    
    if (!$isBot) {
        require_once('mlog.php');
        http_response_code(403);
        exit;
    }
}
?>
