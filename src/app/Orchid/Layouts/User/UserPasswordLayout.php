<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Platform\Models\User;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Password;
use Orchid\Screen\Layouts\Rows;

class UserPasswordLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        /** @var User $user */
        $user = $this->query->get('user');

        $placeholder = $user->exists
            ? __('Ak chcete zachovať aktuálne heslo, nechajte prázdne')
            : __('Zadajte heslo, ktoré chcete nastaviť');

        return [
            Password::make('user.password')
                ->placeholder($placeholder)
                ->title(__('Heslo')),
        ];
    }
}
