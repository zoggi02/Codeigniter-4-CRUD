<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Article as ArticleModel;

class Article extends BaseController
{
    public function index()
    {
        //model initialize
        $articleModel = new ArticleModel();

        $data = array(
            'articles' => $articleModel->findAll(),
        );

        return view('home', $data);
    }
}
