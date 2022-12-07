<?php

declare(strict_types=1);

use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Pracoviska\PracoviskaListScreen;
use App\Orchid\Screens\Pracoviska\PracoviskaEditScreen;
use App\Orchid\Screens\EventTags\EventTagsEditScreen;
use App\Orchid\Screens\EventTags\EventTagsListScreen;
use App\Orchid\Screens\MiestaKonania\MiestaKonaniaListScreen;
use App\Orchid\Screens\MiestaKonania\MiestaKonaniaEditScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
use App\Orchid\Screens\EmailSenderScreen;
use App\Orchid\Screens\Idea;
use App\Orchid\Screens\Nastenka;
use App\Orchid\Screens\MiestaKonania;
use App\Orchid\Screens\Pracoviska;
use App\Orchid\Screens\Stretnutia;
use App\Orchid\Screens\Udalosti;



/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.fullcalender');
Route::screen('nastenka', Nastenka::class)
    ->name('platform.nastenka');
Route::screen('email', EmailSenderScreen::class)->name('platform.email');
Route::screen('/idea', Idea::class)->name('platform.idea');
//Route::screen('nastenka', Nastenka::class)->name('platform.nastenka');
//Route::screen('stretnutia', Stretnutia::class)->name('platform.stretnutia');
Route::screen('miestakonania', MiestaKonania::class)->name('platform.miestakonania');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

    Route::screen('pracoviska', \App\Orchid\Screens\Pracoviska\PracoviskaListScreen::class)
    ->name('platform.systems.pracoviska')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Pracoviska'), route('platform.systems.pracoviska'));
    });

    Route::screen('pracoviska/edit', \App\Orchid\Screens\Pracoviska\PracoviskaEditScreen::class)
    ->name('platform.systems.pracoviska.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Pracoviska Edit'), route('platform.systems.pracoviska.edit'));
    });

    Route::screen('pracoviska/{pracoviska}/update', \App\Orchid\Screens\Pracoviska\PracoviskaEditScreen::class)
    ->name('platform.systems.pracoviska.update')
    ->breadcrumbs(function (Trail $trail, $pracoviska) {
        return $trail
            ->parent('platform.systems.pracoviska')
            ->push(__('Pracoviska Update'), route('platform.systems.pracoviska.update', $pracoviska));
    });  

    Route::screen('udalosti', \App\Orchid\Screens\Udalosti\UdalostiListScreen::class)
    ->name('platform.systems.udalosti')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Udalosti'), route('platform.systems.udalosti'));
    });

    Route::screen('udalosti/edit', \App\Orchid\Screens\Udalosti\UdalostiEditScreen::class)
    ->name('platform.systems.udalosti.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Udalosti Edit'), route('platform.systems.udalosti.edit'));
    });

    Route::screen('udalosti/{udalosti}/update', \App\Orchid\Screens\Udalosti\UdalostiEditScreen::class)
    ->name('platform.systems.udalosti.update')
    ->breadcrumbs(function (Trail $trail, $udalosti) {
        return $trail
            ->parent('platform.systems.udalosti')
            ->push(__('Udalosti Update'), route('platform.systems.udalosti.update', $udalosti));
    });  

    // Platform > System > Roles
     Route::screen('eventtags', \App\Orchid\Screens\EventTags\EventTagsListScreen::class)
    ->name('platform.systems.eventtags')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(('Tagy'), route('platform.systems.eventtags'));
    });

    Route::screen('eventtags/edit', \App\Orchid\Screens\EventTags\EventTagsEditScreen::class)
    ->name('platform.systems.eventtags.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(('Tag Edit'), route('platform.systems.eventtags.edit'));
    });

    Route::screen('eventtags/{eventtags}/update', \App\Orchid\Screens\EventTags\EventTagsEditScreen::class)
    ->name('platform.systems.eventtags.update')
    ->breadcrumbs(function (Trail $trail, $eventtags) {
        return $trail
            ->parent('platform.systems.eventtags')
            ->push(__('Pracoviska Update'), route('platform.systems.eventtags.update', $eventtags));
    }); 
    Route::screen('miestakonania', \App\Orchid\Screens\MiestaKonania\MiestaKonaniaListScreen::class)
    ->name('platform.systems.miestakonania')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(('MiestaKonania'), route('platform.systems.miestakonania'));
    });

    Route::screen('miestakonania/edit', \App\Orchid\Screens\MiestaKonania\MiestaKonaniaEditScreen::class)
    ->name('platform.systems.miestakonania.edit')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(('MiestaKonania Edit'), route('platform.systems.miestakonania.edit'));
    });

    Route::screen('miestakonania/{miestakonania}/update', \App\Orchid\Screens\MiestaKonania\MiestaKonaniaEditScreen::class)
    ->name('platform.systems.miestakonania.update')
    ->breadcrumbs(function (Trail $trail, $miestakonania) {
        return $trail
            ->parent('platform.systems.miestakonania')
            ->push(__('MiestaKonania Update'), route('platform.systems.miestakonania.update', $miestakonania));
    });


// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Example screen');
    });

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', 'Idea::class','platform.screens.idea');
