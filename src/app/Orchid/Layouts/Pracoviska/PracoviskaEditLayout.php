<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Pracoviska;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Platform\Models\Pracoviska;

class PracoviskaEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */

    public $pracoviska;

    public function query(\App\Models\Pracoviska $pracoviska): array
    {
        return [
            'pracoviska' => $pracoviska
        ];
    }
    public function fields(): array
    {
        return [
            Input::make('pracoviska.nazov')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Názov pracoviska'))
                ->placeholder(__(''))
                ->help(__('')),
            Input::make('pracoviska.address')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Adresa pracoviska'))
                ->placeholder(__(''))
                ->help(__('')),
        ];
    }
}
