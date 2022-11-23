<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layouts\Rows;

class ProfilePasswordLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Password::make('old_password')
                ->placeholder(__('Zadajte staré heslo'))
                ->title(__('Staré heslo:'))
                ->help('Toto je vaše momentálne nastavené heslo.'),

            Password::make('password')
                ->placeholder(__('Zadajte nové heslo'))
                ->title(__('Nové heslo:')),

            Password::make('password_confirmation')
                ->placeholder(__('Potvrďte nové heslo'))
                ->title(__('Potvrdenie hesla:'))
                ->help('Dobré heslo má aspoň 15 znakov alebo aspoň 8 znakov, vrátane čísla a malého písmena.'),
        ];
    }
}
