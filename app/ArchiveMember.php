<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchiveMember extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'Archive_Membership_No';
    protected $table = 'archive_members';
}
