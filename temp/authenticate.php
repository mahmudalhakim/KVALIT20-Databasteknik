<?php
$authenticate = false;
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $name = $_SERVER['PHP_AUTH_USER'];
    $pass = $_SERVER['PHP_AUTH_PW'];
    if ($name == 'user' && $pass == 'pass') {
        $authenticate = true;
    }
}

if ($authenticate == false) {
    header('WWW-Authenticate: Basic realm="Restricted"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Authentication Failed Refresh To Do It Again";
    die();
}
?>
<html>

<body>
    <h1>Simple HTTP Authentication Using PHP To Make Your Site More Secure</h1>
    <p>All Your Content Comes Here</p>
</body>

</html>