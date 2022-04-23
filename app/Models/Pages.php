<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public $table = "pages";

    public $fillable = ['id', 'name',
        'body',
        'type',
        'status',
        'user_id',
        'created_at', 'updated_at'];

    public $dates = ['created_at', 'updated_at'];
    public $primaryKey = 'id';

    public function avatar(){
        return path() . $this->avatar;
    }

    public function created_at()
    {
        return date_format($this->created_at, 'Y-m-d h:i A');
    }

    public function updated_at()
    {
        return date_format($this->updated_at, 'Y-m-d h:i A');
    }
}
