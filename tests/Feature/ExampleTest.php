<?php

test('the root url redirects to the admin login', function () {
    $this->get('/')->assertRedirect(route('filament.admin.auth.login'));
});
