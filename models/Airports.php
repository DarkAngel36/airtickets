<?php

namespace app\models;

use yii\httpclient\Client;

class Airports {
	public static function getAirports($q) {
		$url      = Common::getApiUrl() . '/api/airports';
		$client   = new Client();
		$response = $client->createRequest()
			->setMethod('get')
			->setUrl($url)
			->setData(['q' => $q])
			->send();
		
		return $response;
	}
}