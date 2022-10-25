<?php
namespace App\Models;

use \DateTimeInterface;        
use Illuminate\Database\Eloquent\Model;



class BasicModel extends Model{

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        'created_at'  => 'datetime:Y-m-d H:00',
         'updated_at' => 'datetime:Y-m-d H:00',
    ];

    protected function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }
   
    public static function boot(){
        parent::boot();
    }
    
}
