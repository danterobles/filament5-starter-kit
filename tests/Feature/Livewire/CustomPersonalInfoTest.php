<?php

use App\Livewire\CustomPersonalInfo;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create([
        'name' => 'Original',
        'last' => 'User',
        'email' => 'original@example.com',
        'phone' => '5555555555',
    ]);
    $this->actingAs($this->user);
});

test('a crafted email in the submitted form does not change the user\'s actual email', function () {
    Livewire::test(CustomPersonalInfo::class)
        ->fillForm([
            'name' => 'Updated',
            'last' => 'User',
            'email' => 'attacker@evil.com',
            'phone' => '1112223333',
        ])
        ->call('submit');

    expect($this->user->fresh())
        ->email->toBe('original@example.com')
        ->name->toBe('Updated');
});

test('name is required', function () {
    Livewire::test(CustomPersonalInfo::class)
        ->fillForm(['name' => null])
        ->call('submit')
        ->assertHasFormErrors(['name' => 'required']);
});

test('last name is required', function () {
    Livewire::test(CustomPersonalInfo::class)
        ->fillForm(['last' => null])
        ->call('submit')
        ->assertHasFormErrors(['last' => 'required']);
});

test('name cannot exceed the maximum length', function () {
    Livewire::test(CustomPersonalInfo::class)
        ->fillForm(['name' => str_repeat('a', 256)])
        ->call('submit')
        ->assertHasFormErrors(['name' => 'max']);
});

test('last name cannot exceed the maximum length', function () {
    Livewire::test(CustomPersonalInfo::class)
        ->fillForm(['last' => str_repeat('a', 256)])
        ->call('submit')
        ->assertHasFormErrors(['last' => 'max']);
});

test('phone cannot exceed the maximum length', function () {
    Livewire::test(CustomPersonalInfo::class)
        ->fillForm(['phone' => str_repeat('1', 256)])
        ->call('submit')
        ->assertHasFormErrors(['phone' => 'max']);
});

test('phone is optional and valid data saves successfully', function () {
    Livewire::test(CustomPersonalInfo::class)
        ->fillForm([
            'name' => 'Valid',
            'last' => 'Name',
            'phone' => null,
        ])
        ->call('submit')
        ->assertHasNoFormErrors();

    expect($this->user->fresh()->phone)->toBeNull();
});
