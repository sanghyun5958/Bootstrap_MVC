# Bootstrap_MVC


## Screenshot

![WIFI_Infobank_screenshot](./WIFI_Infobank_screenshot.jpg)

## About project

I designed UI mockups and implemented end-to-end web applications using the CodeIgniter MVC framework and bootstrap front-end framework;

```
## Built With

* [PHP MVC Framework](https://codeigniter.com/) - Dependency Management
* [CodeIgniter Web Framework](https://codeigniter.com/) - The web framework used
* [Bootstrap](http://bootstrapk.com/) - Used to generate RSS Feeds
```
URL : http://wifiinfobank.unapcict.org



### PHP MVC Framework - Model

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Topic extends CI_Controller {
    function index(){
        $this->load->view('head');
        $this->load->view('main');
        $this->load->view('footer');
    }
    function get($id){
        $this->load->view('head');
        $this->load->view('get', array('id'=>$id));
        $this->load->view('footer');
    }
}
?>
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

### PHP MVC Framework - View

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```php
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Topic extends CI_Controller {
    function index(){
        $this->load->view('head');
        $this->load->view('main');
        $this->load->view('footer');
    }
    function get($id){
        $this->load->view('head');
        $this->load->view('get', array('id'=>$id));
        $this->load->view('footer');
    }
}
?>
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

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

