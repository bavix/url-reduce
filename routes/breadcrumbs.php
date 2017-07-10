<?php

// home
Breadcrumbs::register('home', function ($breadcrumbs)
{
    $breadcrumbs->push('Главная', route('home'));
});

Breadcrumbs::register('login', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Авторизация', route('login'));
});

Breadcrumbs::register('register', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Регистрация', route('register'));
});


// posts
Breadcrumbs::register('post', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');

    $breadcrumbs->push('Посты', route('post'));
});

Breadcrumbs::register('post.search', function ($breadcrumbs)
{
    $breadcrumbs->parent('post');
    $breadcrumbs->push('Результат поиска', route('post.search'));
});

Breadcrumbs::register('post.category', function ($breadcrumbs, $id = null)
{
    $breadcrumbs->parent('post');

    $categoryId = $id ?: request()->route()->parameter('id');
    $category   = \App\Models\Category::query()->findOrFail($categoryId);

    $breadcrumbs->push($category->title, route('post.category', [
        $category->id,
        $category->title,
    ]));
});

Breadcrumbs::register('post.view', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('post.category', $item->category_id);
    $breadcrumbs->push($item->title, route('post.view', [
        $item->id,
        $item->title
    ]));
});

Breadcrumbs::register('post.preview', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('post.category', $item->category_id);
    $breadcrumbs->push('Черновик', route('post.preview', [
        $item->id,
        $item->title
    ]));
});

// pages
Breadcrumbs::register('page', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');

    $breadcrumbs->push('Страницы', route('page'));
});

Breadcrumbs::register('page.search', function ($breadcrumbs)
{
    $breadcrumbs->parent('page');
    $breadcrumbs->push('Результат поиска', route('page.search'));
});

Breadcrumbs::register('page.view', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('page');
    $breadcrumbs->push($item->title, route('page.view', [
        $item->id,
        $item->title
    ]));
});

Breadcrumbs::register('page.preview', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('page', $item->category_id);
    $breadcrumbs->push('Черновик', route('page.preview', [
        $item->id,
        $item->title
    ]));
});

// Альбомы
Breadcrumbs::register('album', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');

    $breadcrumbs->push('Альбомы', route('album'));
});

Breadcrumbs::register('album.search', function ($breadcrumbs)
{
    $breadcrumbs->parent('album');
    $breadcrumbs->push('Результат поиска', route('album.search'));
});

Breadcrumbs::register('album.view', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('album');
    $breadcrumbs->push($item->title, route('album.view', [
        $item->id,
        $item->title
    ]));
});

Breadcrumbs::register('album.preview', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('album', $item->category_id);
    $breadcrumbs->push('Черновик', route('album.preview', [
        $item->id,
        $item->title
    ]));
});

// polls
Breadcrumbs::register('poll', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');

    $breadcrumbs->push('Опросы', route('poll'));
});

Breadcrumbs::register('poll.search', function ($breadcrumbs)
{
    $breadcrumbs->parent('poll');
    $breadcrumbs->push('Результат поиска', route('poll.search'));
});

Breadcrumbs::register('poll.view', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('poll');
    $breadcrumbs->push($item->title, route('poll.view', [
        $item->id,
        $item->title
    ]));
});

Breadcrumbs::register('poll.preview', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('poll', $item->category_id);
    $breadcrumbs->push('Черновик', route('poll.preview', [
        $item->id,
        $item->title
    ]));
});

// statement
Breadcrumbs::register('statement', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');

    $breadcrumbs->push('Подать заявление', route('statement'));
});

// feedback
Breadcrumbs::register('feedback', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');

    $breadcrumbs->push('Обратная связь', route('feedback'));
});

// contact
Breadcrumbs::register('contact', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');

    $breadcrumbs->push('Контакты', route('contact'));
});

// statistics
Breadcrumbs::register('statistics', function ($breadcrumbs)
{
    $breadcrumbs->parent('home');

    $breadcrumbs->push('Статистика', route('statistics'));
});
