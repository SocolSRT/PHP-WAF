<?php
error_reporting(0);

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['last_session_request']) && $_SESSION['last_session_request'] > (time() - 2)) {
    if (empty($_SESSION['last_request_count'])) {
        $_SESSION['last_request_count'] = 1;
    } elseif ($_SESSION['last_request_count'] < 40) {
        $_SESSION['last_request_count'] = $_SESSION['last_request_count'] + 1;
    } elseif ($_SESSION['last_request_count'] >= 40) {
        $blacklisted = $_SERVER['REMOTE_ADDR'];
        require_once('mlog.php');
        http_response_code(403);
        exit;
    }
} else {
    $_SESSION['last_request_count'] = 1;
}

$_SESSION['last_session_request'] = time();

$wafRules = file($_SERVER['DOCUMENT_ROOT'].'/waf-safeness/waf.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
function containsForbiddenPhrase($input, $wafRules) {
    foreach ($wafRules as $rule) {
        if (preg_match("/$rule/i", $input)) {
            return true;
        }
    }
    return false;
}
$request = $_SERVER['REQUEST_URI'];
if (containsForbiddenPhrase($request, $wafRules)) {
	require_once('mlog.php');
    http_response_code(403);
    exit;
}


 ?>