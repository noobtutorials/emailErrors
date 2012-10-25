<?php
function error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
	switch($errno) {
		case E_ERROR:               $errno_type = "Error";                  break;
		case E_WARNING:             $errno_type = "Warning";                break;
		case E_PARSE:               $errno_type = "Parse Error";            break;
		case E_NOTICE:              $errno_type = "Notice";                 break;
		case E_CORE_ERROR:          $errno_type = "Core Error";             break;
		case E_CORE_WARNING:        $errno_type = "Core Warning";           break;
		case E_COMPILE_ERROR:       $errno_type = "Compile Error";          break;
		case E_COMPILE_WARNING:     $errno_type = "Compile Warning";        break;
		case E_USER_ERROR:          $errno_type = "User Error";             break;
		case E_USER_WARNING:        $errno_type = "User Warning";           break;
		case E_USER_NOTICE:         $errno_type = "User Notice";            break;
		case E_STRICT:              $errno_type = "Strict Notice";          break;
		case E_RECOVERABLE_ERROR:   $errno_type = "Recoverable Error";      break;
		default:                    $errno_type = "Unknown error ($errno)"; break;
	}
	
	$bericht = '<p>Er heeft zojuist een error plaatsgevonden.</p>';
	$bericht .= '<p>Dit was een <strong>' . $errorno_type . '</strong> en vond plaats op regel <strong>' . $errline . '</strong> in het bestand:<br /><strong>' . $errfile . '</strong></p>';
	$bericht .= '<p>De exacte foutmelding was:</p>';
	$bericht .= '<p><strong>' . $errstr . '</strong></p>';
	$bericht .= '<p>Deze variabelen waren beschikbaar:</p>';
	$bericht .= '<pre>' . print_r($errcontext, true) . '</pre>';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail('email-error@nietboeiend.nl', 'Er is een foutmelding veroorzaakt', $bericht, $headers);
}

set_error_handler('error_handler');

echo $dezeVariabeleBestaatNiet . 'test';
?>
