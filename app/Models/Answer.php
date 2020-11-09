<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Answer
 *
 * @property int $id
 * @property string $value
 * @property bool $correct
 * @property int $question_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Question $question
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereCorrect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Answer whereValue($value)
 * @mixin \Eloquent
 */
class Answer extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

    protected $attributes = [
        'correct' => false
    ];

    protected $guarded = [];

    protected $hidden = [
        'question_id',
        'created_at',
        'updated_at',
        'correct'
    ];

    protected $casts = [
        'correct' => 'boolean'
    ];
}
