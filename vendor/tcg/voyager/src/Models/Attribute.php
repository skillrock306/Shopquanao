<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Attribute extends Model
{
	public function properties()
    {
        return $this->hasMany(Voyager::modelClass('Property'))
            ->orderBy('created_at', 'DESC');
    }
}
