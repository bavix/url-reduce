<?php

// news
Breadcrumbs::register('new', function ($breadcrumbs)
{
    $breadcrumbs->push('Новости', route('new'));
});

Breadcrumbs::register('new.category', function ($breadcrumbs, $id = null)
{
    $breadcrumbs->parent('new');

    $categoryId = $id ?: request()->route()->parameter('id');
    $category   = \App\Models\CategoryModel::query()->findOrFail($categoryId);

    $breadcrumbs->push($category->title, route('new.category', [
        $category->id,
        $category->title,
    ]));
});

Breadcrumbs::register('new.view', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('new.category', $item->category_id);
    $breadcrumbs->push($item->title, route('new.view', [
        $item->id,
        $item->title
    ]));
});

// pages
Breadcrumbs::register('page', function ($breadcrumbs)
{
    $breadcrumbs->push('Страницы', route('page'));
});

Breadcrumbs::register('page.view', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('page');
    $breadcrumbs->push($item->title, route('page.view', [
        $item->id,
        $item->title
    ]));
});

// Альбомы
Breadcrumbs::register('album', function ($breadcrumbs)
{
    $breadcrumbs->push('Альбомы', route('album'));
});

Breadcrumbs::register('album.view', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('album');
    $breadcrumbs->push($item->title, route('album.view', [
        $item->id,
        $item->title
    ]));
});

// polls
Breadcrumbs::register('poll', function ($breadcrumbs)
{
    $breadcrumbs->push('Опросы', route('poll'));
});

Breadcrumbs::register('poll.view', function ($breadcrumbs, $item)
{
    $breadcrumbs->parent('poll');
    $breadcrumbs->push($item->title, route('poll.view', [
        $item->id,
        $item->title
    ]));
});

// statement
Breadcrumbs::register('statement', function ($breadcrumbs)
{
    $breadcrumbs->push('Подать заявление', route('statement'));
});

// feedback
Breadcrumbs::register('feedback', function ($breadcrumbs)
{
    $breadcrumbs->push('Обратная связь', route('feedback'));
});

// contact
Breadcrumbs::register('contact', function ($breadcrumbs)
{
    $breadcrumbs->push('Контакты', route('contact'));
});

// statistics
Breadcrumbs::register('statistics', function ($breadcrumbs)
{
    $breadcrumbs->push('Статистика', route('statistics'));
});
