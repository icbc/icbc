if (RadioTime == undefined) {
	var RadioTime = {};
}
RadioTime.baseUrl = "http://tunein.com/";
RadioTime.tuneData =
{
	"Title":"92.7 Rádio Executiva FM",
	"Location":"Goiania, GO, Brazil",
	"Logo":"http://d1i6vahw24eb07.cloudfront.net/s97450q.png",
	"Genre":"Adulta",
	"Url":"http://tunein.com/radio/R%c3%a1dio-Executiva-FM-927-s97450/",
	"SourceUrl":"",
	"Description":"",
	"Error":"",
	"ErrorLink":"",
	"AlternateId":0,
	"AlternateName":"",
	"AdUrl":"",
	"SongPurchaseUrl":"",
	"PlaylistUrl":"",
	"NowPlayingUrl":"",
	"TopicTitle":"",
	"StreamSupport": [],
	"NowPlaying":
	{
	"SongId":"",
	"Artist":"",
	"Title":"",
	"AlbumArt":"",
	"ArtistArt":"",
	"ArtistId":""
	},
	"Streams": [
	{
	"StreamId":808008,
	"Url":"http://stream.radiotime.com/listen.stream?streamId=808008&rti=dihyG20zO0QIFhszRB9GR049HB5VRBV5WxVbV0VDJlhCFBN1ZVsKDAsCdnwQRlc1WgcUWQBBRGsfHlMmSBsMGAMWDnRqGAVHBEQGVFtWYww%3d%7e%7e%7e",
	"Reliability":85,
	"Bandwidth":128,
	"MediaType":"Windows",
	"HasPlaylist":true,
	"Type":"Live"
	}
	],
	"Schedule": []
}
RadioTime.albumArtUrl = "http://d3tybumvrk5xfv.cloudfront.net/";
RadioTime.flashV2Url = "http://d3bwsr3zpy54hy.cloudfront.net/201110201725/js/tuner/mplayer2.swf";
RadioTime.flashV3Url = "http://d3bwsr3zpy54hy.cloudfront.net/201110201725/js/tuner/mplayer3.swf";
RadioTime.listeningTimeReportInterval = 0; 




if(typeof RadioTime=="undefined"){
	alert("Invalid configuration!")
		}
		RadioTime.uaDetect=function(){
	this.text=navigator.userAgent;
	var b=navigator.userAgent.toLowerCase(),c=function(d){
		return b.indexOf(d)!=-1
		};
		
	this.browser=(!(/opera|webtv/i.test(b))&&/msie (\d)/.test(b))?("ie"):c("firefox/")?"firefox":c("opera")?"opera":c("konqueror")?"konqueror":c("chrome")?"chrome":c("applewebkit/")?"safari":c("mozilla/")?"mozilla":"";
	this.os=(c("x11")||c("linux"))?"linux":c("mac")?"mac":c("win")?"win":"";
	switch(this.browser){
		case"ie":
			this.browserVersion=(/msie ([\d.+]*);/.test(b))?(RegExp.$1):"";
			this.browserName="IE "+this.browserVersion;
			break;
		case"firefox":
			this.browserVersion=(/firefox\/([\d]*).([\d]*)/.test(b))?(RegExp.$1)+"."+(RegExp.$2):"";
			this.browserName="Firefox "+this.browserVersion;
			break;
		case"opera":
			this.browserVersion=(/opera\/([\d.+]*)/.test(b))?(RegExp.$1):/opera ([\d.+]*)/.test(b)?RegExp.$1:"";
			this.browserName="Opera "+this.browserVersion;
			break;
		case"konqueror":
			this.browserName="Konqueror";
			break;
		case"safari":
			this.browserVersion=(/version\/([\d.+]*)/.test(b))?(RegExp.$1):"";
			this.browserName="Safari "+this.browserVersion;
			break;
		case"chrome":
			this.browserVersion=(/chrome\/([\d.+]*)/.test(b))?(RegExp.$1):"";
			this.browserName="Chrome "+this.browserVersion;
			break;
		case"mozilla":
			this.browserVersion=(/mozilla\/([\d.+]*)/.test(b))?(RegExp.$1):"";
			this.browserName="Mozilla "+this.browserVersion;
			break
			}
			switch(this.os){
		case"win":
			var a=c("nt 5.0")?"2000":c("nt 5.1")?"XP":c("nt 6.0")?"Vista":c("nt 6.1")?"7":"";
			this.osName="Windows "+a;
			break;
		case"mac":
			var a="";
			if(c("iphone")){
			this.osName="iPhone OS X"
			}else{
			if(c("ipad")){
				this.osName="iPad OS X"
				}else{
				this.osName="Mac OS X "+a
				}
			}
		break;
	case"linux":
		var a="";
		this.osName="Linux "+a;
		break
		}
		this.versions={
	windows:null,
	real:null,
	quicktime:null,
	flash:null,
	silverlight:null,
	html5:null
}
};

RadioTime.uaDetect.prototype.pluginsString=function(){
	var a=this.os+" "+this.browser+" "+this.browserVersion+" ";
	for(var b in this.versions){
		this.versions[b]=this.getPluginVersion(b);
		if(this.versions[b].num!=="-"){
			a+=b+" "+this.versions[b].num+(this.versions[b].scriptable?"s":"")+", "
			}
		}
	return a
};

RadioTime.uaDetect.prototype.isPluginSupported=function(a){
	return(this.getPluginVersion(a).num!="-")
	};
	
RadioTime.uaDetect.prototype.getPluginVersion=function(a){
	if(this.versions[a]){
		return this.versions[a]
		}
		switch(a){
		case"windows":
			return this.versions[a]=this.getWmpVersion();
		case"real":
			return this.versions[a]=this.getRealVersion();
		case"quicktime":
			return this.versions[a]=this.getQTVersion();
		case"flash":case"flash8":case"flash9":
			return this.versions[a]=this.getFlashVersion();
		case"silverlight":
			return this.versions[a]=this.getSilverlightVersion();
		case"vlc":
			return this.versions[a]=this.getVLCVersion();
		case"html5":
			return this.versions[a]=this.detectHTML5support();
		case"iframe":case"link":
			return this.versions[a]={
			num:"1.0",
			scriptable:false
		};
		
		default:
			return{
			num:"-",
			scriptable:false
		}
		}
	};

RadioTime.uaDetect.prototype.detectHTML5support=function(){
	var b="-";
	var a=false;
	switch(true){
		case /ipad/i.test(this.text):
			b="ipad";
			a=true;
			break;
		case /iphone/i.test(this.text):
			b="iphone";
			a=true;
			break;
		default:
			break
			}
			return{
		num:b,
		scriptable:a
	}
};

RadioTime.uaDetect.prototype.getFlashVersion=function(){
	var f="-",n=navigator;
	if(n.plugins&&n.plugins.length){
		for(var ii=0;ii<n.plugins.length;ii++){
			if(n.plugins[ii].name.indexOf("Shockwave Flash")!=-1){
				f=n.plugins[ii].description.split("Shockwave Flash ")[1];
				break
			}
		}
		}else{
	if(window.ActiveXObject){
		for(var ii=10;ii>=2;ii--){
			try{
				var fl=eval("new ActiveXObject('ShockwaveFlash.ShockwaveFlash."+ii+"');");
				if(fl){
					f=ii+".0";
					break
				}
			}catch(e){}
		}
	}
}
if(f.split(".")[0]){
	f=f.split(".")[0]
	}
	return{
	num:f,
	scriptable:(f>7)
	}
};

RadioTime.uaDetect.prototype.getSilverlightVersion=function(){
	var h="-",d=null,c=null;
	var g=navigator.plugins["Silverlight Plug-In"];
	try{
		if(g){
			d=document.createElement("div");
			document.body.appendChild(d);
			if(this.browser=="safari"){
				d.innerHTML='<embed type="application/x-silverlight" />'
				}else{
				d.innerHTML='<object type="application/x-silverlight"  data="data:," />'
				}
				c=d.childNodes[0]
			}else{
			if(window.ActiveXObject){
				var c=new ActiveXObject("AgControl.AgControl")
				}
			}
		document.body.innerHTML;
	h=c.IsVersionSupported("2.0")?"2.0":(c.IsVersionSupported("1.0")?"1.0":"-");
	delete c
	}catch(i){
	h="-";
	if(g&&g.description){
		var b=g.description.split(".");
		if(isFinite(b[0])&&isFinite(b[1])){
			if(b[0]>0){
				h=b[0]+"."+b[1]
				}
			}
	}
}
if(d){
	document.body.removeChild(d)
	}
	return{
	num:h,
	scriptable:true
}
};

RadioTime.uaDetect.prototype.getVLCVersion=function(){
	var g="-",b=null,i=null,j=navigator,d=true;
	try{
		if(j.plugins&&j.plugins.length){
			for(var c=0;c<j.plugins.length;c++){
				if(j.plugins[c].name.indexOf("VLC")!==-1){
					g=j.plugins[c].description;
					break
				}
			}
			if(g.indexOf("Version")>-1){
			g=g.split("Version ")[1];
			g=g.split(",")[0]
			}else{
			if(g!=="-"){
				g="0.8"
				}
			}
	}else{
	if(window.ActiveXObject&&this.browserName!=="IE 7.0"){
		var i=new ActiveXObject("VideoLAN.VLCPlugin");
		g=i.VersionInfo;
		delete i
		}
	}
}catch(h){
	g="-";
	d=false
	}
	if(b){
	document.body.removeChild(b)
	}
	return{
	num:g,
	scriptable:d
}
};

RadioTime.uaDetect.prototype.getWmpVersion=function(){
	var g="-",i=navigator,d=true;
	if(this.browser==="chrome"){
		if(this.isTypeSupported("application/x-ms-wmp")){
			g="7.0";
			var b=this.detectWmpPluginVersion();
			if(b){
				g=b
				}
			}else{
		if(this.isTypeSupported("application/x-mplayer2")){
			g="6.4"
			}
		}
}else{
	if(i.plugins&&i.plugins.length){
		for(var c=0;c<i.plugins.length;c++){
			if(i.plugins[c].name.indexOf("Windows Media Player")!==-1||i.plugins[c].name.indexOf("Windows Media")!==-1){
				if(this.isTypeSupported("application/x-ms-wmp")){
					g="7.0";
					var b=this.detectWmpPluginVersion();
					if(b){
						g=b
						}
					}else{
				g="6.4";
				d=false
				}
				break
		}
		}
	}else{
	if(window.ActiveXObject){
		try{
			var a=new ActiveXObject("WMPlayer.OCX.7");
			g=a.versionInfo;
			delete a
			}catch(h){
			d=false
			}
		}
}
}
return{
	num:g,
	scriptable:d
}
};

RadioTime.uaDetect.prototype.detectWmpPluginVersion=function(){
	var d=false;
	var b=document.createElement("div");
	document.body.appendChild(b);
	b.innerHTML='<embed width="1" height="1" type="application/x-ms-wmp"></embed>';
	var c=b.childNodes[0];
	try{
		d=c.versionInfo
		}catch(g){}
	document.body.removeChild(b);
	return d
	};
	
RadioTime.uaDetect.prototype.getRealVersion=function(){
	var g="-",k=navigator,c=true;
	if(k.plugins&&k.plugins.length){
		for(var b=0;b<k.plugins.length;b++){
			if(k.plugins[b].name.indexOf("Player Version")!=-1&&this.isTypeSupported("audio/x-pn-realaudio-plugin")){
				g=k.plugins[b].description;
				break
			}
		}
		if(g==="-"){
		for(b=0;b<k.plugins.length;b++){
			if(k.plugins[b].name.indexOf("RealPlayer")!=-1&&this.isTypeSupported("audio/x-pn-realaudio-plugin")){
				g=k.plugins[b].description;
				if(g.indexOf("version")>-1){
					g=g.split("version ")[1];
					g=g.split(" ")[0]
					}else{
					g="4.0"
					}
					break
			}
		}
		}
	if(g!=="-"&&this.browser==="firefox"&&parseFloat(this.browserVersion)>=3){
	g="-";
	c=false
	}
}else{
	if(window.ActiveXObject){
		var d=["rmocx.RealPlayer G2 Control","rmocx.RealPlayer G2 Control.1","RealPlayer.RealPlayer(tm) ActiveX Control (32-bit)","RealVideo.RealVideo(tm) ActiveX Control (32-bit)","RealPlayer"];
		var j=null;
		for(var a=0;a<d.length;a++){
			try{
				j=new ActiveXObject(d[a])
				}catch(h){
				continue
			}
			if(j){
				break
			}
		}
		if(j){
		try{
			g=j.GetVersionInfo();
			g=parseFloat(version);
			c=true;
			delete j
			}catch(h){
			g="4.0";
			c=false
			}
		}
}
}
return{
	num:g,
	scriptable:c
}
};

RadioTime.uaDetect.prototype.getQTVersion=function(){
	var b="-",g=navigator;
	if(g.plugins&&g.plugins.length){
		for(var a=0;a<g.plugins.length;a++){
			if(g.plugins[a].name.indexOf("QuickTime")!==-1){
				b=g.plugins[a].name.split("QuickTime Plug-in ")[1];
				if(!b){
					b=g.plugins[a].name.split("QuickTime Plug-In ")[1]
					}
					break
			}
		}
		}else{
	if(window.ActiveXObject&&this.browser=="ie"){
		try{
			var d=new ActiveXObject("QuickTime.QuickTime");
			if(typeof d==="object"){
				b="7"
				}
			}catch(c){}
}
}
return{
	num:b,
	scriptable:true
}
};

RadioTime.uaDetect.prototype.isTypeSupported=function(b){
	for(var a=0;a<navigator.mimeTypes.length;a++){
		if(navigator.mimeTypes[a].type.toLowerCase()===b){
			return navigator.mimeTypes[a].enabledPlugin
			}
		}
	return false
};

RadioTime.ua=new RadioTime.uaDetect();
if(typeof RadioTime=="undefined"){
	alert("Invalid configuration!")
		}
		RadioTime.playState=[RadioTime.L("unknown"),RadioTime.L("stopped"),RadioTime.L("connecting"),RadioTime.L("playing"),RadioTime.L("error")];
RadioTime.installPage={
	base:"http://wiki.radiotime.com/doku.php?id=help:troubleshooting"
};

RadioTime.onNowInterval=60;
RadioTime.defaultVolume=60;
RadioTime.debug=true;
RadioTime.failuresThreshold=5;
RadioTime.bufferingThreshold=15;
RadioTime.listeningTimeReportInterval=0;
RadioTime.errorReportingLevel=1;
RadioTime.lastErrorReportUrl="";
RadioTime.locale={
	silverlightMissing:RadioTime.L("silverlightMissing"),
	silverlightSuggestion:RadioTime.L("silverlightSuggestion"),
	firefoxWMPMissing:RadioTime.L("firefoxWMPMissing"),
	firefoxWMPSuggestion:RadioTime.L("firefoxWMPSuggestion"),
	firefoxVLC10Warning:RadioTime.L("firefoxVLC10Warning"),
	firefoxVLC10Suggestion:"",
	streamUnavailable:RadioTime.L("streamUnavailable"),
	topicUnavailable:RadioTime.L("topicNotAvailable")+' <a href="#" onclick="RadioTime.tuner.openUrl(\'{0}\');return false;">'+RadioTime.L("details")+"</a>",
	pluginNotInstalled:RadioTime.L("pluginNotInstalled"),
	pluginDisabled:RadioTime.L("pluginDisabled"),
	invalidIndex:"Invalid player index",
	unexpectedBuffering:RadioTime.L("unexpectedBuffering"),
	playbackDoesntStart:RadioTime.L("playbackDoesntStart"),
	badStreamState:RadioTime.L("badStreamState"),
	unknownError:RadioTime.L("unknownError")
	};
	
RadioTime.players={
	windows:{
		version:null,
		create:function(){
			return new RadioTime.playerWindows()
			},
		fullName:(RadioTime.ua.os=="mac")?"Flip4Mac":"Windows Media Player",
		supportedMedia:["windows","wmvoice","wmpro","wmvideo","mp3","unknown"],
		supportsPlaylists:true,
		enabled:true,
		stability:function(b){
			var a=0.1;
			if(RadioTime.ua.os=="win"){
				a=0.9
				}else{
				if(RadioTime.ua.os=="mac"){
					a=0
					}
				}
			return a
		},
	recommended:function(){
		return false
		},
	installPage:{
		base:"http://www.microsoft.com/windows/windowsmedia/player/download/download.aspx",
		win:{
			firefox:"http://port25.technet.com/pages/windows-media-player-firefox-plugin-download.aspx"
		},
		mac:{
			base:"http://www.microsoft.com/windows/windowsmedia/player/wmcomponents.mspx"
		},
		linux:"Unsupported"
	}
},
vlc:{
	version:null,
	create:function(){
		return new RadioTime.playerVLC()
		},
	fullName:"VLC Media Player",
	supportedMedia:["windows","wmvoice","wmvideo","quicktime","aac","ogg","flash","mp3","unknown"],
	supportsPlaylists:true,
	enabled:true,
	stability:function(b){
		var a=0;
		if(RadioTime.ua.os=="linux"){
			a=0.9
			}
			return a
		},
	recommended:function(){
		if(RadioTime.ua.os!=="win"){
			return true
			}
			return false
		},
	installPage:{
		base:"http://www.videolan.org/vlc/",
		windows:{
			base:"http://www.videolan.org/vlc/download-windows.html"
		},
		mac:{
			base:"http://www.videolan.org/vlc/download-macosx.html"
		},
		linux:{
			base:"http://www.videolan.org/vlc/"
		}
	}
},
real:{
	version:null,
	create:function(){
		return new RadioTime.playerReal()
		},
	fullName:"Real Player",
	supportedMedia:["real","mp3","unknown"],
	supportsPlaylists:true,
	enabled:true,
	stability:function(b){
		var a=0.2;
		if(RadioTime.ua.browser!=="firefox"){
			a=0.5
			}
			if(RadioTime.ua.os==="mac"&&b==="mp3"){
			a=0
			}
			return a
		},
	installPage:{
		base:"http://www.real.com/download",
		win:{
			base:"http://forms.real.com/real/realone/intl/intl_realone.html?dc=424423422&lang=en&type=rp10_en_uk&src=realplayer_8020,112206focus"
		},
		mac:{
			base:"http://forms.real.com/real/realone/mac.html?lang=en&type=macgold&src=realplayer_8020,112206focus"
		},
		linux:{
			base:"http://www.real.com/linux?pcode=rn&opage=freeplayer_partner&src=realplayer_8020,112206focus"
		}
	}
},
silverlight:{
	version:null,
	create:function(){
		return new RadioTime.playerSilverlight()
		},
	fullName:(RadioTime.ua.os==="linux")?"Moonlight":"Silverlight",
	supportedMedia:["windows","wmvoice","wmpro","wmvideo","mp3","unknown"],
	supportsPlaylists:false,
	enabled:true,
	stability:function(b){
		var a=0;
		if(RadioTime.ua.os==="win"){
			a=0.8
			}else{
			if(RadioTime.ua.os==="mac"&&b!=="mp3"){
				a=0.6
				}
			}
		return a
	},
recommended:function(){
	return true
	},
installPage:{
	base:"http://www.microsoft.com/silverlight/resources/install.aspx",
	win:{
		opera:"Unsupported"
	},
	linux:{
		base:"Unsupported"
	}
}
},
quicktime:{
	version:null,
	create:function(){
		return new RadioTime.playerQT()
		},
	fullName:"QuickTime Player",
	supportedMedia:["quicktime","unknown"],
	supportsPlaylists:false,
	enabled:true,
	stability:function(b){
		var a=0.3;
		if(RadioTime.ua.os==="mac"){
			a=0.8
			}
			if(RadioTime.ua.os==="win"&&(b==="aac"||b==="mp3")){
			a=0
			}
			if(!this.version.num){
			a=0
			}
			return a
		},
	installPage:{
		base:"http://www.apple.com/quicktime/download/",
		linux:"Unsupported"
	}
},
flash9:{
	version:null,
	create:function(){
		return new RadioTime.playerFlash(true)
		},
	fullName:"Flash Player (AS3)",
	supportedMedia:["flash","unknown"],
	supportsPlaylists:false,
	enabled:true,
	stability:function(b){
		var a=1;
		return a
		},
	installPage:{
		base:"http://www.macromedia.com/go/getflashplayer",
		linux:{
			base:"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&P2_Platform=Linux"
		},
		mac:{
			base:"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&P2_Platform=MacOSX"
		}
	}
},
flash8:{
	version:null,
	create:function(){
		return new RadioTime.playerFlash(false)
		},
	fullName:"Flash Player (AS2)",
	supportedMedia:["mp3","unknown"],
	supportsPlaylists:false,
	enabled:true,
	stability:function(b){
		var a=1;
		return a
		},
	installPage:{
		base:"http://www.macromedia.com/go/getflashplayer",
		linux:{
			base:"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&P2_Platform=Linux"
		},
		mac:{
			base:"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&P2_Platform=MacOSX"
		}
	}
},
html5:{
	version:null,
	create:function(){
		return new RadioTime.playerHTML5()
		},
	fullName:"HTML5 Player",
	supportedMedia:["mp3","aac","unknown"],
	supportsPlaylists:false,
	enabled:true,
	stability:function(a){
		return 0.5
		}
	},
iframe:{
	version:null,
	create:function(){
		return new RadioTime.playerIFrame()
		},
	fullName:"iFrame Player",
	supportedMedia:["html","unknown"],
	supportsPlaylists:true,
	enabled:true,
	custom:true,
	stability:function(b){
		var a=0.1;
		return a
		}
	},
link:{
	version:null,
	create:function(){
		return new RadioTime.playerLink()
		},
	fullName:"Text link",
	supportedMedia:["aac","ogg","unknown"],
	supportsPlaylists:true,
	enabled:true,
	custom:true,
	stability:function(b){
		var a=0.05;
		return a
		}
	}
};

