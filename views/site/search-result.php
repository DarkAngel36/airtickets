<?php
/* @var $this yii\web\View */
$counter = 0;
$this->registerJsFile('/js/search-result.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/angular.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('/js/SearchResultController.js', ['position' => \yii\web\View::POS_HEAD]);
$js = <<<JS
$('#btn-search').click();
JS;
$this->registerJs($js, \yii\web\View::POS_READY);

?>

<main class="main">
	<div class="main__inner">

		<div class="container " ng-controller="SearchResultController as todoList">
			<!-- form-tickets -->
			<?= \app\widgets\SearchForm::widget() ?>
			<!-- /form-tickets -->

			<input type="hidden" id="apiUrl" value="<?= Yii::$app->params['apiPath'] ?>">

			<!-- loader -->
			<div class="loader stop-animation"></div>
			<!-- /loader -->

			<!-- cost -->
			<div class="cost main__cost hidden" ng-if="todoList.bookList.flights.length != 0">
				<div class="row no-gutters">
					<div class="col-md-4">
						<div class="cost__item cost__item_active cost-item-best"
						     ng-click="todoList.optionSelect('best')">
							<h6 class="cost__title">Best option</h6>
							<div class="cost__num">{{ todoList.bookList.best[0]['price']['total'] | currency }}</div>
							<div class="cost__time">{{ todoList.bookList.best[0]['duration'] }} (average)</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="cost__item cost-item-cheapest" ng-click="todoList.optionSelect('cheapest')">
							<h6 class="cost__title">Cheapest option</h6>
							<div class="cost__num">{{ todoList.bookList.cheapest[0]['price']['total'] | currency }}</div>
							<div class="cost__time">{{ todoList.bookList.cheapest[0]['duration'] }} (average)</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="cost__item  cost-item-fastest" ng-click="todoList.optionSelect('fastest')">
							<h6 class="cost__title">Fastest option</h6>
							<div class="cost__num">{{ todoList.bookList.fastest[0]['price']['total'] | currency }}</div>
							<div class="cost__time">{{ todoList.bookList.fastest[0]['duration'] }} (average)</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /cost -->

			<!-- tickets-list -->
			<ul class="tickets-list main__tickets-list hidden">
				<!-- tickets-item -->
				<li class="tickets-item tickets-list__item" ng-if="todoList.bookList.flights.length == 0">
					<div class="tickets-item__left">
						<div class="tickets-item__logo"></div>
						<div class="tickets-item__info">
							<h2>Nothing Found</h2>
						</div>
					</div>
				</li>
				<li class="tickets-item tickets-list__item" ng-repeat="bookList in todoList.bookList.flights">
					<div class="tickets-item__left">
						<div class="tickets-item__logo">
							<!--							<img src="img/S7-logoty.png" alt="">-->
							<img ng-repeat="carrier in bookList.operating"
							     src="http://pics.avs.io/200/200/{{ carrier }}.png">
							<!--							<p ng-repeat="carrier in bookList.operating">{{ -->
							<!--								todoList.dictionaries.carriers[carrier] }}</p>-->
						</div>
						<div class="tickets-item__info" ng-repeat="book in bookList.tickets">
							<div class="tickets-item__date">
								<div class="tickets-item__date-time">{{ book.departure.at | date:'HH:mm' }}</div>
								<div class="tickets-item__date-label">
									{{ todoList.bookList.airports[book.departure.iataCode]['name'] }}
									<div>{{ book.departure.at | date:'dd MMMM' }}</div>
								</div>
							</div>
							<div class="scheme tickets-item__scheme">
								<div class="scheme__time">{{ book.duration }} (average)</div>
								<div class="scheme__line"></div>
								<ul class="scheme__points">
									<li class="scheme__item">
										<img src="img/icon_plane.svg" alt="" class="scheme__icon">
										<span class="scheme__text">{{ book.itineraries[0]['segments'][0]['departure']['iataCode'] }}</span>
									</li>
									<li class="scheme__item"
									    ng-if="book.itineraries[0]['segments'].length > 1"
									    ng-repeat="itemSegment in todoList.getArrayForSegment(book.itineraries[0]['segments'].length)"
									>
										<span class="scheme__text">1&nbsp;transfer {{ book.itineraries[0]['segments'][itemSegment]['departure']['iataCode'] }}</span>
									</li>
									<li class="scheme__item">
										<img src="img/icon_plane.svg" alt="" class="scheme__icon scheme__icon_reverse">
										<span class="scheme__text">{{ book.itineraries[0]['segments'][book.itineraries[0]['segments'].length - 1]['arrival']['iataCode'] }}</span>
									</li>

								</ul>
							</div>
							<div class="tickets-item__date">
								<div class="tickets-item__date-time">{{ book.arrival.at | date:'HH:mm' }}</div>
								<div class="tickets-item__date-label">
									{{ todoList.bookList.airports[book.arrival.iataCode]['name'] }}
									<div>{{ book.arrival.at | date:'dd MMMM' }}</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tickets-item__right">
						<div class="tickets-item__price">{{ +bookList.price.total | currency }}</div>
						<button
								type="button"
								class="tickets-item__btn"
								ng-click="todoList.buy('buy-ticket-button-' + $index, bookList)"
								data-button="{{ 'buy-ticket-button-' + $index }}"
								ng-class="'buy-ticket-button-' + $index"
						>Buy ticket
						</button>
					</div>
				</li>
				<!-- /tickets-item -->

			</ul>
			
			<?= $this->render('parts/buy-modal') ?>
			<!-- /tickets-list -->
		</div>
	</div>
</main>
