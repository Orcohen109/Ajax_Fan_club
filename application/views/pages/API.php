<style>
    
     h1{font-family: sans-serif;}
</style>
<h1><?php echo $title; ?></h1>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://winner.p.rapidapi.com/winner/games",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"x-rapidapi-host: winner.p.rapidapi.com",
//		"x-rapidapi-key: "Remove key becuse up to github"
	),
));

$response = json_decode(curl_exec($curl),true);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
	echo "cURL Error #:" . $err;
} else {
 $answer=$response['result']['Central_Games'][0][0]['games'];
    $arrsize=sizeof($answer);
for ($i=0;$i<$arrsize;$i++){
     echo '<hr>';
   echo '<b>Leauge:</b>'.' ';
     print_r ($answer[$i]["league"]);
    echo '<br>';;
   for($j = 0;$j < 3;$j++)
   {
    echo '<b>Match winner:</b>'.' ';
     print_r($answer[$i]["options"][$j]['option']);
    echo '<br>';
    echo '<b>win odds:</b>'.' ';
     print_r($answer[$i]["options"][$j]['point']);
        echo '<br>';
   }

}
 echo '<hr>';
}
?>