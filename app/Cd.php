<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{
    protected $table = 'cds';
    protected $primaryKey = 'id';

    protected $fillable = [
      'title', 'rate', 'category', 'quantity'
    ];

    public $rules = [
      'title' => 'required|string',
        'rate' => 'required|integer',
        'category' => 'required|in:action,cartoon,horror,romance',
        'quantity' => 'required|integer'
    ];
}
