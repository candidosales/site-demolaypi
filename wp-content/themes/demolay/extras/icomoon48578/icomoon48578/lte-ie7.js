/* Use this script if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-play' : '&#xe001;',
			'icon-wordpress' : '&#xe008;',
			'icon-twitter' : '&#xe00a;',
			'icon-facebook' : '&#xe00b;',
			'icon-html5' : '&#xe00c;',
			'icon-file-excel' : '&#xe00d;',
			'icon-file-word' : '&#xe00e;',
			'icon-file-pdf' : '&#xe00f;',
			'icon-pencil' : '&#xe010;',
			'icon-file' : '&#xe000;',
			'icon-phone' : '&#xe003;',
			'icon-mail' : '&#xe004;',
			'icon-calendar' : '&#xe005;',
			'icon-book' : '&#xe006;',
			'icon-file-powerpoint' : '&#xe007;',
			'icon-locked' : '&#xe009;',
			'icon-clock' : '&#xe002;',
			'icon-location' : '&#xe011;',
			'icon-mobile' : '&#xe012;'
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
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};