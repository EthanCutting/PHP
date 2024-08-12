<?php
$target = 'localhost'; // or any other target IP/hostname
$output = shell_exec("nmap $target");
echo "<pre>$output</pre>";
?>
