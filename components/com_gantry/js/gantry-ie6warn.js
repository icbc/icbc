/**
 * @version   3.0.3 June 12, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
 
var RokIEWarn = new Class({
	'site': 'sitename',
	'initialize': function(msg) {
		var warning = msg;
		this.box = new Element('div', {'id': 'iewarn'}).inject(document.body, 'top');
		var div = new Element('div').inject(this.box).setHTML(warning);
		
		var click = this.toggle.bind(this);
		var button = new Element('a', {'id': 'iewarn_close'}).addEvents({
			'mouseover': function() {
				this.addClass('cHover');
			},
			'mouseout': function() {
				this.removeClass('cHover');
			},
			'click': function() {
				click();	
			}
		}).inject(div, 'top');
		
		this.height = $('iewarn').getSize().size.y;
		this.fx = new Fx.Styles(this.box, {duration: 1000}).set({'top': $('iewarn').getStyle('top').toInt()});
		this.open = false;
		
		var cookie = Cookie.get('rokIEWarn'), height = this.height;
		//cookie = 'open'; // added for debug to not use the cookie value
		if (!cookie || cookie == "open") this.show();
		else this.fx.set({'top': -height});

		
		return ;
	},
	
	'show': function() {
		this.fx.start({
			'top': 0
		});
		this.open = true;
		Cookie.set('rokIEWarn', 'open', {duration: 7});
	},	
	'close': function() {
		var margin = this.height;
		this.fx.start({
			'top': -margin
		});
		this.open = false;
		Cookie.set('rokIEWarn', 'close', {duration: 7});
	},	
	'status': function() {
		return this.open;
	},
	'toggle': function() {
		if (this.open) this.close();
		else this.show();
	}
});