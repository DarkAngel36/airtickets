<?php

/* @var $this yii\web\View */

/* @var $model searchFligth */

use app\models\Common;
use app\models\searchFligth;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;
use kartik\select2\Select2;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>


<!-- homescreen -->
<section class="homescreen">
	<div class="container">
		<div class="homescreen__welcome">Welcome</div>
		<div class="row">
			<div class="col-8">
				<h1 class="homescreen__title">
					Search for Cheap<br>Air Tickets
				</h1>
			</div>
		</div>
		<!-- form-tickets -->
		<?= \app\widgets\SearchForm::widget() ?>
		<!-- /form-tickets -->
	</div>
</section>
<!-- /homescreen -->
