<?php

namespace App\Models;

use Database\Factories\EDFactory;
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
 * @property string $ac
 * @property int $en
 * @property int $sen
 * @property int|null $si
 * @property int $fr
 * @property string $dt
 * @property int|null $ea
 * @property int|null $cr
 * @property int|null $cp
 * @property int|null $hh
 * @property int|null $sid
 * @property int $me
 * @property string $in
 * @property int|null $ht
 * @property string $st
 * @property string $ft
 * @property string|null $hp
 * @property int|null $rnd
 * @property int|null $blk
 * @property int|null $shh
 * @property int|null $stn
 * @property string|null $vn
 * @property string|null $vi
 * @property int|null $tr
 * @property int|null $dy
 * @property int|null $hs
 * @property string $vc
 * @property int $dsen
 * @property string|null $notes
 * @property string|null $esi
 * @property string|null $rsi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $table_name
 * @property-read Project $project
 * @method static Builder find($value)
 * @method static EDFactory factory(...$parameters)
 * @method static Builder|ED newModelQuery()
 * @method static Builder|ED newQuery()
 * @method static Builder|ED query()
 * @method static Builder|ED whereAc($value)
 * @method static Builder|ED whereBlk($value)
 * @method static Builder|ED whereCp($value)
 * @method static Builder|ED whereCr($value)
 * @method static Builder|ED whereCreatedAt($value)
 * @method static Builder|ED whereDsen($value)
 * @method static Builder|ED whereDt($value)
 * @method static Builder|ED whereDy($value)
 * @method static Builder|ED whereEa($value)
 * @method static Builder|ED whereEn($value)
 * @method static Builder|ED whereEsi($value)
 * @method static Builder|ED whereFr($value)
 * @method static Builder|ED whereFt($value)
 * @method static Builder|ED whereHh($value)
 * @method static Builder|ED whereHp($value)
 * @method static Builder|ED whereHs($value)
 * @method static Builder|ED whereHt($value)
 * @method static Builder|ED whereId($value)
 * @method static Builder|ED whereIn($value)
 * @method static Builder|ED whereMe($value)
 * @method static Builder|ED whereNotes($value)
 * @method static Builder|ED wherePc($value)
 * @method static Builder|ED whereRnd($value)
 * @method static Builder|ED whereRsi($value)
 * @method static Builder|ED whereSen($value)
 * @method static Builder|ED whereShh($value)
 * @method static Builder|ED whereSi($value)
 * @method static Builder|ED whereSid($value)
 * @method static Builder|ED whereSt($value)
 * @method static Builder|ED whereStn($value)
 * @method static Builder|ED whereTr($value)
 * @method static Builder|ED whereUpdatedAt($value)
 * @method static Builder|ED whereVc($value)
 * @method static Builder|ED whereVi($value)
 * @method static Builder|ED whereVn($value)
 *
 */
class ED extends Model
{
    use HasFactory;

    /**
     * Table name for Experiment Design model
     * @props  string $ed_table_name
     */
    private static $ed_table_name = 'e_d_s';

    public static function getEdTableName(): string
    {
        return ED::$ed_table_name;
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
        'fr',
        'dt',
        'ea',
        'cr',
        'cp',
        'hh',
        'sid',
        'me',
        'in',
        'ht',
        'st',
        'ft',
        'hp',
        'rnd',
        'blk',
        'shh',
        'stn',
        'vi',
        'tr',
        'dy',
        'hs',
        'vc',
        'dsen',
        'notes',
        'esi',
        'rsi',
    ];

    /**
     * Get the project that owns the ED.
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'pc', 'pc');
    }
}
