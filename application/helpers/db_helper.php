<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

function MYDB($host='localhost')
{
    global $db_conn;
    
    if (!isset($db_conn[$host]) || !$db_conn[$host] || !mysqli_ping($db_conn[$host])) $db_conn[$host] = ConnectDB('gammu', $host);
    
    return $db_conn[$host];
}

function ConnectDB($db='gammu', $host='', $port=3306)
{
    $host = !$host ? 'localhost' : $host;
    //mysqli_connect(host,username,password,dbname,port,socket);
    if ($host == '103.195.30.169')
        $conn = mysqli_connect($host, 'gsm-modem', 'modem-gsm', 'datablast', $port);
    elseif ($host == '192.168.2.2')
        $conn = mysqli_connect($host, 'gsm-modem', 'modem-gsm', $db, $port);
    else
        $conn = mysqli_connect($host, 'gsm-modem', 'gsm-modem', $db, $port);
 
    // check connection
    if (mysqli_connect_errno()) {
      die('Database connection failed: '  . mysqli_connect_error() .':'. E_USER_ERROR);
    }
    
    return $conn;
}

