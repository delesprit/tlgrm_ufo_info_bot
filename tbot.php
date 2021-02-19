<?php
define("_NAME_BOT", "ufo_info_bot");

define('BOT_TOKEN', '5346346755:AfdhjjtyiQbfg');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
define('URL_CRON', 'https://site/cron.php');

require_once "core/core_up.php";

function api_vivod_knopki($chat_id, $msg, $knopki_vibor) {
	
$tmp=array();
if ($chat_id>0) {	
	if($knopki_vibor == 1)
	{
				$tmp=array(
					0 => array('Назад')
					);	
	}
	else
	{
		$tmp=array(
					0 => array('Price'),  
					1 => array('UFO-info', 'Exchanges', 'Links'),
					2 => array('Bot-Help')
					);		
	}
}
$api_array=
		array(
			'chat_id' => $chat_id, 
			'text' => $msg, 
			'parse_mode' => 'Markdown',
			'disable_web_page_preview' => 'True',
			'reply_markup' => array(			
			'keyboard' => $tmp,				
				'one_time_keyboard' => true,
				'resize_keyboard' => true				
			)  
		)
;			
		
return $api_array;
}

function processMessage($message) {
	
mb_internal_encoding("UTF-8");
$text=mb_convert_encoding($text, "UTF-8", "cp1251");

  // process incoming message
  $message_id = $message['message_id'];
  $chat_id = $message['chat']['id'];
  @$chat_first_name = $message['from']['first_name'];
  @$chat_user_id = $message['from']['id'];
		
  //BAN
  if (!$chat_id == 01010101) die();
		
  if (isset($message['text'])) {
    // incoming text message
    $text = mb_strtolower($message['text']);
	$id_mess = $message['message_id'];
	
$callback_query = $updates['callback_query'];

  if ($callback_query['data']){  
  	$msg=" ";
	$knopki_url=array();	
	if ($chat_user_id == 173413881) $msg=" ";
	apiRequest("sendMessage", api_vivod2($chat_id, $msg, $knopki_url));	 
  }  
  
function callback($up){
    return $up[callback_query];
}

if(callback($update)){
  	$msg="ddddd";
	$knopki_url=array();	
	if ($chat_user_id == 173413881) $msg=" ";
	apiRequest("sendMessage", api_vivod2($chat_id, $msg, $knopki_url));	 
    }  
  
if ( isset($update['callback_query']) ){
        // extract what is required
	$chat_id = $callback_query['message']['chat']['id'];// to be used for sendMessage
	$user_id = $callback_query['from']['id'];
	$callbackdata = $callback_query['data'];
	$message_id = $callback_query['message']['message_id'];
	$text = $callback_query['message']['text'];

	// then send the message you want
	$res = $telegram->sendMessage([
	  'chat_id' => $chat_id, 
	  'text' => 'Your message'
	]);
}  


 if ($text === '/start'){
if ($chat_id>0) {	  
	$msg="UFO pricechek bot
	
	invite to any group and the bot will work there";	
	$knopki_url=array();	
	apiRequest("sendMessage", api_vivod_knopki($chat_id, $msg, $knopki1));	 
}
  }	

 if (mb_strtolower($text) === 'update' || mb_strtolower($text) === '/update'){
if ($chat_id>0) {
file_get_contents(URL_CRON);
	$msg="Апдейт закончен";	
	$knopki_url=array();	
	apiRequest("sendMessage", api_vivod_knopki($chat_id, $msg, $knopki1));	 
}
  }	  

#1
  elseif (mb_strtolower($text) === '/price' || mb_strtolower($text) === '/price@'._NAME_BOT 
  || mb_strtolower($text) === 'price'){

$text_kurs=file_get_contents('kurs_text.txt');	
	$msg=$text_kurs;
if ($chat_user_id == 173413881) $msg=" ";
	apiRequest("sendMessage", api_vivod_knopki($chat_id, $msg, $knopki1));	 
  }	


#1_1
  elseif (mb_strtolower($text) === '/p' || mb_strtolower($text) === '/p@'._NAME_BOT){

@$id_date=date("Y-m-d H:i:s");
@$fp = fopen("id.txt", "a+"); 
@$mytext = $id_date." - ".$chat_id." - ".$chat_first_name."\r\n" ; 
@$test = fwrite($fp, $mytext); 
@fclose($fp);

$text_kurs=file_get_contents('kurs_text.txt');	

$t1 = explode("1 UFO = $", $text_kurs);
$t2 = explode("`", $t1[1]);

$msg="`1 UFO = $".$t2[0]."`";
if ($chat_user_id == 173413881) $msg=" ";
	apiRequest("sendMessage", api_vivod_knopki($chat_id, $msg, $knopki1));	 
  }	

////////////////////////////////

#2
  elseif (mb_strtolower($text) === '/ufoinfo' || mb_strtolower($text) === '/ufoinfo@'._NAME_BOT || mb_strtolower($text) === 'ufo-info'){  
	require_once "info.php";
if ($chat_user_id == 173413881) $msg=" ";	
	apiRequest("sendMessage", api_vivod_knopki($chat_id, $msg, $knopki1));	 
  }	

////////////////////////////////
		
#3  
  elseif (mb_strtolower($text) === '/exchanges' || mb_strtolower($text) === 'exchanges' || mb_strtolower($text) === '/exchanges@'._NAME_BOT){  	
	$msg="*Exchanges:*
[OCCE](https://www.occe.io/exchange/ufo_btc)
[Graviex Exchange](https://graviex.net/markets/ufobtc) 
[Dex Delion](https://dex.delion.online/market/DELION.UFO_DELION.BTC) 
";	

if ($chat_user_id == 173413881) $msg=" ";
	apiRequest("sendMessage", api_vivod_knopki($chat_id, $msg, $knopki1));	
  }	

////////////////////////////////

#4
  elseif (mb_strtolower($text) === '/links' || mb_strtolower($text) === '/links@'._NAME_BOT || mb_strtolower($text) === 'links'){  
	$msg="*Useful links:*

- [Official site](https://ufocoin.net/)
- [Telegram chat](https://t.me/UFOCoin)
- [Official Twitter](https://twitter.com/fiscalobject)
- [BitcoinTalk(en)](https://bitcointalk.org/index.php?topic=844754.0)
- [Explorer](https://chainz.cryptoid.info/ufo/)
- [Telegram bot](https://t.me/ufo_info_bot)

";	

if ($chat_user_id == 173413881) $msg=" ";
	apiRequest("sendMessage", api_vivod_knopki($chat_id, $msg, $knopki1));	 
  }	

 ////////////////////////////////

  elseif ($text === '/help' || $text === '/help@'._NAME_BOT || $text === 'bot-help' || $text === '/bothelp@'._NAME_BOT || $text === '/bothelp' ){
	$msg="UFO pricechek bot
[Аuthor and support](https://t.me/del_esprit)

Commands bot:

/start - start Bot
/price - UFO exchange rate
/p - UFO short Price
/ufoinfo - UFO info
/links - Useful links
/exchanges - Exchanges
/help - Bot Help
";
	

	$knopki_url=array();	
	if ($chat_user_id == 173413881) $msg=" ";
	apiRequest("sendMessage", api_vivod_knopki($chat_id, $msg, $knopki1)); 
  }		

  
}
}
require_once "core/core_end.php";


?>