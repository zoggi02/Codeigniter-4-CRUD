<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Article as ArticleModel;


class Article extends Seeder
{
    public function run()
    {
        $data = [
            'article_title' => 'The Flying Dutchman',
            'article_content' => 'The Flying Dutchman (Dutch: De Vliegende Hollander) is a legendary ghost ship, allegedly never able to make port, but doomed to sail the sea forever.',
            'article_status'    => 'active',
        ];

        $ArticleModel = new ArticleModel();
        $ArticleModel->insert($data);
    }
}
