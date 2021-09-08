<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // one to many relation
    public function user(){
        //     $this->hasMany(Comment::class, 'foreign_key', 'local_key');
        return $this->hasMany(User::class,'role_id','id');
    }

}
