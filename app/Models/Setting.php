<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table = "setting";

    public $fillable = ['id', 'name',
        'body',
        'type',
        'status',
        'user_id',
        'created_at', 'updated_at'];

    public $dates = ['created_at', 'updated_at'];
    public $primaryKey = 'id';

    public function logo_white()
    {
        return path() . $this->logo_white;
    }

    public function logo_black()
    {
        return path() . $this->logo_black;
    }

    public function social()
    {
        $list = explode(",", $this->social);
        $listMHTL = "";
        foreach ($list as $item) {
            $key = explode("@", $item)[0];
            $value = explode("@", $item)[1];
            $listMHTL .= '<li><a href="' . $value . '" class="' . $key . '"><i class="fab fa-' . $key . '"></i></a></li>';
        }
        return $listMHTL;
    }

    public function social1()
    {
        $list = explode(",", $this->social);
        $listMHTL = "";
        foreach ($list as $item) {
            $key = explode("@", $item)[0];
            $value = explode("@", $item)[1];
            $listMHTL .= '<span><a href="' . $value . '" class="ico-' . $key . '"><i class="fab fa-' . $key . '"></i></a></span>';
        }
        return $listMHTL;
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
