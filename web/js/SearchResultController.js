angular.module('todoApp', [])
	   .controller('SearchResultController', function ($scope, $timeout, $http, $location) {
		   let todoList = this;

		   document.querySelector('ul.tickets-list.main__tickets-list').classList
				   .remove('hidden');

		   todoList.bookLoaded = [];
		   todoList.isLoaded   = false;
		   todoList.apiUrl     = null;

		   todoList.model = queryParams;
		   for (let k in todoList.model) {
			   todoList.model[k] = queryParams[k];
		   }

		   todoList.bookList     = [];
		   todoList.dictionaries = [];
		   todoList.mets         = [];

		   todoList.getArrayForSegment = function (count) {
			   if (count == 1) {
				   return [];
			   }
			   let ret = [];
			   for (let k = 1; k < count; k++) {
				   ret.push(k);
			   }
			   return ret;
		   };

		   /**
			* поиск билетов
			*/
		   todoList.searchBooking = function () {
			   todoList.model.origin         = document.getElementById('searchfligth-whenceselect').value;
			   todoList.model.destination    = document.getElementById('searchfligth-whereselect').value;
			   todoList.model.departure_date = document.getElementById('searchfligth-departuredate').value;
			   todoList.model.return_date    = document.getElementById('searchfligth-returningdate').value ?? null;

			   todoList.model.adults       = document.getElementById('searchfligth-adult').value;
			   todoList.model.children     = document.getElementById('searchfligth-children').value;
			   todoList.model.infants      = document.getElementById('searchfligth-infants').value;
			   todoList.model.travel_class = document.getElementById('searchfligth-seatclass').value;

			   todoList.bookList = [];
			   todoList.isLoaded = false;
			   document.querySelector('div.loader').classList.remove('stop-animation');
			   document.querySelector('div.cost.main__cost').classList.add('hidden');
			   todoList.apiUrl = document.getElementById('apiUrl').value;
			   let queryData   = {};
			   for (k in todoList.model) {
				   queryData[k] = todoList.model[k];
			   }
			   queryData.departure_date = new Date(queryData.departure_date + ' 2021').toISOString().slice(0, 10);
			   if (queryData.return_date) {
				   queryData.return_date = new Date(queryData.return_date + ' 2021').toISOString().slice(0, 10);
			   }

			   var queryString = Object.keys(queryData).map(key => key + '=' + queryData[key]).join('&');
			   $http({
				   method : 'GET',
				   url    : todoList.apiUrl + '/api/direct?' + queryString
			   }).then(
				   function (response) {
					   console.log(response);
					   todoList.bookList         = response.data.data;
					   todoList.meta             = response.data.data.meta;
					   todoList.dictionaries     = response.data.data.dictionaries;
					   todoList.bookList.flights = todoList.bookList.best;
					   todoList.isLoaded         = true;
					   let container             = document.querySelector('div.cost.main__cost');
					   if (container) {
						   container.classList.remove('hidden');
						   console.log('found');
					   }
					   document.querySelector('div.loader').classList.add('stop-animation');
					   document.querySelector('ul.tickets-list.main__tickets-list').classList
							   .remove('hidden');
				   },
				   function (response) {
				   }
			   );
		   };

		   /**
			*
			* @param type
			*/
		   todoList.optionSelect = function (type) {
			   document.querySelector('div.cost.main__cost div.cost__item.cost-item-best').classList
					   .remove('cost__item_active');
			   document.querySelector('div.cost.main__cost div.cost__item.cost-item-fastest').classList
					   .remove('cost__item_active');
			   document.querySelector('div.cost.main__cost div.cost__item.cost-item-cheapest').classList
					   .remove('cost__item_active');

			   document.querySelector('div.cost.main__cost div.cost__item.cost-item-' + type).classList
					   .add('cost__item_active');
			   todoList.bookList.flights = todoList.bookList[type];

		   };

		   /**
			* конверт flytime to hours && minutes
			* @param time
			*/
		   todoList.flyTime = function (time) {
			   let days    = Math.floor(time / (24 * 60));
			   let hours   = Math.floor((time - days * 24) / 60);
			   let minutes = Math.floor((time - days * 24 - hours * 60));
			   let ret     = '';
			   if (days > 0) {
				   ret += '' + days + ' d ';
			   }
			   if (hours > 0) {
				   ret += '' + hours + ' h ';
			   }
			   if (minutes > 0) {
				   ret += '' + minutes + ' m';
			   }

			   return ret.trim();
		   };
	   });