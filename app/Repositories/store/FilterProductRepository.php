<?php


namespace App\Repositories\store;


use App\model\FilterGroup;

class FilterProductRepository
{
    public function filterGroupList(){
        return $pro_group = FilterGroup::all();
    }

    public function filter_price($request, $cat){
        return $cat->product()->whereBetween('price',[$request->min, $request->max])->paginate(9);
    }

    public function filter_checklist($request, $cat){
        $array = $request->array;
        return $check_filter = $cat->product()
            ->whereIn('id',function ($query) use ($array){
                $query->select('product_id')
                    ->from('product_attributes')
                    ->whereIn('attribute_id',[$array]);
            })
            ->paginate(9);
    }
}
