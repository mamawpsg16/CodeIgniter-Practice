<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'third_party/smarty/libs/Smarty.class.php');

class SmartyLibrary extends Smarty {

function __construct() {
    parent::__construct();

    // Define directories, used by Smarty:
    $this->setTemplateDir(APPPATH . 'views/templates');
    $this->setCompileDir(APPPATH . 'views/templates_c');
    // $this->setCacheDir(APPPATH . 'cache/smarty_cache');
    if ( ! is_writable( $this->compile_dir ) )
        {
            // make sure the compile directory can be written to
            @chmod( $this->compile_dir, 0777 );
        } 
}


}