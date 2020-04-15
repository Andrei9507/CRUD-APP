<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $products;

    protected $fillable = [
        'name','quantity','category_id'
    ];

    public function getAll()
    {
        return $this->with('category')->get();
    }
    
    public function getItem($id)
    {
        return $this->find($id);
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

    public function category()
    {
        return $this->belongsTo('App\Category')->withTrashed();
    }
}
