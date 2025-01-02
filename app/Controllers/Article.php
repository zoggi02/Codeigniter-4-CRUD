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

    /**
     * delete function
     */
    public function delete($id)
    {
        //model initialize
        $articleModel = new ArticleModel();

        // get data with parameter id
        $article = $articleModel->find($id);

        if($article) {
            // delete data with parameter id
            $articleModel->delete($id);

            //flash message
            session()->setFlashdata('message', 'Article Berhasil Dihapus');
        } else {
            //flash message
            session()->setFlashdata('message', 'Article gagal dihapus karena tidak ditemukan');
        }

        return redirect()->to(base_url());
    }

    /**
     * edit function
     */
    public function edit($id)
    {
        //model initialize
        $ArticleModel = new ArticleModel();

        $data = array(
            'article'   => $ArticleModel->find($id),
            'mode'      => 'Edit'
        );

        return view('form', $data);
    }

    /**
     * update function
     */
    public function update($id)
    {
        //model initialize
        $articleModel = new ArticleModel();
         
        //define validation
        $validation = $this->validate([
            'article_title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please insert title!'
                ]
            ],
            'article_content'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please insert content!'
                ]
            ],
            'article_status'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please choose status!'
                ]
            ],
        ]);

        if(!$validation) {
            //render view with error validation message
            return view('form', [
                'article' => $articleModel->find($id),
                'validation' => $this->validator,
                'mode' => 'Edit'
            ]);

        } else {
            //insert data into database
            $articleModel->update($id, [
                'article_title'   => $this->request->getPost('article_title'),
                'article_content' => $this->request->getPost('article_content'),
                'article_status' => $this->request->getPost('article_status'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Article Berhasil Diupdate');

            return redirect()->to(base_url('edit/'.$id));
        }
    }


    /**
     * create function
     */
    public function create()
    {
        $data = array(
            'mode'      => 'Add',
            'article'   => []
        );

        return view('form', $data);
    }

    /**
     * store function
     */
    public function store()
    {
        //model initialize
        $articleModel = new ArticleModel();

        //define validation
        $validation = $this->validate([
            'article_title' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please insert title!'
                ]
            ],
            'article_content'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please insert content!'
                ]
            ],
            'article_status'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please choose status!'
                ]
            ],
        ]);


        if(!$validation) {

            //render view with error validation message
            return view('form', [
                'validation' => $this->validator,
                'mode' => 'Add'
            ]);

        } else {

            //insert data into database
            $articleModel->insert([
                'article_title'   => $this->request->getPost('article_title'),
                'article_content' => $this->request->getPost('article_content'),
                'article_status' => $this->request->getPost('article_status'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Article Berhasil Disimpan');

            return redirect()->to(base_url('create'));
        }

    }
}
