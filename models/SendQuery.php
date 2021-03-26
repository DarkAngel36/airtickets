<?php

namespace app\models;

use yii\base\Model;

class SendQuery extends Model {
	public $email;
	public $phone;
	public $query;
	
	/**
	 * @return array the validation rules.
	 */
	public function rules() {
		return [
			// name, email, subject and body are required
			[['phone', 'email'], 'required'],
			['phone', 'string', 'min' => 7, 'max' => 15],
			// email has to be a valid email address
			['email', 'email'],
			['query', 'safe'],
		];
	}
	
	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels() {
		return [
			'email' => 'Email',
			'phone' => 'Phone',
		];
	}
}