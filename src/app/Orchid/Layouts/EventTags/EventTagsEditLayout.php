<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\EventTags;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Platform\Models\EventTags;

class EventTagsEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */

    public $eventtags;

    public function query(\App\Models\EventTags $eventtags): array
    {
        return [
            'eventtags' => $eventtags
        ];
    }
    public function fields(): array
    {
        return [
            Input::make('eventtags.nazov')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Tag'))
                ->placeholder(__('Tag'))
                ->help(__('Tag')),
        ];
    }
}
