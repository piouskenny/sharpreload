<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'full_name',
        'email',
        'pin',
        'password',
        'phone_number'
    ];

    public function userAccount()
    {
        return $this->hasOne(UserAccount::class);
    }

    public function userAdditionInfo()
    {
        return $this->hasOne(UserAdditionalInfo::class);
    }

    public function TransactionHistories()
    {
        return $this->hasMany(TransactionHistory::class);
    }
}
