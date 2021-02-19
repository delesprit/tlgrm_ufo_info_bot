<?php 



// graviex.net
//btc
//usdt
//rub

echo "Test page<br><br><br><br><br>";
	
	
function graviex_price($ticker)
{
	//$ticker = ufobtc
	$price = 0;  // это если биржа не отвечает
	$link_api = file_get_contents('https://graviex.net:443//webapi/v3/tickers/'.$ticker.'.json');
	$json_array = json_decode($link_api, true);
	$price = $json_array['last'];
	return $price;
}
	echo "graviex = ".graviex_price('ufobtc')."<hr>";


function graviex_volume($ticker)
{
	//$ticker = ufobtc
	$price = 0;  // это если биржа не отвечает
	$link_api = file_get_contents('https://graviex.net:443//webapi/v3/tickers/'.$ticker.'.json');
	$json_array = json_decode($link_api, true);
	$price = $json_array['volume'];
	return $price;
}
	echo "graviex volume = ".graviex_volume('ufobtc')."<hr>";
//delion.online
//btc
//doge
//bts
//dln	
function delion_price($ticker)
{
	//$ticker = UFO_BTC
	$price = 0;  // это если биржа не отвечает
	$link_api = file_get_contents('https://api.delion.online/public/v1/tickers/'.$ticker);
	$json_array = json_decode($link_api, true);
	$price = $json_array[$ticker]['latest'];
	return $price;
}
	echo "delion = ".delion_price('UFO_BTC')."<hr>";
	
//occe.io
//btc
//uah
//rub

function occe_price($ticker)
{
	//$ticker = ufo_btc
	$price = 0;  // это если биржа не отвечает
	$link_api = file_get_contents('https://api.occe.io/public/info/'.$ticker);
	$json_array = json_decode($link_api, true);
	$price = $json_array['data']['coinInfo'][0]['lastPrice'];	
	return $price;
}
	echo "occe = ".occe_price('ufo_btc')."<hr>";	
	
function occe_volume($ticker)
{
	//$ticker = ufo_btc
	$price = 0;  // это если биржа не отвечает
	$link_api = file_get_contents('https://api.occe.io/public/info/'.$ticker);
	$json_array = json_decode($link_api, true);
	$price = $json_array['data']['coinInfo'][0]['volume24h'];	
	return $price;
}
	echo "occe volume24h = ".occe_price('ufo_btc')."<hr>";	
	
	
//курс битка и eth 
$json=file_get_contents("http://delesprit.pp.ua/projects/coinmarketcap/all_crypta.json");
			$json_array=json_decode($json, true);
			
			
//курс битка			
			$res = array_filter($json_array['data'], 
					  function($x) { return mb_strtolower($x['name']) == mb_strtolower("Bitcoin"); }); 

			$new_res=current($res);	
$pricebtcusd=round($new_res['quote']['USD']['price'], 0);
//курс eth
$res = array_filter($json_array['data'], 
					  function($x) { return mb_strtolower($x['name']) == mb_strtolower("ethereum"); }); 

			$new_res=current($res);	
$priceethusd=round($new_res['quote']['USD']['price'], 0);	


// курс бакс\грн

