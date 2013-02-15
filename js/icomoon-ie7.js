/* Use this script if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-home' : '&#x21;',
			'icon-comments' : '&#x22;',
			'icon-facebook' : '&#x23;',
			'icon-twitter' : '&#x24;',
			'icon-triangle' : '&#x25;',
			'icon-triangle-2' : '&#x26;',
			'icon-triangle-3' : '&#x27;',
			'icon-locked' : '&#x28;',
			'icon-pause' : '&#x29;',
			'icon-email' : '&#x2a;',
			'icon-reddit' : '&#x2c;',
			'icon-stumbleupon' : '&#x2d;',
			'icon-tumblr' : '&#x2e;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; i < els.length; i += 1) {
		el = els[i];
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c) {
			addIcon(el, icons[c[0]]);
		}
	}
};