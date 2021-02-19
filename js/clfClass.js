class Clf{
	constructor(ElemntID){
		this.timerID = 0;
		this.oldJSON = start_JSON;
		this.newJSON = start_JSON;
		this.timeout = 30000;
		this.elemID = ElemntID;
		this.elem = document.getElementById(this.elemID);
		this.init();
		this.getJSON();
	}
	init(){
		this.timerID = setInterval(() => this.getJSON() ,this.timeout);
	}
	stop(){
		clearInterval(this.timerID);
	}
	getJSON(){
		let xhr = new XMLHttpRequest();
		let formData = new FormData();
		formData.append('action','json');
		xhr.open('POST',window.location.href);
		xhr.responseType = 'json';

		xhr.send(formData);
		let CLFthis = this;
		xhr.onload = function(){
			CLFthis.oldJSON = CLFthis.newJSON;
			CLFthis.newJSON = xhr.response;
			CLFthis.setupTable();
			console.log(xhr.response);
		}.bind(CLFthis)
	}
	compare(a,b){
		if (a>b) {
			return 'green';
		}else if(a<b){
			return 'red';
		}else{
			return 'grey';
		}
	}
	setAnim(elem , color){
		elem.classList.add(color);
		setTimeout(function(elem,color){
			elem.classList.remove(color);
		}, 1000,elem,color);
	}
	getDateString(date_to){
		let string = '';
		let date = new Date(date_to + ' UTC');

		let seconds = date.getSeconds()<10?'0'+date.getSeconds():date.getSeconds();
		let minutes = date.getMinutes()<10?'0'+date.getMinutes():date.getMinutes();
		let hour = date.getHours()<10?'0'+date.getHours():date.getHours();

		let year = date.getFullYear();
		let month = date.getMonth()<10?'0'+date.getMonth():date.getMonth(); 
		let day = date.getDate()<10?'0'+date.getDate():date.getDate();

		string = year+'-'+month+'-'+day+' '+hour+':'+minutes+':'+seconds;

		return string;
	}
	setupTable(){
		let data = this.newJSON;
		let data_old = this.oldJSON;
		for (let i in data) {
			if(i == 'test' || (typeof(data[i]['Note']) != "undefined" && data[i]['Note'] !== null) ) continue;
			let rate = data[i]['Realtime Currency Exchange Rate']['5. Exchange Rate'];
			let bid = data[i]['Realtime Currency Exchange Rate']['8. Bid Price'];
			let ask = data[i]['Realtime Currency Exchange Rate']['9. Ask Price'];
			let refresh = this.getDateString(data[i]['Realtime Currency Exchange Rate']['6. Last Refreshed']);

			let rate_elem = this.elem.querySelector('[data-id = '+i+'_rate]');
			let bid_elem = this.elem.querySelector('[data-id = '+i+'_bid]');
			let ask_elem = this.elem.querySelector('[data-id = '+i+'_ask]');
			let refresh_elem = this.elem.querySelector('[data-id = '+i+'_refresh]');

			let data_opd_stat = (typeof(data_old[i]['Note']) != "undefined" && data_old[i]['Note'] !== null);

			let rate_old = data_opd_stat?data_old[i]['Realtime Currency Exchange Rate']['5. Exchange Rate']:rate_elem.innerHTML;
			let bid_old = data_opd_stat?data_old[i]['Realtime Currency Exchange Rate']['8. Bid Price']:rate_elem.innerHTML;
			let ask_old = data_opd_stat?data_old[i]['Realtime Currency Exchange Rate']['9. Ask Price']:rate_elem.innerHTML;

			rate_elem.innerHTML = rate;
			bid_elem.innerHTML = bid;
			ask_elem.innerHTML = ask;
			refresh_elem.innerHTML = refresh;

			this.setAnim(rate_elem,this.compare(rate,rate_old));
			this.setAnim(bid_elem,this.compare(bid,bid_old));
			this.setAnim(ask_elem,this.compare(ask,ask_old));
			this.setAnim(refresh_elem,this.compare(1,1));

		}
	}
}
