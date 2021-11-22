<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * App\Models\Project
 *
 * @property string $uuid
 * @property string $pc
 * @property string $title
 * @property int $pi
 * @property int $pl
 * @property int $pa
 * @property int $funder
 * @property string $department
 * @property string $sd
 * @property string $ed
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read int|null $activities_count
 * @property-read User $user
 * @method static Builder create(array $attributes = [])
 * @method static Builder find($value)
 * @method static Builder findOrFail($value)
 * @method static ProjectFactory factory(...$parameters)
 * @method static Builder|Project newModelQuery()
 * @method static Builder|Project newQuery()
 * @method static Builder|Project query()
 * @method static Builder|Project whereCreatedAt($value)
 * @method static Builder|Project whereDepartment($value)
 * @method static Builder|Project whereDescription($value)
 * @method static Builder|Project whereEd($value)
 * @method static Builder|Project whereFunder($value)
 * @method static Builder|Project whereUuid($value)
 * @method static Builder|Project wherePa($value)
 * @method static Builder|Project wherePc($value)
 * @method static Builder|Project wherePi($value)
 * @method static Builder|Project wherePl($value)
 * @method static Builder|Project whereSd($value)
 * @method static Builder|Project whereTitle($value)
 * @method static Builder|Project whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Project extends Model
{
    use HasFactory;
    use UsesUuid;


    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    /**
     * The data type of the non-auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'department' => 'Environmental Health and Ecological Sciences',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pi',
        'pc',
        'title',
        'pl',
        'pa',
        'sd',
        'ed',
        'description',
        'funder',
        'department'
    ];

    /**
     * Get the eds for the research project.
     * @return HasMany
     */
    public function eds(): HasMany
    {
        return $this->hasMany(ED::class, 'pc', 'pc');
    }

    /**
     * Get the sss for the research project.
     * @return HasMany
     */
    public function sss(): HasMany
    {
        return $this->hasMany(SS::class, 'pc', 'pc');
    }

    /**
     * Get the user that owns the project.
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'pi' );
    }
}