RadioTime.init=function(a,b){
	RadioTime.log.create();
	if(a!==undefined){
		this._container=a
		}else{
		this._container=document.body
		}
		if(b!==undefined){
		this._customContainer=b
		}else{
		RadioTime.log.add("No custom container set, html streams unsupported","error")
		}
		this._setupHandlers();
	RadioTime.unplayers={};
	
	for(var c in RadioTime.players){
		if(!RadioTime.ua.isPluginSupported(c)){
			if(!(c=="vlc"&&(RadioTime.ua.os!="linux"))){
				RadioTime.unplayers[c]=RadioTime.players[c]
				}
				delete RadioTime.players[c]
		}else{
			RadioTime.players[c].version=RadioTime.ua.getPluginVersion(c)
			}
		}
	RadioTime.suggestPlugins();
	if(RadioTime.configuration.load()){
	RadioTime.log.add("Configuration loaded")
	}
	RadioTime.ads.init();
	RadioTime.automaticMode=true;
	RadioTime.currentPlayer=0;
	RadioTime.currentPair=0;
	RadioTime.AutoPlay=false;
	RadioTime.onNow="";
	RadioTime.currentNowPlaying=null;
	RadioTime.currentLogo="";
	RadioTime.nowPlayingUrl="";
	RadioTime.playlistUrl="";
	this._cpuMeter=new RadioTime.loadMeter();
	RadioTime.log.add("OS: "+RadioTime.ua.osName);
	RadioTime.log.add("Browser: "+RadioTime.ua.browserName);
	RadioTime.log.add("Plugins: "+RadioTime.ua.pluginsString());
	if(document.location.host!=""&&RadioTime.baseUrl.indexOf("http://"+document.location.host)==0){
	if(typeof XMLHttpRequest==="undefined"){
		XMLHttpRequest=function(){
			try{
				return new ActiveXObject("Msxml2.XMLHTTP.6.0")
				}catch(d){}
			try{
				return new ActiveXObject("Msxml2.XMLHTTP.3.0")
				}catch(d){}
			try{
				return new ActiveXObject("Msxml2.XMLHTTP")
				}catch(d){}
			try{
				return new ActiveXObject("Microsoft.XMLHTTP")
				}catch(d){}
			return null
			}
		}
	RadioTime.loader=RadioTime.ajaxLoader
}else{
	RadioTime.loader=RadioTime.jsLoader
	}
};

RadioTime.suggestPlugins=function(){
	if(RadioTime.ua.browser=="firefox"&&RadioTime.ua.os=="win"&&(!RadioTime.players.windows||RadioTime.players.windows.version.num==="6.4")){
		var a={
			text:RadioTime.locale.firefoxWMPMissing,
			recommendation:RadioTime.locale.firefoxWMPSuggestion,
			link:RadioTime.getInstallLink(RadioTime.players.windows?RadioTime.players.windows:RadioTime.unplayers.windows)
			};
			
		RadioTime.event.raise("notice",a)
		}
		if(RadioTime.ua.browser==="firefox"&&RadioTime.ua.os==="win"&&(RadioTime.players.vlc&&RadioTime.players.vlc.version&&RadioTime.players.vlc.version.num.indexOf("1.")===0)){
		var a={
			text:RadioTime.locale.firefoxVLC10Warning,
			recommendation:RadioTime.locale.firefoxVLC10Suggestion,
			link:"#"
		};
		
		RadioTime.event.raise("notice",a)
		}
	};

RadioTime.ads={
	_adsPlayer:null,
	_adVol:100,
	_killTimeout:40000,
	_isPlaying:false,
	_active:false,
	init:function(){
		if(RadioTime.ua.isPluginSupported("flash8")){
			this._adsPlayer=new RadioTime.playerFlash();
			this._adsPlayer.useDirect=true
			}
		},
playSpot:function(a,c){
	if(!this._adsPlayer||!a){
		c.call(this);
		return
	}
	this._adsPlayer.setVolume(this._adVol);
	this._adsPlayer.setUrl(a);
	var d=this;
	this.active=true;
	var b=function(){
		if(d.active){
			d.active=false;
			d.stopSpot();
			c.call(this)
			}
		};
	
this._hid=RadioTime.event.subscribe("onstatechange",function(e){
	RadioTime.log.add("ads player state: "+e);
	if(e===3&&!d._isPlaying){
		d.startPlaying()
		}
		if(e<2&&d._isPlaying){
		b()
		}
	},this._adsPlayer);
this._ehid=RadioTime.event.subscribe("onerror",function(e){
	b()
	});
setTimeout(function(){
	b()
	},this._killTimeout);
this._adsPlayer.play()
},
startPlaying:function(){
	this._isPlaying=true
	},
stopSpot:function(){
	this._adsPlayer.stop();
	RadioTime.event.unsubscribe(this._hid);
	RadioTime.event.unsubscribe(this._ehid);
	this._isPlaying=false
	}
};

RadioTime.use=function(b){
	if(RadioTime.players[b]){
		if(RadioTime.getPlayer()&&RadioTime.getPlayer()._isPlaying){
			RadioTime.controls.stop();
			var a=true
			}
			RadioTime.log.add("Using "+b);
		RadioTime.currentPlayer=b;
		RadioTime.automaticMode=false;
		if(a){
			RadioTime.controls.play()
			}
			RadioTime.event.raise("onstatechange",0,RadioTime.getPlayer());
		return true
		}else{
		return false
		}
	};

RadioTime.supportsPlaylists=function(){
	for(var a in RadioTime.players){
		if(a.supportsPlaylists&&a.fullName!=="Flip4Mac"&&a.fullName!=="link"&&a.fullName!=="iframe"){
			return true
			}
		}
	return false
};

RadioTime.enablePlayer=function(b,a){
	if(RadioTime.players[b]){
		if(!a&&b===RadioTime.currentPlayer){
			RadioTime.controls.stop()
			}
			RadioTime.players[b].enabled=a
		}else{
		return false
		}
	};

RadioTime.getPlayer=function(){
	if(!RadioTime.players[RadioTime.currentPlayer]){
		return null
		}
		if(!RadioTime.players[RadioTime.currentPlayer].object){
		RadioTime.players[RadioTime.currentPlayer].object=RadioTime.players[RadioTime.currentPlayer].create()
		}
		return RadioTime.players[RadioTime.currentPlayer].object
	};
	
RadioTime.getInstallLink=function(a){
	var b=RadioTime.installPage.base;
	if(!a||a.installPage===undefined){
		return b
		}
		b=a.installPage.base;
	if(a.installPage[RadioTime.ua.os]===undefined){
		return b
		}
		if(a.installPage[RadioTime.ua.os]==="Unsupported"){
		return null
		}
		if(a.installPage[RadioTime.ua.os].base!==undefined){
		b=a.installPage[RadioTime.ua.os].base
		}
		if(a.installPage[RadioTime.ua.os][RadioTime.ua.browser]===undefined){
		return b
		}
		if(a.installPage[RadioTime.ua.os][RadioTime.ua.browser]==="Unsupported"){
		return null
		}
		b=a.installPage[RadioTime.ua.os][RadioTime.ua.browser];
	return b
	};
	
function handleTuneResponse(a){
	if(!a||!a.Streams){
		RadioTime.event.raise("ondatafailed");
		return
	}
	RadioTime.controls.stop();
	RadioTime.nowPlayingUrl=a.NowPlayingUrl;
	RadioTime.playlistUrl=a.PlaylistUrl;
	RadioTime.currentLogo=a.Logo;
	RadioTime.currentNowPlaying=a.NowPlaying;
	RadioTime.event.raise("ondataready",a);
	RadioTime.AlternateId=a.AlternateId;
	RadioTime.AlternateName=a.AlternateName;
	if(a.Streams.length===0){
		if(a.Error==="item.unavailable"){
			RadioTime.event.raise("cantplay",RadioTime.locale.topicUnavailable.replace("{0}",a.Url))
			}else{
			RadioTime.event.raise("cantplay",RadioTime.locale.streamUnavailable)
			}
			return
	}
	if(!RadioTime.loadStreams(a.Streams)){
		return
	}
	if(RadioTime.nowPlayingUrl!==null){
		RadioTime.nowPlaying.enable()
		}
		RadioTime.schedule.load(a.Schedule);
	if(a.AdUrl){
		RadioTime.ads.playSpot(a.AdUrl,function(){
			RadioTime.log.add("End of the ad");
			if(RadioTime.AutoPlay){
				RadioTime.controls.play()
				}else{
				RadioTime.checkPlayer();
				RadioTime.event.raise("onplaystatechange",{
					code:1,
					nativeText:RadioTime.playState[1]
					})
				}
			})
	}else{
	if(RadioTime.AutoPlay){
		RadioTime.controls.play()
		}else{
		RadioTime.checkPlayer();
		RadioTime.event.raise("onplaystatechange",{
			code:1,
			nativeText:RadioTime.playState[1]
			})
		}
	}
}
RadioTime.nowPlaying={
	_isPolling:false,
	_responseCount:0,
	_pollTimeout:null,
	_errorTimeout:null,
	_enabled:false,
	_started:false,
	enable:function(){
		if(!RadioTime.nowPlaying._enabled){
			RadioTime.nowPlaying._enabled=true;
			if(RadioTime.nowPlaying._started){
				RadioTime.nowPlaying.start()
				}
			}
	},
start:function(){
	if(!RadioTime.nowPlaying._isPolling&&RadioTime.nowPlayingUrl){
		RadioTime.nowPlaying._started=true;
		if(RadioTime.nowPlaying._enabled){
			RadioTime.nowPlaying._isPolling=true;
			RadioTime.nowPlaying._pollTimeout=setTimeout(RadioTime.nowPlaying.poll,15000)
			}
		}
},
handleResponse:function(a){
	RadioTime.nowPlaying._responseCount++;
	if(RadioTime.nowPlaying._loaderElement){
		RadioTime._container.removeChild(RadioTime.nowPlaying._loaderElement)
		}
		RadioTime.nowPlaying._loaderElement=null;
	if(RadioTime.currentNowPlaying.Title!==a.Title||RadioTime.currentNowPlaying.Artist!==a.Artist){
		RadioTime.currentNowPlaying=a;
		RadioTime.event.raise("onsongplayingchange",a);
		RadioTime.nowPlaying._pollTimeout=setTimeout(RadioTime.nowPlaying.poll,a.Title?120000:60000)
		}else{
		RadioTime.nowPlaying._pollTimeout=setTimeout(RadioTime.nowPlaying.poll,15000)
		}
	},
handleError:function(){
	if(RadioTime.nowPlaying._loaderElement){
		RadioTime._container.removeChild(RadioTime.nowPlaying._loaderElement)
		}
		RadioTime.nowPlaying._loaderElement=null;
	RadioTime.nowPlaying._pollTimeout=setTimeout(RadioTime.nowPlaying.poll,60000)
	},
checkPollStatus:function(a){
	if(a==RadioTime.nowPlaying._responseCount){
		RadioTime.nowPlaying.handleError()
		}
	},
poll:function(){
	if(RadioTime.nowPlaying._isPolling&&!RadioTime.nowPlaying._loaderElement){
		RadioTime.nowPlaying._loaderElement=document.createElement("script");
		RadioTime.nowPlaying._loaderElement.src=RadioTime.nowPlayingUrl+"?rnd="+RadioTime.makeId();
		RadioTime._container.appendChild(RadioTime.nowPlaying._loaderElement);
		var a=RadioTime.nowPlaying._responseCount;
		RadioTime.nowPlaying._errorTimeout=setTimeout(function(){
			RadioTime.nowPlaying.checkPollStatus(a)
			},8000)
		}
	},
stop:function(){
	if(RadioTime.nowPlaying._pollTimeout){
		clearTimeout(RadioTime.nowPlaying._pollTimeout);
		RadioTime.nowPlaying._pollTimeout=null
		}
		if(RadioTime.nowPlaying._errorTimeout){
		clearTimeout(RadioTime.nowPlaying._errorTimeout);
		RadioTime.nowPlaying._errorTimeout=null
		}
		RadioTime.nowPlaying._isPolling=false;
	RadioTime.nowPlaying._started=false
	}
};

RadioTime.checkPlayer=function(){
	if(!RadioTime.currentPlayer){
		RadioTime.currentPlayer=RadioTime.pairs[RadioTime.currentPair].playerIndex
		}
	};

RadioTime.setTarget=function(d,c,b,e,a){
	RadioTime.automaticMode=true;
	RadioTime.API.setTarget(d,c,b,e,a);
	RadioTime.log.add("setTarget("+d+","+c+","+b+","+e+","+a+")");
	RadioTime.API.tune(handleTuneResponse)
	};
	
RadioTime.schedule={
	failed:false,
	load:function(b){
		if(!b||b.length===0){
			return
		}
		this._schedule=b;
		var c=this;
		for(var a=0;a<b.length;a++){
			(function(d){
				setTimeout(function(){
					c.activateScheduleItem(d)
					},1000*b[d].SecondsToNextStart);
				setTimeout(function(){
					c.deActivateScheduleItem(d)
					},1000*(b[d].SecondsToNextStart+b[d].SecondsRemaining))
				})(a)
			}
		},
activateScheduleItem:function(a){
	if(this._schedule[a]){
		this.NowPlaying=this._schedule[a];
		this._currentItem=a;
		if(this._schedule[a+1]){
			this.NextPlaying=this._schedule[a+1]
			}else{
			this.NextPlaying=null
			}
			RadioTime.event.raise("onnowdataavailable",{
			NowPlaying:this.NowPlaying,
			NextPlaying:this.NextPlaying
			})
		}
	},
deActivateScheduleItem:function(a){
	if(this._currentItem===a){
		RadioTime.event.raise("onnowdataavailable",{
			NowPlaying:null,
			NextPlaying:null
		})
		}
		if(a===this._schedule.length){
		this.fetch()
		}
	},
fetch:function(){
	if(!this.failed){
		var a=this
		}
		RadioTime.API.getSchedule(function(b){
		a.failed=true;
		a.load(b.Schedule)
		})
	}
};

RadioTime.loadStreams=function(f){
	if(typeof f==="string"){
		f=[{
			Url:f,
			MediaType:"unknown",
			Reliability:1
		}]
		}
		if(RadioTime.pairs){
		delete RadioTime.pairs
		}
		RadioTime.pairs=RadioTime.buildStreamsMatrix(f,this.players);
	if(RadioTime.pairs.length==0){
		RadioTime.event.raise("cantplay","");
		var a=RadioTime.buildStreamsMatrix(f,this.unplayers);
		var e=0;
		if(RadioTime.sizeOf(a)>0){
			while((RadioTime.getInstallLink(this.unplayers[a[e].playerIndex])=="Unsupported")&&e<a.length){
				e++
			}
			RadioTime.event.raise("missingplayer",a[e])
			}else{
			RadioTime.event.raise("missingplayer",f[0])
			}
			return false
		}
		var c=false,d=0,b=[];
	while(d<RadioTime.pairs.length){
		if(RadioTime.players[RadioTime.pairs[d].playerIndex].enabled){
			c=true;
			b.push(RadioTime.pairs[d])
			}
			d++
	}
	if(!c){
		RadioTime.event.raise("cantplay",RadioTime.locale.pluginDisabled);
		RadioTime.event.raise("disabledplayer",RadioTime.pairs[0].playerIndex);
		return false
		}
		RadioTime.pairs=b;
	RadioTime.currentPair=0;
	return true
	};
	
RadioTime.boostPlayer=function(){
	var c=RadioTime.getPlayer();
	if(c&&c._scriptable){
		var b=[];
		var d=RadioTime.pairs[RadioTime.currentPair].stream.Url;
		for(var a=0;a<RadioTime.pairs.length;a++){
			if(RadioTime.pairs[a].playerIndex==c.name||RadioTime.pairs[a].stream.Url!=d){
				b.push(RadioTime.pairs[a])
				}
			}
		RadioTime.pairs=b;
	RadioTime.currentPair=0;
	c._boosted=true
	}
};

RadioTime.getStreamAttemptsLeftCount=function(){
	var a=RadioTime.getPlayer().getUrl();
	var d=0;
	for(var b=RadioTime.currentPair;b<RadioTime.pairs.length;b++){
		if(RadioTime.pairs[b].stream.Url==a){
			d++
		}
	}
	return d
};

RadioTime.buildStreamsMatrix=function(n,b){
	var l=[],a=false;
	var k=false,d=false;
	var e=RadioTime.ua.browser=="firefox"&&parseFloat(RadioTime.ua.browserVersion)>=3;
	var m=n.length>0;
	for(var h=0;h<n.length;h++){
		m=m&&n[h].MediaType.toLowerCase()=="real";
		a=false;
		if(!n[h].Reliability){
			n[h].Reliability=0.1
			}
			for(var j in b){
			var g=this.getRank(b[j],n[h].MediaType.toLowerCase(),n[h].HasPlaylist)*n[h].Reliability;
			if(g>0){
				l.push({
					rank:g,
					playerIndex:j,
					stream:n[h]
					});
				a=true;
				if(j=="link"){
					k=true
					}else{
					d=true
					}
				}
		}
		if(!a){
		RadioTime.log.add("Unsupported stream type: "+n[h].MediaType.toLowerCase(),"warning")
		}
	}
if(m&&e){
	l.push({
		rank:0.1,
		playerIndex:"link",
		stream:n[0]
		})
	}
	if(k&&d){
	var c=[];
	for(var f=0;f<l.length;f++){
		if(l[f].playerIndex!="link"){
			c.push(l[f])
			}
		}
	l=c
}
l=l.sort(function(o,i){
	return(i.rank-o.rank)
	});
return l
};

