<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;


/**
 * App\Models\ED
 *
 * @property int $id
 * @property string $pc
 * @property int $en
 * @property int $sen
 * @property int|null $si
 * @property int $irb
 * @property string $fr
 * @property int|null $ic
 * @property int|null $dt
 * @property int|null $dsen
 * @property int|null $ea
 * @property int|null $cr
 * @property int $cp
 * @property string $hh
 * @property int|null $stid
 * @property string $shh
 * @property string $st
 * @property string|null $vi
 * @property int|null $vn
 * @property string $notes
 * @property string|null $esi
 * @property string|null $rsi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $table_name
 * @property-read Project $project
 * @method static Builder find($value)
 * @method static Builder|Consent newModelQuery()
 * @method static Builder|Consent newQuery()
 * @method static Builder|Consent query()
 * @method static Builder|Consent whereAc($value)
 * @method static Builder|Consent whereBlk($value)
 * @method static Builder|Consent whereCp($value)
 * @method static Builder|Consent whereCr($value)
 * @method static Builder|Consent whereCreatedAt($value)
 * @method static Builder|Consent whereDsen($value)
 * @method static Builder|Consent whereDt($value)
 * @method static Builder|Consent whereDy($value)
 * @method static Builder|Consent whereEa($value)
 * @method static Builder|Consent whereEn($value)
 * @method static Builder|Consent whereEsi($value)
 * @method static Builder|Consent whereFr($value)
 * @method static Builder|Consent whereFt($value)
 * @method static Builder|Consent whereHh($value)
 * @method static Builder|Consent whereHp($value)
 * @method static Builder|Consent whereHs($value)
 * @method static Builder|Consent whereHt($value)
 * @method static Builder|Consent whereId($value)
 * @method static Builder|Consent whereIn($value)
 * @method static Builder|Consent whereMe($value)
 * @method static Builder|Consent whereNotes($value)
 * @method static Builder|Consent wherePc($value)
 * @method static Builder|Consent whereRnd($value)
 * @method static Builder|Consent whereRsi($value)
 * @method static Builder|Consent whereSen($value)
 * @method static Builder|Consent whereShh($value)
 * @method static Builder|Consent whereSi($value)
 * @method static Builder|Consent whereSid($value)
 * @method static Builder|Consent whereSt($value)
 * @method static Builder|Consent whereStn($value)
 * @method static Builder|Consent whereTr($value)
 * @method static Builder|Consent whereUpdatedAt($value)
 * @method static Builder|Consent whereVc($value)
 * @method static Builder|Consent whereVi($value)
 * @method static Builder|Consent whereVn($value)
 *
 */
class Consent extends Model
{
    use HasFactory;

    /**
     * Table name for Consent model
     * @props  string $ic_table_name
     */
    private static $ic_table_name = 'consents';

    public static function getEdTableName(): string
    {
        return Consent::$ic_table_name;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'pc',
        'en',
        'sen',
        'si',
        'irb',
        'fr',
        'ict',
        'dt',
        'dsen',
        'ea',
        'cr',
        'cp',
        'hh',
        'stid',
        'shh',
        'st',
        'vi',
        'vn',
        'notes',
        'esi',
        'rsi',
    ];

    /**
     * Get the project that owns the IC.
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'pc', 'pc');
    }
}
