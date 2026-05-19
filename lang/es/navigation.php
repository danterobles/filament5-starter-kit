<?php

/*
|--------------------------------------------------------------------------
| Navigation Strings — Starter Kit Customization Points
|--------------------------------------------------------------------------
|
| These are the strings that typically need editing when cloning this
| starter kit for a new project. They cover sidebar group names and the
| key resource/page labels visible in the navigation.
|
| Usage in a resource or page (property declarations don't support __(),
| so override the static method):
|
|   public static function getNavigationGroup(): ?string
|   {
|       return __('navigation.groups.roles_permissions');
|   }
|
*/

return [

    'groups' => [
        'roles_permissions' => 'Roles y Permisos',
        'management' => 'Gestión',
        'settings' => 'Configuración',
    ],

    'users' => [
        'navigation_label' => 'Usuarios',
        'model_label' => 'Usuario',
        'plural_label' => 'Usuarios',
    ],

    'task_board' => [
        'navigation_label' => 'Task Board',
        'title' => 'Task Board',
    ],

];
