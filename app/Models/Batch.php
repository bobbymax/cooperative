<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function controller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }

    public function subBudgetHead()
    {
        return $this->belongsTo(SubBudgetHead::class, 'sub_budget_head_id');
    }

    public function journal()
    {
        return $this->hasOne(Journal::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
