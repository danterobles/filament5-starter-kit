<?php

use App\Models\Agenda;

test('initials_avatar_url derives initials from the first two characters of the title', function () {
    $agenda = Agenda::factory()->make([
        'title' => 'Reunión de equipo',
        'color' => '#3b82f6',
    ]);

    $svg = base64_decode(str_replace('data:image/svg+xml;base64,', '', $agenda->initials_avatar_url));

    expect($agenda->initials_avatar_url)->toStartWith('data:image/svg+xml;base64,')
        ->and($svg)->toContain('>RE<')
        ->and($svg)->toContain('fill="#3b82f6"');
});

test('initials_avatar_url falls back to the default color when the agenda has none', function () {
    $agenda = Agenda::factory()->make([
        'title' => 'Cita médica',
        'color' => null,
    ]);

    $svg = base64_decode(str_replace('data:image/svg+xml;base64,', '', $agenda->initials_avatar_url));

    expect($svg)->toContain('fill="#3b82f6"');
});

test('initials_avatar_url handles a single-word title', function () {
    $agenda = Agenda::factory()->make([
        'title' => 'Vacaciones',
        'color' => '#ef4444',
    ]);

    $svg = base64_decode(str_replace('data:image/svg+xml;base64,', '', $agenda->initials_avatar_url));

    expect($svg)->toContain('>VA<');
});

test('initials_avatar_url escapes html special characters and uppercases unicode initials', function () {
    $agenda = Agenda::factory()->make([
        'title' => 'áéiou',
        'color' => '#10b981',
    ]);

    $svg = base64_decode(str_replace('data:image/svg+xml;base64,', '', $agenda->initials_avatar_url));

    expect($svg)->toContain('>ÁÉ<');
});

test('initials_avatar_url falls back to the default color when the stored color is not a valid hex value', function () {
    $agenda = new Agenda(['title' => 'Reunión', 'color' => '"><script>alert(1)</script>']);

    $svg = base64_decode(str_replace('data:image/svg+xml;base64,', '', $agenda->initials_avatar_url));

    expect($svg)->toContain('fill="#3b82f6"')
        ->not->toContain('<script>');
});

test('initials_avatar_url keeps a valid hex color', function () {
    $agenda = new Agenda(['title' => 'Reunión', 'color' => '#10b981']);

    $svg = base64_decode(str_replace('data:image/svg+xml;base64,', '', $agenda->initials_avatar_url));

    expect($svg)->toContain('fill="#10b981"');
});
