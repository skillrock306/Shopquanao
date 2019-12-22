<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    protected $primarykey = ['category_id', 'product_id'];

    public $incrementing = false;
}
