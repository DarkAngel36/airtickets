<?php

namespace app\widgets;

use app\models\searchFligth;

class SearchForm extends \yii\bootstrap\Widget {
	public function run() {
		
		$model = new searchFligth();
		
		$model->Adult    = 0;
		$model->Children = 0;
		$model->Infants  = 0;
		
		$WhenceSelectItems = [1 => 'Test1', 2 => 'TEST2', 3 => 'TEST3'];
		$WhereSelectItems  = [1 => 'Test1', 2 => 'TEST2', 3 => 'TEST3'];
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