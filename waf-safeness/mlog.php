<?php
$request = $_SERVER['REQUEST_URI'];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
}
$http_request_version = $_SERVER['SERVER_PROTOCOL'];
$request_method = $_SERVER['REQUEST_METHOD'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$referrer = $_SERVER['HTTP_REFERER'];
$accept = $_SERVER['HTTP_ACCEPT'];
$accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$accept_encoding = $_SERVER['HTTP_ACCEPT_ENCODING'];

$request_info = "IP: $ip_address\nHTTP: $http_request_version\nMET: $request_method\nURL: $request\nUA: $user_agent\nREF: $referrer\nACC: $accept\nACCLAN: $accept_language\nACCENC: $accept_encoding\n\n";

$file = fopen($_SERVER['DOCUMENT_ROOT']."/waf-safeness/log/brlog.txt", "a+");
fwrite($file, $request_info);
fclose($file);

$log_data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/waf-safeness/log/brlog.txt");
$log_lines = explode("\n\n", $log_data);
$line_counts = array();
foreach ($log_lines as $line) {
  if (!empty($line)) {
    if (isset($line_counts[$line])) {
      $line_counts[$line]++;
    } else {
      $line_counts[$line] = 1;
    }
  }
}
$max_count = 0;
$max_line = "";
foreach ($line_counts as $line => $count) {
  if ($count > $max_count) {
    $max_count = $count;
    $max_line = $line;
  }
}
if ($max_count > 10) {
  $rrr_file = fopen($_SERVER['DOCUMENT_ROOT']."/waf-safeness/log/killlog.txt", "a+");
  fwrite($rrr_file, $max_line . "\n");
  fclose($rrr_file);
  
  $log_lines = array_diff($log_lines, array($max_line));
  $log_file = fopen($_SERVER['DOCUMENT_ROOT']."/waf-safeness/log/brlog.txt", "w");
  foreach ($log_lines as $line) {
    fwrite($log_file, $line . "\n");
  }
  fclose($log_file);
}
?>