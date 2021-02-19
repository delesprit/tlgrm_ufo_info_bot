<?php 




$difficulty = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=getdifficulty');
$hashrate = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=hashrate'); //GH/s
$circulating = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=circulating');
$height = file_get_contents('https://chainz.cryptoid.info/ufo/api.dws?q=getblockcount');


$msg= "```
difficulty = ".$difficulty."
hashrate = ".round($hashrate, 6)." GH/s
height = ".number_format($height, 0, ',', ' ')." Blocks
circulating = ".round($circulating, 0)." UFO

```
#UFOinfo
";



?>