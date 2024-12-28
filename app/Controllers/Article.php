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

        //pager initialize
        $pager = \Config\Services::pager();

        //get current page number
        $uri = service('uri'); 
        $get_query = $uri->getQuery();
        parse_str($get_query, $output);
        $current_page_number = isset($output['page_article']) ? $output['page_article'] : 1;
        $number_per_page = 2;
        $offset = ($current_page_number - 1) * $number_per_page;

        $data = array(
            'articles' => $articleModel->paginate($number_per_page, 'article'),
            'pager'     => $articleModel->pager,
            'offset' => $offset
        );

        return view('home', $data);
    }
}
