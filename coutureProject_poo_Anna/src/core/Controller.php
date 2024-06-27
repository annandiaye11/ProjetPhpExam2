<?php
namespace Anna\Core;

use Anna\Core\Session;


class Controller
{
    protected string $layout;
    public function __construct(string $layout) {
        $this->layout = $layout;
        Session::open();
    }
    public function render($view, $data = array()) {
        ob_start();
        extract($data);
        require_once ("../views/$view.html.php");
        $contentView = ob_get_clean();
        require_once ("../views/layout/$this->layout.layout.php");
    }
}
