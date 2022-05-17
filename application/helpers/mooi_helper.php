<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

function servers()
{
    $modem_servers = [
        'Server 1' => '192.168.2.11',
        'Server 2' => '192.168.2.2',
        'Server 3' => '192.168.2.3',
        //'Server 4' => '192.168.2.4',
        'Server 6' => '192.168.2.6'
        ];
    return $modem_servers;
}

function server_name($server)
{
    $config = [
        '192.168.2.11'	=>	'',
        '192.168.2.2'	=>	'modem2',
        '192.168.2.3'	=>	'modem2',
        //'192.168.2.4'	=>	'modem2',
        '192.168.2.6'	=>	'modem2'
        ];
    
    $server_name = $config[$server];
    $server_name = 	strtoupper($server_name);
    return $server_name;
}

function get_server($modem_servers, $cur_server)
{
    $server = 'Select Server';
		foreach ($modem_servers as $k=>$ip)
		{
			$s = $ip == $cur_server ? ' selected="selected"' : '';
			$server .= '<option value="'.$ip.'"'.$s.'>'.$k.'</option>';
		}
	return $server;
}

function call_remote_url($url, $retry=3, $sleep=1,  $regex = true)
{
	//echo "$url<br />\n";
	$resp = '';
	while ($retry > 0)
	{
		if ($resp = file_get_contents($url))
		{
			if ($regex)
			{
				//echo "OK: $resp<br />\n";
				if (preg_match('~<rsp>(.*)</rsp>~s', $resp, $x))
				{
					return $x[1];
				}
				else
				{
					return false;
				}
			}
			else
			{
				//echo "OK: $resp<br />\n";
				return $resp;
			}
		}
		else
		{
			sleep($sleep);
			$retry--;
		}
	}
	
	//echo "FAILED: $resp<br />\n";
	return '';
}

function url_multi($urls)
{
	$connect = [];
	$mh = curl_multi_init();
	foreach ($urls as $k=>$url)
	{
		$connect[$k] = curl_init($url);
		curl_setopt($connect[$k], CURLOPT_TIMEOUT, 90); //timeout in seconds
		curl_setopt($connect[$k], CURLOPT_RETURNTRANSFER, true);
		curl_setopt($connect[$k], CURLOPT_USERAGENT,'modems-stats');
		curl_setopt($connect[$k], CURLOPT_RETURNTRANSFER, true);
		curl_setopt($connect[$k], CURLOPT_HEADER, false);
		curl_multi_add_handle($mh, $connect[$k]);
	}

	// execute all queries simultaneously, and continue when all are complete
	$running = null;
	do {
		curl_multi_exec($mh, $running);
	} while ($running);
	
	$response = [];
	foreach ($urls as $k=>$url)
	{
		$response[$url] = curl_multi_getcontent($connect[$k]);
	}
	
	return $response;
}

function do_post($url, $postfields, $timeout = 10)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}

function do_submit($url, $params, $timeout = 10)
{
	$requestData = '';
	foreach($params as $k => $v) 
	{ 
		$requestData .= $k . '='.urlencode($v).'&'; 
	}
	rtrim($requestData, '&');

	rtrim($url, '?');
	if ($requestData) $url = $url . '?' . $requestData;
	
	//echo "\nURL:$url<br />\n";
	
	//return file_get_contents($url);

	$ch = curl_init();  

	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	//	curl_setopt($ch,CURLOPT_HEADER, false); 

	$output=curl_exec($ch);
	if($output === false)
	{
		echo "Error Number:".curl_errno($ch)."<br>";
		echo "Error String:".curl_error($ch);
	}

	curl_close($ch);
	return $output;

}

function list_slot()
{
	return array(
		'modem00' => 'Modem 00',
        'modem01' => 'Modem 01',
        'modem02' => 'Modem 02',
        'modem03' => 'Modem 03',
        'modem04' => 'Modem 04',
        'modem05' => 'Modem 05',
        'modem06' => 'Modem 06',
        'modem07' => 'Modem 07',
        'modem08' => 'Modem 08',
        'modem09' => 'Modem 09',
        'modem10' => 'Modem 10',
        'modem11' => 'Modem 11',
        'modem12' => 'Modem 12',
        'modem13' => 'Modem 13',
        'modem14' => 'Modem 14',
        'modem15' => 'Modem 15'
	);
}

