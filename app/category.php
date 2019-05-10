<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //php artisan make:model category
    //truy van c1 theo model
    //truy van c2 theo query builder nhu user
    //dinh nghia table de su dung model nay
    protected $table="tbl_category_news";
    // trong tbl_category_news khong co 2 cot la creat_at,update_at(kieu du lieu date time) vi vay khai bao doi tuong $timestamps=false(neu co 2 cot nay thi khai bao = true)
    public $timestamps=false;
}
