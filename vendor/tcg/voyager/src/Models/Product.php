<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
	public function categories()
    {
        return $this->hasMany(Voyager::modelClass('ProductCategory'))
            ->whereNull('product_id');
    }
}
