<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'Membership_No';
    protected $table = 'members';
}
