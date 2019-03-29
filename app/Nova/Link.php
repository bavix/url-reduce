<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Link extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Link::class;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'hash',
        'url',
        'message',
        'parameters->title',
        'parameters->description',
    ];

    /**
     * @return string
     */
    public function title(): string
    {
        /**
         * @var \App\Models\Link $link
         */
        $link = $this->model();
        return $link->title ?: $link->url;
    }

    /**
     * @return string|null
     */
    public function subtitle(): string
    {
        /**
         * @var \App\Models\Link $link
         */
        $link = $this->model();
        return $link->url;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Avatar::make('Icon')
                ->thumbnail(function ($value) {
                    return $value;
                })
                ->onlyOnIndex(),

            Text::make('Url')
                ->sortable()
                ->onlyOnIndex()
                ->resolveUsing(function ($title) {
                    $url = \mb_substr($title, \strpos($title, '://') + 3);
                    if (Str::startsWith($url, 'www.')) {
                        $url = Str::substr($url, 4);
                    }
                    return Str::limit($url, 20);
                }),

            Text::make('Title', 'parameters->title')
                ->onlyOnDetail(),

            Textarea::make('Description', 'parameters->description')
                ->onlyOnDetail(),

            Text::make('Url')
                ->sortable()
                ->rules('required', 'max:1600')
                ->creationRules('unique:links,url')
                ->hideFromIndex()
                ->updateRules('unique:links,url,{{resourceId}}'),

            Text::make('Hash')
                ->sortable()
                ->rules('required', 'size:5')
                ->creationRules('unique:links,hash')
                ->updateRules('unique:links,hash,{{resourceId}}'),

            Boolean::make('Active')
                ->sortable(),

            Boolean::make('Suspicious')
                ->sortable(),

            Boolean::make('Blocked')
                ->sortable(),

            Textarea::make('Message')
                ->rules('max:255')
                ->hideFromIndex(),

            Boolean::make('Is Porn')
                ->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new Metrics\LinksPerMonth(),
            new Metrics\LinksBlockedPerDay(),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new Filters\LinkSwitch(),
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
