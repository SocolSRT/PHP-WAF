<?php
$log_data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/waf-safeness/log/killlog.txt");
$log_lines = explode("\n", $log_data);
foreach ($log_lines as $line) {
  $request_parts = explode(": ", $line);
  $key = $request_parts[0];
  $value = $request_parts[1];
  if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
  }
	
  if ($key == "IP" && $value == $ipaddress) {
    http_response_code(403); exit;
  }
  else if (($key == "HTTP" && $value == $_SERVER['SERVER_PROTOCOL'])&&($key == "MET" && $value == $_SERVER['REQUEST_METHOD'])&&($key == "UA" && $value == $_SERVER['HTTP_USER_AGENT'])&&($key == "URL" && $value == $_SERVER['REQUEST_URI'])&&($key == "REF" && $value == $_SERVER['HTTP_REFERER'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
  else if (($key == "MET" && $value == $_SERVER['REQUEST_METHOD'])&&($key == "UA" && $value == $_SERVER['HTTP_USER_AGENT'])&&($key == "URL" && $value == $_SERVER['REQUEST_URI'])&&($key == "REF" && $value == $_SERVER['HTTP_REFERER'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
  else if (($key == "HTTP" && $value == $_SERVER['SERVER_PROTOCOL'])&&($key == "UA" && $value == $_SERVER['HTTP_USER_AGENT'])&&($key == "URL" && $value == $_SERVER['REQUEST_URI'])&&($key == "REF" && $value == $_SERVER['HTTP_REFERER'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
  else if (($key == "HTTP" && $value == $_SERVER['SERVER_PROTOCOL'])&&($key == "MET" && $value == $_SERVER['REQUEST_METHOD'])&&($key == "URL" && $value == $_SERVER['REQUEST_URI'])&&($key == "REF" && $value == $_SERVER['HTTP_REFERER'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
  else if (($key == "HTTP" && $value == $_SERVER['SERVER_PROTOCOL'])&&($key == "MET" && $value == $_SERVER['REQUEST_METHOD'])&&($key == "URL" && $value == $_SERVER['REQUEST_URI'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
  else if (($key == "HTTP" && $value == $_SERVER['SERVER_PROTOCOL'])&&($key == "MET" && $value == $_SERVER['REQUEST_METHOD'])&&($key == "URL" && $value == $_SERVER['REQUEST_URI'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
  else if (($key == "HTTP" && $value == $_SERVER['SERVER_PROTOCOL'])&&($key == "MET" && $value == $_SERVER['REQUEST_METHOD'])&&($key == "UA" && $value == $_SERVER['HTTP_USER_AGENT'])&&($key == "REF" && $value == $_SERVER['HTTP_REFERER'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
    else if (($key == "MET" && $value == $_SERVER['REQUEST_METHOD'])&&($key == "UA" && $value == $_SERVER['HTTP_USER_AGENT'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
    else if (($key == "HTTP" && $value == $_SERVER['SERVER_PROTOCOL'])&&($key == "UA" && $value == $_SERVER['HTTP_USER_AGENT'])&&($key == "ACC" && $value == $_SERVER['HTTP_ACCEPT'])&&($key == "ACCLAN" && $value == $_SERVER['HTTP_ACCEPT_LANGUAGE'])&&($key == "ACCENC" && $value == $_SERVER['HTTP_ACCEPT_ENCODING'])) {
    http_response_code(403); exit;
  }
}
?>