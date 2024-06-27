<?php
namespace Anna\Model;

use Anna\Core\Model;

// require_once("../core/model.php");
class PanierModel{
    public $fournisseur=null;
    public array $articles=[];
    public $total=0;

    public function addArticle($article,$fournisseur,$qteAppro){
        $montantArticle = $this->montantArticle($article["prixAppro"],$qteAppro);
        $key = $this->articleExiste($article);
        if ($key != -1){
            $this->articles[$key]["qteAppro"]+= $qteAppro;
            $this->articles[$key]["montantArticle"]+= $montantArticle;
        } else {
            $article["qteAppro"] = $qteAppro; 
            $article["montantArticle"] = $montantArticle;
            $this->articles[] = $article;
        }
        $this->fournisseur =$fournisseur; 
        $this->total += $montantArticle; 
    }

    public function montantArticle($prix,$qteAppro){
        return $prix* intval($qteAppro);
    }

    public function articleExiste($article):int{
        foreach( $this->articles as $key => $value){
            if( $value["id"] == $article["id"]){
                return $key;
            }
        }
        return -1;
    }

    public function clear(){
        $this->articles = [];
        $this->total = 0;
        $this->fournisseur = null;
    }
}