<?php

namespace app\widgets;

use app\models\searchFligth;
use linslin\yii2\curl;
use yii\helpers\ArrayHelper;

class SearchForm extends \yii\bootstrap\Widget {
	private function getAirports() {
		$curl = new curl\Curl();
		
		try {
			$response     = $curl->get(\Yii::$app->params['apiPath'] . '/api/airports?q=');
			$responseData = json_decode($response, true);
			
			return $responseData = ArrayHelper::map($responseData['data']['results'], 'id', 'text');
		}
		catch (\ErrorException $e) {
			return [];
		}
	}
	
	public function run() {
		$cities = $this->getAirports();
		$model  = new searchFligth();
		if (\Yii::$app->request->isGet) {
			$model->load(\Yii::$app->request->get());
		}
		else if (\Yii::$app->request->isPost) {
			$model->load(\Yii::$app->request->post());
		}
		else {
			$model->Adult    = 0;
			$model->Children = 0;
			$model->Infants  = 0;
		}
		
		$WhenceSelectItems = $cities;
		$WhereSelectItems  = $cities;
		$SeatClassItems    = [
			'ECONOMY'  => 'Econom',
			'BUSSINES' => 'Bussines',
			'FIRST'    => 'First',
		];
		
		return $this->render('search-form', [
			'model'             => $model,
			'WhenceSelectItems' => $WhenceSelectItems,
			'WhereSelectItems'  => $WhereSelectItems,
			'SeatClassItems'    => $SeatClassItems,
		]);
	}
}