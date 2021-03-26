<?php
/* @var $this yii\web\View */

/* @var $id */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$model = new \app\models\SendQuery();
?>

<div class="fade modal buy-modal" role="dialog" tabindex="-1" style="z-index: 2000;">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">

				<div id="modalContent">
					<div>
						<p>From: {{ todoList.bookList.airports[todoList.currentProposal.tickets[0].departure.iataCode]['name'] }}</p>
						<p>To: {{ todoList.bookList.airports[todoList.currentProposal.tickets[0].arrival.iataCode]['name'] }}</p>
						<p>{{ todoList.model.departure_date }}</p>
						<p>Departure At: {{ todoList.currentProposal.tickets[0].departure.at | date:'HH:mm' }}</p>
						<p>Arrival At: {{ todoList.currentProposal.tickets[0].arrival.at | date:'HH:mm' }}</p>
						<p>Adults: {{ todoList.model.adults }}</p>
						<p>Childrens: {{ todoList.model.children }}</p>
						<p>Infants: {{ todoList.model.infants }}</p>

						<p>Total: {{ todoList.currentProposal.price.total | currency }}</p>
					</div>
					<?php $form = ActiveForm::begin([
						'id'     => 'login-form',
						'action' => 'search-result',
						'layout' => 'horizontal',
						'method' => 'POST',
						//						'options'     => ['class' => 'form-tickets__form'],
						//						'fieldConfig' => [
						//							'template'     => "{label}\n{input}\n{error}",
						//							'labelOptions' => ['class' => 'form-tickets__label'],
						//							'inputOptions' => ['class' => 'form-group form-tickets__field'],
						//						],
					]); ?>
					
					<?= $form->field($model, 'email')->textInput([
						//						'class'            => 'form-counter__field',
						'ng-model'         => 'todoList.sendData.email',
						'ng-model-options' => "{ getterSetter: true }",
					]) ?>
					
					
					<?= $form->field($model, 'phone')->textInput([
						//						'class'            => 'form-counter__field',
						'ng-model'         => 'todoList.sendData.phone',
						'ng-model-options' => "{ getterSetter: true }",
					]) ?>

					<div class="form-group">
						<div class="col-lg-offset-1 col-lg-11">
							<?= Html::button('Send Query', [
								'class'    => 'btn btn-primary',
								'name'     => 'login-button',
								'ng-click' => 'todoList.sendQuery()',
							]) ?>
						</div>
					</div>
					
					<?php ActiveForm::end(); ?>
				</div>

			</div>

		</div>
	</div>
</div>
