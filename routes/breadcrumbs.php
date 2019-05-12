<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('home', route('home'));
});

// Home > Profile
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('home');
    $trail->push('profile', route('profile'));
});

// Home > Question
Breadcrumbs::for('question', function ($trail) {
    $trail->parent('home');
    $trail->push('question', route('question'));
});

// Home > Answer
Breadcrumbs::for('answer', function ($trail) {
    $trail->parent('home');
    $trail->push('answer', route('answer'));
});
// Home > Blog > [Category]
Breadcrumbs::for('welcome', function ($trail, $category) {
    $trail->parent('question');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});