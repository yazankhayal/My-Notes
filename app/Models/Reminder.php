<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    public $table = "reminder";

    public $fillable = ['id', 'name',
        'body',
        'type',
        'status',
        'user_id',
        'created_at', 'updated_at'];

    public $dates = ['created_at', 'updated_at'];
    public $primaryKey = 'id';

    public function User()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function Status()
    {
        if ($this->status) {
            return '<span class="badge bg-primary">Active</span>';
        }
        return '<span class="badge bg-danger">Disable</span>';
    }


    public function Type()
    {
        $status = $this->type;
        $name = getlistPriority($status);
        return '<span class="' . $status . '">' . $name . '</span>';
    }

    public function TypeBadge()
    {
        $status = $this->type;
        $name = getlistPriority($status);
        return '<span class="badge ' . $status . '">' . $name . '</span>';
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