RadioTime.getRank=function(b,a,d){
	if(!RadioTime.inArray(b.supportedMedia,a)){
		return 0
		}
		var c=1;
	if(b.version&&b.version.scriptable){
		c=10
		}
		c*=b.stability(a);
	c*=(d&&!b.supportsPlaylists?0.1:1);
	RadioTime.log.add("rank for "+b.fullName+" is "+c);
	return c
	};
	
RadioTime.controls={
	play:function(){
		if(RadioTime.automaticMode){
			if(!this.isPlayable()){
				RadioTime.event.raise("cantplay","No compatible streams");
				return false
				}
				RadioTime.currentPlayer=RadioTime.pairs[RadioTime.currentPair].playerIndex
			}
			if(!RadioTime.getPlayer()){
			RadioTime.event.raise("cantplay",RadioTime.locale.invalidIndex);
			return false
			}
			RadioTime.getPlayer().setStream(RadioTime.pairs[RadioTime.currentPair].stream);
		RadioTime.getPlayer().play();
		this.startMonitoring();
		RadioTime.event.raise("onplay",RadioTime.pairs[RadioTime.currentPair]);
		return true
		},
	tryNext:function(){
		if(!this.isPlayable()){
			RadioTime.event.raise("cantplay","No compatible streams");
			return false
			}
			RadioTime.log.add("Trying next pair, current "+RadioTime.currentPair);
		this.stop();
		RadioTime.currentPair++;
		if(RadioTime.currentPair>=RadioTime.pairs.length){
			RadioTime.currentPair=0;
			RadioTime.event.raise("onnomorestreams");
			return false
			}
			if(!RadioTime.players[RadioTime.pairs[RadioTime.currentPair].playerIndex].enabled){
			this.tryNext()
			}
			this.play();
		RadioTime.event.raise("onnextstream");
		return true
		},
	isPlayable:function(){
		return(RadioTime.pairs&&RadioTime.pairs.length>0)
		},
	tryRaw:function(){
		if(this._triedRaw||RadioTime.supportsPlaylists()){
			return false
			}
			this._triedRaw=true;
		RadioTime.log.add("tryRaw()");
		this.stop();
		RadioTime.API.clearStreams();
		RadioTime.setTarget("","","","","raw=true");
		return true
		},
	trySimilar:function(){
		RadioTime.log.add("trySimilar()");
		this.stop();
		RadioTime.setTarget("","","","","similar=true")
		},
	reload:function(){
		RadioTime.log.add("reload()");
		this.stop();
		RadioTime.setTarget("","","","","")
		},
	tryAlternateStation:function(a){
		RadioTime.log.add("tryAlternateStation()");
		this.stop();
		if(a||RadioTime.AlternateId){
			RadioTime.setTarget("","","","","alternate=true&AlternateId="+RadioTime.AlternateId);
			return true
			}else{
			return false
			}
		},
detach:function(){
	if(RadioTime.getPlayer()){
		document.location.href=RadioTime.getPlayer().getUrl();
		return true
		}
		return false
	},
stop:function(){
	this.stopMonitoring();
	if(RadioTime.getPlayer()){
		RadioTime.getPlayer().stop()
		}
	},
pause:function(){
	this.stopMonitoring();
	if(RadioTime.getPlayer()){
		RadioTime.getPlayer().pause()
		}
	},
setVolume:function(a){
	a=Math.round(a);
	if(RadioTime.getPlayer()){
		return RadioTime.getPlayer().setVolume(a)
		}else{
		RadioTime.defaultVolume=a;
		return RadioTime.defaultVolume
		}
	},
setPosition:function(a){
	if(RadioTime.getPlayer()){
		return RadioTime.getPlayer().setPosition(a)
		}else{
		return 0
		}
	},
startMonitoring:function(){
	RadioTime._cpuMeter.start();
	RadioTime.nowPlaying.start();
	if(!RadioTime.getPlayer()._scriptable){
		RadioTime.log.add("Player is not scriptable. Can't monitor","warning");
		return
	}
	RadioTime._failure=0;
	RadioTime._buffering=0;
	RadioTime._lastListeningTimeReport=0;
	RadioTime.log.add("Stream monitoring started");
	RadioTime._start_time=new Date();
	this._monitoring=setInterval(function(){
		var a=RadioTime.getPlayer();
		if(typeof(a)==="undefined"||a===null){
			return
		}
		if(a._listeningTime>60&&a._scriptable&&!a._boosted){
			RadioTime.log.add(a.name+" looks ok, boost it");
			RadioTime.boostPlayer();
			if(RadioTime.listeningTimeReportInterval===0){
				RadioTime.API.reportUsage(a.name,a.playStateHistory,a._listeningTime)
				}
			}
		if(RadioTime.listeningTimeReportInterval>0){
		if(a._listeningTime-RadioTime._lastListeningTimeReport>RadioTime.listeningTimeReportInterval){
			RadioTime.API.reportUsage(a.name,a.playStateHistory,a._listeningTime);
			RadioTime._lastListeningTimeReport=a._listeningTime
			}
		}
	if(a.__getInternalStatus().code===3&&a.getStatus().code<2&&!a._delayed){
		RadioTime._failure++;
		RadioTime.event.raise("badstreamstate",{
			msg:RadioTime.locale.badStreamState,
			status:a.getStatus(),
			severity:RadioTime._failure/RadioTime.failuresThreshold
			})
		}else{
		if(RadioTime._failure>0){
			RadioTime._failure=0;
			RadioTime.event.raise("badstreamstate",{
				msg:"",
				status:null,
				severity:0
			})
			}
		}
	if(a._boosted&&RadioTime.onDemand&&a.getStatus().code<2){
	RadioTime._failure=0;
	RadioTime.controls.stop()
	}
	if(RadioTime._failure>RadioTime.failuresThreshold){
	RadioTime.getPlayer().lastError={
		code:998,
		text:RadioTime.locale.playbackDoesntStart
		};
		
	RadioTime.log.add("Playback doesn't start");
	RadioTime.event.raise("onerror",RadioTime.currentPlayer);
	RadioTime._failure=0
	}
	if(a.__getInternalStatus().code===3&&a.getStatus().code===2){
	RadioTime._buffering++;
	RadioTime.event.raise("badstreamstate",{
		msg:RadioTime.locale.unexpectedBuffering,
		status:a.getStatus(),
		severity:RadioTime._buffering/RadioTime.bufferingThreshold
		})
	}else{
	if(RadioTime._buffering>0){
		RadioTime._buffering=0;
		RadioTime.event.raise("badstreamstate",{
			msg:"",
			status:null,
			severity:0
		})
		}
	}
if(RadioTime._buffering>RadioTime.bufferingThreshold){
	RadioTime.getPlayer().lastError={
		code:999,
		text:RadioTime.locale.unexpectedBuffering
		};
		
	RadioTime.log.add("Unexpected buffering");
	RadioTime.event.raise("onerror",RadioTime.currentPlayer);
	RadioTime._buffering=0
	}
},1000)
},
stopMonitoring:function(){
	RadioTime._cpuMeter.stop();
	RadioTime.nowPlaying.stop();
	if(this._monitoring<0){
		return
	}
	clearInterval(this._monitoring);
	RadioTime._failure=0;
	RadioTime.log.add("Stream monitoring stopped");
	this._monitoring=-1
	},
turnDial:function(d,c,b,e,a){
	RadioTime.controls.stop();
	RadioTime.API.clearStreams();
	RadioTime.setTarget(d,c,b,e,a)
	}
};

RadioTime.enableEvents=true;
RadioTime.onDemand=false;
RadioTime.AlternateId=0;
RadioTime.AlternateName="";
RadioTime._cleanup=function(){
	try{
		clearInterval(RadioTime._displayTimer);
		for(var a in RadioTime.players){
			if(RadioTime.players[a].object){
				RadioTime.players[a].object.cleanup();
				delete RadioTime.players[a].object
				}
				delete RadioTime.players[a]
		}
		}catch(b){}
};

RadioTime.event={
	_handlers:[],
	_hid:0,
	subscribe:function(d,b,c){
		if(!this._handlers[d]){
			this._handlers[d]=[]
			}
			var a={};
		
		a.func=b;
		a.obj=c;
		a.id=this._hid++;
		this._handlers[d].push(a);
		return a.id
		},
	unsubscribe:function(a){
		for(var b in this._handlers){
			for(var c in this._handlers[b]){
				if(this._handlers[b][c].id==a){
					this._handlers[b].splice(c,1);
					return true
					}
				}
			}
			return false
},
raise:function(b,d,a){
	if(!RadioTime.enableEvents){
		return true
		}
		if(!this._handlers[b]){
		RadioTime.log.add("No handlers for "+b,"warning");
		return true
		}
		var c=this._handlers[b];
	for(handler in c){
		if(c[handler].func&&(c[handler].obj==a||c[handler].obj==undefined)){
			c[handler].func.call(a,d)
			}
		}
	}
};

RadioTime._setupHandlers=function(){
	if(window.addEventListener){
		window.addEventListener("onunload",RadioTime._cleanup,false)
		}else{
		window.attachEvent("onunload",RadioTime._cleanup)
		}
		if(window.addEventListener){
		window.addEventListener("onerror",RadioTime._errorstrap,false)
		}else{
		window.attachEvent("onerror",RadioTime._errorstrap)
		}
		RadioTime.event.subscribe("onerror",function(b){
		RadioTime.log.add(b+" error","error");
		if(b in RadioTime.players&&RadioTime.players[b].object){
			RadioTime.log.add(b+" error: "+RadioTime.players[b].object.getError().text,"error")
			}else{
			RadioTime.log.add(b+" error: "+RadioTime.ads._adsPlayer.getError().text,"error")
			}
			if(b==RadioTime.currentPlayer){
			var a=RadioTime.getPlayer().getError();
			RadioTime.API.reportError(b,a.code,a.text,RadioTime.getStreamAttemptsLeftCount()<2);
			RadioTime.getPlayer().lastError=null;
			if(RadioTime.automaticMode){
				RadioTime.controls.tryNext()
				}else{
				RadioTime.controls.stop()
				}
			}
	});
RadioTime.event.subscribe("onstatechange",function(b){
	RadioTime.log.add("onstatechange: "+this.name+": "+b+": "+this.getStatus().code+" "+this.getStatus().nativeText,"info");
	if(!RadioTime.getPlayer()){
		return
	}
	if(b>1){
		RadioTime._failure=0
		}
		if(b>2){
		RadioTime._buffering=0
		}
		var c=RadioTime.getPlayer().getStatus(b);
	var a=RadioTime.getPlayer().__getInternalStatus();
	if(a.code==3&&3>c.code){
		c.code=2
		}
		RadioTime.event.raise("onplaystatechange",c,this)
	});
RadioTime.event.subscribe("onnowdataavailable",function(a){
	if(a.NowPlaying){
		var b=a.NowPlaying.Title;
		if(RadioTime.onNow!=b){
			RadioTime.onNow=b;
			RadioTime.event.raise("ontopicchange",{
				source:"service",
				topic:b
			})
			}
		}
});
RadioTime.event.subscribe("onplay",function(a){
	if(a.stream&&(a.stream.Type=="OnDemand"||a.stream.Type=="Download")){
		RadioTime.onDemand=true
		}else{
		RadioTime.onDemand=false
		}
	});
RadioTime.event.subscribe("cpuoverload",function(){
	RadioTime.log.add("Plugin runs slow, trying next pair","error");
	RadioTime.controls.tryNext()
	})
};

RadioTime._errorstrap=function(c,b,a){
	RadioTime.log.add("JavaScript error: "+c,"error");
	return true
	};
	
RadioTime.extend=function(c,a){
	function b(){}
	b.prototype=a.prototype;
	c.prototype=new b();
	c.prototype.constructor=c;
	c.baseConstructor=a;
	if(a.base){
		a.prototype.base=a.base
		}
		c.base=a.prototype
	};
	
RadioTime.jsonHtml=function(e){
	var a="";
	for(var b=0;b<e.length;b++){
		var f=e.charAt(b);
		var d=e.charCodeAt(b);
		if(f=="'"||f=='"'||d<30){
			a+="\\u00"+d.toString(16)
			}else{
			a+=f
			}
		}
	return a
};

RadioTime.$=function(a){
	return document.getElementById(a)
	};
	
RadioTime.$hide=function(a){
	if(RadioTime.$(a)){
		RadioTime.$(a).style.display="none"
		}else{
		RadioTime.log.add("Element not found ("+a+")")
		}
	};

RadioTime.$show=function(a){
	if(RadioTime.$(a)){
		RadioTime.$(a).style.display="block"
		}else{
		RadioTime.log.add("Element not found ("+a+")")
		}
	};

RadioTime.getAbsoluteLeft=function(c){
	var a=c;
	var b=0;
	if(!c||!c.tagName){
		return 0
		}while(a&&a.tagName.toUpperCase()!="HTML"){
		b+=a.offsetLeft;
		a=a.offsetParent
		}
		return b
	};
	
RadioTime.addHandler=function(a,c,b){
	var d=document.createElement("script");
	d.setAttribute("language","javascript");
	d.setAttribute("for",a);
	d.setAttribute("event",c);
	d.text=b;
	document.body.appendChild(d)
	};
	
RadioTime.addListener=function(c,a,b){
	if(document.addEventListener){
		c.addEventListener(a,b,false)
		}else{
		c.attachEvent("on"+a,b)
		}
	};

RadioTime.makeId=function(){
	return 1*(Math.random().toString().replace(".",""))
	};
	
RadioTime.ajaxLoader={
	_requestTimeout:10,
	_cache:{},
	requests:{},
	sendRequest:function(req,success,retries,usecache){
		if(usecache!=undefined&&usecache){
			if(this._cache[req]!=undefined){
				RadioTime.log.add("Response found in cache");
				if(success){
					success.call(this,this._cache[req])
					}
					return
			}
		}
		var reqId=RadioTime.makeId();
	if(req.indexOf("http://")<0){
		req=RadioTime.baseUrl+req
		}
		this.requests[reqId]={
		_req:req,
		xhr:new XMLHttpRequest(),
		_callback:success!=undefined?success:null,
		_reqUrl:req+"&rnd="+reqId,
		init:function(sdata){
			try{
				eval("var data = "+sdata)
				}catch(e){
				RadioTime.log.addException("ajaxLoader",e,"parseData: "+sdata);
				var data={}
			}
			RadioTime.loader._cache[this._req]=data;
		if(this._callback){
			this._callback.call(this,data)
			}
		}
};

if(!this.requests[reqId].xhr){
	return false
	}
	RadioTime.log.add("Sending request: "+req);
this.requests[reqId].xhr.open("GET",this.requests[reqId]._reqUrl);
var _this=this;
this.requests[reqId].xhr.onreadystatechange=function(){
	if(_this.requests[reqId].xhr.readyState==4&&_this.requests[reqId].xhr.status==200){
		_this.requests[reqId].init.call(_this.requests[reqId],_this.requests[reqId].xhr.responseText)
		}else{
		if(_this.requests[reqId].xhr.readyState==4){
			if(_this.requests[reqId]._callback){
				RadioTime.event.raise("onfaileddata",_this.requests[reqId])
				}
			}
	}
};

this.requests[reqId].xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
this.requests[reqId].xhr.send("")
}
};

RadioTime.jsLoader={
	_requestTimeout:10,
	_cache:{},
	requests:{},
	sendRequest:function(c,f,a,e){
		if(typeof c!=="number"){
			if(e!==undefined&&e){
				if(this._cache[c]!==undefined){
					RadioTime.log.add("Response found in cache");
					if(f){
						f.call(this,this._cache[c])
						}
						return
				}
			}
			var d=RadioTime.makeId();
		if(c.indexOf("http://")<0){
			c=RadioTime.baseUrl+c
			}
			this.requests[d]={
			_req:c,
			_requestCompleted:false,
			_callback:f!=undefined?f:null,
			_retries:a!=undefined?a:0,
			_reqUrl:c+"&callback=RadioTime.loader.requests["+d+"].init",
			init:function(h){
				this._requestCompleted=true;
				RadioTime.loader._cache[this._req]=h;
				if(this._callback){
					this._callback.call(this,h)
					}
				}
		}
}else{
	var d=c;
	if(this.requests[d]===undefined){
		return
	}
	if(this.requests[d]._requestCompleted){
		this.clearRequest(d);
		return
	}
	if(this.requests[d]._retries<=0){
		this.onerror(this.requests[d]);
		this.clearRequest(d);
		return
	}
	this.requests[d]._retries--
}
if(RadioTime.$(d)){
	RadioTime.$(d).parentNode.removeChild(RadioTime.$(d))
	}
	var b;
var g=this;
RadioTime.log.add("Sending request: "+c);
if(this.requests[d]._callback){
	b=document.createElement("script")
	}else{
	b=document.createElement("iframe");
	b.style.visibility="hidden";
	b.style.width="1px";
	b.style.height="1px";
	b.onload=function(){
		g.clearRequest(this.id)
		}
	}
b.id=d;
b.src=this.requests[d]._reqUrl;
RadioTime._container.appendChild(b);
setTimeout(function(){
	g.sendRequest(d)
	},this._requestTimeout*1000)
},
clearRequest:function(a){
	if(RadioTime.$(a)){
		RadioTime.$(a).parentNode.removeChild(RadioTime.$(a))
		}
		delete this.requests[a]
},
onerror:function(a){
	if(a._callback){
		RadioTime.event.raise("onfaileddata",a)
		}
	}
};

RadioTime.configuration={
	render:function(a,d){
		var h,f=0;
		switch(d){
			case"installed":
				var k=document.createElement("div");
				k.className="clearfix";
				a.appendChild(k);
				h=RadioTime.players;
				for(var b in h){
				if(h[b].custom){
					continue
				}
				var j=document.createElement("div");
				j.className="radiotime-installedPlayers "+b;
				k.appendChild(j);
				var g='<input type="checkbox" ';
				if(h[b].enabled){
					g+="checked  "
					}
					g+="onclick=\"RadioTime.enablePlayer('"+b+"', this.checked); RadioTime.configuration.save(); return true;\"/> ";
				g+=h[b].fullName;
				j.innerHTML=g;
				f++
			}
			break;
			case"recommended":
				break;
			case"optional":
				var k=document.createElement("div"),g;
				k.className="clearfix";
				a.appendChild(k);
				h=RadioTime.unplayers;
				for(var b in h){
				if(lnk=RadioTime.getInstallLink(h[b])){
					if(d==="recommended"&&(!h[b].recommended||!h[b].recommended())){
						continue
					}
					if(d==="optional"&&(h[b].recommended&&h[b].recommended())){
						continue
					}
					var j=document.createElement("div");
					j.className="radiotime-not-installedPlayers "+b;
					k.appendChild(j);
					if(b!=="html5"){
						g='<a href="'+lnk+'" onclick="RadioTime.tuner.openUrl(this.href); return false;">'+h[b].fullName+"</a>"
						}else{
						g=h[b].fullName
						}
						j.innerHTML=g;
					f++
				}
			}
			break
			}
			return f
	},
save:function(){
	var c=RadioTime.players;
	var a="{";
	for(var b in c){
		if(c[b].custom){
			continue
		}
		a+='"'+b+'":'+c[b].enabled+","
		}
		a+='"iframe":true}';
	RadioTime.cookie.save("tuners",a,365)
	},
load:function(){
	var tuners=RadioTime.cookie.read("tuners");
	if(tuners==undefined||!tuners){
		return false
		}
		try{
		eval("tuners = "+tuners);
		for(var i in tuners){
			if(RadioTime.players[i]){
				RadioTime.players[i].enabled=tuners[i]
				}
			}
		}catch(e){
	RadioTime.log.addException("settings",e,"load")
	}
	return true
}
};

