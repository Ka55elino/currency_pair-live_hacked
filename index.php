<?php


/*
 1key = 500 request/day
 60keys = 30000 r/d

 nado  12 per 15 sec

 4*12 = 48per min

 2880 per hour

 69120 per day

 nado 140 key

 4 curr update 15 sec
 ////////////////////////////
 1 per key
 72 *4 = 288

830keys

*/
include ('ShubCommodityClass.php');
include ('ShubCurrencyPairClass.php');


$currencypair = new CyrrencyPair();
$commodity = new ShubCommodity();
if ($_POST['action'] == 'json') {
	$currencypair::printJSON();
}else{
	echo "<pre>";
	$currencypair::print('table');
	$currencypair::print('marque',
						 '<div id="{{id}}" class="{{id}}"><div>{{rows}}</div></div>',
						 '<div class="shc-hold">
						 	<span class="{{key}}">{{key}}</span>
						 	<span>{{img}}</span>
						 	<span data-id="{{key}}_rate">{{rate}}</span>
						 </div>');
	//$currencypair::printJSON();
	$commodity::print();
	?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="js/clfClass.js?r=<?=time()?>"></script>
	<script type="text/javascript" src="js/clf_MarqueClass.js?r=<?=time()?>"></script>
	<!--<script src="https://cdn.jsdelivr.net/npm/marquee3000@1.1.1/marquee3k.min.js" integrity="sha256-Flm9JWEjJOnkdTmfL9w4mDKgc8F9z2PIfmZ12Z9fdRk=" crossorigin="anonymous"></script>-->
	<script type="text/javascript">


		const start_JSON = JSON.parse('<?=$currencypair::printJSON();?>');
		//let clf = new Clf('table');
		//let clf_marque = new Clf_Marque('marque');


		/*let socket = new WebSocket("wss://javascript.info/article/websocket/demo/hello");

		socket.onopen = function(e) {
		  alert("[open] Соединение установлено");
		  alert("Отправляем данные на сервер");
		  socket.send("Меня зовут Джон");
		};

		socket.onmessage = function(event) {
		  alert(`[message] Данные получены с сервера: ${event.data}`);
		};

		socket.onclose = function(event) {
		  if (event.wasClean) {
		    alert(`[close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
		  } else {
		    // например, сервер убил процесс или сеть недоступна
		    // обычно в этом случае event.code 1006
		    alert('[close] Соединение прервано');
		  }
		};

		socket.onerror = function(error) {
		  alert(`[error] ${error.message}`);
		};*/
	</script>
	<?php
}

?>
