<?php

namespace App\Support;



trait Dataviewer {
    public function scopeAdvancedFilter($query)
    {
        return $this->process($query, request()->all())
            ->orderBy(
                request('order_column', 'created_at'),
                request('Owner_name', 'desc')
            )
            ->paginate(request('limit',10));
    }


    public function process($query, $data)
    {
        return $query;
    }
}

