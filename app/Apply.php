<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
	protected $table='apply';
	protected $primaryKey='ap_id';
	protected $fillable=['met_id','group_name','member_name','member_email','reason'];
}
