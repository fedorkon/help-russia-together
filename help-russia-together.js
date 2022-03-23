document.addEventListener('DOMContentLoaded', function() {
	let body = document.getElementsByTagName('body')[0];
	let div  = document.createElement('div');
	div.id = 'hrt_output_css_overlay';
	div.innerHTML = '<span title="' + hrt_options.text + '" >' + hrt_options.hashtag + '</span>';
	document.body.insertBefore(div, body.firstChild);
});
