<?php
//function to clean html tags
function guardararchivo($filename,$body){
	$fp = fopen($filename, 'w');
	fwrite($fp, $body);
	fclose($fp);
	return $body;
}
function nohtml($r){
	$r=trim(preg_replace("/<[^>]+>/ism"," ",$r));
	$r=trim(preg_replace("/&nbsp;/ism"," ",$r));
	$r=trim(html_entity_decode($r));
	$r=trim(preg_replace("/\"/ism","",$r));
	$r=trim(preg_replace("/\|/ism","",$r));
	$r=trim(preg_replace("/[ \t\n\r]+/ism"," ",$r));
	return trim($r);
}
function notags($r){
	$r=trim(preg_replace("/<[^>]+>/ism"," ",$r));
	$r=trim(preg_replace("/&nbsp;/ism"," ",$r));
	$r=trim(preg_replace("/[ \t]+/ism"," ",$r));
	return trim(html_entity_decode($r));
}
//function to clean white spaces
function clean($r){
	$r=trim(preg_replace("/[ \t\n\r]+/ism"," ",$r));
	return $r;
}
function debug($dat){
	if(is_array($dat)||is_object($dat)){
		print_r($dat);
	}else{
		echo $dat."\n";
	}
	flush();
}
function leerarchivo($filename){
	$handle = fopen($filename, "r");
	$body = @fread($handle, filesize($filename));
	//header("Content-type: text/plain;");
	fclose($handle);
	return $body;
}

