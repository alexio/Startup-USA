var me = "t";
function readJSON(){
	$.getJSON('part_one.json', function(data){
		var i;
		for(i = 0; i < data.length; i++){

			var j;
			for(j = 0; j < data[i].offices.length; j++){
				console.log("Try i: " + i + " j: " + j);
				upCords(data[i].offices[j].latitude, data[i].offices[j].longitude);
			}
		}
	});
}