;(function(root,factory){if(typeof define==='function'&&define.amd){define([],factory);}else if(typeof exports==='object'){module.exports=factory();}else{root.Marquee3k=factory();}}(this,function(){'use strict';class Marquee3k{constructor(element,options){this.element=element;this.selector=options.selector;this.speed=element.dataset.speed||0.25;this.pausable=element.dataset.pausable;this.reverse=element.dataset.reverse;this.paused=false;this.parent=element.parentElement;this.parentProps=this.parent.getBoundingClientRect();this.content=element.children[0];this.innerContent=this.content.innerHTML;this.wrapStyles='';this.offset=0;this._setupWrapper();this._setupContent();this._setupEvents();this.wrapper.appendChild(this.content);this.element.appendChild(this.wrapper);}
_setupWrapper(){this.wrapper=document.createElement('div');this.wrapper.classList.add('marquee3k__wrapper');this.wrapper.style.whiteSpace='nowrap';}
_setupContent(){this.content.classList.add(`${this.selector}__copy`);this.content.style.display='inline-block';this.contentWidth=this.content.offsetWidth;this.requiredReps=this.contentWidth>this.parentProps.width?2:Math.ceil((this.parentProps.width-this.contentWidth)/this.contentWidth)+1;for(let i=0;i<this.requiredReps;i++){this._createClone();}
if(this.reverse){this.offset=this.contentWidth*-1;}
this.element.classList.add('is-init');}
_setupEvents(){this.element.addEventListener('mouseenter',()=>{if(this.pausable)this.paused=true;});this.element.addEventListener('mouseleave',()=>{if(this.pausable)this.paused=false;});}
_createClone(){const clone=this.content.cloneNode(true);clone.style.display='inline-block';clone.classList.add(`${this.selector}__copy`);this.wrapper.appendChild(clone);}
animate(){if(!this.paused){const isScrolled=this.reverse?this.offset<0:this.offset>this.contentWidth*-1;const direction=this.reverse?-1:1;const reset=this.reverse?this.contentWidth*-1:0;if(isScrolled)this.offset-=this.speed*direction;else this.offset=reset;this.wrapper.style.whiteSpace='nowrap';this.wrapper.style.transform=`translate(${this.offset}px, 0) translateZ(0)`;}}
_refresh(){this.contentWidth=this.content.offsetWidth;}
repopulate(difference,isLarger){this.contentWidth=this.content.offsetWidth;if(isLarger){const amount=Math.ceil(difference/this.contentWidth)+1;for(let i=0;i<amount;i++){this._createClone();}}}
static refresh(index){MARQUEES[index]._refresh();}
static refreshAll(){for(let i=0;i<MARQUEES.length;i++){MARQUEES[i]._refresh();}}
static init(options={selector:'marquee3k'}){window.MARQUEES=[];const marquees=Array.from(document.querySelectorAll(`.${options.selector}`));let previousWidth=window.innerWidth;let timer;for(let i=0;i<marquees.length;i++){const marquee=marquees[i];const instance=new Marquee3k(marquee,options);MARQUEES.push(instance);}
animate();function animate(){for(let i=0;i<MARQUEES.length;i++){MARQUEES[i].animate();}
window.requestAnimationFrame(animate);}
window.addEventListener('resize',()=>{clearTimeout(timer);timer=setTimeout(()=>{const isLarger=previousWidth<window.innerWidth;const difference=window.innerWidth-previousWidth;for(let i=0;i<MARQUEES.length;i++){MARQUEES[i].repopulate(difference,isLarger);}
previousWidth=this.innerWidth;});},250);}}
return Marquee3k;}));

class Clf_Marque extends Clf {
	constructor(ElemntID) {
		super(ElemntID);
	    this.timerID = 0;
		this.oldJSON = start_JSON;
		this.newJSON = start_JSON;
		this.timeout = 30000;
		this.elemID = ElemntID;
		this.elem = document.getElementById(this.elemID);
	    this.initMarque();
	}
	initMarque(){
		Marquee3k.init({
	        selector: this.elemID, // define a custom classname
	   	});
	}
	setupTable(){
		let data = this.newJSON;
		let data_old = this.oldJSON;
		for (let i in data) {
			if(i == 'test' || (typeof(data[i]['Note']) != "undefined" && data[i]['Note'] !== null) ) continue;
			let rate = data[i]['Realtime Currency Exchange Rate']['5. Exchange Rate'];

			let rate_elem = this.elem.querySelectorAll('[data-id = '+i+'_rate]');

			let data_opd_stat = (typeof(data_old[i]['Note']) != "undefined" && data_old[i]['Note'] !== null);
			for (var j = rate_elem.length - 1; j >= 0; j--) {
				
				let rate_old = data_opd_stat?data_old[i]['Realtime Currency Exchange Rate']['5. Exchange Rate']:rate_elem[j].innerHTML;
		
				rate_elem[j].innerHTML = rate;
			
				this.setAnim(rate_elem[j],this.compare(rate,rate_old));
			}
			
		}
	}
}