<?php
/* @var $this yii\web\View */

?>

<main class="main">
	<div class="main__inner">
		<div class="container">
			<!-- form-tickets -->
			<?= \app\widgets\SearchForm::widget() ?>
			<!-- /form-tickets -->

			<!-- cost -->
			<div class="cost main__cost">
				<div class="row no-gutters">
					<div class="col-md-4">
						<div class="cost__item cost__item_active">
							<h6 class="cost__title">Best option</h6>
							<div class="cost__num">3,210$</div>
							<div class="cost__time">18 h 25 m (average)</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="cost__item">
							<h6 class="cost__title">Cheapest option</h6>
							<div class="cost__num">3,010$</div>
							<div class="cost__time">18 h 25 m (average)</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="cost__item">
							<h6 class="cost__title">Fastest option</h6>
							<div class="cost__num">3,400$</div>
							<div class="cost__time">18 h 00 m (average)</div>
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
				<li class="tickets-item tickets-list__item">
					<div class="tickets-item__left">
						<div class="tickets-item__logo">
							<img src="img/S7-logoty.png" alt="">
						</div>
						<div class="tickets-item__info">
							<div class="tickets-item__date">
								<div class="tickets-item__date-time">8:30</div>
								<div class="tickets-item__date-label">
									Dublin
									<div>27 July</div>
								</div>
							</div>
							<div class="scheme tickets-item__scheme">
								<div class="scheme__time">18 h 25 m (average)</div>
								<div class="scheme__line"></div>
								<ul class="scheme__points">
									<li class="scheme__item">
										<img src="img/icon_plane.svg" alt="" class="scheme__icon">
										<span class="scheme__text">MSQ</span>
									</li>
									<li class="scheme__item">
										<span class="scheme__text">1&nbsp;transfer RIX</span>
									</li>
									<li class="scheme__item">
										<span class="scheme__text">1&nbsp;transfer RIX</span>
									</li>
									<li class="scheme__item">
										<span class="scheme__text">1&nbsp;transfer RIX</span>
									</li>
									<li class="scheme__item">
										<img src="img/icon_plane.svg" alt="" class="scheme__icon scheme__icon_reverse">
										<span class="scheme__text">OSL</span>
									</li>
								</ul>
							</div>
							<div class="tickets-item__date">
								<div class="tickets-item__date-time">12:45</div>
								<div class="tickets-item__date-label">
									Oslo
									<div>29 July</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tickets-item__right">
						<div class="tickets-item__price">3,210$</div>
						<button class="tickets-item__btn">Buy ticket</button>
					</div>
				</li>
				<!-- /tickets-item -->
				<!-- tickets-item -->
				<li class="tickets-item tickets-list__item">
					<div class="tickets-item__left">
						<div class="tickets-item__logo">
							<img src="img/S7-logoty.png" alt="">
						</div>
						<div class="tickets-item__info">
							<div class="tickets-item__date">
								<div class="tickets-item__date-time">8:30</div>
								<div class="tickets-item__date-label">
									Dublin
									<div>27 July</div>
								</div>
							</div>
							<div class="scheme tickets-item__scheme">
								<div class="scheme__time">18 h 25 m (average)</div>
								<div class="scheme__line"></div>
								<ul class="scheme__points">
									<li class="scheme__item">
										<img src="img/icon_plane.svg" alt="" class="scheme__icon">
										<span class="scheme__text">MSQ</span>
									</li>
									<li class="scheme__item">
										<img src="img/icon_plane.svg" alt="" class="scheme__icon scheme__icon_reverse">
										<span class="scheme__text">OSL</span>
									</li>
								</ul>
							</div>
							<div class="tickets-item__date">
								<div class="tickets-item__date-time">12:45</div>
								<div class="tickets-item__date-label">
									Oslo
									<div>29 July</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tickets-item__right">
						<div class="tickets-item__price">3,210$</div>
						<button class="tickets-item__btn">Buy ticket</button>
					</div>
				</li>
				<!-- /tickets-item -->
				<!-- tickets-item -->
				<li class="tickets-item tickets-list__item">
					<div class="tickets-item__left">
						<div class="tickets-item__logo">
							<img src="img/S7-logoty.png" alt="">
						</div>
						<div class="tickets-item__info">
							<div class="tickets-item__date">
								<div class="tickets-item__date-time">8:30</div>
								<div class="tickets-item__date-label">
									Dublin
									<div>27 July</div>
								</div>
							</div>
							<div class="scheme tickets-item__scheme">
								<div class="scheme__time">18 h 25 m (average)</div>
								<div class="scheme__line"></div>
								<ul class="scheme__points">
									<li class="scheme__item">
										<img src="img/icon_plane.svg" alt="" class="scheme__icon">
										<span class="scheme__text">MSQ</span>
									</li>
									<li class="scheme__item">
										<span class="scheme__text">1&nbsp;transfer RIX</span>
									</li>
									<li class="scheme__item">
										<span class="scheme__text">1&nbsp;transfer RIX</span>
									</li>
									<li class="scheme__item">
										<img src="img/icon_plane.svg" alt="" class="scheme__icon scheme__icon_reverse">
										<span class="scheme__text">OSL</span>
									</li>
								</ul>
							</div>
							<div class="tickets-item__date">
								<div class="tickets-item__date-time">12:45</div>
								<div class="tickets-item__date-label">
									Oslo
									<div>29 July</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tickets-item__right">
						<div class="tickets-item__price">3,210$</div>
						<button class="tickets-item__btn">Buy ticket</button>
					</div>
				</li>
				<!-- /tickets-item -->
			</ul>
			<!-- /tickets-list -->
		</div>
	</div>
</main>
