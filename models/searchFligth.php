<?php

namespace app\models;

use Yii;
use yii\base\Model;

class searchFligth extends Model {
	public $WhenceSelect;
	public $WhereSelect;
	public $DepartureDate;
	public $ReturningDate;
	public $Adult;
	public $Children;
	public $Infants;
	public $SeatClass;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			[
				[
					'WhenceSelect',
					'WhereSelect',
					'DepartureDate',
					'ReturningDate',
					'Adult',
					'Children',
					'Infants',
					'SeatClass',
				],
				'safe',
			],
		];
	}
}