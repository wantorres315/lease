<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;
use Watson\Validating\ValidatingTrait;
use Watson\Validating\Injectors\UniqueWithInjector;
use \App\Traits\Revisionable\Revisionable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use \App\Models\BasicModel;

class Location extends BasicModel
{
 
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'location';
    protected $fillable = ['name'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $guarded = ['id'];
}