RadioTime.cookie={
	save:function(c,d,e){
		if(e){
			var b=new Date();
			b.setTime(b.getTime()+(e*24*60*60*1000));
			var a="; expires="+b.toGMTString()
			}else{
			var a=""
			}
			document.cookie=c+"="+d+a+"; path=/";
		RadioTime.log.add("Cookie saved: "+document.cookie)
		},
	read:function(b){
		var e=b+"=";
		var a=document.cookie.split(";");
		for(var d=0;d<a.length;d++){
			var f=a[d];
			while(f.charAt(0)==" "){
				f=f.substring(1,f.length)
				}
				if(f.indexOf(e)===0){
				return f.substring(e.length,f.length)
				}
			}
		return null
	},
clear:function(a){
	this.save(a,"",-1)
	}
};

RadioTime.API={
	onplayHid:null,
	setTarget:function(d,c,b,e,a){
		d=(d==undefined)?"":d;
		c=(c==undefined)?"":c;
		b=(b==undefined)?"":b;
		e=(e==undefined)?"":e;
		a=(e==undefined)?"":a;
		if(d||this._programId===undefined){
			this._programId=d
			}
			if(c||this._stationId===undefined){
			this._stationId=c
			}
			if(b||this._topicId===undefined){
			this._topicId=b
			}
			if(e||this._streamId===undefined){
			this._streamId=e
			}
			if(a||this._option===undefined){
			this._option=a
			}
			if(!this.onplayHid){
			var f=this;
			this.onplayHid=RadioTime.event.subscribe("onplay",function(g){
				f._streamId=g.stream.StreamId
				})
			}
		},
clearStreams:function(){
	this._streamId=0
	},
isEnabled:function(){
	return(this._programId!="")||(this._stationId!="")||(this._topicId!="")||(this._streamId!="")
	},
tune:function(d,a){
	if(!this.isEnabled()){
		return
	}
	if(RadioTime.tuneData){
		d(RadioTime.tuneData);
		RadioTime.tuneData=null
		}else{
		var c="open=true"+(a?"&raw=true":"");
		var b=this.makeUrl(RadioTime.baseUrl+"tuner/tune/",c);
		if(this._option){
			b+=this._option
			}
			RadioTime.loader.sendRequest(b,d,1,true)
		}
	},
addFavorite:function(b){
	if(!this.isEnabled()){
		return
	}
	var a="myradio/presets/add/";
	if(this._programId!==""){
		a+="?ProgramId="+this._programId
		}else{
		a+="?StationId="+this._stationId
		}
		RadioTime.loader.sendRequest(RadioTime.baseUrl+a,b)
	},
makeUrl:function(a,b){
	if(!this.isEnabled()){
		return
	}
	a+="?";
	if(this._programId){
		a+="ProgramId="+this._programId+"&"
		}
		if(this._stationId){
		a+="StationId="+this._stationId+"&"
		}
		if(this._topicId){
		a+="TopicId="+this._topicId+"&"
		}
		if(this._streamId){
		a+="StreamId="+this._streamId+"&"
		}
		if(b){
		a+=b+"&"
		}
		return a
	},
getSchedule:function(a){
	if(!this.isEnabled()){
		return
	}
	if(!this._stationId){
		RadioTime.log.add("No station Id -- can't get the schedule");
		return
	}
	RadioTime.loader.sendRequest("StationScheduleJson.aspx?StationId="+this._stationId,a,1,true)
	},
getPresets:function(a){
	RadioTime.log.add("RadioTime.API.getPresets")
	},
savePreset:function(a){
	RadioTime.log.add("RadioTime.API.savePreset: "+a)
	},
reportUsage:function(d,c,a){
	if(!this.isEnabled()){
		return
	}
	var b=this.makeUrl("StreamStatus.axd");
	b+="Time="+a+"&";
	b+="PlayStateHistory="+c+"&";
	b+="PlayerCode="+d;
	RadioTime.loader.sendRequest(RadioTime.baseUrl+b)
	},
reportError:function(e,d,a,b){
	if(!this.isEnabled()){
		return
	}
	if(d==undefined){
		return
	}
	if(!RadioTime.errorReportingLevel){
		return
	}
	if(RadioTime.errorReportingLevel<2&&!b){
		return
	}
	var c=this.makeUrl("StreamStatus.axd");
	c+="ErrorId="+d+"&";
	c+="ErrorDesc="+e+":"+escape(a)+"&";
	c+="PlayerCode="+e+"&";
	c+="Terminal="+b;
	if(RadioTime.lastErrorReportUrl!==c){
		RadioTime.lastErrorReportUrl=c;
		RadioTime.loader.sendRequest(RadioTime.baseUrl+c)
		}
	},
trackListenIssue:function(b){
	if(!this.isEnabled()){
		return
	}
	var a=this.makeUrl("ListenIssueTrack.axd");
	a+="Reason="+b;
	RadioTime.loader.sendRequest(RadioTime.baseUrl+a)
	}
};

RadioTime.loadMeter=function(){};
	
RadioTime.loadMeter.prototype._timeout=50;
RadioTime.loadMeter.prototype._gainTime=3;
RadioTime.loadMeter.prototype._relaxationTime=1;
RadioTime.loadMeter.prototype._working=false;
RadioTime.loadMeter.prototype._avgDelay=50;
RadioTime.loadMeter.prototype._minDelay=50;
RadioTime.loadMeter.prototype._count=0;
RadioTime.loadMeter.prototype._criticalCPU=90;
RadioTime.loadMeter.prototype._criticalCount=0;
RadioTime.loadMeter.prototype._callback=null;
RadioTime.loadMeter.prototype._lastTime=new Date();
RadioTime.loadMeter.prototype.start=function(b){
	this._callback=b!=undefined?b:null;
	this._working=true;
	this._lastTime=new Date().valueOf();
	var a=this;
	setTimeout(function(){
		a._tick()
		},this._timeout)
	};
	
RadioTime.loadMeter.prototype.stop=function(){
	this._working=false
	};
	
RadioTime.loadMeter.prototype._tick=function(){
	var e=new Date().valueOf();
	var a=-this._timeout+e-this._lastTime;
	a=(a<0)?0:a;
	var c=(a>this._avgDelay)?this._timeout/(1000*this._gainTime):this._timeout/(1000*this._relaxationTime);
	this._avgDelay=c*a+(1-c)*this._avgDelay;
	if(this._avgDelay<this._minDelay){
		this._minDelay=this._avgDelay
		}
		this._count++;
	if(this._count%10==0&&this._callback){
		var f=this._avgDelay-this._minDelay;
		var b=Math.round(100*f/(f+2));
		if(this._callback){
			this._callback.call(this,f,b)
			}
			if(b>this._criticalCPU){
			this._criticalCount++;
			if(this._criticalCount>100){
				RadioTime.event.raise("cpuoverload");
				this._criticalCount=0
				}
			}else{
		this._criticalCount=0
		}
	}
if(this._working){
	var g=this;
	this._lastTime=new Date().valueOf();
	setTimeout(function(){
		g._tick()
		},this._timeout)
	}
};

RadioTime.wizard=function(){};
	
RadioTime.wizard.prototype._data=null;
RadioTime.wizard.prototype.init=function(a,b,e,d,c){
	this._root=a;
	this._page=b;
	this._title=e;
	this._options=d;
	this._display=c;
	this._visible=false
	};
	
RadioTime.wizard.prototype.loadData=function(a){
	this._data=a
	};
	
RadioTime.wizard.prototype.toggle=function(a){
	if(this._visible){
		this.close()
		}else{
		this.open(a)
		}
	};

RadioTime.wizard.prototype.open=function(a){
	this._visible=true;
	this._root.style.display="block";
	if(typeof imgObj!=="undefined"){
		$("#imageContainer").html("");
		for(var b=0;b<imgObj.length;b++){
			$("#image-template-src").tmpl(imgObj[b]).appendTo("#imageContainer")
			}
			delete imgObj;
		$("#wizardOther").css("display","block")
		}
		this.showStatus("");
	if(a==undefined){
		a="index"
		}
		if(!this.executeAction(a,"open")){
		this.showScreen(a)
		}
		RadioTime.event.raise("wizardopen")
	};
	
RadioTime.wizard.prototype.close=function(){
	this._visible=false;
	this._root.style.display="none";
	$("#wizardPage").css("display","none");
	RadioTime.event.raise("wizardclose")
	};
	
RadioTime.wizard.prototype.isOpen=function(){
	return this._visible
	};
	
RadioTime.wizard.prototype.setTitle=function(a){
	this._title.innerHTML=a
	};
	
RadioTime.wizard.prototype.showScreenData=function(e,f){
	RadioTime.event.raise("beforewizardshowpage",e);
	this.showStatus("");
	this._page.style.display="block";
	this.setTitle(f.title);
	var g=this,h=[],b=[];
	var a=f.options;
	this._options.innerHTML="";
	for(var d in a){
		if(a[d].hidden||(a[d].restricted&&a[d].restricted())){
			a[d].hidden=false;
			continue
		}
		var i=a[d].text;
		if(a[d].format){
			i=a[d].format(i)
			}
			var j=document.createElement("div");
		this._options.appendChild(j);
		var c=document.createElement("a");
		c.innerHTML=i;
		c.href="#";
		c.id=RadioTime.makeId();
		if(a[d].className!==undefined){
			c.className=a[d].className
			}
			h[c.id]=a[d].action;
		b[c.id]={
			screen:e,
			option:d,
			optionData:a[d]
			};
			
		c.onclick=function(){
			g.executeAction(h[this.id],b[this.id]);
			return false
			};
			
		j.appendChild(c)
		}
		RadioTime.event.raise("wizardshowpage",e)
	};
	
RadioTime.wizard.prototype.showScreen=function(a){
	if(this._data.screens[a]){
		this.showScreenData(a,this._data.screens[a])
		}
	};

RadioTime.wizard.prototype.executeAction=function(c,b){
	c=c.split(" ");
	var a=c[0];
	var d=c[1]!=undefined?c[1]:null;
	if(this._data.customActions[a]){
		this._data.customActions[a].call(this,b,d);
		return true
		}
		if(this[a]){
		this[a].call(this,d);
		return true
		}
		return false
	};
	
RadioTime.wizard.prototype.hide=function(){
	this._page.style.display="none"
	};
	
RadioTime.wizard.prototype.showStatus=function(a){
	if(a!==""){
		this._display.style.display="block"
		}else{
		this._display.style.display="none"
		}
		this._display.innerHTML=a
	};
	
RadioTime.slider=function(a,b){
	this._name=a;
	this._titleTemplate=b?b:a+" {0}"
	};
	
RadioTime.slider.prototype.isTuning=false;
RadioTime.slider.prototype.init=function(c,a,f){
	this._base=c;
	this._positioner=a;
	this._callback=f;
	this._dial_pos=a.offsetWidth;
	this.bLeft=RadioTime.getAbsoluteLeft(c);
	RadioTime.log.add("Slider base offset: "+this.bLeft);
	this.bWidth=c.offsetWidth;
	var e=this;
	var d=function(g){
		if(!g){
			var g=window.event;
			g.cancelBubble=true;
			g.returnValue=false
			}else{
			g.preventDefault();
			g.stopPropagation()
			}
			e.startDrag(g)
		};
		
	c.onmousedown=d;
	a.onmousedown=d;
	var b=function(g){
		if(!g){
			var g=window.event.keyCode
			}else{
			g=g.which
			}
			e.handleKeys(g)
		};
		
	c.onmouseover=function(){
		if(typeof volumeShown!=="undefined"&&volumeShown){
			clearTimeout(volumeTimer)
			}
		};
	
c.onmouseout=function(){
	if(typeof volumeShown!=="undefined"&&volumeShown){
		volumeTimer=setTimeout(hideVolume,5000)
		}
	};

c.onkeydown=b;
a.onkeydown=b;
this.setValue(50)
};

RadioTime.slider.prototype.setValue=function(b,a){
	this._val=this._callback.call(this,b);
	this._base.title=this._titleTemplate.replace("{0}",this._val);
	if(a===undefined){
		this.setPos(this._val*this.bWidth/100)
		}
		return this._val
	};
	
RadioTime.slider.prototype.setPos=function(a){
	if(a<0){
		a=0
		}
		if(a>this.bWidth){
		a=this.bWidth
		}
		this._dial_pos=a;
	this._positioner.style.width=a+"px";
	this.setValue(100*(a/this.bWidth),true)
	};
	
RadioTime.slider.prototype.startDrag=function(a){
	this.isTuning=true;
	this.setPos(a.clientX-this.bLeft);
	this.initialData={
		mouse:a.clientX,
		dialPos:this._dial_pos
		};
		
	var b=this;
	this._savedMouseMove=document.onmousemove;
	document.onmousemove=function(c){
		if(!c){
			var c=window.event;
			c.cancelBubble=true;
			c.returnValue=false
			}else{
			c.preventDefault();
			c.stopPropagation()
			}
			b.doDrag(c)
		};
		
	this._savedMouseUp=document.onmouseup;
	document.onmouseup=function(){
		b.endDrag()
		};
		
	return true
	};
	
RadioTime.slider.prototype.doDrag=function(b){
	if(!this.isTuning){
		return
	}
	var a=b.clientX-this.initialData.mouse;
	this.setPos(this.initialData.dialPos+a);
	return true
	};
	
RadioTime.slider.prototype.endDrag=function(){
	this.isTuning=false;
	document.onmousemove=this._savedMouseMove;
	document.onmouseup=this._savedMouseUp;
	return true
	};
	
RadioTime.slider.prototype.handleKeys=function(a){
	switch(a){
		case 37:
			this.setValue(this._val-5);
			break;
		case 39:
			this.setValue(this._val+5);
			break
			}
		};

RadioTime.player=function(a){
	this.name=a;
	this._id=RadioTime.makeId();
	this._scriptable=false;
	this._paused=false;
	this.isSupported=this.init();
	this._tick=0;
	if(this.isSupported){
		var b=this;
		this._timer=setInterval(function(){
			b.onTimer()
			},b._timeStep);
		this.setVolume(RadioTime.defaultVolume)
		}
	};

RadioTime.player.prototype.getId=function(){
	return"radiotime_"+this.name+"_"+this._id
	};
	
RadioTime.player.prototype._id=0;
RadioTime.player.prototype.name="notdefined";
RadioTime.player.prototype._object=null;
RadioTime.player.prototype._stream={};
	
RadioTime.player.prototype._url="";
RadioTime.player.prototype._status={
	code:0,
	nativeText:"Unknown"
};

RadioTime.player.prototype._intStatus=0;
RadioTime.player.prototype._nowPlaying="";
RadioTime.player.prototype._isPlaying=false;
RadioTime.player.prototype._delayed=false;
RadioTime.player.prototype._volume=100;
RadioTime.player.prototype._pos=0;
RadioTime.player.prototype._loaded=0;
RadioTime.player.prototype._delayed_attempts=0;
RadioTime.player.prototype.lastError=null;
RadioTime.player.prototype.playStateHistory="";
RadioTime.player.prototype._timeStep=500;
RadioTime.player.prototype._listeningTime=0;
RadioTime.player.prototype._connectingTime=0;
RadioTime.player.prototype._bufferingTime=5000;
RadioTime.player.prototype.cleanup=function(){
	clearInterval(this._timer);
	this.stop()
	};
	
RadioTime.player.prototype.play=function(a){
	this.lastError=null;
	this.playStateHistory="";
	if(undefined!==a){
		if(this._isPlaying&&this._url==a){
			return false
			}
			this.stop();
		this.setUrl(a);
		this._isPlaying=true;
		this.__play()
		}else{
		if(this._isPlaying){
			return false
			}else{
			this._isPlaying=true;
			this.__play()
			}
		}
	if(RadioTime.players[this.name].custom){
	RadioTime._customContainer.style.display="block"
	}
	return true
};

RadioTime.player.prototype._safeCall=function(c,a){
	var b=0;
	if(this._delayed){
		return false
		}
		try{
		b=this[c].call(this,a);
		if(b==undefined){
			b=true
			}
		}catch(d){
	RadioTime.log.addException(this,d,c)
	}
	return b
	};
	
RadioTime.player.prototype.__play=function(){
	if(!this._paused){
		this._loaded=0
		}
		if(this._scriptable){
		if(this._delayed){
			var a=this;
			if(this._delayed_attempts<20){
				setTimeout(function(){
					a.__play()
					},500);
				this._delayed_attempts++
			}else{
				this._delayed=false;
				this._delayed_attempts=0;
				RadioTime.event.raise("onerror",this.name)
				}
			}else{
		this._safeCall("_play")
		}
	}else{
	this._object=this._create(this._url)
	}
	this._paused=false;
this._play_tick=this._tick
};

RadioTime.player.prototype.stop=function(){
	this._isPlaying=false;
	this._paused=false;
	if(this._scriptable){
		this._safeCall("_stop")
		}else{
		this._destroy()
		}
		if(RadioTime.players[this.name].custom){
		RadioTime._customContainer.style.display="none"
		}
	};

RadioTime.player.prototype.pause=function(){
	this._isPlaying=false;
	if(this._scriptable){
		if(!this._safeCall("_pause")){
			this.stop()
			}else{
			this._paused=true
			}
		}else{
	this.stop()
	}
};

RadioTime.player.prototype.setVolume=function(a){
	if(this._scriptable&&a>=0&&a<=100){
		if(this._safeCall("_setVolume",a)){
			this._volume=a
			}
		}
	return this._volume
};

RadioTime.player.prototype.setMute=function(a){
	if(this._scriptable){
		this._safeCall("_setMute",a)
		}
	};

RadioTime.player.prototype.setPosition=function(a){
	if(this._scriptable&&this._status.code===3&&a>=0&&a<=100){
		if(this._safeCall("_setPosition",a)){
			this._pos=a
			}
		}
	return this._pos
};

RadioTime.player.prototype.getDuration=function(){
	if(this._scriptable){
		return this._safeCall("_getDuration")
		}else{
		return false
		}
	};

RadioTime.player.prototype.isSeekable=function(){
	if(this["_setPosition"]!=undefined){
		return true
		}else{
		return false
		}
	};

RadioTime.player.prototype.getStatus=function(a){
	if(!this._scriptable&&a!=undefined&&this.name=="real"){
		return this._safeCall("_getStatus",a)
		}
		if(this._getStatus&&this._object&&this._scriptable&&this._safeCall("_getStatus")&&(this.__getInternalStatus().code!==1)){
		return this._safeCall("_getStatus")
		}else{
		return this.__getInternalStatus()
		}
	};

RadioTime.player.prototype.getNowPlaying=function(){
	if(this._getNowPlaying&&this._object&&this._scriptable&&(this.__getInternalStatus().code!==1)){
		return this._safeCall("_getNowPlaying")
		}else{
		return""
		}
	};

RadioTime.player.prototype.getBitrate=function(){
	if(this._getBitrate&&this._object&&this._scriptable){
		return this._safeCall("_getBitrate")
		}else{
		return 0
		}
	};

RadioTime.player.prototype.getError=function(){
	if(this._getError&&this._object&&this._scriptable){
		return this._safeCall("_getError")
		}else{
		if(this.lastError){
			return this.lastError
			}else{
			var a={
				code:1000,
				text:RadioTime.locale.unknownError
				};
				
			return a
			}
		}
};

RadioTime.player.prototype.__getInternalStatus=function(){
	var a=0;
	if(!this._object){
		a=1
		}else{
		if(this._isPlaying){
			if(this._tick-this._play_tick<this._bufferingTime/this._timeStep){
				a=2
				}else{
				a=3
				}
			}else{
		a=1
		}
	}
return({
	code:a,
	nativeText:RadioTime.playState[a],
	sender:this
})
};

RadioTime.player.prototype.setUrl=function(a){
	if(a==this._url){
		return
	}
	this._url=a;
	this._listeningTime=0;
	this._connectingTime=0
	};
	
