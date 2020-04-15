<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    protected $categories;
    protected $fillable = [
        'name',
    ];

    public function getAll()
    {
        return $this->get();
    }
    
    public function getItem($id)
    {
        return $this->find($id);
    }

    public function getItemByName($item)
    {
        return $this->where('name',$item)->first();
    }
    /**
     * save item
     * @param array $params
     * @return collection
     */
    public function saveItem($params)
    {
        $new = $this->create($params);
        
        return $new;

    }

    public function products()
    {
        return $this->hasMany('Product');
    }
}
