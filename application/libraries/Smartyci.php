<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smartyci extends Smarty
{
    public function __construct()
    {
        parent::__construct();
        
        $this->caching = 0;
        
        $this->setTemplateDir( VIEWPATH );
        
        $this->setCompileDir( APPPATH.'third_party/smarty/templates_c' );
        
        $this->setConfigDir( APPPATH.'third_party/smarty/configs' );

        $this->addPluginsDir( APPPATH.'libraries/smarty/plugins' );

        $this->setCaching(Smarty::CACHING_OFF);

        $this->clearAllCache(3600);

        $this->clearCompiledTemplate(null, null, 10);

        $this->clearCompiledTemplate();
    }
}