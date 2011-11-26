$(document).ready(function(){
	
	$('.username').collapser({
		target: 'next',
		effect: 'fade',
		changeText: 0,
		expandClass: 'expArrow',
		collapseClass: 'collArrow'
	});
	
	$('.question-number').collapser({
		target: 'next',
		effect: 'slide',
		changeText: 0,
		expandClass: 'expArrow',
		collapseClass: 'collArrow'
	});
	
});