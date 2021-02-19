<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function invoices(){
    	return $this->hasMany('App\Invoice');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
