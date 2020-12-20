<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    //

    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable =[
'title','category','user_id','description','status','img'
    ];
    
    protected $primaryKey = 'b_id';
}