RadioTime.player.prototype.setStream=function(a){
	if(a==this._stream){
		return
	}
	this._stream=a;
	this.setUrl(a.Url)
	};
	
RadioTime.player.prototype.getUrl=function(){
	return this._url
	};
	
RadioTime.player.prototype.init=function(){
	if(this._create&&RadioTime.ua.isPluginSupported(this.name)){
		this._object=this._create()
		}
		return(this._object!=null)
	};
	
RadioTime.player.prototype.onTimer=function(){
	var a=this.getStatus();
	var c=this.__getInternalStatus().code;
	var b=this.getNowPlaying();
	this._tick++;
	if(this._status.nativeText!==a.nativeText||this._status.code!==a.code||this._intStatus!==c){
		RadioTime.event.raise("onstatechange",a.code,this);
		this._status=a;
		this._intStatus=c;
		this.playStateHistory+=(isFinite(a.nativeText)?a.nativeText:a.code)+","
		}
		if(this._nowPlaying!==b){
		RadioTime.event.raise("ontopicchange",{
			source:"stream",
			topic:b
		},this);
		this._nowPlaying=b
		}
		if(this.isSeekable()){
		if(this._loaded!==this._lastLoaded){
			this._lastLoaded=this._loaded;
			RadioTime.event.raise("progress",this._loaded,this)
			}
			if(this._pos!==this._lastPos&&!isNaN(this._pos)&&isFinite(this._pos)){
			this._lastPos=this._pos;
			RadioTime.event.raise("position",this._pos,this)
			}
		}
	if(this._ontimer){
	this._safeCall("_ontimer")
	}
	if(a.code===3){
	this._listeningTime+=this._timeStep*0.001
	}
	if(a.code===2){
	this._connectingTime+=this._timeStep*0.001
	}
};

RadioTime.player.prototype.getRemainingTime=function(){
	if(RadioTime.onDemand){
		var a=this.getDuration();
		if(a&&a>1){
			return(1-0.01*this._pos)*a
			}
		}
	return null
};

RadioTime.player.prototype._create=function(){
	return null
	};
	
RadioTime.player.prototype._destroy=function(){
	if(this._object&&this._object.parentNode&&this._object.parentNode.removeChild){
		var a=this._object.parentNode.removeChild(this._object);
		delete a;
		this._object=null
		}
		if(this._object){
		delete this._object;
		this._object=null
		}
	};

RadioTime.playerWindows=function(){
	RadioTime.playerWindows.baseConstructor.call(this,"windows")
	};
	
RadioTime.extend(RadioTime.playerWindows,RadioTime.player);
RadioTime.playerWindows.prototype._play=function(){
	if(!this._paused){
		this._object.URL=this._url
		}
		this._object.controls.play()
	};
	
RadioTime.playerWindows.prototype._stop=function(){
	this._object.controls.stop()
	};
	
RadioTime.playerWindows.prototype._pause=function(){
	this._object.controls.pause()
	};
	
RadioTime.playerWindows.prototype._setVolume=function(a){
	this._object.settings.volume=a
	};
	
RadioTime.playerWindows.prototype._setPosition=function(a){
	this._object.controls.currentPosition=a*this._object.controls.currentItem.duration/100
	};
	
RadioTime.playerWindows.prototype._getDuration=function(){
	return this._object.controls.currentItem.duration
	};
	
RadioTime.playerWindows.prototype._getStatus=function(){
	var a=0;
	switch(this._object.playState){
		case 0:case 1:case 2:case 8:
			a=1;
			break;
		case 10:
			if(this._isPlaying&&this.__getInternalStatus().code==3&&!(this._boosted&&RadioTime.onDemand)){
			if(this._triedState10Fix){
				a=4;
				RadioTime.event.raise("onerror","windows");
				RadioTime.log.add("WMP State 10 condition","warning")
				}else{
				this._stop();
				this._play();
				this._triedState10Fix=true;
				RadioTime.log.add("Autofixing WMP State 10 condition...","warning");
				a=2
				}
			}else{
			a=1
			}
			break;
	case 3:
		a=3;
		break;
	case 4:case 5:case 6:case 7:case 9:case 11:
		a=2;
		break;
	default:
		a=0
		}
		return({
	code:a,
	nativeText:this._object.status,
	sender:this
})
};

RadioTime.playerWindows.prototype._getNowPlaying=function(){
	if(this._object.controls.currentItem){
		return(this._object.controls.currentItem.getItemInfo("Title"))
		}else{
		return""
		}
	};

RadioTime.playerWindows.prototype._getBitrate=function(){
	if(this._object.controls.currentItem){
		return(this._object.controls.currentItem.getItemInfo("Bitrate"))
		}else{
		return 0
		}
	};

RadioTime.playerWindows.prototype._getError=function(){
	if(this._object.error.errorCount){
		var a={
			code:this._object.error.item(0).errorCode,
			text:this._object.error.item(0).errorDescription
			};
			
		this._object.error.clearErrorQueue();
		return a
		}else{
		return{
			code:0,
			text:RadioTime.locale.unknownError
			}
		}
};

RadioTime.playerWindows.prototype._ontimer=function(){
	if(this._scriptable&&this.getStatus().code===3&&this._object.controls.currentItem&&this._object.controls.currentItem.duration){
		this._loaded=100;
		this._pos=100*this._object.controls.currentPosition/this._object.controls.currentItem.duration
		}
	};

RadioTime.playerWindows.prototype._create=function(d){
	var c=null;
	this._scriptable=false;
	try{
		if(window.ActiveXObject){
			c=new ActiveXObject("WMPlayer.OCX.7")
			}else{
			if(window.GeckoActiveXObject){
				c=new GeckoActiveXObject("WMPlayer.OCX.7")
				}
			}
	}catch(f){
	RadioTime.log.addException(this,f,"playerWindows._create:ActiveX")
	}
	var b=document.createElement("div");
b.style.position="absolute";
RadioTime._container.appendChild(b);
if(!c){
	if(RadioTime.ua.isTypeSupported("application/x-ms-wmp")){
		b.innerHTML='<embed width="1" height="1" id="radiotime_windows_player" type="application/x-ms-wmp"></embed>'
		}else{
		if(d!=undefined){
			d=' autostart="1" src="'+d+'"'
			}else{
			d=""
			}
			b.innerHTML='<embed width="1" height="1" id="radiotime_windows_player" type="application/x-mplayer2"'+d+' CODEBASE="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112"></embed>'
		}
	}else{
	delete c;
	b.innerHTML='<object classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6" width="1" height="1" id="radiotime_windows_player"></object>'
	}
	c=b.childNodes[0];
RadioTime._container.innerHTML;
try{
	this._scriptable=(c.versionInfo!=undefined)&&(c.controls!=undefined)
	}catch(f){
	RadioTime.log.addException(this,f,"playerWindows._create:ScriptableCheck")
	}
	return c
};

RadioTime.playerReal=function(){
	RadioTime.playerReal.baseConstructor.call(this,"real")
	};
	
RadioTime.extend(RadioTime.playerReal,RadioTime.player);
RadioTime.playerReal.prototype._play=function(){
	if(!this._paused){
		this._object.SetSource(this._url)
		}else{
		this._object.DoPlay()
		}
	};

RadioTime.playerReal.prototype._stop=function(){
	this._object.DoStop()
	};
	
RadioTime.playerReal.prototype._pause=function(){
	this._object.DoPause()
	};
	
RadioTime.playerReal.prototype._setVolume=function(a){
	this._object.SetVolume(a)
	};
	
RadioTime.playerReal.prototype._setPosition=function(a){
	this._object.SetPosition(a*this._object.GetLength()/100)
	};
	
RadioTime.playerReal.prototype._getDuration=function(){
	return this._object.GetLength()/1000
	};
	
RadioTime.playerReal.prototype._statusText={
	0:"Stopped",
	1:"Contacting",
	2:"Buffering",
	3:"Playing",
	4:"Paused",
	5:"Seeking	"
};

RadioTime.playerReal.prototype._getStatus=function(b){
	var a=0;
	b=(b!=undefined)?b:this._object.GetPlayState();
	switch(b){
		case 0:case 4:
			a=1;
			break;
		case 3:
			a=3;
			break;
		case 1:case 2:case 5:
			a=2;
			break;
		default:
			a=0
			}
			return({
		code:a,
		nativeText:this._statusText[b],
		sender:this
	})
	};
	
RadioTime.playerReal.prototype._getNowPlaying=function(){
	return(this._object.GetTitle())
	};
	
RadioTime.playerReal.prototype._getBitrate=function(){
	return(this._object.GetBandwidthCurrent())
	};
	
RadioTime.playerReal.prototype._ontimer=function(){
	if((this._tick%4==0)&&(this.__getInternalStatus().code>1)&&(this.getStatus().code==1)){
		if(this._object.CanPlay()){
			this._object.DoPlay()
			}
			RadioTime.log.add("real: Trying to start playing")
		}
		if(this.getStatus().code===3&&this._scriptable){
		this._loaded=100;
		this._pos=100*this._object.GetPosition()/this._object.GetLength()
		}
	};

RadioTime.playerReal.prototype._getError=function(){
	if(this._object.GetLastErrorUserString()!==""){
		var a={
			code:this._object.GetLastErrorUserCode(),
			text:this._object.GetLastErrorUserString()
			};
			
		return a
		}else{
		return{
			code:0,
			text:RadioTime.locale.unknownError
			}
		}
};

RadioTime.playerReal.prototype._create=function(d){
	var c=null;
	var b=document.createElement("div");
	b.style.position="absolute";
	RadioTime._container.appendChild(b);
	if(RadioTime.ua.browser!=="ie"){
		if(RadioTime.ua.isTypeSupported("audio/x-pn-realaudio-plugin")){
			if(d!==undefined){
				d=' autostart="true" src="'+d+'"'
				}else{
				d=""
				}
				b.innerHTML='<embed width="1" height="1" id="radiotime_real_player" type="audio/x-pn-realaudio-plugin" '+d+' SCRIPTCALLBACKS="OnPlayStateChange,OnErrorMessage"></embed>'
			}
		}else{
	b.innerHTML='<object width="1" height="1" id="radiotime_real_player" classid="clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA"><param name="AUTOSTART" value="false"></object>'
	}
	c=b.childNodes[0];
RadioTime._container.innerHTML;
try{
	this._scriptable=(c.GetVersionInfo()!=undefined)
	}catch(f){}
	if(this._scriptable){
	c.SetWantErrors(true)
	}
	return c
};

RadioTime.playerSilverlight=function(){
	this._delayed=true;
	RadioTime.playerSilverlight.baseConstructor.call(this,"silverlight");
	this._media_error=null
	};
	
RadioTime.extend(RadioTime.playerSilverlight,RadioTime.player);
RadioTime.playerSilverlight.prototype._play=function(){
	this._media_error=null;
	if(!this._paused){
		this.__object.Source=this._url.replace("listen.stream","listen.asx")
		}else{
		this.__object.play()
		}
	};

RadioTime.playerSilverlight.prototype._stop=function(){
	this.__object.stop()
	};
	
RadioTime.playerSilverlight.prototype._pause=function(){
	this.__object.pause()
	};
	
RadioTime.playerSilverlight.prototype._setVolume=function(a){
	this.__object.Volume=a/100
	};
	
RadioTime.playerSilverlight.prototype._setPosition=function(b){
	var a=this.__object.Position;
	a.Seconds=b*this.__object.NaturalDuration.Seconds/100;
	this.__object.Position=a
	};
	
RadioTime.playerSilverlight.prototype._getDuration=function(){
	return this.__object.NaturalDuration.Seconds
	};
	
RadioTime.playerSilverlight.prototype._ontimer=function(){
	if(this.getStatus().code===3){
		this._loaded=this.__object.DownloadProgress*100;
		this._pos=100*this.__object.Position.Seconds/this.__object.NaturalDuration.Seconds
		}
	};

RadioTime.playerSilverlight.prototype._getStatus=function(){
	var a=0,b="";
	if(!this.__object){
		a=2;
		b="Initializing..."
		}else{
		switch(this.__object.CurrentState){
			case"Buffering":case"Opening":
				a=2;
				break;
			case"Playing":
				a=3;
				break;
			case"Stopped":case"Paused":case"Closed":
				a=1;
				break;
			case"Error":
				a=4;
				break;
			default:
				a=0
				}
				b=this.__object.CurrentState
		}
		return({
		code:a,
		nativeText:b,
		sender:this
	})
	};
	
RadioTime.playerSilverlight.prototype._getNowPlaying=function(){
	if(!this._isPlaying){
		return""
		}
		if(this.__object.Attributes.getItemByName("Title")){
		return(this.__object.Attributes.getItemByName("Title").value)
		}else{
		return""
		}
	};

RadioTime.playerSilverlight.prototype._getError=function(){
	if(this._media_error){
		return this._media_error
		}else{
		return{
			code:0,
			text:RadioTime.locale.unknownError
			}
		}
};

RadioTime.playerSilverlight.prototype._media_error_handle=function(b,a){
	this._media_error={
		code:a.errorCode,
		text:a.errorMessage
		}
	};

RadioTime.playerSilverlight.prototype._create=function(d){
	var c=null;
	var e;
	if(RadioTime.ua.browser==="safari"){
		e='<embed type="application/x-silverlight" id="'+this.getId()+'" width="1" height="1" source="#radiotime_xaml" onError="__slError_rt" onLoad="__slLoad_rt"/>'
		}else{
		e='<object type="application/x-silverlight" id="'+this.getId()+'" width="1" height="1"  data="data:,"><param name="source" value="#radiotime_xaml"/><param name="onError" value="__slError_rt"/><param name="onLoad" value="__slLoad_rt"/></object>'
		}
		var b=document.createElement("div");
	b.style.position="absolute";
	RadioTime._container.appendChild(b);
	b.innerHTML=e;
	RadioTime._container.innerHTML;
	c=b.firstChild;
	var f=this;
	window.__slError_rt=function(h,g){
		f._media_error_handle(h,g);
		RadioTime.event.raise("onerror","silverlight")
		};
		
	window.__slOpened_rt=function(h,g){
		if(f.__object.CurrentState=="Stopped"){
			f.__object.stop()
			}
		};
	
window.__slLoad_rt=function(h,g){
	RadioTime.log.add("Silverlight is ready");
	setTimeout(function(){
		f.__object=f._object.content.findName("media");
		f.__object.AddEventListener("MediaOpened","__slOpened_rt");
		f._delayed=false
		},200)
	};
	
this._scriptable=true;
return c
};

RadioTime.playerVLC=function(){
	RadioTime.playerVLC.baseConstructor.call(this,"vlc")
	};
	
RadioTime.extend(RadioTime.playerVLC,RadioTime.player);
RadioTime.playerVLC.prototype._play=function(){
	if(this._paused){
		if(this._ax){
			this._object.playlist.togglePause()
			}else{
			this._object.play()
			}
			return
	}
	if(this._ax){
		if(this._object.playlist.isPlaying){
			this._object.playlist.stop()
			}
			if(this._object.playlist.items.count){
			this._object.playlist.items.clear()
			}
			this._object.playlist.add(this._url);
		var b=this;
		setTimeout(function(){
			b._object.playlist.play();
			b.getStatus()
			},300)
		}else{
		try{
			this._object.stop();
			this._object.clear_playlist()
			}catch(a){}
		this._object.add_item(this._url);
		var b=this;
		setTimeout(function(){
			b._object.play()
			},300)
		}
	};

RadioTime.playerVLC.prototype._stop=function(){
	if(this._ax){
		if(this._object.playlist.isPlaying){
			this._object.playlist.stop()
			}
		}else{
	this._object.stop()
	}
};

RadioTime.playerVLC.prototype._pause=function(){
	if(this._ax){
		if(this._object.playlist.isPlaying){
			this._object.playlist.togglePause()
			}
		}else{
	this._object.pause()
	}
};

RadioTime.playerVLC.prototype._setVolume=function(a){
	if(this._ax){
		this._object.audio.volume=a
		}else{
		this._object.set_volume(2*a)
		}
	};

RadioTime.playerVLC.prototype._setPosition=function(a){
	if(this._ax){
		if(this._object.input.length){
			this._object.input.time=a*this._object.input.length/100
			}
		}else{
	this._object.seek(this._object.get_length()*a/100)
	}
};

RadioTime.playerVLC.prototype._getDuration=function(){
	if(this._ax){
		return this._object.input.length
		}else{
		return this._object.get_length()
		}
	};

RadioTime.playerVLC.prototype._ontimer=function(){
	if(this.getStatus().code==3){
		this._loaded=100;
		if(this._ax){
			if(this._object.input.length){
				this._pos=100*this._object.input.time/this._object.input.length
				}
				if(this._object.log){
				var b=this._object.log.messages;
				if(b.count){
					var e=0;
					for(var a=b.iterator();a.hasNext;){
						var d=a.next();
						if(d.name=="main"&&d.type=="input"){
							RadioTime.log.add(d.name+"|"+d.type+"|"+d.message);
							if(d.message.indexOf("'Title'")>0){
								this.__nowPlaying=this._parseLogVar(d.message,"Title")
								}else{
								if(d.message.indexOf("'Now Playing'")>0){
									this.__nowPlaying=this._parseLogVar(d.message,"Now Playing")
									}
								}
						}
					e++;
					if(e>100){
						break
					}
				}
				delete a;
		b.clear()
		}
	}
}else{
	if(typeof this._object.get_position!=="undefined"){
		this._pos=this._object.get_position()
		}
	}
}
};

RadioTime.playerVLC.prototype._parseLogVar=function(d,b){
	var c=d.indexOf(b);
	if(c<0){
		return""
		}
		var a=d.substring(c+b.length+5,d.length-1);
	return a
	};
	
RadioTime.playerVLC.prototype._statusText={
	0:"Stopped",
	1:"Opening",
	2:"Buffering",
	3:"Playing",
	4:"Paused",
	5:"Stopping",
	6:"Forward",
	7:"Backward",
	8:"Ended",
	9:"Error"
};

RadioTime.playerVLC.prototype._getStatus=function(){
	var b=1,a="Stopped";
	if((this._ax&&(this._object.Playing||this._object.playlist.isPlaying))||(!this._ax&&this._object.isplaying())){
		b=3;
		a="Playing";
		if(this.__getInternalStatus().code<3){
			b=this.__getInternalStatus().code
			}
		}
	if(this._object.input!=undefined){
	a=this._object.input.state;
	switch(a){
		case 1:case 5:case 6:case 7:case 2:
			b=2;
			break;
		case 3:
			b=3;
			break;
		case 0:case 8:case 4:
			b=1;
			break;
		case 9:
			b=4;
			if(this.__getInternalStatus().code>2){
			RadioTime.event.raise("onerror","vlc")
			}
			break;default:
	}
}
return({
	code:b,
	nativeText:this._statusText[a],
	sender:this
})
};

RadioTime.playerVLC.prototype._getError=function(){
	if(false&&this._ax){
		var d=RadioTime.locale.unknownError;
		if(this._object.log){
			var b=this._object.log.messages;
			if(b.count){
				var f=0;
				for(var a=b.iterator();a.hasNext;){
					var e=a.next();
					if(e.severity===1){
						d=e.message;
						break
					}
					f++;
					if(f>100){
						break
					}
				}
				delete a;
			b.clear()
			}
		}
	return{
	code:1000,
	text:d
}
}else{
	return{
		code:1000,
		text:RadioTime.locale.unknownError
		}
	}
};

RadioTime.playerVLC.prototype._getNowPlaying=function(){
	if((this._ax&&(this._object.Playing||this._object.playlist.isPlaying))||(!this._ax&&this._object.isplaying())){
		return this.__nowPlaying==undefined?"":this.__nowPlaying
		}else{
		return""
		}
	};

