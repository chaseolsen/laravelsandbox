<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts'; // <- you dont need this if the table name is plural to the class name, example Post class and Posts table
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true; // Not really needed since timestamps are already being stored automatically

    // Creating a relationship to a user
    public function user(){
      return $this->belongsTo('App\User');
    }

}
