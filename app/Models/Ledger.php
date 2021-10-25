<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 * @OA\Xml(name="Ledger"),
 * @OA\Property(property="id", type="integer", example="1"),
 * @OA\Property(property="journal_id", type="integer", example="1"),
 * * @OA\Property(property="pv_no", type="string", example="1"),
 * * @OA\Property(property="mode_of_payment", type="string", enum={"cheque", "by-cash", "bank-transfer"}, example="1"),
 * @OA\Property(property="type", type="string", enum={"c", "d","a"}, example="c"),
 * @OA\Property(property="status", type="string", enum={"generated","in-process", "posted", "paid"}, example="paid"),
 * @OA\Property(property="closed", type="boolean", example="True"),
 * @OA\Property(property="created_at", type="date", example="2020-10-20"),
 *  @OA\Property(property="updated_at", type="date", example="2020-12-22"),
 * )
 * Class Ledger
 *
 */
class Ledger extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function journal()
    {
        return $this->belongsTo(Journal::class, 'journal_id');
    }
}