RadioTime.playerVLC.prototype._create=function(d){
	var c=null;
	var f;
	if(RadioTime.ua.browser!=="ie"){
		if(d===undefined){
			f='<embed id="'+this.getId()+'" type="application/x-vlc-plugin" version="VideoLAN.VLCPlugin.2" width="1" height="1" autoplay="no" loop="no" hidden="yes"/>'
			}else{
			f='<embed id="'+this.getId()+'" type="application/x-vlc-plugin" version="VideoLAN.VLCPlugin.2" width="1" height="1" autoplay="yes" loop="no" hidden="yes" target="'+d+'"/>'
			}
		}else{
	if(d===undefined){
		f='<object id="'+this.getId()+'" classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921" width="1" height="1"  events="True"><param name="MRL" value="" /><param name="ShowDisplay" value="False" /><param name="AutoLoop" value="False" /><param name="AutoPlay" value="False" /></object>'
		}else{
		f='<object id="'+this.getId()+'" classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921" width="1" height="1"  events="True"><param name="MRL" value="'+d+'" /><param name="ShowDisplay" value="False" /><param name="AutoLoop" value="False" /><param name="AutoPlay" value="True" /></object>'
		}
	}
var b=document.createElement("div");
b.style.position="absolute";
RadioTime._container.appendChild(b);
b.innerHTML=f;
RadioTime._container.innerHTML;
c=b.firstChild;
if(!c){
	return false
	}
	try{
	if(c.VersionInfo!==undefined&&c.input.state!==undefined){
		this._ax=true;
		if(c.log){
			c.log.verbosity=3
			}
			this._scriptable=true;
		RadioTime.log.add("Nice! VLC plugin supports new interface");
		RadioTime.log.add("Version: "+c.VersionInfo)
		}else{
		RadioTime.log.add("VLC plugin doesn't support new interface","warning");
		try{
			c.get_volume();
			this._scriptable=true
			}catch(g){}
	}
}catch(g){
	RadioTime.log.add("VLC plugin probabaly malfunctions","warning")
	}
	return c
};

RadioTime.playerQT=function(){
	RadioTime.playerQT.baseConstructor.call(this,"quicktime");
	this._waiting=false
	};
	
RadioTime.extend(RadioTime.playerQT,RadioTime.player);
RadioTime.playerQT.prototype._play=function(){
	this._object.SetAutoPlay(true);
	this._object.SetURL(this._url);
	this._waiting=true;
	this._noerror=true
	};
	
RadioTime.playerQT.prototype._stop=function(){
	this._object.Stop()
	};
	
RadioTime.playerQT.prototype._setVolume=function(a){
	this._object.SetVolume(255*a/100)
	};
	
RadioTime.playerQT.prototype._getStatus=function(){
	var a=0;
	switch(this._object.GetPluginStatus()){
		case"Complete":
			if(this._isPlaying){
			a=3;
			break
		}
		case"Waiting":case"Playable":
			a=1;
			break;
		case"Loading":case"Complete, Connecting":case"Complete, Buffering":case"Complete, Loading...":case"Complete, Buffering...":case"Complete, getting info":case"Complete, Negotiating":
			a=2;
			break;
		default:
			a=4
			}
			return({
		code:a,
		nativeText:this._object.GetPluginStatus(),
		sender:this
	})
	};
	
RadioTime.playerQT.prototype._ontimer=function(){
	if(this._waiting&&(this.getStatus().nativeText=="Complete"||this.getStatus().nativeText==="Playable")){
		this._object.Play();
		this._waiting=false
		}
		if((this._tick%4==0)&&(this.__getInternalStatus().code>1)&&(this.getStatus().nativeText==="Waiting")){
		try{
			this._object.Play();
			RadioTime.log.add("quicktime: Trying to restart")
			}catch(a){
			RadioTime.log.addException(this,a,"_play")
			}
		}
	if(this.getStatus().nativeText&&(this.getStatus().nativeText.indexOf("Error")>-1||this.getStatus().nativeText.indexOf(", -")>-1)){
	if(this._noerror){
		RadioTime.event.raise("onerror","quicktime")
		}
		this._noerror=false
	}else{
	this._noerror=true
	}
};

RadioTime.playerQT.prototype._getNowPlaying=function(){
	return(this._object.GetMovieName())
	};
	
RadioTime.playerQT.prototype._getBitrate=function(){
	return 0
	};
	
RadioTime.playerQT.prototype._getError=function(){
	if(this._object.GetPluginStatus().indexOf("Error")>-1){
		var a={
			code:this._object.GetPluginStatus().match(/Error:([\d.+]*)/)[1],
			text:this._object.GetPluginStatus()
			};
			
		return a
		}else{
		return{
			code:0,
			text:RadioTime.locale.unknownError
			}
		}
};

RadioTime.playerQT.prototype._create=function(d){
	var c=null;
	var b=document.createElement("div");
	b.style.position="absolute";
	RadioTime._container.appendChild(b);
	if(RadioTime.ua.browser!=="ie"){
		if(d!=undefined){
			d=' src="'+d+'"'
			}else{
			d=""
			}
			b.innerHTML='<embed width="1" height="1" id="'+this.getId()+'" type="video/quicktime" '+d+' autoplay="true" enablejavascript="true" postdomevents="true"></embed>'
		}else{
		b.innerHTML='<object width="1" height="1" id="'+this.getId()+'" classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"><param name="autoplay" value="true"/><param name="enablejavascript" value="true"/><param name="postdomevents" value="true"/></object>'
		}
		c=b.lastChild;
	RadioTime._container.innerHTML;
	try{
		c.GetPluginStatus();
		this._scriptable=true
		}catch(f){}
	return c
	};
	
RadioTime.playerFlash=function(a){
	this._ver9plus=!!a;
	this._delayed=true;
	RadioTime.playerFlash.baseConstructor.call(this,(this._ver9plus?"flash9":"flash8"));
	this._media_status=0;
	this._media_playing="";
	this.useDirect=false
	};
	
RadioTime.extend(RadioTime.playerFlash,RadioTime.player);
RadioTime.playerFlash.prototype._play=function(){
	this._media_status=0;
	if(this.useDirect){
		RadioTime.log.add("Using direct URL: "+this._url);
		this._object.playDirectUrl(this._url)
		}else{
		this._object.playUrl(this._url)
		}
	};

RadioTime.playerFlash.prototype._stop=function(){
	this._object.doStop();
	this._media_playing=""
	};
	
RadioTime.playerFlash.prototype._pause=function(){
	this._object.doPause()
	};
	
RadioTime.playerFlash.prototype._setPosition=function(b){
	var a=this._object.getDuration();
	if(a){
		this._object.setPosition(b*a/100)
		}
	};

RadioTime.playerFlash.prototype._getDuration=function(){
	return this._object.getDuration()/1000
	};
	
RadioTime.playerFlash.prototype._setVolume=function(a){
	this._object.setVolume(a)
	};
	
RadioTime.playerFlash.prototype._getStatus=function(){
	var a="";
	switch(this._media_status){
		case 1:
			a="Stopped";
			break;
		case 2:
			a="Loading";
			if(this._loaded>0){
			a+=" "+this._loaded+"%"
			}
			break;
		case 3:
			a="Playing";
			break;
		case 4:
			a="Error";
			break;
		default:
			a="Unknown"
			}
			return({
		code:this._media_status,
		nativeText:a,
		sender:this
	})
	};
	
RadioTime.playerFlash.prototype._getError=function(){
	if(this._object.getLastError()){
		return{
			code:0,
			text:this._object.getLastError()
			}
		}else{
	return{
		code:0,
		text:RadioTime.locale.unknownError
		}
	}
};

RadioTime.playerFlash.prototype._getNowPlaying=function(){
	return this._media_playing
	};
	
RadioTime.playerFlash.prototype._media_status_handle=function(a){
	this._media_status=a
	};
	
RadioTime.playerFlash.prototype._create=function(e){
	var d=null,c="";
	if(e!==undefined){
		e=escape(e);
		c='"file='+e+"&autostart=true&objectid="+this.getId()+'"'
		}else{
		c='"autostart=true&objectid='+this.getId()+'"'
		}
		var f;
	var g=this._ver9plus?RadioTime.flashV3Url:RadioTime.flashV2Url;
	if(RadioTime.ua.browser!=="ie"){
		f='<embed id="'+this.getId()+'" type="application/x-shockwave-flash" width="1" height="1" src="'+g+'" allowscriptaccess="always"  flashvars='+c+"/>"
		}else{
		f='<object id="'+this.getId()+'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1" height="1"><param name="allowScriptAccess" value="always" /><param name="movie" value="'+g+'" /><param name="flashvars" value='+c+"/></object>"
		}
		var b=document.createElement("div");
	RadioTime._container.appendChild(b);
	b.style.position="absolute";
	b.innerHTML=f;
	RadioTime._container.innerHTML;
	d=b.firstChild;
	if(!d){
		return false
		}
		var h=this;
	RadioTime.event.subscribe("flashevent",function(a){
		if(h.getId()!=a.objectid){
			return
		}
		switch(a.command){
			case"status":
				h._media_status_handle(a.arg);
				if(a.arg==4){
				RadioTime.event.raise("onerror",h.name)
				}
				break;
			case"progress":
				h._loaded=a.arg;
				break;
			case"position":
				h._pos=a.arg;
				break;
			case"nowplaying":
				h._media_playing=a.arg;
				break;
			case"ready":
				RadioTime.log.add("flash object is ready");
				h._delayed=false;
				break
				}
				if(a.command!="position"){
			RadioTime.log.add(a.command+" "+a.arg)
			}
		});
if(RadioTime.players[this.name].version.scriptable){
	this._scriptable=true
	}
	return d
};

RadioTime.getUpdate=function(d,a,c){
	var b={
		command:d,
		arg:a,
		objectid:c
	};
	
	RadioTime.event.raise("flashevent",b)
	};
	
RadioTime.playerHTML5=function(){
	RadioTime.playerHTML5.baseConstructor.call(this,"html5")
	};
	
RadioTime.extend(RadioTime.playerHTML5,RadioTime.player);
RadioTime.playerHTML5.prototype._play=function(){
	if(!this._object.paused||this._object.readyState===0||!this._object.src){
		RadioTime.log.add("Start playback of "+this._url);
		this._object.src=this._url;
		this._object.load();
		this._object.play()
		}else{
		RadioTime.log.add("Paused. Resume playback");
		this._object.play()
		}
	};

RadioTime.playerHTML5.prototype._stop=function(){
	this._object.pause()
	};
	
RadioTime.playerHTML5.prototype._pause=function(){
	this._object.pause()
	};
	
RadioTime.playerHTML5.prototype._setVolume=function(a){
	this._object.volume=a/100
	};
	
RadioTime.playerHTML5.prototype._setPosition=function(a){
	if(this._object.seekable){
		this._object.currentTime=a*this._object.duration/100
		}
	};

RadioTime.playerHTML5.prototype._getDuration=function(){
	return this._object.duration
	};
	
RadioTime.playerHTML5.prototype._getStatus=function(c){
	var a=0,b="";
	switch(this._media_state){
		case"pause":case"ended":case"stopped":
			a=1;
			break;
		case"stalled":case"suspend":case"playing":
			a=3;
			break;
		case"loadstart":case"waiting":case"seeking":
			a=2;
			break;
		case"error":
			a=4;
			break;
		default:
			a=0
			}
			return({
		code:a,
		nativeText:this._media_state,
		sender:this
	})
	};
	
RadioTime.playerHTML5.prototype._getError=function(){
	var a="";
	var b=this._object.error?this._object.error.code:0;
	switch(b){
		case 1:
			a="Stopped by user";
			break;
		case 2:
			text="Network error";
			break;
		case 3:
			text="Can't decode audio";
			break;
		case 4:
			text="Unsupported media format";
			break;
		default:
			text="Unknown error"
			}
			return{
		code:b,
		text:text
	}
};

RadioTime.playerHTML5.prototype._update_media_state=function(a){
	RadioTime.log.add("html5: "+a+" "+this._object.src);
	this._media_state=a
	};
	
RadioTime.playerHTML5.prototype._create=function(e){
	var d=null;
	var c=document.createElement("div");
	c.style.position="absolute";
	RadioTime._container.appendChild(c);
	var b=new Audio();
	b.id="radiotime_html5_player";
	c.appendChild(b);
	d=c.childNodes[0];
	var f=this;
	d.addEventListener("error",function(){
		f._update_media_state("error");
		RadioTime.event.raise("onerror","html5")
		},true);
	d.addEventListener("playing",function(){
		f._update_media_state("playing")
		},true);
	d.addEventListener("pause",function(){
		f._update_media_state("pause")
		},true);
	d.addEventListener("ended",function(){
		f._update_media_state("ended")
		},true);
	d.addEventListener("abort",function(){
		f._update_media_state("abort")
		},true);
	d.addEventListener("loadstart",function(){
		f._update_media_state("loadstart")
		},true);
	d.addEventListener("seeking",function(){
		f._update_media_state("seeking")
		},true);
	d.addEventListener("waiting",function(){
		f._update_media_state("waiting")
		},true);
	d.addEventListener("suspend",function(){
		f._update_media_state("suspend")
		},true);
	d.addEventListener("stalled",function(){
		f._update_media_state("stalled")
		},true);
	this._scriptable=true;
	return d
	};
	
RadioTime.playerIFrame=function(){
	RadioTime.playerIFrame.baseConstructor.call(this,"iframe")
	};
	
RadioTime.extend(RadioTime.playerIFrame,RadioTime.player);
RadioTime.playerIFrame.prototype._create=function(c){
	var b=null;
	if(c!==undefined){
		if(!this._stream.CanFrame){
			RadioTime.manualResize=true;
			try{
				window.resizeTo(8+this._stream.FrameWidth,60+this._stream.FrameHeight)
				}catch(f){}
			setTimeout(function(){
				RadioTime.controls.detach()
				},200);
			return
		}
		b=document.createElement("iframe");
		b.id=this.getId();
		var d=window.innerWidth;
		if(this._stream.FrameWidth>0){
			d=this._stream.FrameWidth
			}
			var a=300;
		if(this._stream.FrameHeight>0){
			a=this._stream.FrameHeight
			}
			b.style.width=(this._stream.FrameWidth>0)?this._stream.FrameWidth+"px":"100%";
		b.style.height=(this._stream.FrameHeight>0)?this._stream.FrameHeight+"px":"300px";
		b.style.border="0";
		window.resizeTo(d+20,a+62);
		b.onload=function(){
			RadioTime.log.add("iframe onload")
			};
			
		RadioTime._customContainer.appendChild(b);
		b.src=c
		}else{
		return false
		}
		this._scriptable=false;
	return b
	};
	
RadioTime.playerLink=function(){
	RadioTime.playerLink.baseConstructor.call(this,"link")
	};
	
RadioTime.extend(RadioTime.playerLink,RadioTime.player);
RadioTime.playerLink.prototype._create=function(b){
	var a=null;
	if(b!==undefined){
		a=document.createElement("a");
		a.innerHTML="Launch "+this._stream.Bandwidth+"kb "+this._stream.MediaType+" stream with local media player";
		a.style.margin="10px";
		a.style.display="block";
		a.style.textDecoration="underline";
		RadioTime._customContainer.appendChild(a);
		a.href=b;
		a.target="_blank"
		}else{
		return false
		}
		this._scriptable=false;
	return a
	};
	
RadioTime.addHandler("radiotime_windows_player","Error()","RadioTime.event.raise('onerror', 'windows');");
RadioTime.addHandler("radiotime_real_player","OnErrorMessage()","RadioTime.event.raise('onerror', 'real');");
document.write('<script type="text/xaml" id="radiotime_xaml"><?xml version="1.0"?><Canvas xmlns="http://schemas.microsoft.com/client/2007" xmlns:x="http://schemas.microsoft.com/winfx/2006/xaml"><MediaElement x:Name="media" AutoPlay="true" Width="1" Height="1"/></Canvas><\/script>');
document.write("<style>#radiotime-debug-log {font-family: Tahoma;width: 350px;font-size: 12px;padding: 4px;border: 1px black solid;position: absolute; top: 42px; right: 0px; background:#fff}#radiotime-debug-log a {padding: 2px;}#radiotime-debug-log div{margin-bottom: 2px;}#radiotime-debug-log-content {border-top: 1px gray solid;overflow-y: scroll; height: 400px;}#radiotime-debug-log-content div span {margin-right: 10px;}.radiotime-log-info span {color: gray;}.radiotime-log-warning span {background: yellow;}.radiotime-log-error span {color: white;background: red;}</style>");
function OnErrorMessage(){
	RadioTime.event.raise("onerror","real");
	RadioTime.log.add("Caught RealPlayer error","error")
	}
	function OnDSErrorEvt(){
	RadioTime.event.raise("onerror","windows");
	RadioTime.log.add("Caught WMP error","error")
	}
	function OnPlayStateChange(b,a){
	RadioTime.log.add("OnPlayStateChange: "+b+", "+a);
	if(RadioTime.currentPlayer==="real"){
		RadioTime.event.raise("onstatechange",a,RadioTime.getPlayer())
		}
	}
function OnDSPlayStateChangeEvt(a){
	RadioTime.log.add("OnDSPlayStateChangeEvt: "+a);
	if(RadioTime.currentPlayer==="windows"){
		RadioTime.event.raise("onstatechange",a,RadioTime.getPlayer())
		}
	}
RadioTime.inArray=function(a,c){
	for(var b in a){
		if(a[b]==c){
			return true
			}
		}
	return false
};

RadioTime.log={
	create:function(){
		this._object=document.createElement("div");
		this._object.id="radiotime-debug-log";
		document.body.appendChild(this._object);
		this._object.innerHTML='<div>Debug log <a href="#" onclick="RadioTime.log.show(false); return false;">Hide</a> <a href="#" onclick="RadioTime.log.clear(); return false;">Clear</a></div><div id="radiotime-debug-log-content"></div>';
		this.add("log created");
		if(!RadioTime.debug){
			this.show(false)
			}
		},
add:function(e,c){
	if(!RadioTime.debug){
		return
	}
	if(c===undefined){
		c="info"
		}
		var b=document.createElement("div");
	b.className="radiotime-log-"+c;
	this._object.lastChild.appendChild(b);
	var d=new Date();
	d=d.toTimeString().split(" ")[0]+"."+((d.getMilliseconds()/1000).toFixed(3)).split(".")[1];
	b.innerHTML="<span>"+d+"</span> "+e;
	b.scrollIntoView()
	},
addException:function(c,b,a){
	if(b.description!==undefined){
		b=b.description
		}
		this.add(c.name+"."+a+" failed with "+b,"error")
	},
clear:function(){
	this._object.lastChild.innerHTML=""
	},
show:function(a){
	if(a){
		this._object.style.display="block"
		}else{
		this._object.style.display="none"
		}
	}
};

RadioTime.secondsToString=function(f,d){
	if(f==0){
		return"0h, 0m"
		}
		var a=Math.floor((f/3600));
	var e=Math.floor((f%3600)/60);
	var g=Math.floor(f%60);
	var c="";
	var b=", ";
	if(a>1){
		c+=a+" hours"
		}else{
		if(a===1){
			c+="1 hour"
			}
		}
	if(e>1){
	if(c){
		c+=b
		}
		c+=e+" minutes"
	}else{
	if(e===1){
		if(c){
			c+=b
			}
			c+="1 minute"
		}
	}
if(d){
	if(g>1){
		if(c){
			c+=b
			}
			c+=g+" seconds"
		}else{
		if(e===1){
			if(c){
				c+=b
				}
				c+="1 second"
			}
		}
}else{
	if(a===0&&e===0){
		c="Less than 1 minute"
		}
	}
return c
};

