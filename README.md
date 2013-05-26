Startup-USA
===========

## [List of Companies]

Instructions:
* Load crunch.php on the web server.
	> Press "Companies" to generate a list of companies
	> * please limit the amount to 5000, see "crunch.js" for more info.
	> For best way of copying the list of companies displayed on screen:
	> * install xpath for your respective browser
	> * the list of companies are wrapped in a div tag with id set to "display_all"
	> * write the following in xpath: //div[@id="display_all"]/text()
	> * copy and paste the list of companies in the box selected by xpath

* Load crunch_json.php on the web server
	> * Input the copied list of companies into the text box and press enter
	> > * the first box to the right will show the current status of the API call
	> * Upon completion, press the "JSON File" button to display the JSON data
	> * Again, use xpath to pull the data from the webpage
	> > * write the following in xpath: //div[@id="display_all"]/text()

* Future improvements
	> * Save the JSON data to file instead of to screen
	> * Compress the two step process above to a chain function calling upon completion
	> * More user friendly

* Necessary files
	> * crunch.php
	> * crunch_json.php
	> * crunch_company.php (include/crunch_company.php)
	> * crunch.js (include/js/crunch.js)
	> * all the foundation framework files (for display purposes only)

* The following files contain a list of companies and their respective data (in about 5000 companies per file)
	> * part01.json
	> * part02.json
	> * part03.json
	> * part04.json
	> * part05.json
	> * part06.json
	> * part07.json
	> * part08.json
	> * part09.json
	> * part10.json
	> * part11.json
	> * part12.json
	> > * Note: 12 files because it would take a supercomputer to load 120,000+ companies and all their data from and to a single file

## [Startup-USA Map]
* To be added...