/*
	Slimbox v1.55 - The ultimate lightweight Lightbox clone
	(c) 2007-2008 Christophe Beyls <http://www.digitalia.be>
	MIT-style license.
*/
var Slimbox;(function(){var D=window,s,g,E,u,C,t,w,K,q,j=o.bindWithEvent(),n={},r=new Image(),I=new Image(),G,a,h,H,e,F,c,y,J,v,i,d,A;D.addEvent("domready",function(){$(document.body).adopt($$(G=new Element("div",{id:"lbOverlay"}),a=new Element("div",{id:"lbCenter"}),F=new Element("div",{id:"lbBottomContainer"})).setStyle("display","none"));h=new Element("div",{id:"lbImage"}).injectInside(a).adopt(H=new Element("a",{id:"lbPrevLink",href:"#"}),e=new Element("a",{id:"lbNextLink",href:"#"}));H.onclick=z;e.onclick=f;var L;c=new Element("div",{id:"lbBottom"}).injectInside(F).adopt(L=new Element("a",{id:"lbCloseLink",href:"#"}),y=new Element("div",{id:"lbCaption"}),J=new Element("div",{id:"lbNumber"}),new Element("div",{styles:{clear:"both"}}));L.onclick=G.onclick=B});Slimbox={open:function(N,M,L){s=$extend({loop:false,overlayOpacity:0.8,overlayFadeDuration:400,resizeDuration:400,resizeTransition:false,initialWidth:250,initialHeight:250,imageFadeDuration:400,captionAnimationDuration:400,counterText:"Image {x} of {y}",closeKeys:[27,88,67],previousKeys:[37,80],nextKeys:[39,78]},L||{});v=G.effect("opacity",{duration:s.overlayFadeDuration});i=a.effects($extend({duration:s.resizeDuration},s.resizeTransition?{transition:s.resizeTransition}:{}));d=h.effect("opacity",{duration:s.imageFadeDuration,onComplete:k});A=c.effect("margin-top",{duration:s.captionAnimationDuration});if(typeof N=="string"){N=[[N,M]];M=0}w=D.getScrollTop()+(D.getHeight()/2);K=s.initialWidth;q=s.initialHeight;a.setStyles({top:Math.max(0,w-(q/2)),width:K,height:q,marginLeft:-K/2,display:""});t=D.ie6||(G.currentStyle&&(G.currentStyle.position!="fixed"));if(t){G.style.position="absolute"}v.set(0).start(s.overlayOpacity);x();m(1);g=N;s.loop=s.loop&&(g.length>1);return b(M)}};Element.extend({slimbox:function(L,M){$$(this).slimbox(L,M);return this}});Elements.extend({slimbox:function(L,O,N){O=O||function(P){return[P.href,P.title]};N=N||function(){return true};var M=this;M.forEach(function(P){P.removeEvents("click").addEvent("click",function(Q){var R=M.filter(N,this);Slimbox.open(R.map(O),R.indexOf(this),L);Q.stop()}.bindWithEvent(P))});return M}});function x(){var M=D.getScrollLeft(),L=D.getWidth();$$(a,F).setStyle("left",M+(L/2));if(t){G.setStyles({left:M,top:D.getScrollTop(),width:L,height:D.getHeight()})}}function m(L){["object",D.ie6?"select":"embed"].forEach(function(N){$each(document.getElementsByTagName(N),function(O){if(L){O._slimbox=O.style.visibility}O.style.visibility=L?"hidden":O._slimbox})});G.style.display=L?"":"none";var M=L?"addEvent":"removeEvent";D[M]("scroll",x)[M]("resize",x);document[M]("keydown",j)}function o(M){var L=M.code;if(s.closeKeys.contains(L)){B()}else{if(s.nextKeys.contains(L)){f()}else{if(s.previousKeys.contains(L)){z()}}}M.stop()}function z(){return b(u)}function f(){return b(C)}function b(L){if(L>=0){E=L;u=(E||(s.loop?g.length:0))-1;C=((E+1)%g.length)||(s.loop?0:-1);p();a.className="lbLoading";n=new Image();n.onload=l;n.src=g[L][0]}return false}function l(){a.className="";d.set(0);h.setStyles({width:n.width,backgroundImage:"url("+n.src+")",display:""});$$(h,H,e).setStyle("height",n.height);y.setHTML(g[E][1]||"");J.setHTML((((g.length>1)&&s.counterText)||"").replace(/{x}/,E+1).replace(/{y}/,g.length));if(u>=0){r.src=g[u][0]}if(C>=0){I.src=g[C][0]}K=h.offsetWidth;q=h.offsetHeight;var L=Math.max(0,w-(q/2));if(a.clientHeight!=q){i.chain(i.start.pass({height:q,top:L},i))}if(a.clientWidth!=K){i.chain(i.start.pass({width:K,marginLeft:-K/2},i))}i.chain(function(){F.setStyles({width:K,top:L+q,marginLeft:-K/2,visibility:"hidden",display:""});d.start(1)});i.callChain()}function k(){if(u>=0){H.style.display=""}if(C>=0){e.style.display=""}A.set(-c.offsetHeight).start(0);F.style.visibility=""}function p(){n.onload=Class.empty;n.src=r.src=I.src="";i.clearChain();i.stop();d.stop();A.stop();$$(H,e,h,F).setStyle("display","none")}function B(){if(E>=0){p();E=u=C=-1;a.style.display="none";v.stop().chain(m).start(0)}return false}})();

// AUTOLOAD CODE BLOCK (MAY BE CHANGED OR REMOVED)
Slimbox.scanPage = function() {
	$$($$(document.links).filter(function(el) {
		return el.rel && el.rel.test(/^lightbox/i);
	})).slimbox({/* Put custom options here */}, null, function(el) {
		return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
	});
};
window.addEvent("domready", Slimbox.scanPage);