function get_slot()
{
    return array(
		'' => 'Select Modem',
        'modem00' => 'Modem 00',
        'modem01' => 'Modem 01',
        'modem02' => 'Modem 02',
        'modem03' => 'Modem 03',
        'modem04' => 'Modem 04',
        'modem05' => 'Modem 05',
        'modem06' => 'Modem 06',
        'modem07' => 'Modem 07',
        'modem08' => 'Modem 08',
        'modem09' => 'Modem 09',
        'modem10' => 'Modem 10',
        'modem11' => 'Modem 11',
        'modem12' => 'Modem 12',
        'modem13' => 'Modem 13',
        'modem14' => 'Modem 14',
        'modem15' => 'Modem 15',
        
        /*'modem16' => 'Modem 16',
        'modem17' => 'Modem 17',
        'modem18' => 'Modem 18',
        'modem19' => 'Modem 19',
        'modem20' => 'Modem 20',
        'modem21' => 'Modem 21',
        'modem22' => 'Modem 22',
        'modem23' => 'Modem 23',
        'modem24' => 'Modem 24',
        'modem25' => 'Modem 25',
        'modem26' => 'Modem 26',
        'modem27' => 'Modem 27',
        'modem28' => 'Modem 28',
        'modem29' => 'Modem 29',
        'modem30' => 'Modem 30',
        'modem31' => 'Modem 31',*/
    );
}

function inbox_category()
{
    return array(
        'all' => 'All', 
        'shortcode' => 'Shortcode', 
        'long' => 'long number (08xx)', 
        '123' => '123', 
        '8833?' => '8833?', 
        'toxic' => 'Toxic'
    );
}

function h($text)
{
    return htmlspecialchars(stripslashes($text));
}

function stop()
{
		
	$cur_server = '192.168.2.11';
    
	$cur_ip = isset($_GET['ip']) && $_GET['ip'] ? $_GET['ip'] : $cur_server;
	$modem = isset($_GET['modem']) && $_GET['modem'] ? $_GET['modem'] : '';
	$imsi = isset($_GET['imsi']) && $_GET['imsi'] ? $_GET['imsi'] : '';
		
	do
	{
		if (!$modem || !preg_match('/^modem([0-9]{2})$/', $modem, $m))
		{ 
			break;
		}
		
		if ($cur_ip == $cur_server)
		{
			$error = false;
			$fjob = "/data/cli/command/$modem.txt";
			$fjoblock = "/data/cli/command/$modem.lock";
			if (is_file($fjob))
			{
				$error = true;
			}
			elseif (is_file($fjoblock))
			{
				$error = true;
			}
				
			if (!$error)
			{
				if (@file_put_contents($fjob, "stop\t$imsi"))
				{
					$error = false;
				}
				else
				{
					$error = true;
				}
			}
		}
		else
		{
			$url = "http://$cur_ip/modem_rpc.php?event=modem_stop&imsi=$imsi&modem=$modem";
			$resp = call_remote_url($url);
			if ($resp)
			{
				$array = json_decode($resp, true);
				if (isset($array['msg'])) echo $array['msg'];
			}
			else
			{
				$error = true;
			}
		}
	}
	while(0);
}

function start()
{
	$cur_server = '192.168.2.11';
	$cur_ip = isset($_GET['ip']) && $_GET['ip'] ? $_GET['ip'] : $cur_server;
	$modem = isset($_GET['modem']) && $_GET['modem'] ? $_GET['modem'] : '';
	$imsi = isset($_GET['imsi']) && $_GET['imsi'] ? $_GET['imsi'] : '';
		
	do
	{
		if (!$modem || !preg_match('/^modem([0-9]{2})$/', $modem, $m))
		{
			break;
		}
			
		if ($cur_ip == $cur_server)
		{
			$error = false;
			$fjob = "/data/cli/command/$modem.txt";
			$fjoblock = "/data/cli/command/$modem.lock";
			if (is_file($fjob))
			{
				$error = true;
			}
			elseif (is_file($fjoblock))
			{
				$error = true;
			}
				
			if (!$error)
			{
				if (@file_put_contents($fjob, "start\t$imsi"))
				{
					$error = false;
				}
				else
				{
					$error = true;
				}
			}
		}
		else
		{
			$url = "http://$cur_ip/modem_rpc.php?event=modem_start&imsi=$imsi&modem=$modem";
			$resp = call_remote_url($url);
			if ($resp)
			{
				$array = json_decode($resp, true);
				if (isset($array['msg'])) echo $array['msg'];
			}
			else
			{
				$error = true;
			}
		}
	}
	while(0);
}
	
