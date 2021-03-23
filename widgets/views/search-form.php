<?php
/* @var $this yii\web\View */
/* @var $model searchFligth */

/* @var $WhenceSelectItems array */
/* @var $WhereSelectItems array */

/* @var $SeatClassItems array */

use app\models\searchFligth;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="form-tickets homescreen__box">
	<?php $form = ActiveForm::begin([
		'id'          => 'login-form',
		'action'      => 'search-result',
		'layout'      => 'horizontal',
		'options'     => ['class' => 'form-tickets__form'],
		'fieldConfig' => [
			'template'     => "{label}\n{input}\n{error}",
			'labelOptions' => ['class' => 'form-tickets__label'],
			'inputOptions' => ['class' => 'form-group form-tickets__field'],
		],
	]); ?>
	<?php
	$selectOptions = [
		'class' => 'form-control',
	];
	?>

	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Whence</label>
		<?= Html::activeDropDownList($model, 'WhenceSelect', $WhenceSelectItems, $selectOptions) ?>
	</div>
	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Where</label>
		<?= Html::activeDropDownList($model, 'WhereSelect', $WhereSelectItems, $selectOptions) ?>
	</div>
	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Departure Date</label>
		<?= Html::activeInput('text', $model, 'DepartureDate', [
			'class'       => 'form-control datepicker',
			'placeholder' => date('M d'),
		]) ?>
	</div>
	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Returning Date</label>
		<?= Html::activeInput('text', $model, 'ReturningDate', [
			'class'       => 'form-control datepicker',
			'placeholder' => date('M d'),
		]) ?>
	</div>
	<div class="form-group form-passenger form-tickets__field">
		<label class="form-tickets__label">Passenger(s)</label>
		<div class="form-passenger__value">0 passenger</div>
		<ul class="form-passenger__dropdown">
			<li class="form-passenger__item">
				<div class="form-passenger__label">Взрослые</div>
				<div class="form-counter form-passenger__counter">
					<button class="form-counter__btn form-counter__btn_minus">-</button>
					<?= Html::activeInput('text', $model, 'Adult', [
						'class' => 'form-counter__field',
					]) ?>
					<button class="form-counter__btn form-counter__btn_plus">+</button>
				</div>
			</li>
			<li class="form-passenger__item">
				<div class="form-passenger__label">Подростки</div>
				<div class="form-counter form-passenger__counter">
					<button class="form-counter__btn form-counter__btn_minus">-</button>
					<?= Html::activeInput('text', $model, 'Children', [
						'class' => 'form-counter__field',
					]) ?>
					<button class="form-counter__btn form-counter__btn_plus">+</button>
				</div>
			</li>
			<li class="form-passenger__item">
				<div class="form-passenger__label">Дети</div>
				<div class="form-counter form-passenger__counter">
					<button class="form-counter__btn form-counter__btn_minus">-</button>
					<?= Html::activeInput('text', $model, 'Infants', [
						'class' => 'form-counter__field',
					]) ?>
					<button class="form-counter__btn form-counter__btn_plus">+</button>
				</div>
			</li>
		</ul>
	</div>
	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Seat Class</label>
		<?= Html::activeDropDownList($model, 'SeatClass', $SeatClassItems, $selectOptions) ?>
	</div>
	<div class="form-tickets__submit">
		<button type="submit" class="form-tickets__button">Find Tickets</button>
	</div>
	<?php ActiveForm::end(); ?>
	<div class="overlay"></div>
</div>
