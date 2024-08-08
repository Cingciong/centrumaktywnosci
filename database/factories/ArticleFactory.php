<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    private function getImage()
    {
        $randomNumber1 = rand(20, 70) * 10;
        $randomNumber2 = rand(20, 70) * 10;
        return "https://picsum.photos/{$randomNumber1}/{$randomNumber2}";

    }
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'text' => $this->faker->paragraph,
            'table' => $this->faker->word,
            'isPinned' => $this->faker->boolean,
            'image' => $this->getImage(),
            'created_at' => $this->faker->date('Y-m-d', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Article $article) {
            $tags = Tag::inRandomOrder()->take(rand(1, 4))->get();
            $article->tags()->attach($tags);
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