function restart_modems($command)
{
	$cur_server = '192.168.2.11';
	$cur_ip = isset($_GET['ip']) && $_GET['ip'] ? $_GET['ip'] : $cur_server;
	$modem = isset($_GET['modem']) && $_GET['modem'] ? $_GET['modem'] : '';
	$imsi = isset($_GET['imsi']) && $_GET['imsi'] ? $_GET['imsi'] : '';
	$db = $cur_ip == $cur_server ? MYDB() : MYDB($cur_ip);
	$list_modem = [];
	if (isset($_GET['chk']) && count($_GET['chk']))
	{
		foreach ($_GET['chk'] as $modem=>$imsi)
		{
			if (!preg_match('/(modem[0-9]{2})/', $modem)) continue;
			
			$list_modem[] = $modem;
		}
	}
	else if ($imsi)
	{
		$list_modem[] = $modem;
	}
	else if (isset($_GET['modem']) && $_GET['modem'])
	{
		if (preg_match('/(modem[0-9]{2})/', $_GET['modem'], $m))
		{
			$modem = trim($m[1]);
			if (!isset($modems[$modem])) $modems[$modem] = '';
		}
	}
	else{
			//
	}
		
	$strWhere = "ID IN ('".implode("','", $list_modem)."')";
		
	$modems = [];
	// validasi modem
	$sql = "SELECT ID, IMSI FROM `phones` WHERE $strWhere";
	$r = mysqli_query($db, $sql) or die('error#'.__LINE__);
	while ($row = mysqli_fetch_assoc($r))
	{
		if (isset($modems[$row['ID']])) continue;
			
		if (!$row['IMSI']) continue;
			
		$modems[$row['ID']] = $row['IMSI'];
	}
		
	do
	{	
		if ($command == 'stop'){
		    $extcommand = 'modem_stop';
		    $fcommand = 'STOP';
	    }
		elseif ($command == 'start'){
		    $extcommand = 'modem_start';
		    $fcommand = 'START';
		}
		foreach ($modems as $modem=>$imsi)
		{
			if ($cur_ip == $cur_server)
			{
				$error = false;
				$fjob = "/data/cli/command/$modem.txt";
				$fjoblock = "/data/cli/command/$modem.lock";
				if (is_file($fjob))
				{
					$error = true;
				}
				elseif (is_file($fjoblock))
				{
					$error = true;
				}
					
				if (!$error)
				{
					if (@file_put_contents($fjob, "$command\t$imsi"))
					{
						$error = false;
					}
					else
					{
						$error = true;
					}
				}
			}
			else
			{
				$url = "http://$cur_ip/modem_rpc.php?event=$extcommand&imsi=$imsi&modem=$modem";
				$resp = call_remote_url($url);
				if ($resp)
				{
					$array = json_decode($resp, true);
					if (isset($array['msg'])) echo $array['msg'];
				}
				else
				{
					$error = true;
				}
			}
				
		}
			
	}
	while(0);
}

function modem_pids($cur_ip)
{
	$cur_server = '192.168.2.11';
		
	if ($cur_ip == $cur_server)
	{
		$pids = [];
		$result = explode("\n", trim(`ps -ax | grep gammu-smsd | awk '{print $1,$7}'`));
		foreach ($result as $line)
		{
			if (preg_match("/(modem[0-9]{2})/", $line, $m))
			{
				$ar = explode(" ", $line);
				$pid = intval($ar[0]);
				$pids[$m[1]] = $pid;
			}
		}
			
		return $pids;
	}
	else
	{
		$url = "http://$cur_ip/modem_rpc.php?event=gammu_pids";
		$resp = call_remote_url($url);
		if ($resp)
		{
			return json_decode($resp, true);
		}
	}
		
	return [];
}

