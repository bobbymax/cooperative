<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Journal"),
 * @OA\Property(property="id", type="integer", readOnly="true", example="1"),
 * @OA\Property(property="account_code_id", type="integer", example="1"),
 * * @OA\Property(property="batch_id", type="integer", example="1"),
 * * @OA\Property(property="user_id", type="integer", example="1"),
 * @OA\Property(property="code", type="string",  example="1"),
 * @OA\Property(property="amount", type="number", format="double", example="23902323.23"),
 * @OA\Property(property="description", type="string", example="1"),
 * @OA\Property(property="currency", type="string", enum={"NGN","USD","GBP","EUR","YEN"}, example="USD"),
 * @OA\Property(property="month", type="integer", example="1"),
 *  @OA\Property(property="year", type="integer", example="1"),
 *  * @OA\Property(property="type", type="string", enum={"third-party", "staff-payent"}, example="third_party"),
 *  @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Journal
 *
 */
class Journal extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function accountCode()
    {
        return $this->belongsTo(AccountCode::class, 'account_code_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function controller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ledger()
    {
        return $this->hasOne(Ledger::class);
    }
}
