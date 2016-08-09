<?php
/**
 * Just a little class to help with cURL and an custom implementation by Lumen Framework
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @author     Vinícius Lourenço <vinicius.q.lourenco@gmail.com 
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    1.0
 */

class objectCurl{

	private $_login;
	private $_password;
	private $_retorno;
	const _url = 'http://123.456.789/api/';

	public function __construct($url, $fields){
		$this->setDataAuth();
		$url = self::_url . $url;
		$this->setData($url, $fields);		
	}

	public function setDataAuth(){		
		$this->_login = '';
    	$this->_password = '';
	}

	public function setData($url, $fields){
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$this->_login:$this->_password");
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $callcURL = curl_exec($ch);  
        curl_close($ch); 
        $this->_retorno = $callcURL;                          
        
	}

	public function getData(){
		return $this->_retorno;
	}

}

?>