# PHP-WAF:
This repository contains a simple PHP-based Web Application Firewall (WAF) designed to enhance the security of your web application. The WAF is engineered to detect and block suspicious requests and protect against vulnerabilities such as SQL injection and XSS attacks.

# Functions:
- **bouncer.php:** A module for checking browser integrity and detecting suspicious requests. It utilizes the brlog.txt file (containing records of suspicious requests) and killlog.txt (holding information about blocked requests) from the log directory.

- **mlog.php:** A module for logging, aiding in activity monitoring and security analysis.

- **bouncer.php:** A module for blocking requests based on logs and identifying similar suspicious requests.

- **waf.php:** The WAF module for implementing rate limiting and protecting against vulnerabilities like SQL injection and XSS attacks. It uses the waf.txt file to check for matches and trigger rules.

- **start-waf.php:** A script for launching all WAF modules.

# Installation:
To install WAF, upload the "**waf-safeness**" folder to your site's root folder and add the following line to your PHP file:

    require($_SERVER['DOCUMENT_ROOT'].'/waf-safeness/start-waf.php');

This repository provides a straightforward and effective way to safeguard your web application from various forms of attacks and maintain its security. We hope it assists you in ensuring the security of your web project.

# Would you like to support me financially?
* My Bitcoin wallet - *bc1qhn4n70f5f0m00pz8clanwjj30fl9j0j74jxh3u*
* My USDT (TRC20) wallet - *TUhvUrudtVXiAZ8jiD7TNF4kAMiFPpXahy*
