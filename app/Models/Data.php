<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;
use Watson\Validating\ValidatingTrait;
use Watson\Validating\Injectors\UniqueWithInjector;
use \App\Traits\Revisionable\Revisionable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Data extends Model
{
 
    

    protected $primaryKey = 'id';
    protected $table = 'data';
    protected $fillable = ['model','ram','hdd','location', 'price'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $guarded = ['id'];
}
