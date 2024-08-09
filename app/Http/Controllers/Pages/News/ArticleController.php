<?php

namespace App\Http\Controllers\Pages\News;

use App\Http\Controllers\Controller;
use App\Models\Article;


class ArticleController extends Controller
{
    public function index()
    {



        $tagTranslations = [
            'seniors' => 'seniorzy',
            'teens' => 'młodzież',
            'business' => 'biznes',
            'parents' => 'rodzice',
            'shop' => 'sklep',
        ];

        $articles = Article::paginate(10);
        $articles->load('tags');
        $articles->each(function ($article) use ($tagTranslations) {
            $article->created_at = $article->created_at->format('Y-m-d');
            $article->tags->each(function ($tag) use ($tagTranslations) {
                if (isset($tagTranslations[$tag->name])) {
                    $tag->name = $tagTranslations[$tag->name];
                }
            });
        });



        return response()->json($articles);
    }
}
