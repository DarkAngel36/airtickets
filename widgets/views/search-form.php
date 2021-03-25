<?php
/* @var $this yii\web\View */
/* @var $model searchFligth */

/* @var $WhenceSelectItems array */
/* @var $WhereSelectItems array */

/* @var $SeatClassItems array */

use app\models\searchFligth;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$departure_date = date('Y-m-d', strtotime($model->DepartureDate . ' ' . date('Y')));
$return_date    = $model->ReturningDate ? date('Y-m-d', strtotime($model->DepartureDate . ' ' . date('Y'))) : null;
$js             = <<<JS
queryParams = {
	origin         : '$model->WhenceSelect',
	destination    : '$model->WhereSelect',
	departure_date : '$model->DepartureDate',
	return_date    : '$model->REturningDate',
	currency       : 'USD',
	adults         : $model->Adult,
	children       : $model->Children,
	infants        : $model->Infants,
	travel_class   : '$model->SeatClass',
}
JS;
$this->registerJs($js, \yii\web\View::POS_HEAD);

$js = <<<JS
$('.form-passenger').click();
$('.overlay').click();
JS;
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="form-tickets homescreen__box">
	<?php $form = ActiveForm::begin([
		'id'          => 'login-form',
		'action'      => 'search-result',
		'layout'      => 'horizontal',
		'method'      => 'POST',
		'options'     => ['class' => 'form-tickets__form'],
		'fieldConfig' => [
			'template'     => "{label}\n{input}\n{error}",
			'labelOptions' => ['class' => 'form-tickets__label'],
			'inputOptions' => ['class' => 'form-group form-tickets__field'],
		],
	]); ?>
	<?php
	$selectOptions = [
		'class'            => 'form-control',
		'ng-model-options' => "{ getterSetter: true }",
	];
	?>

	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Whence</label>
		<?= Html::activeDropDownList($model, 'WhenceSelect', $WhenceSelectItems,
			array_merge($selectOptions, ['ng-model' => 'todoList.model.origin'])
		) ?>
	</div>
	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Where</label>
		<?= Html::activeDropDownList($model, 'WhereSelect',
			$WhereSelectItems,
			array_merge($selectOptions, ['ng-model' => 'todoList.model.destination'])
		) ?>
	</div>
	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Departure Date</label>
		<?= Html::activeInput('text', $model, 'DepartureDate', [
			'class'            => 'form-control datepicker',
			'placeholder'      => 'select date',
			'ng-model'         => 'todoList.model.departure_date',
			'ng-model-options' => "{ getterSetter: true }",
		]) ?>
	</div>
	<div class="form-group form-tickets__field">
		<label class="form-tickets__label">Returning Date</label>
		<?= Html::activeInput('text', $model, 'ReturningDate', [
			'class'            => 'form-control datepicker',
			'placeholder'      => 'select date',
			'ng-model'         => 'todoList.model.return_date',
			'ng-model-options' => "{ getterSetter: true }",
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
						'class'            => 'form-counter__field',
						'ng-model'         => 'todoList.model.adults',
						'ng-model-options' => "{ getterSetter: true }",
					]) ?>
					<button class="form-counter__btn form-counter__btn_plus">+</button>
				</div>
			</li>
			<li class="form-passenger__item">
				<div class="form-passenger__label">Подростки</div>
				<div class="form-counter form-passenger__counter">
					<button class="form-counter__btn form-counter__btn_minus">-</button>
					<?= Html::activeInput('text', $model, 'Children', [
						'class'            => 'form-counter__field',
						'ng-model'         => 'todoList.model.children',
						'ng-model-options' => "{ getterSetter: true }",
					]) ?>
					<button class="form-counter__btn form-counter__btn_plus">+</button>
				</div>
			</li>
			<li class="form-passenger__item">
				<div class="form-passenger__label">Дети</div>
				<div class="form-counter form-passenger__counter">
					<button class="form-counter__btn form-counter__btn_minus">-</button>
					<?= Html::activeInput('text', $model, 'Infants', [
						'class'            => 'form-counter__field',
						'ng-model'         => 'todoList.model.infants',
						'ng-model-options' => "{ getterSetter: true }",
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
		<?php if (Yii::$app->controller->action->id === 'index'): ?>
			<button type="submit" class="form-tickets__button">Find Tickets</button>
		<?php else: ?>
			<button id="btn-search"
			        type="button"
			        class="form-tickets__button"
			        ng-click="todoList.searchBooking()">Find Tickets
			</button>
		<?php endif; ?>
	</div>
	<?php ActiveForm::end(); ?>
	<div class="overlay"></div>
</div>
