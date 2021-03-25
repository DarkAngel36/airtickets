angular.module('todoApp', [])
	   .controller('SearchResultController', function ($scope, $http) {
		   let todoList = this;

		   todoList.bookLoaded = [];
		   todoList.isLoaded   = false;
		   todoList.apiUrl     = null;

		   todoList.model = {
			   origin         : 'CDG',
			   destination    : 'DME',
			   departure_date : '2021-04-03',
			   return_date    : null,
			   currency       : 'USD',
			   adults         : 1,
			   children       : 0,
			   infants        : 0
		   };

		   todoList.bookList     = [];
		   todoList.dictionaries = [];
		   todoList.mets         = [];

		   todoList.getArrayForSegment = function (count) {
			   if (count == 2) {
				   return [0];
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
		   todoList.searchBooking = function ($scope) {
			   todoList.apiUrl = document.getElementById('apiUrl').value;
			   var queryString = Object.keys(todoList.model).map(key => key + '=' + todoList.model[key]).join('&');
			   $http({
				   method : 'GET',
				   //url    : 'http://flightapi.su/api/direct?' + queryString
				   url : todoList.apiUrl + '/direct?' + queryString
			   }).then(
				   function (response) {
					   console.log(response.data.data);
					   todoList.bookList = response.data.data;
					   console.log(todoList.bookList.airports['CDG']['name']);
					   todoList.meta             = response.data.data.meta;
					   todoList.dictionaries     = response.data.data.dictionaries;
					   todoList.bookList.flights = todoList.bookList.best;
					   todoList.isLoaded         = true;
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