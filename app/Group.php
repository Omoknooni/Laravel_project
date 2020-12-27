<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $table='g_list';
	protected $primaryKey='g_id';
	protected $fillable=['g_name','endtime','current', 'maximum'];
}
