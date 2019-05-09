<?php

print "Opening connection...
";

try {
    $db = new PDO('mysql:host=localhost;dbname=hiredclientcrud', 'hired', 'hired', [
        PDO::ATTR_TIMEOUT => 2, // in seconds
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (Exception $e) {
    print $e;
}

print "Connection open.";
