<?php
namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait MetronicPaginate
{

    public static function getColumns()
    {
        $table = with(new static)->getTable(); //return table name
        $columns = Schema::getColumnListing($table); //get all column names from a table
        return $columns;
    }

    public static function scopeMetronicPaginate($modelQuery)
    {
        $pagination = request()->pagination;
        $query = request()->input('query');
        $sort = request()->sort;
        request()->request->add(['page' => $pagination['page']]);
        $model = $modelQuery;
        $columns = static::getColumns();
        if ($query)
            foreach ($query as $key => $value) {
                if (in_array($key, $columns) ) {
                    $model->where($key, $value); 
                }

                if (($key == 'generalSearch')) {

                    $model->where(function ($q) use ($columns, $value) {
                        foreach ($columns as $column) {
                            if (!in_array($column, ['created_at', 'updated_at', 'deleted_at', 'email_verified_at','birthday','avatar','is_admin','city','state','postal_code','street_address' /* 'banned_at','dob' */]))
                            $q->orWhere($column, 'like', '%' . $value . '%');

                        }
                    });
                }
            }
        if ($sort && in_array($sort['field'], $columns)) {
            if ($sort['field'] != 'id'){
                $model->orderBy($sort['field'], $sort['sort']);
            }
        }

        $pagination['rowIds'] = $modelQuery->pluck('id'); // add this for multi select
        $model = $model->paginate($pagination['perpage']);

        $pagination['total'] = $model->total();
        $pagination['pages'] = $model->lastPage();
        $pagination['sort'] =  $sort['sort'] ?? '';
        $pagination['field'] = $sort['field'] ?? '';
        $pagination['iTotalRecords'] = $model->total();
        $pagination['iTotalDisplayRecords'] = $model->total();
        $pagination['sEcho'] = 0;
        $response = [
            'meta' => $pagination,
            'data' => $model->toArray()['data']
        ];
        return $response;
    }





}
