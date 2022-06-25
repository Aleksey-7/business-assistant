//выбираем id кнопки отображения дополнительных товаров на странице 
var btnShowMore = document.querySelector("#showMore");

var siteURL = "http://business-assistant.local/"

// функция по нажатию на кнопку
btnShowMore.onclick = function(){
var currentPageInput = document.querySelector("#current-page");
	
	// создаем объект ajax-запрса
	var ajax = new XMLHttpRequest();

	// подготовка GET-запроса
	ajax.open("GET", siteURL + "modules/products/getMore.php?page=" + currentPageInput.value, false);
	
	// отправка запроса
	ajax.send();

// когда закончились товары для вывода
if(ajax.response == ""){
	btnShowMore.style.display = "none";
}
	else{

		// корректируем счетчик страниц
		currentPageInput.value = +currentPageInput.value + 1; 

			//добавляем товаров к предыдущему выводу 
			var productsBLock = document.querySelector("#products");
			productsBLock.innerHTML = productsBLock.innerHTML + ajax.response;
	}
}


// функция добавления товара в корзину
function addToBasket(btn){
	
	// создаем объект ajax-запрса
	var ajax = new XMLHttpRequest();

	// подготовка POST-запроса
	ajax.open("POST", siteURL + "modules/basket/addBasket.php", false);

	// описание заголовка POST-запроса
	ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	
	// посылаем запрос
	ajax.send("id=" +  btn.dataset.id);

	// парсим строки json
	// var response = JSON.parse(ajax.response);

	// выбираем селектор нашего span с содержанием количества товаров в корзине
	var btnGoBasket = document.querySelector("#go-basket #basket-counter");

	// наполняем span значением количества товаров в корзине
	btnGoBasket.innerText = ajax.response;
	console.log(ajax.response);
}