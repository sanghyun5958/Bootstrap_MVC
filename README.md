# Bootstrap_MVC


## Screenshot

![WIFI_Infobank_screenshot](./WIFI_Infobank_screenshot.jpg)

## About project

I designed UI mockups and implemented end-to-end web applications using the CodeIgniter MVC framework and bootstrap front-end framework;


## Built With

* *PHP MVC Framework* - Dependency Management 
* *CodeIgniter Web Framework* - The web framework used
* *Bootstrap* -  Used to generate RSS Feeds 

URL : http://wifiinfobank.unapcict.org


## Programming code description
### PHP MVC Framework - Controller

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Materials extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('xx_model');
	}
	
	function index(){
	}
	
 	   /**
     	* 사이트 헤더, 푸터가 자동으로 추가된다.
     	*/
 	public function _remap($method) {
           // 헤더 include
        	$this -> load -> view('header');
 
        	if (method_exists($this, $method)) {
         	   $this -> {"{$method}"}();
        		}
 
         // 푸터 include
      		$this -> load -> view('footer');
    	}
 	
	function training_module(){
		$this->load->view('training_module');
	}
	function mobile_learning(){
		$this->load->view('mobile_learning');
	}
		function dica(){
		$this->load->view('head');
		$this->load->view('dica');
		$this->load->view('footer');
	}
}
?>

```

And there are more php files by category

```php
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *  게시판 메인 컨트롤러
 */
 
class Board extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this -> load -> database();
        $this -> load -> model('board_m');
        $this -> load -> helper(array('url', 'date'));
    }
 
    /**
     * 주소에서 메서드가 생략되었을 때 실행되는 기본 메서드
     */
    public function index() {
        $this -> lists();
    }
 
    /**
     * 사이트 헤더, 푸터가 자동으로 추가된다.
     */
    public function _remap($method) {
        // 헤더 include
        $this -> load -> view('header_v');
 
        if (method_exists($this, $method)) {
            $this -> {"{$method}"}();
        }
 
        // 푸터 include
        $this -> load -> view('footer_v');
    }
 
    /**
     * 목록 불러오기
     */
    public function lists() {
        $data['list'] = $this -> board_m -> get_list();
        $this -> load -> view('board/list_v', $data);
    }
 
}

```

### PHP MVC Framework - Model

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```php
 
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
/**
 * 공통 게시판 모델
 */
 
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

And there are more php files by category

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Materials extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('xx_model');
	}
	function index(){
	}
	function training_module(){
		$this->load->view('head');
		$this->load->view('training_module');
		$this->load->view('footer');
	}
	function mobile_learning(){
		$this->load->view('head');
		$this->load->view('mobile_learning');
		$this->load->view('footer');
	}
		function dica(){
		$this->load->view('head');
		$this->load->view('dica');
		$this->load->view('footer');
	}
}
?>

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

