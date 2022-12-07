<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Udalosti;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;
use Orchid\Platform\Models\Udalosti;

class UdalostiEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */

    public $udalosti;

    public function query(\App\Models\Udalosti $udalosti): array
    {
        return [
            'udalosti' => $udalosti
        ];
    }
    public function fields(): array
    {
        return [
            Input::make('udalosti.nazov')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Názov udalosti'))
                ->placeholder(__('Názov udalosti'))
                ->help(__('Zobrazovaný názov udalosti')),
            TextArea::make('udalosti.description')
                ->type('text')
                ->required()
                ->title(__('udalosti description'))
                ->placeholder(__('udalosti description'))
                ->help(__('Zobrazovaný description')),
            DateTimer::make('udalosti.start_time')
                ->required()
                ->allowInput()
                ->format('Y-m-d')
                ->title(__('start_time text1')),
            DateTimer::make('udalosti.end_time')
                ->required()
                ->allowInput()
                ->format('Y-m-d')
                ->title(__('end_time1')),
            Picture::make('udalosti.image')
               // ->storage('s3')
                ->title(__('image1'))

        ];
    }
}