function modem_state($cur_ip, $modem)
{
	$cur_server = '192.168.2.11';
	$state = '';
	$action = '';
	if ($cur_ip == $cur_server)
	{
		$fjob = "/data/cli/command/$modem.txt";
		$fjoblock = "/data/cli/command/$modem.lock";
		if (is_file($fjob))
		{
			$content = file_get_contents($fjob);
			$ar = explode("\t", $content);
			$action = $ar[0];
			$state = "Waiting $action";
		}
		elseif (is_file($fjoblock))
		{
			$content = file_get_contents($fjoblock);
			$ar = explode("\t", $content);
			$action = $ar[0];
			$state = "processing $action";
		}
	}
	else
	{
		$url = "http://$cur_ip/modem_rpc.php?event=modem_state&modem=$modem";
		$resp = call_remote_url($url);
		if ($resp)
		{
			return json_decode($resp, true);
		}
		else
		{
				
		}
	}
		
	return [
		'action' => $action,
		'state' => $state,
	];
}

function imsi_msisdn($imsi, $reload=false)
{
	$result = '';
	$cachekey = 'msisdn_'.$imsi;
	if (!$reload) $result = cacheget($cachekey, $result);
	
	if (!$result)
	{
		$db = MYDB();
		$sql = "SELECT msisdn FROM imsi_msisdn WHERE imsi='$imsi' LIMIT 1";
		$r = mysqli_query($db, $sql) or die(mysqli_error($db));
		if ($r && $row = mysqli_fetch_assoc($r))
		{
			$result = trim($row['msisdn']);
			
			cacheset($cachekey, $result, 3600);
		}
	}
	
	return $result;
}
	
function cacheset($key, $value, $time=3600)
{
    global $memcache;

    return false;
    if (!isset($memcache) || !$memcache)
    {
        if (function_exists('memcache_connect'))
        {
            $memcache = memcache_connect(MEMCACHE_HOST, 11211);
        }
        elseif (class_exists('Memcached'))
        {
            $memcache = new Memcache();
            $memcache->addServer(MEMCACHE_HOST, 11211);
        }
        else
        {
            return false;
        }
    }

    if ($memcache)
    {
        return $memcache->set($key, $value, 0, $time);
    }

    return FALSE;
}

function imsi_info($imsi)
{
	$arrImsi = array(
     51000 => 'psn',
     51001 => 'indosat',
     51003 => 'indosat', // star one
     51007 => 'telkomsel', // flexi
	 51008 => 'axis',
     51009 => 'smartfren', // smart telecom
     51010 => 'telkomsel',
     51011 => 'xl',
     51020 => 'telkomsel', //telcom mobile
     51021 => 'indosat', // im3
     51027 => 'ceria',
     51028 => 'smartfren', // fren
     51089 => 'three',
     51099 => 'esia',
	);

	$imsi = trim($imsi);
	$prefix = substr($imsi,0,5);
	$prefix = intval($prefix);
	if (isset($arrImsi[$prefix])) return $arrImsi[$prefix];
	
	return false;
}

function cacheget($key, $default=FALSE)
{
    global $memcache;
        
    return false;
    if (!isset($memcache) || !$memcache)
    {
        if (function_exists('memcache_connect'))
        {
            $memcache = memcache_connect(MEMCACHE_HOST, 11211);
        }
        elseif (class_exists('Memcached'))
        {
            $memcache = new Memcached();
            /* connect to memcached server */
            $memcache->addServer(MEMCACHE_HOST, 11211);
        }
        else
        {
            return false;
        }
    }

    if ($memcache)
    {
        if (FALSE !== ($result = $memcache->get($key)))
        {
            return $result;
        }
    }

    return $default;
}

function ping($host,$port=80,$timeout=6)
{
    $fsock = @fsockopen($host, $port, $errno, $errstr, $timeout);
    if ( ! $fsock )
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}

function ping2($host)
{
    exec(sprintf('ping -c 1 -W 5 %s', escapeshellarg($host)), $res, $rval);
    return $rval === 0;
}

