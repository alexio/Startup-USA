//@author: Hua Yang

var jsonObj = [];

/*
 * Helper method for parsing the JSON data.
 * This will display all the companies currently listed in Crunchbase database.
 * 
 * Note: Try to list only 5000 companies at a time. So change the parameters for the for loop.
 */
function parseALL(data) {
	var text = '<div class="large-12 columns">', index;
	if (data) {
		var parsed = JSON.parse(data);
		// Change the parameters for the amount of companies which will display on screen.
		// i.e. n = 0, n < 5000 :: for 5000 companies then increment the next call to
		//      n = 5000, n < 10000 :: for the next 5000 companies
		for (var n = 0; n < parsed.length; n++) {
			index = n + 1;
			text += '<p>' + parsed[n].name + ',</p>';
		}
		text += '</div>';
	} else {
		text += '<h2>ERROR</h2><p>Sorry, it did not work</p><p>Try clicking again or refreshing the page!</p></div>';
	}
	document.getElementById('display_all').innerHTML = text;
}

/*
 * Simple AJAX call to a local php file call 'crunch_all.php',
 *  which will utilize the php cURL to communicate with Crunchbase API.
 */
function showall(name) {
	document.getElementById('display_search').className = 'hide';
	document.getElementById('display_all').className = 'show';
	document.getElementById('display_all').innerHTML = '<div class="large-12 columns"><h2>Powered by CrunchBase API</h2><p>This usually takes a while. Please be patient.</p><p>There are only about:</p><ul><li>122,094 companies and counting.</li><li>9,226 Financial Organizations and countint.</li><li>23,761 Products and counting.</li><li>5,682 Service Providers and counting.</li></div>';
	document.getElementById('pic').src = 'http://placehold.it/300x150&text=CrunchBase API';
	document.getElementById('location').innerHTML = '';
	document.getElementById('email').innerHTML = '';
	$.ajax({
		type: 'POST',
		url: 'include/crunch_all.php',
		data: { entity:name },
		success: function(data)	{	parseALL(data);	}
	});
}
