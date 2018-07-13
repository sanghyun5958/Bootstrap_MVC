
## Screenshot - Women ICT Frontier Initiative InfoBank

![WIFI_Infobank_screenshot](./WIFI_Infobank_screenshot.jpg)

## The purpose of the project

To promote the events launched in 8 different countries and share e-learning ICT courses for female entrepreneurs in Asia and the Pacific.



## My part of the project

* *Model-View-Controller (MVC) Design Pattern for PHP* - I developed the web applications based on MVC pattern.
* *Front-end web UI Framework* -  I designed 
* *Photoshop* -  Used to generate RSS Feeds 

URL : http://wifiinfobank.unapcict.org


## Programming code description
### PHP MVC Framework - Controller

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Materials extends CI_Controller {
	function __construct(){
	  parent::__construct();
        $this -> load -> database();
        $this -> load -> model('board_m');
        $this -> load -> helper(array('url', 'date'));

	}
	
	function index(){
	}
	
 	public function _remap($method) {
           // header include
        	$this -> load -> view('header');
 
        	if (method_exists($this, $method)) {
         	   $this -> {"{$method}"}();
        		}
 
         // footer include
      		$this -> load -> view('footer');
    	}
 	
	function training_module(){
		$this->load->view('training_module');
	}
	function mobile_learning(){
		$this->load->view('mobile_learning');
	}
		function dica(){
		$this->load->view('dica');
	}
}
?>

```


### PHP MVC Framework - Model

```php
 
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

 
class Board_m extends CI_Model {
    function __construct() {
        parent::__construct();
    }
 
    function get_list($table = 'ci_board') {
        $sql = "SELECT * FROM ".$table." ORDER BY board_id DESC";
        $query = $this -> db -> query($sql);
        $result = $query -> result();
        // $result = $query->result_array();
 
        return $result;
    }
 
}

```


### PHP MVC Framework - View (Bootstrap)

```html
		<div class="col-lg-12 col-md-12 col-sm-12">
    		  <p>WIFI Suhuruliya modules are available in audiobook for .... </p>
      	......
                   <div class="panel-group accordion" id="accordion">
                       <div class="panel panel-default">
                           <div class="panel-heading">
                               <h4 class="panel-title">
                                   <a data-toggle="collapse" data-parent="#accordion" href="#collapse01">
                                       <i class="switch fa fa-plus"></i>
                                      Language : English
                                   </a>
                               </h4>
                           </div>
                          <div id="collapse01" class="panel-collapse collapse">
                               <div class="panel-body" ><b>Book 1 (...) 
                             </b></div>  <div><audio controls>
                              <source src="/static/lib/bootstrap/mp3/Book_English_1.mp3" type="audio/mpeg" />
				......			
				</div>
                        </div>
                    </div>

```
xxx

```html
<div class="col-md-12">
              <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
                
                <!-- Carousel items -->
                <div class="carousel-inner carousel-zoom">
                  <div class="active item">
                    <img class="img-responsive" src="/static/lib/bootstrap/img/home-bg-1.jpg">
                  </div>
                  <div class="item">
                    <img class="img-responsive" src="/static/lib/bootstrap/img/home-bg-2.jpg">
                    <div class="carousel-caption"></div>
                  </div>

```

xxx

```html
<!-- Navigation -->
	<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    		<div class="container-fluid">
    			
    			<div class="navbar-header page-scroll">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a href="/main/"><img src="/static/lib/bootstrap/img/logo.jpg"></a>
    			</div>
    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				<ul class="nav navbar-nav navbar-right ">
    					<li>
    						<a href="/main/">HOME</a>
    					</li>
    					<li class="dropdown">
    						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ABOUT<span class="caret"></span></a>
    						<ul class="dropdown-menu" role="menu">
    							<li>
    								<a href="/about/aboutus/">What is WIFI? </a>
    							</li>
    							<li class="divider"></li>
    							<li>
    								<a href="/about/aboutus_2/">What is WIFI InfoBank?</a>
    							</li>
    							<li class="divider"></li>
    						</ul>
    					</li>

```


## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system



## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc

