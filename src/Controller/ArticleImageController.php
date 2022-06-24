<?php


namespace App\controller;

use App\Entity\Article;
use RuntimeException;
use Symfony\Component\HttpFoundation\Request;

class ArticleImageController
{
    public function __invoke(Request $request)
    {
        $article = $request->attributes->get('data');
        if (!($article instanceof Article)) {
            throw new RuntimeException('Article attendu');
        }
        $article->setFile($request->files->get('file'));
        $article->setUpdatedAt(new \DateTime());
        return $article;
    }
}
