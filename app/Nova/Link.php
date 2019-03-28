<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class Link extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Link::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'url';

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
    ];

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

            Text::make('Url')
                ->sortable()
                ->onlyOnIndex()
                ->resolveUsing(function ($title) {
                    $url = \mb_substr($title, \strpos($title, '://') + 3);
                    return Str::limit($url, 30);
                }),

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

            Text::make('Message')
                ->rules('required', 'max:255')
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
            new Metrics\LinksActivePerMonth(),
            new Metrics\LinksBlockedPerMonth(),
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
