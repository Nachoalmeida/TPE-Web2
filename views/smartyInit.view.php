<?php

require_once 'libs/Smarty.class.php';

class SmartyInit{
    private $smarty;

    public function __construct($brands){
        $this->smarty = new Smarty();
        $this->smarty -> assign('base_url', BASE_URL);
        $this->smarty -> assign('marcas', $brands);

    }
    public function getSmarty() {

        return $this->smarty;
        
    }
}