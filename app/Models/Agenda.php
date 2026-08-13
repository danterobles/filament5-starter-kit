<?php

namespace App\Models;

use App\Models\Scopes\OwnedByUserScope;
use Database\Factories\AgendaFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['title', 'description', 'start_date', 'end_date', 'all_day', 'color', 'location', 'user_id'])]
class Agenda extends Model
{
    /** @use HasFactory<AgendaFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::addGlobalScope(new OwnedByUserScope);
    }

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'all_day' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A data-URI SVG avatar showing the event's initials (first two
     * characters of the title) on its assigned color, used as a fallback
     * image for timeline-style widgets.
     */
    protected function initialsAvatarUrl(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $initials = mb_strtoupper(mb_substr($this->title, 0, 2));
                $color = ltrim($this->color ?? '#3b82f6', '#');
                $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"><rect width="80" height="80" fill="#'.$color.'"/><text x="40" y="55" font-family="Arial,sans-serif" font-size="32" font-weight="bold" fill="white" text-anchor="middle">'.htmlspecialchars($initials).'</text></svg>';

                return 'data:image/svg+xml;base64,'.base64_encode($svg);
            },
        );
    }
}
