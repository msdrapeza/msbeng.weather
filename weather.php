<?php

$apiKey= "";
$cityId= "";
$googleApiUrl= ""  . $cityId . "" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime= time();

?>
<!DOCTYPE html>
<html>
<head>
<title>Weather Forcast</title>

<style>

.body{
	font-family: Arial;
	font-size: 0.95em;
	color: #929292;
}

.report-container{
	border: #E0E0E0 1px solid;
	padding: 20px 40px 40px 40px;
	border-radius: 2px; 

}

.weather-icon{
	vertical-allign: middle;
	margin-right: 20px;

}

.weather-forecast{
	color: #212121;
	font-size: 1.2em;
	font-weight: bold;
	margin: 20px 0px;
}

span.min-temperature{
	margin-left: 15px;
	color: #929292;
}
.time{
	line-height:25px;
}
</style>
</head>
<body>

	<div class="report-container">
        <h2><?php echo $data->name; ?> Weather Status</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>°C<span
                class="min-temperature"><?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>




</body>
</html>




