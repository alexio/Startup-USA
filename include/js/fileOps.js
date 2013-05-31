
//Function to read a JSON File
function readJSON(){
	$.getJSON('part01.json', function(data){
		var i;
		for(i = 0; i < data.length; i++){

			var j;
			for(j = 0; j < data[i].offices.length; j++){
				console.log("Try i: " + i + " j: " + j);
				//alert(data[i].images.available_sizes.[0][1])
				upCords(data[i].offices[j].latitude, data[i].offices[j].longitude, data[i].name);
			}
		}
	});
}