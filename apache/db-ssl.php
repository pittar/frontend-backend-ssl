<?php
try{$dbuser = 'shah';
$dbpass = 'shah123';
#$host = 'localhost';
$host = 'backend';
$port = '5432';
$dbname = 'testing';
$sslcert = '/tmp/certs/postgresql.crt';
$sslkey = '/tmp/postgresql-user.key';
$sslrootcert = '/tmp/certs/root.crt';

$conn = new PDO("pgsql:host=$host;dbname=$dbname;port=$port;sslmode=require;sslcert=$sslcert;sslkey=$sslkey;sslrootcert=$sslrootcert", $dbuser, $dbpass);

}
catch (PDOException $e)
{
echo "Error : " . $e->getMessage() . "<br/>";
die();
} 

$sql = 'SELECT * FROM dummy';

foreach ($conn->query($sql) as $row) {
        print $row['name'] . "\t";
        print $row['id'] . "\n";
    }

print "<br><br>";

$sql = 'SELECT username, pgp_pub_decrypt(cc, keys.privkey) As ccdecrypt
FROM testuserscards 
    CROSS JOIN
    (SELECT dearmor(\'-----BEGIN PGP PRIVATE KEY BLOCK-----
Version: GnuPG v2.0.22 (GNU/Linux)

lQHYBFsIEhMBBAC+CEjlvcRPNOdh1fD3On114Z1XW+stu5/8odthsdnC9O4axFOS
cX/1tNX4RSs8DTJf/TkQxlyKIW5SEKxJ7Kso3YX+WByoqCkeCd1JDl4VTdkMSi5z
pu20RijoPmwh4CQAOC3YxhiPgGg5lX4sZvGYUWGJCwOyYXrCE+F0l4jIUwARAQAB
AAP/Wf7Ybx0A5DX8wmOse5kSo4oWlrGsXfs2WFFa8RhmNaMDRF/n6DmiTP24O5ye
ThE94yGsLdqTJsOQWIMW5OeVYrMaQ5O5aOlwmaZncHxZ4o3D4uTMJk+ZRzg+mPVq
TYOiM4DTZwleF5lXwMR0p5UiMYWNMGXaYdMSUUJK/j+OR1ECANg0G3ttXEcp0AwH
DhA/CidD5ZLIcvbHeWRC+QIAH70rFvDtJjhMGOqxdje6Ht/8c6nfW8o6dB9HA7VE
HbpXx9sCAOEC8fK5X1fBSzY8yA4xqRtk98t9ogiZL9vFcW8fHnhC4VGONyM/QyD7
cfZ+oJQEMNbMRVy9uzlAax2CY05aRukB/im/lGNBUcK/jWkbA5ssWYPX+5EgIcLW
++MParf3EHMq6AH5my/MjPS5j+/Osqt0loNY6WBH2COliIuoNNUPiYKb07QmcmVk
aGF0ICh0ZXN0IGtleSkgPHN6b2JhaXJAcmVkaGF0LmNvbT6IvwQTAQIAKQUCWwgS
EwIbAwUJCWYBgAcLCQgHAwIBBhUIAgkKCwQWAgMBAh4BAheAAAoJEKASyy70cf0h
GnsD/A0J0bUjEQPI5sBrNNk/BqERUUevTOAPQSW/yI7hjjmZsYxBpa6cmfwAyBs6
jBuTGH9dkGtXa5x9Pr2o1xnEvIkxvak/TEGp7zIbzCceOEhL9fUEdJ/KU+5Aj+DU
SwiqvMUX5neft+2DcD72a0tLRJqJh2CQ1bJG4Ver+32b85oXnQHYBFsIEhMBBADd
09vmtGZ95ux9gxSPCZoLoyYv91wIhn1EUzukr9AaqPH9wQ0syZ6Z0Wkzieddg2QV
mENciE2aTtTVlI4ZASKqCi8zeL4lxstYYjoft8mo23lpv9Lgwum+oZGC5HG+l59p
bKIOQNsDbxoezo+qx59HSIW0I6Hlemx1T/TEt7A/EQARAQABAAP9GWF0ryxj77Lc
yy2UzBrqo7s6ktFoF9effJJTaC/vjSVYbtLIWaAGBA54TXvRW5s9d9UQnAVCb83m
Pzu8mHLPTtPMAEBw4PtYF6O5X8V9COhIL7HggJAyDavESnq8eg80Srqqbb9oYCSg
B7j1P/OpUstQMQvo4TOZt+YvA0rw1aMCAOzWWKjzRSih0tPphEztS86IiGCuX4Uk
GFXamG2fysT+MinATWvpWy+WsKA10rSFkZ+iczh+7kdRCiKET9nGoXMCAO/GnRr2
9HrTGLBv/8bxhFFn5MzynG1cBkUXtj7vJjUcs/5oiqPP5A/Hj/IyakzJtCLEwQ9l
XUvlRbqlX+OpLGsCAKsMjNswhdHkUSI8kGWNdUS2vO3iiqtnm/p+kfRw+J0nLK4P
6oYEowlHVo4+2KU8hhcp8Pu70qe/OhheIwaG8A2l94ilBBgBAgAPBQJbCBITAhsM
BQkJZgGAAAoJEKASyy70cf0hVWMD/1gZFsbGNfk8FiOfzOVaWBWykSMtNhtxLdeH
X2SASdwCkf/CwrdY7L6kconL5ps3lXypjB9iw2Gc731HtrrFEgNMYEtoVS+lNcbr
0L6ApfXA51i/qJ6l1qfBP7p4rXIjOIXD+HjA7vcX0IpSj4kmect0xAEZh1KzVNVs
+sbsdq0G
=mP6/
-----END PGP PRIVATE KEY BLOCK-----\') As privkey) As keys;';

foreach ($conn->query($sql) as $row) {
        print $row['username'] . "\t";
        print $row['cc'] . "\n";



?>
