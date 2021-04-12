<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(3),
            'content'=>$this->faker->paragraphs(5, true),
            'is_published'=>$this->faker->boolean,
            'created_at'=>$this->faker->dateTimeBetween('-3 months'),
        ];
    }
    public function newTitle()
    {
        return $this->state([
            'title'=>'New title',
            'content'=>'Content of the blog post',
        ]);
    }
}
