function parseCompany(company, data) {
	if (data) {
		var parsed = JSON.parse(data);
		if (parsed.image)				document.getElementById("pic").src = "http://www.crunchbase.com/"+parsed.image.available_sizes[0][1];
		else 							document.getElementById("pic").src = "http://placehold.it/300x150&text=No Company Logo!";
		if (parsed.offices)				document.getElementById("location").innerHTML = locations(parsed.offices[0]);
		else							document.getElementById("location").innerHTML = "";
		if (parsed.email_address)		document.getElementById("email").innerHTML = parsed.email_address+"<br/><br/>";
		else							document.getElementById("email").innerHTML = "";
		if (parsed.homepage_url)		document.getElementById("link").href = parsed.homepage_url;
		else							document.getElementById("link").href = "#";
		if (parsed.name)				document.getElementById("name").innerHTML = parsed.name;
		else							document.getElementById("name").innerHTML = "";
		if (parsed.category_code)		document.getElementById("category").innerHTML = parsed.category_code;
		else							document.getElementById("category").innerHTML = "";
		if (parsed.tag_list)			document.getElementById("subcategory").innerHTML = parsed.tag_list;
		else							document.getElementById("subcategory").innerHTML = "";
		if (parsed.number_of_employees)	document.getElementById("employees").innerHTML = parsed.number_of_employees;
		else							document.getElementById("employees").innerHTML = "";
		if (parsed.description)			document.getElementById("description").innerHTML = parsed.description;
		else							document.getElementById("description").innerHTML = "";
		if (parsed.overview)			document.getElementById("overview").innerHTML = parsed.overview.replace(/<(\/?)[p]>/g, '');
		else							document.getElementById("overview").innerHTML = "";
		if (parsed.total_money_raised)	document.getElementById("money").innerHTML = parsed.total_money_raised;
		else							document.getElementById("money").innerHTML = "";
		if (parsed.funding_rounds)		document.getElementById("funders").innerHTML = funds(parsed.funding_rounds);
		else							document.getElementById("funders").innerHTML = "";
		if (parsed.relationships)		document.getElementById("relationships").innerHTML = relationships(parsed.relationships);
		else							document.getElementById("relationships").innerHTML = "";
		if (parsed.competitions)		document.getElementById("competitions").innerHTML = competitions(parsed.competitions);
		else							document.getElementById("competitions").innerHTML = "";
		document.getElementById("display_all").className = "hide";
		document.getElementById("display_search").className = "show";
	} else {
		document.getElementById("display_all").className = "show";
		document.getElementById("display_search").className = "hide";
		document.getElementById("display_all").innerHTML = "<h2>Error</h2><p>\"" + company + "\" does not exist!</p>";
	}
}