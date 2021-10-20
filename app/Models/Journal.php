<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
