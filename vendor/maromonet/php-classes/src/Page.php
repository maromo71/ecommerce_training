<?php

namespace maromonet;

use Rain\Tpl;

class Page
{
    private $tpl;
    private $options = [];
    private $defaults = [
        "data" => []
    ];

    public function __construct($opts = array())
    {
        $this->options = array_merge($this->defaults, $opts);
        // config
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR,
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . "views-cache" . DIRECTORY_SEPARATOR,
            "debug"         => false // set to false to improve the speed
        );
       
        Tpl::configure($config);

        $this->tpl = new Tpl;

        foreach ($this->options["data"] as $key => $value) {
            $this->tpl->assign($key, $value);
        }

        $this->tpl->draw("header");
    }

    //method will be the content
    public function setTpl($name, $data = [], $returnHTML = false)
    {
        foreach ($this->options["data"] as $key => $value) {
            $this->tpl->assign($key, $value);
        }

        return $this->tpl->draw($name, $returnHTML);
    }

    public function __destruct()
    {
        $this->tpl->draw("footer");
    }
}