RadioTime.sizeOf=function(c){
	if(typeof c==="object"){
		if(c.length!==undefined){
			return c.length
			}
			var b=0;
		for(var d in c){
			b++
		}
		return b
		}
		return 0
	};
	
RadioTime.parseUrlString=function(b){
	b+="&";
	if(b.indexOf("?")>-1){
		b=b.split("?")[1]
		}
		var a={};
	
	var c=/([^=&]+)=([^&]+)&/ig;
	var d=c.exec(b);
	while(d){
		a[d[1].toLowerCase()]=d[2];
		d=c.exec(b)
		}
		return a
	};
	
if(typeof RadioTime==="undefined"){
	alert("Please include tunerCore.js above this code")
		}
		RadioTime.wizardHelper={
	formatAlternate:function(a){
		return a.replace("{0}",RadioTime.AlternateName)
		},
	noAlternateAvailable:function(){
		return !RadioTime.AlternateId
		},
	notPlaying:function(){
		return !RadioTime.getPlayer()||RadioTime.getPlayer().getStatus().code!=3
		},
	playing:function(){
		return RadioTime.getPlayer()&&RadioTime.getPlayer().getStatus().code==3
		},
	onDemand:function(){
		return RadioTime.onDemand
		}
	};

RadioTime.tuner={
	_dH:-1,
	_dW:-1,
	_streamComment:"",
	_isPlaying:false,
	_wallVisible:true,
	_queuedLogo:"",
	_logoEditable:false,
	init:function(){
		this.vol=RadioTime.defaultVolume;
		this.parseUrl();
		if(RadioTime.tunerHeightAdjustment!==0){
			try{
				window.resizeBy(0,RadioTime.tunerHeightAdjustment)
				}catch(a){}
		}
		setTimeout(function(){
		RadioTime.$show("longer")
		},10000);
	RadioTime.event.subscribe("notice",function(c){
		RadioTime.log.add("Notice: "+c.text);
		RadioTime.log.add('Suggestion: <a href="'+c.link+'">'+c.recommendation+"</a>");
		RadioTime.$show("notice");
		RadioTime.$("notice").innerHTML=""+c.text+'  <a onclick="RadioTime.tuner.openUrl(this.href); return false;" href="'+c.link+'">'+c.recommendation+"</a>";
		RadioTime.$("tunerPlayControls").className+="noticeShown";
		try{
			window.resizeBy(0,30)
			}catch(d){}
	});
RadioTime.init(RadioTime.$("tunerDisplay"),RadioTime.$("customTunerDisplay"));
	this.volumeControl=new RadioTime.slider(RadioTime.L("volume"),RadioTime.L("volumeChange"));
	this.volumeControl.init(RadioTime.$("volume-cover"),RadioTime.$("volume-position"),function(c){
	return RadioTime.controls.setVolume(c)
	});
document.body.onkeydown=RadioTime.$("volume-cover").onkeydown;
	this.positionControl=new RadioTime.slider("Position");
	this.positionControl.init(RadioTime.$("tracker-cover"),RadioTime.$("tracker-position"),function(c){
	return RadioTime.controls.setPosition(c)
	});
this.wizard=new RadioTime.wizard();
	this.wizard.init(RadioTime.$("tunerWizard"),RadioTime.$("wizardPage"),RadioTime.$("wizardPageTitle"),RadioTime.$("wizardOptions"),RadioTime.$("wizardDisplay"));
	this.wizard.loadData(this.wizardData);
	RadioTime.event.subscribe("wizardopen",function(){
	RadioTime.tuner.autoSize()
	});
RadioTime.event.subscribe("wizardclose",function(){
	RadioTime.tuner.autoSize()
	});
RadioTime.event.subscribe("beforewizardshowpage",function(c){
	RadioTime.log.add("Showing "+c)
	});
RadioTime.event.subscribe("wizardshowpage",function(){
	RadioTime.tuner.autoSize()
	});
RadioTime.event.subscribe("onplaystatechange",function(c){
	if(RadioTime.tuner._isPlaying&&(c.code<2)){
		c.code=2;
		c.nativeText=RadioTime.L("initializing.dot")
		}
		RadioTime.$("playbackStatus").innerHTML="<strong>"+RadioTime.playState[c.code]+"</strong>  "+RadioTime.tuner._streamComment;
	RadioTime.$("playbackStatus").title=RadioTime.players[RadioTime.currentPlayer].fullName+" ("+c.nativeText+") "+RadioTime.getPlayer().getNowPlaying();
	RadioTime.tuner.autoSize();
	RadioTime.$hide("error");
	switch(c.code){
		case 0:case 3:
			RadioTime.$show("pause");
			RadioTime.$hide("play");
			RadioTime.$hide("loading");
			RadioTime.$hide("installHint");
			break;
		case 2:
			RadioTime.$hide("pause");
			RadioTime.$hide("play");
			RadioTime.$show("loading");
			break;
		default:
			RadioTime.$hide("pause");
			RadioTime.$show("play");
			RadioTime.$hide("loading");
			RadioTime.$hide("installHint");
			if(RadioTime.onDemand){
			RadioTime.$("playbackStatus").innerHTML="Paused: "+RadioTime.tuner._streamComment
			}
			break
		}
		});
RadioTime.event.subscribe("badstreamstate",function(c){
	if(c.severity>0&&!RadioTime.onDemand){
		RadioTime.$show("installHint");
		RadioTime.$("playbackStatus").innerHTML=RadioTime.players[RadioTime.currentPlayer].fullName+" ("+c.status.nativeText+")"
		}else{
		RadioTime.$("installHint").innerHTML="";
		RadioTime.$hide("installHint")
		}
	});
var b=function(){
	RadioTime.$("installHint").innerHTML=""
	};
	
RadioTime.event.subscribe("onplay",function(c){
	b.call(this);
	RadioTime.tuner.autoSize();
	if(c.stream.MediaType==="HTML"){
		RadioTime.$show("tryNextEXT");
		RadioTime.$hide("tunerActions");
		RadioTime.$hide("tunerDisplay")
		}else{
		if(RadioTime.getPlayer().name==="link"){
			RadioTime.$hide("tryNextEXT");
			RadioTime.$hide("pause");
			RadioTime.$hide("play");
			RadioTime.$hide("loading");
			RadioTime.$hide("tunerDisplay");
			RadioTime.$show("tunerActions")
			}else{
			RadioTime.$hide("tryNextEXT");
			RadioTime.$show("tunerDisplay");
			RadioTime.$show("tunerActions");
			RadioTime.$("tunerWrapper").style.height="";
			RadioTime.$("tunerWrapper").style.width="";
			RadioTime.tuner.enableManualResize(false);
			RadioTime.tuner.autoSize()
			}
		}
	if(c.stream&&(c.stream.Type==="OnDemand"||c.stream.Type==="Download")&&RadioTime.getPlayer().isSeekable()){
	RadioTime.$show("tracker-wrapper")
	}else{
	RadioTime.$hide("tracker-wrapper")
	}
	if(c.stream.Reliability<70&&c.stream.Reliability>5){
	RadioTime.tuner._streamComment=RadioTime.L("streamUnreliable");
	RadioTime.$("playbackStatus").className+=" streamUnreliable"
	}else{
	if(c.stream.Reliability>=70){
		RadioTime.tuner._streamComment=RadioTime.L("reliableFor",c.stream.Reliability)
		}else{
		RadioTime.tuner._streamComment=""
		}
	}
});
RadioTime.event.subscribe("progress",function(c){
	if(!RadioTime.onDemand){
		return
	}
	RadioTime.$("tracker-cover").style.width=Math.round(0.01*c*RadioTime.$("tracker-wrapper").offsetWidth)+"px"
	});
RadioTime.event.subscribe("position",function(d){
	if(!RadioTime.onDemand){
		return
	}
	RadioTime.$("tracker-position").style.width=Math.round(0.01*d*RadioTime.$("tracker-wrapper").offsetWidth)+"px";
	var c=RadioTime.getPlayer().getRemainingTime();
	if(c){
		RadioTime.$("onNowRemaining").innerHTML=RadioTime.secondsToString(c,true)+" remaining"
		}else{
		RadioTime.$("onNowRemaining").innerHTML=""
		}
	});
RadioTime.event.subscribe("onnomorestreams",function(){
	b.call(this);
	if(RadioTime.controls.tryRaw()){
		return
	}
	if(RadioTime.tuner.wizard.isOpen()){
		RadioTime.tuner.wizard.showScreen("nomorestreams");
		return
	}
	if(!RadioTime.controls.tryAlternateStation()){
		RadioTime.event.raise("cantplay","");
		RadioTime.tuner.wizard.open("nomorestreams")
		}
	});
RadioTime.event.subscribe("ondataready",function(c){
	document.title=c.Title+" - "+RadioTime.L("radioTimeTuner");
	if(RadioTime.ua.browserName==="IE 6.0"){
		RadioTime.$("tunerLogoImg").src=c.Logo.replace("q.png",".gif")
		}else{
		RadioTime.$("tunerLogoImg").src=c.Logo
		}
		RadioTime.$("tunerLogoImg").alt=c.Title;
	RadioTime.$("tunerLogoImg").title=RadioTime.L("seeMoreDetailAbout",c.Title);
	RadioTime.$("tunerTitle").innerHTML='<a id="stationLink" href="#">'+c.Title+"</a>";
	setTimeout(RadioTime.tuner.enableUpdateLogo,20000);
	RadioTime.$("stationGenre").innerHTML=c.Genre;
	RadioTime.$("stationLocation").innerHTML=c.Location;
	RadioTime.$("stationLink").onclick=function(){
		RadioTime.tuner.openUrl(c.Url);
		return false
		};
		
	RadioTime.$("stationLink").title=RadioTime.L("seeMoreDetailAbout",c.Title);
	if(c.Genre&&c.Location){
		RadioTime.$show("tunerMeta")
		}
		if(c.NowPlaying.Title){
		RadioTime.tuner.handleNowPlaying(c.NowPlaying)
		}else{
		if(c.TopicTitle){
			var d=c.TopicTitle;
			d+=' <a href="#" onclick="RadioTime.tuner.refreshMetadata(); return false;">'+RadioTime.L("refresh")+"</a>";
			RadioTime.$("currentSong").innerHTML=d;
			RadioTime.$show("currentSong")
			}else{
			RadioTime.$hide("currentSong")
			}
		}
	RadioTime.$hide("splashScreen");
	RadioTime.$hide("tunerWizard");
	RadioTime.$show("tunerVolumeButton");
	RadioTime.$show("tunerPlayButton");
	RadioTime.$("pause").title=RadioTime.L("stopPlayingThis",c.Title);
	RadioTime.$("play").title=RadioTime.L("startPlayingThis",c.Title);
	RadioTime.tuner.autoSize()
	});
RadioTime.event.subscribe("onsongplayingchange",function(c){
	RadioTime.tuner.handleNowPlaying(c)
	});
RadioTime.event.subscribe("cantplay",function(c){
	RadioTime.$("cantplay").innerHTML="<strong>"+c+"</strong>";
	RadioTime.$("playbackStatus").innerHTML="";
	RadioTime.$show("error");
	RadioTime.$show("cantplay");
	RadioTime.$hide("pause");
	RadioTime.$hide("play");
	RadioTime.$hide("loading");
	RadioTime.$hide("tunerVolumeButton");
	RadioTime.$hide("tryNextEXT");
	RadioTime.$hide("tracker-wrapper");
	RadioTime.$hide("onNow");
	RadioTime.$hide("onNowRemaining");
	RadioTime.$hide("upNext")
	});
RadioTime.event.subscribe("onfaileddata",function(){
	RadioTime.log.add("Communication error","warning")
	});
RadioTime.event.subscribe("disabledplayer",function(c){
	RadioTime.$("playbackStatus").innerHTML=RadioTime.L("playerDisabled",RadioTime.players[c].fullName)+' <a href="#" onclick="RadioTime.tuner.wizard.open(\'_configure\');return false;">'+RadioTime.L("configureMediaSupport")+"</a>";
	return
});
RadioTime.event.subscribe("missingplayer",function(d){
	if(typeof d.Url==="string"){
		RadioTime.$("playbackStatus").innerHTML=RadioTime.L("requiredPlayerUnavailable")+'<a href="'+d.Url+'">'+RadioTime.L("tryAnyway")+"</a>"
		}else{
		var c=RadioTime.getInstallLink(RadioTime.unplayers[d.playerIndex]);
		if(c==="Unsupported"){
			RadioTime.tuner.wizard.open("nomorestreams");
			return
		}
		RadioTime.$("playbackStatus").innerHTML=RadioTime.L("playerMissing",RadioTime.unplayers[d.playerIndex].fullName);
		RadioTime.$("playbackStatus").innerHTML+=' <a href="#" onclick="RadioTime.tuner.openUrl(\''+c+"'); return false;\">"+RadioTime.L("install")+"</a>";
		RadioTime.$("playbackStatus").innerHTML+=' or <a href="#" onclick="RadioTime.tuner.openUrl(\''+d.stream.Url+"'); return false;\">"+RadioTime.L("tryAnyway")+"</a>."
		}
	});
RadioTime.event.subscribe("onnowdataavailable",function(c){
	RadioTime.$show("playbackDetails");
	if(c.NowPlaying){
		RadioTime.$show("onNow");
		RadioTime.$("onNow").innerHTML="<strong>"+RadioTime.L("onNow.colon")+'</strong> <a href="#" title="'+RadioTime.L("showNotOn")+'" onclick="RadioTime.tuner.openUrl(\''+c.NowPlaying.Url+"');return false;\">"+c.NowPlaying.Title+"</a>";
		RadioTime.tuner.countDown(RadioTime.$("onNowRemaining"),c.NowPlaying.SecondsRemaining);
		RadioTime.$("playbackStatus").setAttribute("class","hasShowInfo");
		if(c.NowPlaying.EpisodeTitle){
			RadioTime.$("currentSong").innerHTML=(c.NowPlaying.EpisodeTitle)+' <a href="#" onclick="RadioTime.tuner.refreshMetadata(); return false;">'+RadioTime.L("refresh")+"</a>";
			RadioTime.$show("currentSong")
			}
		}else{
	RadioTime.$hide("onNow");
	RadioTime.$hide("onNowRemaining")
	}
	if(c.NextPlaying&&c.NowPlaying&&(c.NextPlaying.SecondsToNextStart-c.NowPlaying.SecondsRemaining<3600)){
	RadioTime.$hide("onNowRemaining");
	RadioTime.$show("upNext");
	RadioTime.$("upNext").innerHTML="<strong>"+RadioTime.L("upNextIn",'<span id="onNowRemainingAlt"></span></strong>')+' <a href="#" title="'+RadioTime.L("nextShowOn")+'" onclick="RadioTime.tuner.openUrl(\''+c.NextPlaying.Url+"');return false;\">"+c.NextPlaying.Title+"</a>";
	RadioTime.tuner.countDown(RadioTime.$("onNowRemainingAlt"),c.NowPlaying.SecondsRemaining)
	}else{
	RadioTime.$hide("upNext");
	RadioTime.$show("onNowRemaining")
	}
});
if(this.parseUrl()){
	RadioTime.AutoPlay=!/ipad/i.test(RadioTime.ua.text)&&!/iphone/i.test(RadioTime.ua.text);
	this._isPlaying=RadioTime.AutoPlay;
	RadioTime.setTarget(this.programId,this.stationId,this.topicId,this.streamId)
	}else{
	RadioTime.$("playbackStatus").innerHTML="No station or program id specified"
	}
	if(RadioTime.ua.browser=="chrome"){
	setTimeout(function(){},500)
	}
},
handleNowPlaying:function(c){
	var e="",b="";
	if(c.Title){
		if(c.ArtistId){
			e='<a href="#" id="artistLink">'+c.Artist+"</a>"
			}else{
			e+=c.Artist
			}
			e+=" - "+c.Title
		}else{
		e=""
		}
		if(!e){
		RadioTime.$hide("currentSong");
		return
	}
	RadioTime.$("currentSong").innerHTML=e;
	RadioTime.$show("currentSong");
	var d=RadioTime.currentNowPlaying;
	if(!RadioTime.nowPlayingUrl){
		b+=' <a href="#" id="refreshLink" onclick="RadioTime.tuner.refreshMetadata(); return false;" class="sprite-button tiny-button black-button notext refresh"><span class="button-image"><span class="img"></span></span></a>'
		}
		if(d!==null&&(d.SongId!==""||(d.Artist!==""&&d.Title!==""))){
		var h=d.songId===undefined?0:d.SongId;
		var a=RadioTime.jsonHtml(d.Artist);
		var f=RadioTime.jsonHtml(d.Title);
		b+=' <a href="#" id="tagSong" class="sprite-button tiny-button black-button noimage _eventBind" data-options="{eventBind: { callback: function(){ collide.tagSong('+h+","+this.stationId+",'"+a+"','"+f+"','"+(APP_PATH+"myradio#taggedsongs")+"',"+true+'); } }}"><span class="button-text">Add Song</span></a>'
		}
		RadioTime.$("tunerActions").innerHTML=b;
	RadioTime.$show("tunerActions");
	var g=c.AlbumArt?c.AlbumArt:c.ArtistArt;
	if(c.ArtistId){
		RadioTime.$("artistLink").onclick=function(){
			RadioTime.tuner.openUrl(RadioTime.baseUrl+"search/?artistId="+c.ArtistId);
			return false
			};
			
		if(g){
			RadioTime.$("artistLink").onmouseover=function(){
				RadioTime.tuner.updateLogo(RadioTime.albumArtUrl+g+"q.jpg")
				}
			}
	}
if(g&&RadioTime.nowPlayingUrl){
	RadioTime.tuner.requestUpdateLogo(RadioTime.albumArtUrl+g+"q.jpg")
	}else{
	RadioTime.tuner.requestUpdateLogo(RadioTime.currentLogo)
	}
	collide.eventBind()
},
enableUpdateLogo:function(){
	if(!RadioTime.tuner._logoEditable){
		RadioTime.tuner._logoEditable=true;
		if(RadioTime.tuner._queuedLogo){
			RadioTime.tuner.updateLogo(RadioTime.tuner._queuedLogo)
			}
		}
},
requestUpdateLogo:function(a){
	if(RadioTime.tuner._logoEditable){
		RadioTime.tuner.updateLogo(a)
		}else{
		RadioTime.tuner._queuedLogo=a
		}
	},
updateLogo:function(a){
	RadioTime.tuner._logoEditable=true;
	RadioTime.tuner._queuedLogo="";
	if(RadioTime.$("tunerLogoImg").src!==a){
		RadioTime.$("tunerLogoImg").src=a
		}
	},
refreshMetadata:function(){
	RadioTime.API.tune(function(a){
		if(!a||!a.Streams){
			RadioTime.event.raise("ondatafailed");
			return
		}
		RadioTime.event.raise("ondataready",a)
		})
	},
controls:{
	play:function(){
		if(!RadioTime.controls.isPlayable()){
			RadioTime.tuner.wizard.open("nomorestreams");
			return
		}
		RadioTime.controls.play();
		RadioTime.tuner._isPlaying=true
		},
	stopOrPause:function(){
		if(RadioTime.onDemand){
			RadioTime.controls.pause()
			}else{
			RadioTime.controls.stop()
			}
			RadioTime.tuner._isPlaying=false
		},
	tryNext:function(){
		if(!RadioTime.controls.isPlayable()){
			RadioTime.tuner.wizard.open("nomorestreams");
			return
		}
		RadioTime.controls.tryNext()
		}
	},
countDown:function(b,c){
	b.innerHTML=RadioTime.secondsToString(c)+" <span>"+RadioTime.L("remaining")+"</span>";
	var a=false;
	if(this._timeRemaining===undefined){
		a=true
		}
		this._timeRemaining=1*c;
	this._updateTime=Math.round(new Date().valueOf()/1000);
	if(a){
		setTimeout(function(){
			var d=Math.round(new Date().valueOf()/1000);
			d=RadioTime.tuner._timeRemaining+(RadioTime.tuner._updateTime-d);
			delete RadioTime.tuner._timeRemaining;
			RadioTime.tuner.countDown(b,d)
			},5000)
		}
	},
fbPublish:function(c,b,a){
	if(FB){
		FB.ui({
			method:"stream.publish",
			message:"Check out "+c+" on TuneIn for Facebook!",
			attachment:{
				name:c,
				caption:"Use TuneIn to listen to "+c,
				description:(stationDescription),
					media:[{
					type:"image",
					target:"_blank",
					src:b,
					href:a
				}],
				href:a,
				target:"_blank"
			},
			action_links:[{
				text:"Listen now",
				href:a
			}],
			user_message_prompt:"Share "+c+" on Facebook with your friends!",
			target:"_blank"
		})
		}
	},
toggleWall:function(){
	if(this._wallVisible){
		RadioTime.$hide("tunerFbChat");
		window.resizeBy(-380,0)
		}else{
		RadioTime.$show("tunerFbChat");
		window.resizeBy(380,0)
		}
		this._wallVisible=!this._wallVisible
	},
toggleWizard:function(){
	this.wizard.toggle()
	},
openWizard:function(){
	this.wizard.open()
	},
wizardData:{
	screens:{
		index:{
			title:RadioTime.L("tellUsWhatsWrong"),
			options:{
				Error:{
					text:RadioTime.L("stopsDoesntWork"),
					action:"_tryAlternateStream",
					restricted:RadioTime.wizardHelper.playing
					},
				PoorAudio:{
					text:RadioTime.L("wizard.audio.poor"),
					action:"_tryAlternateStream",
					restricted:RadioTime.wizardHelper.notPlaying,
					report:true
				},
				WrongAudio:{
					text:RadioTime.L("wizard.audio.wrong"),
					action:"_tryAlternateStream",
					restricted:RadioTime.wizardHelper.notPlaying,
					report:true
				},
				WrongInfo:{
					text:RadioTime.L("infoDisplayedWrong"),
					className:"wronginfo",
					action:"_openFeedback",
					restricted:RadioTime.wizardHelper.notPlaying
					},
				Configure:{
					text:RadioTime.L("checkMediaSupport"),
					className:"configure",
					action:"_configure"
				},
				Cancel:{
					text:RadioTime.L("cancel"),
					className:"wizardCancel",
					action:"close"
				},
				Help:{
					text:RadioTime.L("help"),
					className:"wizardHelp",
					action:"_openUrl "+RadioTime.baseUrl+"support/listening-help"
					}
				}
		},
confirm:{
	title:RadioTime.L("workingNow"),
	options:{
		yes:{
			text:RadioTime.L("yes"),
			action:"close"
		},
		no:{
			text:RadioTime.L("no"),
			action:"showScreen index"
		}
	}
},
end:{
	title:RadioTime.L("thanksForReport"),
	options:{
		tellMore:{
			text:RadioTime.L("tellUsMore"),
			action:"_openFeedback"
		},
		tryAlternate:{
			text:RadioTime.L("listenToProgramOn"),
			action:"_tryAlternate",
			restricted:RadioTime.wizardHelper.noAlternateAvailable,
			format:RadioTime.wizardHelper.formatAlternate
			},
		trySimilar:{
			text:RadioTime.L("takeMeToSimilarStation"),
			action:"_trySimilar",
			restricted:RadioTime.wizardHelper.onDemand
			},
		configure:{
			text:RadioTime.L("checkMediaSupport"),
			action:"_configure"
		},
		"continue":{
			text:RadioTime.L("continue"),
			action:"close"
		}
	}
},
nomorestreams:{
	title:RadioTime.L("noPlayableStreams"),
	options:{
		tryAgain:{
			text:RadioTime.L("tryAgain"),
			action:"_reload"
		},
		tryAlternate:{
			text:RadioTime.L("listenToProgramOn"),
			action:"_tryAlternate",
			restricted:RadioTime.wizardHelper.noAlternateAvailable,
			format:RadioTime.wizardHelper.formatAlternate
			},
		trySimilar:{
			text:RadioTime.L("takeMeToSimilarStation"),
			action:"_trySimilar",
			restricted:RadioTime.wizardHelper.onDemand
			},
		Configure:{
			text:RadioTime.L("checkMediaSupport"),
			className:"configure",
			action:"_configure"
		},
		Cancel:{
			text:RadioTime.L("cancel"),
			className:"wizardCancel",
			action:"close"
		},
		Help:{
			text:RadioTime.L("help"),
			className:"wizardHelp",
			action:"_openUrl "+RadioTime.baseUrl+"support/listening-help/"
			}
		}
},
missingplayer:{
	title:RadioTime.L("noPlayerAvailable"),
	options:{
		installPlugin:{
			text:RadioTime.L("installForFree"),
			action:"_openUrl %%",
			className:"pluginInstallLink"
		},
		tryAnyway:{
			text:RadioTime.L("tryAnyway"),
			action:"_openUrl %%"
		},
		trySimilar:{
			text:RadioTime.L("takeMeToSimilarStation"),
			action:"_trySimilar",
			restricted:RadioTime.wizardHelper.onDemand
			},
		Help:{
			text:RadioTime.L("help"),
			className:"wizardHelp",
			action:"_openUrl "+RadioTime.baseUrl+"support/listening-help/"
			}
		}
}
},
customActions:{
	_tryAlternateStream:function(b){
		$("#wizardOther").css("display","none");
		this.hide();
		this.showStatus("<div class='alternate'>"+RadioTime.L("tryingAnotherStream")+"<div class='alternateloading'></div></div>");
		var c=this;
		if(RadioTime.controls.tryNext()){
			var a=RadioTime.event.subscribe("onplaystatechange",function(d){
				if(d.code===3){
					RadioTime.event.unsubscribe(a);
					c.showScreen("confirm")
					}
				})
		}else{
		this.showScreen("end")
		}
		if(b.optionData.report){
		RadioTime.API.trackListenIssue(b.option)
		}
	},
_openFeedback:function(a){
	$("#wizardOther").css("display","none");
	RadioTime.tuner.openFeedback()
	},
_openUrl:function(b,a){
	window.open(a)
	},
_tryAlternate:function(b){
	this.hide();
	$("#wizardOther").css("display","none");
	this.showStatus("<div class='alternate'>"+RadioTime.L("tryingAnotherStation")+"<div class='alternateloading'></div></div>");
	RadioTime.controls.tryAlternateStation();
	var c=this;
	var a=RadioTime.event.subscribe("onplaystatechange",function(d){
		if(d.code===3){
			RadioTime.event.unsubscribe(a);
			c.close("")
			}
		})
},
_trySimilar:function(b){
	this.hide();
	$("#wizardOther").css("display","none");
	this.showStatus("<div class='alternate'>"+RadioTime.L("tryingSimilarStation")+"<div class='alternateloading'></div></div>");
	RadioTime.controls.trySimilar();
	var c=this;
	var a=RadioTime.event.subscribe("onplaystatechange",function(d){
		if(d.code===3){
			RadioTime.event.unsubscribe(a);
			c.close()
			}
		})
},
_configure:function(b){
	$("#wizardOther").css("display","none");
	this.setTitle(RadioTime.L("mediaSupportOnComputer"));
	var a="<p>"+RadioTime.L("useTunerPlayers")+"</p>";
	if(RadioTime.sizeOf(RadioTime.unplayers)!=0){
		a+=" "
		}
		this._options.innerHTML=a;
	this._options.innerHTML+='<div class="mediaPlayerList">';
	this._options.innerHTML+="<h3>"+RadioTime.L("installed")+"</h3>";
	RadioTime.configuration.render(this._options,"installed");
	this._options.innerHTML+="<h3>"+RadioTime.L("recommended")+"</h3>";
	if(!RadioTime.configuration.render(this._options,"recommended")){
		this._options.removeChild(this._options.lastChild)
		}
		this._options.innerHTML+="<h3>"+RadioTime.L("optional.cap")+"</h3>";
	if(!RadioTime.configuration.render(this._options,"optional")){
		this._options.removeChild(this._options.lastChild)
		}
		this._options.innerHTML+='<a href="#" onclick="saveAndClose(); return false" class="saveAndClose">'+RadioTime.L("saveAndClose")+"</a>";
	this._options.innerHTML+="</div>"
	},
_reload:function(a){
	RadioTime.controls.reload();
	this.close()
	}
}
},
parseUrl:function(){
	var c=location.href.toString();
	var b=RadioTime.parseUrlString(c);
	if(b.debug!=undefined){
		RadioTime.debug=true
		}else{
		RadioTime.debug=false
		}
		if(b.play!==undefined){
		c=b.play.split(",");
		try{
			this.programId=isNaN(c[0])?"":c[0];
			this.stationId=isNaN(c[1])?"":c[1];
			this.topicId=isNaN(c[2])?"":c[2];
			this.streamId=isNaN(c[3])?"":c[3]
			}catch(a){
			return false
			}
			return true
		}else{
		if(b.stationid!==undefined){
			this.stationId=b.stationid
			}
			if(b.programid!==undefined){
			this.programId=b.programid
			}
			if(b.topicid!==undefined){
			this.topicId=b.topicid
			}
			if(b.streamid!==undefined){
			this.streamId=b.streamid
			}
			return true
		}
		return false
	},
addFavorite:function(a){
	a=RadioTime.$(a);
	RadioTime.API.addFavorite(function(){
		a.innerHTML=RadioTime.L("inRadioTimePresets")
		});
	return false
	},
openFeedback:function(){
	this.openUrl(RadioTime.API.makeUrl("contact/resolve/"))
	},
openUrl:function(a){
	if(a.indexOf("http://")<0&&a.indexOf("https://")<0){
		a=RadioTime.baseUrl+a
		}
		try{
		if(window.opener&&window.opener.rtFocus){
			try{
				window.opener.location=a;
				window.opener.rtFocus()
				}catch(b){
				RadioTime.log.addException("openUrl",b,"url:"+a)
				}
			}else{
		window.open(a,"_new")
		}
	}catch(b){
	window.open(a,"_new")
	}
},
enableManualResize:function(a){
	RadioTime.manualResize=a;
	if(a){
		RadioTime.$("tunerWrapper").style.width="100%";
		RadioTime.$("tunerWrapper").style.height="100%";
		RadioTime.getPlayer()._object.style.width="99%";
		window.onresize=function(){
			RadioTime.getPlayer()._object.style.height=(RadioTime.$("tunerWrapper").offsetHeight-170)+"px";
			window.status=RadioTime.$("tunerWrapper").offsetWidth+", "+RadioTime.$("tunerWrapper").offsetHeight
			}
		}else{
	window.onresize=null;
	RadioTime.$("tunerWrapper").style.width="";
	RadioTime.$("tunerWrapper").style.height=""
	}
},
autoSize:function(){
	return;
	if(RadioTime.debug||RadioTime.manualResize){
		return
	}
	if((this._dH<0||this._dW<0)){
		this.detectResizeDeltas();
		return
	}
	var a=RadioTime.$("tunerWrapper").offsetHeight;
	var b=RadioTime.$("tunerWrapper").offsetWidth;
	a+=this._dH;
	b+=this._dW;
	if(a<100||b<200){
		return
	}
	try{
		if(a!==this._windowHeight||b!==this._windowWidth){
			window.resizeTo(b,a)
			}
			this._windowWidth=b;
		this._windowHeight=a
		}catch(c){}
},
detectResizeDeltas:function(){
	if(RadioTime.ua.browser=="chrome"){
		this._dW=8;
		this._dH=60;
		return
	}
	var b=8+window.document.body.offsetWidth;
	var a=60+window.document.body.offsetHeight;
	var d=this;
	try{
		window.resizeTo(b,a);
		window.onresize=function(){
			d._dW=b-window.document.body.offsetWidth;
			d._dH=a-window.document.body.offsetHeight;
			window.onresize=null;
			setTimeout(function(){
				d.autoSize()
				},200)
			}
		}catch(c){}
},
volumeUp:function(){
	this.vol=RadioTime.controls.setVolume(this.vol+10);
	RadioTime.$("volume").innerHTML=this.vol+"%"
	},
volumeDown:function(){
	this.vol=RadioTime.controls.setVolume(this.vol-10);
	RadioTime.$("volume").innerHTML=this.vol+"%"
	},
getStationUrl:function(){
	return this.stationId?(BASE_URL+APP_PATH+"station/?StationId="+this.stationId):null
	},
getSongUrl:function(){
	var a=RadioTime.currentNowPlaying;
	return a!=null&&/\d+/.test(a.SongId)?(BASE_URL+APP_PATH+"song/?SongId="+a.SongId):null
	}
};

