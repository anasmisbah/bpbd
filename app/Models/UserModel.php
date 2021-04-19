<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'users';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['nama','email','password','avatar','last_login'];
}
