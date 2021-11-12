<?php

namespace App\Models;

use Database\Factories\SSFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\SS
 *
 * @property int $id
 * @property string $pc
 * @property string $ac
 * @property int $en
 * @property int $sen
 * @property string $dt
 * @property string $ft
 * @property int|null $ssen
 * @property int|null $sfr
 * @property int $fr
 * @property int|null $tx
 * @property int $sas
 * @property int $me
 * @property int $n
 * @property string $bf
 * @property int $slc
 * @property string $st
 * @property int|null $si
 * @property int|null $sc
 * @property string|null $notes
 * @property int|null $sid
 * @property int|null $ni
 * @property int|null $nb
 * @property int|null $nd
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $table_name
 * @property-read Project $project
 * @method static SSFactory factory(...$parameters)
 * @method static Builder|SS newModelQuery()
 * @method static Builder|SS newQuery()
 * @method static Builder|SS query()
 * @method static Builder|SS whereAc($value)
 * @method static Builder|SS whereBf($value)
 * @method static Builder|SS whereCreatedAt($value)
 * @method static Builder|SS whereDt($value)
 * @method static Builder|SS whereEn($value)
 * @method static Builder|SS whereFr($value)
 * @method static Builder|SS whereFt($value)
 * @method static Builder|SS whereId($value)
 * @method static Builder|SS whereMe($value)
 * @method static Builder|SS whereN($value)
 * @method static Builder|SS whereNb($value)
 * @method static Builder|SS whereNd($value)
 * @method static Builder|SS whereNi($value)
 * @method static Builder|SS whereNotes($value)
 * @method static Builder|SS wherePc($value)
 * @method static Builder|SS whereSas($value)
 * @method static Builder|SS whereSc($value)
 * @method static Builder|SS whereSen($value)
 * @method static Builder|SS whereSfr($value)
 * @method static Builder|SS whereSi($value)
 * @method static Builder|SS whereSid($value)
 * @method static Builder|SS whereSlc($value)
 * @method static Builder|SS whereSsen($value)
 * @method static Builder|SS whereSt($value)
 * @method static Builder|SS whereTx($value)
 * @method static Builder|SS whereUpdatedAt($value)
 */
class SS extends Model
{
    use HasFactory;

    /**
     * Table name for Sample Sorting (SS) model
     * @var string $ss_table_name
     */
    private static $ss_table_name = 's_s';

    public static function getSsTableName(): string
    {
        return SS::$ss_table_name;
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'pc',
        'en',
        'sen',
        'dt',
        'ft',
        'ssen',
        'sfr',
        'fr',
        'tx',
        'sas',
        'n',
        'me',
        'notes',
        'slc',
        'bf',
        'ni',
        'nb',
        'st',
        'sid',
        'sid=01',
        'sid=02',
        'sid=03',
        'sid=04',
        'sid=05',
        'sid=06',
        'sid=07',
        'nd',
        'sc',
        'si',
    ];

    /**
     * Get project that owns the SS.
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'pc', 'pc');
    }
}
