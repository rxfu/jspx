<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model {

	protected $table = 'px_user_group';

	protected $primaryKey = 'user_id';

	public $timestamps = false;

}
