<?php 

	require '/vendor/autoload.php';
	
	$api = new \Yandex\Geo\Api();
	
	if (isset($_POST['address'])) {
		$query = $_POST['address'];
		$api->setQuery($query);
		$api
			->setLimit(1)
			->setLang(\Yandex\Geo\Api::LANG_US)
			->load();
		$response = $api->getResponse();
		$collection = $response->getList();
		foreach ($collection as $item) {
			$lat = $item->getLatitude(); // широта
			$lon = $item->getLongitude(); // долгота
		}
	}

?>
<!DOCTYPE html>
<html lang="ru">
	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
		<title>Поиск адреса в Яндексе</title>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1>Поиск адреса в Яндексе</h1>
			</div>
			<form role="form" action="" method="post">
				<div class="form-group">
					<label for="text">Адрес</label>
					<input type="text" class="form-control" name="address" placeholder="Введите адрес" autofocus>
				</div>
				<button type="submit" class="btn btn-success">Найти</button>
			</form>
			<hr>
			<?php if (isset($response)) {?>
			<p>Запрос: <?= $query ?></p>
			<p>Широта: <?= $lat ?></p>
			<p>Долгота: <?= $lon ?></p>
			<script type="text/javascript">
			ymaps.ready(function(){
					var map = new ymaps.Map("map", {
					center: [<?= $lat ?>, <?= $lon ?>], 
					zoom: 9
				});
			});
			</script>
			<div id="map" style="width: 600px; height: 400px"></div>
			<?php } ?>
		</div>
	</body>
</html>