//class scrape
class scrape {
	var $ch;
	var $columns_separated="|";
	var $fields=array();
	var $url="";
	var $followref=false;
	var $urlant="";
	var $headers=array ('User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0','Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8','Accept-Language: en-US,en;q=0.5','Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7','Connection: keep-alive');
	//class construct
	function __construct($v=true) {
		if($v){
			$this->ch = curl_init();
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($this->ch, CURLOPT_MAXREDIRS, 10);
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 20);
			curl_setopt($this->ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($this->ch, CURLOPT_HEADER, false);
			curl_setopt($this->ch, CURLOPT_COOKIESESSION, TRUE);
			curl_setopt($this->ch, CURLOPT_HTTPHEADER,array (
			'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0',
			'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
			'Accept-Language: en-US,en;q=0.5',
			'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
			'Connection: keep-alive'
			));
		}
	}
	function printfields(){
		foreach($this->fields as $key => $field){
			echo clean($field);
			if((count($this->fields)-1)==$key){
				echo "\n";
			}else{
				echo $this->columns_separated;
			}
		}
		flush();
	}
	function getnext($cats){
		$r=array();
		foreach($cats as $c){
			if($c[0]==0){
				return $c;
			}
		}
		return $r;
	}
	function scraper($hours){
		$urls=array();
		$urls[]="https://strikkenett.no/produkt/garn/drops/drops-merino-extra-fine";
		//$urls[]="https://strikkenett.no/produkt/garn/drops/drops-baby-merino";
		//$urls[]="https://strikkenett.no/produkt/garn/drops/drops-karisma";
		$urls[]="https://www.strikkemekka.no/Drops-MerinoExtraFine";
		//$urls[]="https://www.strikkemekka.no/Drops-BabyMerino";
		$urls[]="https://www.strikkemekka.no/Drops-Karisma";
		foreach($urls as $url){
			$urlx=$url;
			$body = $this->getpage($url);
			//debug($body);
			//exit;
			if(preg_match("/strikkemekka/ismU",$url,$match)){
				if(preg_match_all("/<a href=\"([^\"]+&size=[^\"]+)\">.*<span class=\"color_name\">([^<]+)<\/span>[ \r\n\t\v]+<\/a>/ismU",$body,$match)){
					//debug($match);
					foreach($match[1] as $key => $url){
						$name=nohtml($match[2][$key]);
						$max="";
						$url='https://www.strikkemekka.no/'.$url;
						//debug($url);
						$body = $this->getpage($url);
						//debug($body);
						if(preg_match("/<select class=\"input_text select_field qty\" name=\"qtty\">(.*)<\/select>/ismU",$body,$match2)){
							$data=$match2[1];
							if(preg_match_all("/<option value=\"([0-9]+)\">/ismU",$data,$match2)){
								$max=$match2[1][count($match2[1])-1];
							}
							
						}
							//yarnsdb
							//yarnsuser
							//yarn.8547
							//Garnius
							//2AAtxbbXmWW3qnlKVQCG
							//2AAtxbbXmWW3qnlKVQCG
							//Qwerty123456!
						$this->fields=array();
						$this->fields[]=$urlx;
						$this->fields[]=$name;
						$this->fields[]=$max;
						$this->printfields();
						
						
						
						$where=" WHERE A.url='".$urlx."' AND A.name='".$name."' LIMIT 1";
						$count=yarns::selectarray($where);
						if(count($count)==0){
							$obj=new yarns();
							$obj->url=$urlx;
							$obj->name=$name;
							$obj->max1=$max;
							$obj->max2=-1;
							$obj->max3=-1;
							$obj->max4=-1;
							$obj->max5=-1;
							$obj->max6=-1;
							$obj->max7=-1;
							$obj->max8=-1;
							$obj->insert();
						}else{
							$obj=$count[0];
							if($obj->max8!=-1){
								$obj->max1=$obj->max2;
								$obj->max2=$obj->max3;
								$obj->max3=$obj->max4;
								$obj->max4=$obj->max5;
								$obj->max5=$obj->max6;
								$obj->max6=$obj->max7;
								$obj->max7=$obj->max8;
								$obj->max8=$max;
							}
							if($obj->max1==-1){
								$obj->max1=$max;
							}else if($obj->max2==-1){
								$obj->max2=$max;
							}else if($obj->max3==-1){
								$obj->max3=$max;
							}else if($obj->max4==-1){
								$obj->max4=$max;
							}else if($obj->max5==-1){
								$obj->max5=$max;
							}else if($obj->max6==-1){
								$obj->max6=$max;
							}else if($obj->max7==-1){
								$obj->max7=$max;
							}else if($obj->max8==-1){
								$obj->max8=$max;
							$obj->update();
						}
						
						//exit;
					}
				}
			}else{
				if(preg_match("/<select class=\"js-attribute\" name=\"(attributt[^\"]+)\">(.*)<\/select>/ismU",$body,$match)){
					//debug($match);
					$att=urlencode($match[1]);
					$data=$match[2];
					if(preg_match("/<input type=\"hidden\" name=\"path\" value=\"([^\"]+)\"/ismU",$body,$match)){
						$path=urlencode($match[1]);
					}
					if(preg_match_all("/<option[^>]+value=\"([0-9]+)\"[^>]+>([^<]+)<\/option>/ismU",$data,$match)){
						//debug($match);
						foreach($match[1] as $key => $val){
							$name=nohtml($match[2][$key]);
							$url="https://strikkenett.no/handlevogn/leggtil/ajax";
							//$post='id=164&path=produkt%2Fgarn%2Fdrops%2Fdrops-merino-extra-fine&attributt%5B%5D%5B342%5D=4671&antall=100000&ekstra_velg=0&ekstra_tekst=';
							$post='id=164&path='.$path.'&'.$att.'='.$val.'&antall=100000&ekstra_velg=0&ekstra_tekst=';
							//debug($post);
							$this->setpost($post);
							$this->setheaders(array (
								'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:46.0) Gecko/20100101 Firefox/46.0',
								'Accept: application/json, text/javascript, */*; q=0.01',
								'Accept-Language: en-US,en;q=0.5',
								'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
								'X-Requested-With: XMLHttpRequest',
								'Referer: '.$urlx,
								'Connection: keep-alive',
								'accept-encoding: identity'
							));
							$body = $this->getpage($url);
							//debug($body);
							$json=json_decode($body);
							//debug($json);
							$max=$json->items;
							$this->fields=array();
							$this->fields[]=$urlx;
							$this->fields[]=$name;
							$this->fields[]=$max;
							$this->printfields();
							
							
							$where=" WHERE A.url='".$urlx."' AND A.name='".$name."' LIMIT 1";
							$count=yarns::selectarray($where);
							if(count($count)==0){
								$obj=new yarns();
								$obj->url=$urlx;
								$obj->name=$name;
								$obj->max1=$max;
								$obj->max2=-1;
								$obj->max3=-1;
								$obj->max4=-1;
								$obj->max5=-1;
								$obj->max6=-1;
								$obj->max7=-1;
								$obj->max8=-1;
								$obj->insert();
							}else{
								$obj=$count[0];
								if($obj->max8!=-1){
									$obj->max1=$obj->max2;
									$obj->max2=$obj->max3;
									$obj->max3=$obj->max4;
									$obj->max4=$obj->max5;
									$obj->max5=$obj->max6;
									$obj->max6=$obj->max7;
									$obj->max7=$obj->max8;
									$obj->max8=$max;
								}
								if($obj->max1==-1){
									$obj->max1=$max;
								}else if($obj->max2==-1){
									$obj->max2=$max;
								}else if($obj->max3==-1){
									$obj->max3=$max;
								}else if($obj->max4==-1){
									$obj->max4=$max;
								}else if($obj->max5==-1){
									$obj->max5=$max;
								}else if($obj->max6==-1){
									$obj->max6=$max;
								}else if($obj->max7==-1){
									$obj->max7=$max;
								}else if($obj->max8==-1){
									$obj->max8=$max;
								}
								$obj->update();
							}
							//exit;
						}
						//exit;
					}
					
				}
				//exit;
			}
		}
		
		
	}
	function setpost($post=""){
		if($post!=""){
			curl_setopt($this->ch, CURLOPT_POST, 1);
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);
		}else{
			curl_setopt($this->ch, CURLOPT_POST, 0);
		}
	}
	function setheaders($headers=array()){
		curl_setopt($this->ch, CURLOPT_HTTPHEADER,$headers);
	}
	function curlerror(){
		return curl_errno($this->ch);
	}
	function getlasturl(){
		return curl_getinfo($this->ch,CURLINFO_EFFECTIVE_URL);
	}
	function curlerrortext(){
		return curl_error($this->ch);
	}
	function havecookies(){
		$ckfile = tempnam ("/tmp", "CURLCOOKIE");
		curl_setopt ($this->ch, CURLOPT_COOKIEFILE, $ckfile);
	}
	function havecookies_saves($id){
		$ckfile = 'cookie.txt';
		//debug($ckfile);
		curl_setopt($this->ch, CURLOPT_COOKIESESSION, false);
		curl_setopt($this->ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/'.$ckfile);
		curl_setopt ($this->ch, CURLOPT_COOKIEFILE,dirname(__FILE__) . '/'. $ckfile);
	}
	function inflate($body){
		//'Accept-Encoding: gzip,deflate,sdch',
		$body = substr($body, 10);
		$body = gzinflate($body);
		return $body;
	}
	function getpage($url2="",$post="",$ref="",$head=array()){
		$tries=0;
		$body="";
		$ref=trim($ref);
		$post=trim($post);
		$url2=trim($url2);
		if($url2!=""){
			$this->url=$url2;
		}
		if($post!=""){
			curl_setopt($this->ch, CURLOPT_POST, 1);
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);
		}
		if($this->url!=""){
			curl_setopt($this->ch, CURLOPT_URL, $this->url);
			if($this->use_proxy==1){
				echo "SETTING ".$this->proxy."\n";
				curl_setopt($this->ch, CURLOPT_PROXY, $this->proxy);
				if($this->socks=='1'){
					curl_setopt($this->ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
				}else{
					curl_setopt($this->ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
				}
				if($this->proxy_user_pass!=""){
					curl_setopt($this->ch, CURLOPT_PROXYUSERPWD, $this->proxy_user_pass);
				}
			}else{
				curl_setopt($this->ch, CURLOPT_PROXY, '');
			}
			$body = curl_exec($this->ch);
			$this->urlant=$this->url;
		}
		return $body;
	}
	function get_proxy(){
		//GET PROXY
		$proxy="";
		if($this->use_proxy==1){
			$this->proxy_user_pass="";
			$where=" WHERE usable=1 ORDER BY times,ok DESC,fail, RAND() LIMIT 1";
			$where=" WHERE usable=1 ORDER BY times, RAND() LIMIT 1";
			$proxys=proxy::selectarray($where);
			if(count($proxys)==0){
				echo "No proxies available!!!\n";
				flush();
				return;
				//exit;
			}
			$proxy=$proxys[0];
			$proxy->increase();
			$proxy->times=$proxy->times+1;
			$this->proxy_obj=$proxy;
			//echo "Proxy: ".$proxy->ip."\n";
			flush();
			$this->proxy=$proxy->ip;
			$this->socks=$proxy->socks;
			$tipo="HTTP";
			if($proxy->socks=='1'){
				$tipo="SOCKS5";
			}
			//echo "Proxy: ".$this->proxy.' Tipo:'.$tipo.' Timeout:'.$proxy->conntimeout.' USADO:'.$proxy->times.' OK:'.$proxy->ok.' FAIL:'.$proxy->fail."\n";
			//$proxy->times=$proxy->times+1;
			//$proxy->update();
			curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $proxy->conntimeout);
			if(($proxy->user!="")&&($proxy->pass!="")){
				$this->proxy_user_pass=$proxy->user.":".$proxy->pass;
			}
		}
		return $proxy;
	}
	function init() {
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($this->ch, CURLOPT_MAXREDIRS, 10);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($this->ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($this->ch, CURLOPT_HEADER, false);
		curl_setopt($this->ch, CURLOPT_COOKIESESSION, TRUE);
		curl_setopt($this->ch, CURLOPT_HTTPHEADER,array ('User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:42.0) Gecko/20100101 Firefox/42.0'.rand(1,9999).rand(1,9999),'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8','Accept-Language: en-US,en;q=0.5','Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7','Connection: keep-alive'));
	}
	function close(){
		curl_close($this->ch);
	}
}
?>