$json=file_get_contents('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
$json_array=json_decode($json, true);
$kurs1_v=$json_array[0]['ccy'];
$kurs1_b=round($json_array[0]['buy'], 2);
$kurs1_s=round($json_array[0]['sale'], 2);

$sredniy_kurs_grn_usd = round(($kurs1_b + $kurs1_s)/2, 2);

$kurs2_v=$json_array[2]['ccy'];
$kurs2_b=round($json_array[2]['buy'], 2);
$kurs2_s=round($json_array[2]['sale'], 2);

$sredniy_kurs_rub_usd = round($sredniy_kurs_grn_usd/(($kurs2_b + $kurs2_s)/2), 2);
echo "sredniy_kurs_rub_usd =".$sredniy_kurs_rub_usd."<hr>" ;

$ufo = 111;
$cmc_kurs = 111;
$price_occe_btc = occe_price('ufo_btc')*100000000;
$price_occe_btc=number_format($price_occe_btc, 1, '.',' ');
$price_occe_btc_usd = round(($price_occe_btc/100000000)*$pricebtcusd, 6);
$price_occe_btc_usd = number_format($price_occe_btc_usd,6,'.',',');

$volume_occe = round(occe_volume('ufo_btc') + occe_volume('ufo_rub') + occe_volume('ufo_uah'), 0);

$price_graviex_btc = graviex_price('ufobtc')*100000000;
$price_graviex_btc_usd = round(($price_graviex_btc/100000000)*$pricebtcusd, 6);
$price_graviex_btc_usd = number_format($price_graviex_btc_usd,6,'.',',');
$volume_graviex = round(graviex_volume('ufobtc') + graviex_volume('ufousdt'));

$price_graviex_usdt = graviex_price('ufousdt');
$price_graviex_usdt_usd = round($price_graviex_usdt, 6);
$price_graviex_usdt_usd = number_format($price_graviex_usdt_usd,6,'.',',');

$price_occe_rub = occe_price('ufo_rub');
$price_occe_rub_usd = round($price_occe_rub/$sredniy_kurs_rub_usd, 10);
$price_occe_rub_usd = number_format($price_occe_rub_usd,6,'.',',');
//$sredniy_kurs_rub_usd

$price_occe_rub_usd = number_format($price_occe_rub_usd,6,'.',',');

$price_occe_usdt = occe_price('ufo_usdt');
$price_occe_usdt = number_format($price_occe_usdt,6,'.',',');


$price_occe_uah = occe_price('ufo_uah');
$price_occe_uah_usd = round($price_occe_uah/$sredniy_kurs_grn_usd, 10);
$price_occe_uah_usd = number_format($price_occe_uah_usd,6,'.',',');


$volume = $volume_occe + $volume_graviex;

echo "цена = ".sprintf('%f', $price_graviex_btc_usd);
echo "<br>";
echo "цена2 = ".$price_graviex_btc_usd ;
echo "<br>";
echo "цена3 = ".number_format($price_graviex_btc_usd,6,'.',',');
echo "<br>";

echo "цена = ".(float)$price_graviex_btc_usd ;
echo "<br>";
//settype($price_graviex_btc_usd, "double");
echo "цена = ".$price_graviex_btc_usd ;
echo "<br>";


$s=0;
if ($price_occe_btc_usd>0) $s=$s+1;
if ($price_occe_usdt>0) $s=$s+1;
if ($price_occe_rub_usd>0) $s=$s+1;
if ($price_occe_uah_usd>0) $s=$s+1;
if ($price_graviex_btc_usd>0) $s=$s+1;
if ($price_graviex_usdt_usd>0) $s=$s+1;


$ufo = round(($price_occe_btc_usd + $price_occe_usdt + $price_occe_rub_usd + $price_occe_uah_usd + $price_graviex_btc_usd + $price_graviex_usdt_usd) / $s , 6) ;

//if ($price_occe_usdt == 0) $price_occe_usdt = "-";
if ($price_occe_usdt == 0) $price_occe_usdt = "0.000000";
$text_kurs= "
\xF0\x9F\x93\x8C
`1 UFO = $".$ufo."`

```
satoshi:
".$price_occe_btc." ($".$price_occe_btc_usd.") OCCE
".$price_graviex_btc." ($".$price_graviex_btc_usd.") Graviex

usdt:
".$price_occe_usdt." ($".$price_occe_usdt.") OCCE
".$price_graviex_usdt_usd." ($".$price_graviex_usdt_usd.") Graviex

uah:
".$price_occe_uah."   ($".$price_occe_uah_usd.") OCCE

rub:
".$price_occe_rub."   ($".$price_occe_rub_usd.") OCCE

1BTC = $".$pricebtcusd."
1ETH = $".$priceethusd."
 
```
#UFOprice";

$text_kurs2= "
\xF0\x9F\x93\x8C `1 UFO = $".$ufo."`

*satoshi*:
[OCCE](https://www.occe.io/exchange/ufo_btc):
".$price_occe_btc." ($".$price_occe_btc_usd.")
[Graviex Exchange](https://graviex.net/markets/ufobtc):
".$price_graviex_btc." ($".$price_graviex_btc_usd.")

*usdt*:
[OCCE](https://www.occe.io/exchange/ufo_btc):
[Graviex Exchange](https://graviex.net/markets/ufousdt):
".$price_graviex_usdt_usd." ($".$price_graviex_usdt_usd.")

*uah*:
[OCCE](https://www.occe.io/exchange/ufo_uah):
".$price_occe_uah."   ($".$price_occe_uah_usd.")

1BTC = $".$pricebtcusd."
1ETH = $".$priceethusd."

Trading volume in 24 hours - ".$volume."
".$volume_occe." UFO  [OCCE](https://www.occe.io/exchange/ufo_btc)
".$volume_graviex." UFO  [Graviex Exchange](https://graviex.net/markets/ufobtc)

#UFOprice";


$fp = fopen("kurs_text.txt", "w+"); // Открываем файл в режиме записи
$test = fwrite($fp, $text_kurs); // Запись в файл
if ($test) echo 'Данные в файл успешно занесены.';
else echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла



print $text_kurs;

echo "<br>END";

?>