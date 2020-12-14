<?php

class Renderer
{
    //render(articles/show)
    public static function render(string $path, $variables=[]) 
    {
        extract($variables); // ex: $article=$article qu'on a recu en param i.e. $query->fetchAll()
        ob_start();
        require('templates/'.$path.'.html.php');
        $pageContent = ob_get_clean();

        require('templates/layout.html.php');

    }

}