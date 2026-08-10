<?php

namespace App\Models;
use Bpjs\Framework\Helpers\BaseModel;

class User extends BaseModel {
    
    // Protected table Users
    protected public $table = 'users';
    protected public $primaryKey = 'users_id';
}