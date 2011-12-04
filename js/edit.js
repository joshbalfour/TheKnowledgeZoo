// adapted from: http://docs.jquery.com/Tutorials:Edit_in_Place_with_Ajax
Event.observe(window, 'load', init, false);
function init() {
	EditInPlace.defaults['type'] = 'text';
	EditInPlace.defaults['save_url'] = 'php/edit_eip.php';
	EditInPlace.makeEditable({ id: '1' });
	EditInPlace.makeEditable({ id: '2' });
	EditInPlace.makeEditable({ id: '3' });
	EditInPlace.makeEditable({ id: '4' });
	EditInPlace.makeEditable({ id: '5' });
	EditInPlace.makeEditable({ id: '6' });
	EditInPlace.makeEditable({ id: '7' });
	EditInPlace.makeEditable({ id: '8' });
	EditInPlace.makeEditable({ id: '9' });
	EditInPlace.makeEditable({ id: '10' });
	EditInPlace.makeEditable({ id: '11' });
	EditInPlace.makeEditable({ id: '12' });
	EditInPlace.makeEditable({ id: '13' });
	EditInPlace.makeEditable({ id: '14' });
	EditInPlace.makeEditable({ id: '15' });
	EditInPlace.makeEditable({ id: '16' });
	EditInPlace.makeEditable({ id: '17' });
	EditInPlace.makeEditable({ id: '18' });
	EditInPlace.makeEditable({ id: '19' });
	EditInPlace.makeEditable({ id: '20' });
	EditInPlace.makeEditable({ id: 'title' });
	EditInPlace.makeEditable({ id: 'subtitle' });

}