$(function(){
	RadioTime.tuner.init()
	});
var volumeShown=false;
var volumeTimer;
toggleVolume=function(){
	if(volumeShown){
		hideVolume()
		}else{
		showVolume()
		}
	};

showVolume=function(){
	volumeShown=true;
	$("#volume-wrapper").css("visibility","visible");
	volumeTimer=setTimeout(hideVolume,5500)
	};
	
hideVolume=function(){
	clearTimeout(volumeTimer);
	volumeShown=false;
	$("#volume-wrapper").css("visibility","hidden")
	};
	
saveAndClose=function(){
	RadioTime.tuner.wizard.close()
	};
	
RadioTime.FB={
	accessToken:null,
	fbUserId:null,
	isEnabled:false,
	isScrobblingEnabled:false,
	isTuningEnabled:false,
	successiveFails:0,
	listens:new Array(),
	tuneGraphId:null,
	reset:function(){
		this.accessToken=null;
		this.fbUserId=null;
		this.isEnabled=false;
		this.isScrobblingEnabled=false;
		this.isTuningEnabled=false;
		this.tuneGraphId=null;
		this.listens=new Array();
		this.successiveFails=0
		},
	enableForScrobbling:function(b,a){
		this.isScrobblingEnabled=this.enable(b,a);
		if(this.isScrobblingEnabled&&a&&RadioTime.currentNowPlaying!==null){
			this.postFromNowPlaying(RadioTime.currentNowPlaying)
			}
		},
enableForTuning:function(b,a){
	this.isTuningEnabled=this.enable(b);
	if(this.isTuningEnabled&&a){
		this.tune()
		}
	},
enable:function(a){
	if(a!==null&&FB){
		this.accessToken=a.access_token;
		this.fbUserId=a.uid
		}
		return this.isEnabled=true
	},
fbArgData:function(a){
	var b={
		access_token:this.accessToken
		};
		
	if(a!==null){
		if(a.SongId!==""){
			b.song=BASE_URL+APP_PATH+"song/?SongId="+a.SongId;
			b.radio_station=BASE_URL+APP_PATH+"station/?StationId="+RadioTime.tuner.stationId;
			b.created_time=this.fbIsoFormat(new Date())
			}
		}
	return b
},
fbIsoFormat:function(b){
	function a(c){
		return c<10?"0"+c:c
		}
		return b.getUTCFullYear()+"-"+a(b.getUTCMonth()+1)+"-"+a(b.getUTCDate())+"T"+a(b.getUTCHours())+":"+a(b.getUTCMinutes())
	},
logScrobble:function(a){
	if(this.listens.length==5){
		this.listens.shift()
		}
		this.listens.push(a);
	RadioTime.log.add(this.dumpAttributes(RadioTime.debug?this.listens:new Array(a)))
	},
dumpAttributes:function(a){
	var c=[];
	if(a){
		for(var b in a){
			var d=a[b];
			c.push(this.fbIsoFormat(d.startTime)+"-"+d.nowPlaying.Artist+"-"+d.nowPlaying.Title)
			}
		}
		return c.join("<br />")
},
postFromNowPlaying:function(a){
	var c=this;
	var b=this.fbArgData(a);
	if(FB&&b!==null){
		this.fbPost("/me/music.listens",b,function(d){
			c.successiveFails=0;
			c.logScrobble({
				listenId:d.id,
				startTime:new Date(),
				nowPlaying:a
			})
			},function(d){
			if(++c.successiveFails>3){
				c.isEnabled=false
				}
				RadioTime.log.add("FB publish failed: "+d.error.message)
			},function(){
			return c.isScrobblingEnabled&&RadioTime.getPlayer()
			})
		}
	},
tune:function(){
	var a=this;
	if(FB){
		this.fbPost("/me/tuneinradio:tune",{
			access_token:this.accessToken,
			radio_station:RadioTime.tuner.getStationUrl()
			},function(b){
			a.tuneGraphId=b.id;
			RadioTime.log.add("FB tune success: "+a.tuneGraphId)
			},function(b){
			RadioTime.log.add("FB tune failed: "+b)
			},function(){
			return a.isTuningEnabled&&RadioTime.getPlayer()
			})
		}
	},
fbPost:function(a,c,d,b,e){
	if(undefined!==e&&!e()){
		return
	}
	FB.api(a,"post",c,function(f){
		if(f.error!=null){
			b(f)
			}else{
			d(f)
			}
		})
},
deleteLastListen:function(){
	var b=this;
	var a=b.listens.length>0?b.listens[b.listens.length-1]:null;
	if(a&&((new Date()-a.startTime)<15000)&&FB){
		FB.api(("/"+a.listenId),"delete",{
			access_token:RadioTime.FB.accessToken
			},function(c){
			if(c.error==null){
				RadioTime.FB.listenId=-1;
				RadioTime.FB.startTime=null
				}
			})
	}
},
pauseCallback:function(a){
	RadioTime.tuner.controls.stopOrPause()
	},
statusCallback:function(a){
	FB.Music.send("STATUS",{
		playing:RadioTime.tuner._isPlaying,
		radio_station:RadioTime.tuner.getStationUrl(),
		user_id:this.fbuserId
		})
	},
resumeCallback:function(a){
	RadioTime.tuner.controls.play()
	},
playCallback:function(b){
	if(b.radio_station){
		var a=/StationId=(\d+)$/.exec(b.radio_station);
		if(a!=null&&a.length>1){
			var c=a[1];
			if(c!==RadioTime.tuner.stationId){
				RadioTime.controls.turnDial("",c)
				}else{
				RadioTime.tuner.controls.play()
				}
			}
	}
}
};

RadioTime.event.subscribe("onplaystatechange",function(c){
	if(RadioTime.FB.isScrobblingEnabled){
		var a={
			radio_station:RadioTime.tuner.getStationUrl(),
			user_id:RadioTime.FB.fbUserId
			};
			
		var b=RadioTime.tuner.getSongUrl();
		if(b){
			a.song=b
			}
			switch(parseInt(c.code)){
			case 1:
				a.playing=false;
				FB.Music.send("STATUS",a);
				break;
			case 3:
				a.playing=true;
				FB.Music.send("STATUS",a);
				break;
			case 4:
				a.playing=false;
				FB.Music.send("STATUS",a);
				break
				}
			}
});
RadioTime.event.subscribe("cantplay",function(a){
	if(RadioTime.FB.isScrobblingEnabled){
		setTimeout(function(){
			if(FB){
				FB.Music.send("STATUS",{
					error_code:4,
					redirect_url:"http://tunein.com/support/listening-help/",
					playing:false,
					user_id:RadioTime.FB.fbUserId
					})
				}
			},1000)
	}
});
RadioTime.event.subscribe("onsongplayingchange",function(a){
	if(RadioTime.FB.isScrobblingEnabled&&a!==null){
		RadioTime.FB.postFromNowPlaying(a)
		}
	});
$(window).unload(function(){
	if(RadioTime.FB.isScrobblingEnabled){
		RadioTime.FB.deleteLastListen();
		FB.Music.send("STATUS",{
			offline:true,
			user_id:RadioTime.FB.fbUserId
			})
		}
	});
