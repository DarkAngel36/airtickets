<?php
/* @var $this yii\web\View */

$this->registerJsFile('/js/search-result.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/js/angular.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('/js/SearchResultController.js', ['position' => \yii\web\View::POS_HEAD]);
?>

<main class="main">
	<div class="main__inner">
		<div class="container" ng-controller="SearchResultController as todoList">
			<!-- form-tickets -->
			<?= \app\widgets\SearchForm::widget() ?>
			<!-- /form-tickets -->
			<div>
				<button class="form-tickets__button" ng-click="todoList.searchBooking()">Find Tickets</button>
			</div>
			<input type="hidden" id="apiUrl" value="<?= Yii::$app->params['apiPath'] ?>">
			<!-- cost -->
			<div class="cost main__cost" ng-if="todoList.isLoaded">
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

			<!-- loader -->
			<div class="loader">

			</div>
			<!-- /loader -->

			<!-- tickets-list -->
			<ul class="tickets-list main__tickets-list">
				<!-- tickets-item -->
				<li class="tickets-item tickets-list__item" ng-repeat="book in todoList.bookList.flights">
					<div class="tickets-item__left">
						<div class="tickets-item__logo">
							<!--							<img src="img/S7-logoty.png" alt="">-->
							<p ng-repeat="carrier in book.operating">{{ todoList.dictionaries.carriers[carrier] }}</p>
						</div>
						<div class="tickets-item__info">
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
									    ng-repeat="itemSegment in todoList.getArrayForSegment(book.itineraries[0]['segments'].length)"
									>
										<span class="scheme__text">1&nbsp;transfer {{ book.itineraries[0]['segments'][itemSegment]['arrival']['iataCode'] }}</span>
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
						<div class="tickets-item__price">{{ +book.price.total | currency }}</div>
						<button class="tickets-item__btn">Buy ticket</button>
					</div>
				</li>
				<!-- /tickets-item -->

			</ul>
			<!-- /tickets-list -->
		</div>
	</div>
</main>
