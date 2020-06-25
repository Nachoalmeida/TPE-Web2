<?php
require_once 'libs/smarty/Smarty.class.php';

class SmartyInit{
    private $smarty;

    public function __construct($brands=null){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        if($brands){
        $this->smarty->assign('marcas', $brands);
        }
        $this->smarty->assign('logueo', HelperSession::access_view());
    }
    
    public function getSmarty(){
        return $this->smarty;       
    }
}