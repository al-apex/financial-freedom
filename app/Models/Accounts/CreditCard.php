<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $table = 'credit_cards';

    protected $appends = ['account_type'];
    
    public function institution()
    {
        return $this->hasOne('App\Models\Institutions\Institution', 'id', 'institution_id');
    }

    public function transactions()
    {
        return $this->morphMany('App\Models\Transactions\Transaction', 'accountable');
    }

    public function getAccountTypeAttribute()
    {
        return 'credit-card';
    }
}
