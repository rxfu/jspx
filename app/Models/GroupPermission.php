<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model {

	protected $table = 'px_permission';

	public $timestamps = false;

	protected $primaryKey = 'group_id';

}
