<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Hua Yang" />
    <title>Companies</title>
    
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
            	<form>
                <fieldset>
                <legend>Show All</legend><br/>
                <div class="row"><div class="large-12 columns">
                	<label>Companies</label>
                    <a class="button success expand" href="javascript:showall('companies')">Companies</a>
                	<label>Financial Organizations</label>
                    <a class="button success expand" href="javascript:showall('financial-organizations')">Finances</a>
                	<label>Products</label>
                    <a class="button success expand" href="javascript:showall('products')">Products</a>
                	<label>Service Providers</label>
                    <a class="button success expand" href="javascript:showall('service-providers')">Services</a><br/>
                </div></div>
                </fieldset>
                </form>
            </div>
        </div>
        </div>
        
        <div class="large-9 small-9 columns">
        <div class="panel scroll-main">
            <div id="display_search" class="hide">
                <fieldset>
                    <legend>Name</legend>
                    <div id="name"></div>
                </fieldset>
                <fieldset>
                    <legend>Category</legend>
                    <div id="category"></div>
                </fieldset>
                <fieldset>
                    <legend>Sub-category</legend>
                    <div id="subcategory"></div>
                </fieldset>
                <fieldset>
                    <legend>Number of Employees</legend>
                    <div id="employees"></div>
                </fieldset>
                <fieldset>
                    <legend>Employees</legend>
                    <div id="relationships"></div>
                </fieldset>
                <fieldset>
                    <legend>Description</legend>
                    <div id="description"></div>
                </fieldset>
                <fieldset>
                    <legend>Overview</legend>
                    <div id="overview"></div>
                </fieldset>
                <fieldset>
                    <legend>Money Raised</legend>
                    <div id="money"></div>
                </fieldset>
                <fieldset>
                    <legend>Funders</legend>
                    <div id="funders"></div>
                </fieldset>
                <fieldset>
                    <legend>Competitions</legend>
                    <div id="competitions"></div>
                </fieldset>
            </div>
            <div id="display_all">
            	<div class="large-12 columns">
                <h2>Powered by CrunchBase API</h2>
                <p>Current features:</p>
                <ul>
                	<li>Search by Company's name</li>
                    <li>Display current companies listed in CrunchBase database</li>
                    <li>Display current financial organizations listed in CrunchBase database</li>
                    <li>Display current products listed in CrunchBase database</li>
                    <li>Display current service providers listed in CrunchBase database</li>
                </ul>
                <p>More features to come later!</p>
                </div>
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
    <script src="include/js/crunch.js"></script>
</body>
</html>
