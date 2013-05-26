<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Hua Yang" />
    <title>Companies to JSON</title>
    
    <link rel='stylesheet' href='include/css/normalize.css' />
    <link rel='stylesheet' href='include/css/foundation.css' />
    <script src='include/js/vendor/custom.modernizr.js'></script>
</head>
<body>
    <!-- Top Navigation Bar -->
    <div class="fixed">
    <div class="contain-to-grid">
    <nav class="top-bar">
    <ul class="title-area">
        <li class="name"><h1><a>[Startup-USA: Company Search]</a></h1></li>
        <!-- Mobile Title -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Startup-USA</span></a></li>
    </ul>
    </nav>
    </div>
    </div>
    
    <br/><br/><br/><br/>
    
    <div class="row">
        <div class="large-3 small-3 columns">
        <div class="section-container vertical-nav" data-section>
        	<div class="large-12 columns section"><br/>
                <a id="link" href="#"><img id="pic" src="http://placehold.it/300x150&text=CrunchBase API"></a>
                <div id="location"></div>
                <div id="email"></div>
            </div>
            <div class="large-12 columns section">
                <div class="row"><div class="large-12 columns">
                <form action="javascript:crunpany()">
                <fieldset>
                <legend>Search Companies</legend><br/>
                    <label>Company's Name</label>
                    <input type="text" id="company" name="company" placeholder="Enter company's name" />
                </fieldset>
                </form>
                </div></div>
            </div>
            <div class="large-12 columns section">
            	<form>
                <fieldset>
                <legend>JSON Converter</legend><br/>
                <div class="row"><div class="large-12 columns">
                	<label>Save To JSON File</label>
                    <a class="button success expand" href="javascript:tojson()">JSON File</a><br/>
                </div></div>
                </fieldset>
                </form>
            </div>
        </div>
        </div>
        
        <div class="large-2 small-2 columns">
        <div class="panel scroll-main">
        	<pre>
            <div id="display_count">
            </div>
            </pre>
        </div>
        </div>
        
        <div class="large-7 small-7 columns">
        <div class="panel scroll-main">
            <div id="display_all">
            </div>
        </div>
        </div>
    </div>
    
	<!-- Copyright Section -->
    <hr/>
    <div id="copyright">
    <div class="row">
        <div class="large-12 small-12 columns">
            <p>&copy; 2013 Hua Yang</p>
        </div>
    </div>
    </div>
    <!-- Imported JavaScript Files -->
    <script>document.write('<script src=' + ('__proto__' in {} ? 'include/js/vendor/zepto' : 'include/js/vendor/jquery') + '.js><\/script>')</script>
    <script type="text/javascript" src="include/js/foundation.min.js"></script>
    <script>$(document).foundation();</script>
    
    <script>
	var jsonObj = [];
	var count = 0;
	var limit = 0;
	
    /*
     * Helper function for parsing the JSON data,
     *  incrementing the global 'count' value displayed on screen.
     */
	function parseCompany(company, data) {
		count++;
		var ptag = document.createElement("p");
		ptag.innerHTML = count + "/" + limit;
		document.getElementById("display_count").appendChild(ptag);
		if (data) {
			var parsed = JSON.parse(data);
            // Only grab companies with less than or equal to 500 employees
			if (!parsed.number_of_employees || parsed.number_of_employees <= 500) {
				jsonObj.push(data);
			}
		}
	}
	
    /*
     * Upon called, the funtion will display the JSON data on the screen, 
     *  wrapped in a div tag with id set to "display_all"
     */
	function tojson() {
		var convertedObj = JSON.stringify(jsonObj);
		document.getElementById("display_all").innerHTML = '{' + jsonObj + '}';
		/*
		console.log(jsonObj);
		$.ajax({
			type : "POST",
			url : 'json.php',
			dataType : 'json', 
			data : { json:JSON.stringify(jsonObj) }
		});
		*/
	}
	
    /*
     * Given the list of companies, separated by commas,
     *  the function will attempt to make AJAX calls to Crunchbase API for each company.
     * 
     * Note: limit the list of companies to 5000 at a time,
     *  otherwise the amount of data being pulled from Crunchbase will cause serious lag.
     */
    function crunpany() {
		var companies = document.getElementById("company").value;
		var carray = companies.split(",");
		var company;
		limit = carray.length;
		
		for (var i = 0; i < carray.length; i++) {
			company = carray[i];
			$.ajax({
				type: "POST",
				url: "include/crunch_company.php",
				data: { name: company },
				success: function(data)	{	
					parseCompany(company, data);	
				}
			});
		}
	}
	</script>
</body>
</html>
