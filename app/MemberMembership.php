<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberMembership extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'Membership_No';
    protected $table = 'member_memberships';
}
