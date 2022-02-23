<?php

namespace App\Domains\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public static $snakeAttributes=true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','phone','email','desired_budget','message','description'];

    
    protected $maps =[
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'desiredBudget' => 'desired_budget',
    ];

    public function websites()
    {
        return $this->belongsToMany(Website::class);
    }
}
