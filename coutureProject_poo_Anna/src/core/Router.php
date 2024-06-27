<?php
namespace Anna\core;

use Anna\Controllers\ApprovisionnementController;
use Anna\Controllers\TypeController;
use Anna\Controllers\ArticleController;
use Anna\Controllers\SecuriteController;
use Anna\Controllers\CategorieController;

class Router
{
    public static function run()
    {
        if (isset($_REQUEST["controller"])) {
            if ($_REQUEST["controller"] == "article") {
               
                $controller = new ArticleController();
            } elseif ($_REQUEST["controller"] == "type") {
               
                $controller = new TypeController();
            } elseif ($_REQUEST["controller"] == "categorie") {
                
                $controller = new CategorieController();
            } elseif ($_REQUEST["controller"] == "appro") {
                
                $controller = new ApprovisionnementController();
            }elseif ($_REQUEST["controller"] == "login") {
                
                $controller = new SecuriteController();
            } else {
               
                $controller = new ArticleController();
            }
        } else {
            
            $controller = new SecuriteController();
        }
    }
}


