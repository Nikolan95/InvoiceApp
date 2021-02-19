<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $dates = ['created_at', 'updated_at', 'date', 'paid_at'];

    public $primaryKey = 'id';

    public $timestamps = true;

    public function client(){
    	return $this->belongsTo('App\Client');
    }
    public function items(){
    	return $this->hasMany('App\Item');
    }
}   


