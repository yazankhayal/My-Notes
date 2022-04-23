<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    public $table = "notes";

    public $fillable = ['id', 'name',
        'body',
        'type',
        'status',
        'tags',
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


    public function Tags()
    {
        $tags = $this->tags;
        $tagsLists = "";
        foreach (explode(",",$tags) as $value) {
            $tagsLists .= '<span class="badge bg-warning" style="margin-right: 5px;">' . $value . '</span>';
        }
        return $tagsLists;
    }

    public function TagsHome()
    {
        $tags = $this->tags;
        $tagsLists = "";
        foreach (explode(",",$tags) as $value) {
            $tagsLists .= '<span class="badge bg-secondary" style="margin-right: 5px;">' . $value . '</span>';
        }
        return $tagsLists;
    }

    public function Type()
    {
        $status = $this->type;
        $name = getlistTypes($status);
        return '<span class="' . $status . '">' . $name . '</span>';
    }

    public function TypeBadge()
    {
        $status = $this->type;
        $name = getlistTypes($status);
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
