<?php

namespace app\models;

class Common {
	public static function getApiUrl() {
		return \Yii::$app->params['apiPath'];
	}
}