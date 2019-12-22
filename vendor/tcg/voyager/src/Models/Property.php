<?php

namespace TCG\Voyager\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Models\Attibute;
class Property extends Model
{
    protected $table = 'properties';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function attributeId()
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function attributes()
    {
        return $this->belongsTo(Voyager::modelClass('Attribute'), 'attribute_id');
    }
}
