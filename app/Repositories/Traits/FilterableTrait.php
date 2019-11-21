<?php

namespace App\Repositories\Traits;

use Spatie\QueryBuilder\QueryBuilder;

trait FilterableTrait {

    /**
     * Sanitize and filter given api url with given model
     * @param $url
     * @param $model
     * @return \Illuminate\Database\Eloquent\Collection|QueryBuilder|QueryBuilder[]
     */
    public function filterQuery($url, $model){

        $query = QueryBuilder::for($model);

        foreach($url as $key => $value)
        {
            switch(strtolower($key))
            {
                case 'filter':
                    if (is_array($url['filter']))
                        $query->allowedFilters(array_keys($url['filter']));
                    else
                        $query->allowedFilters($url['filter']);

                    break;
                case 'include':
                    if (is_array($url['include']))
                        $query->allowedIncludes(array_keys($url['include']));
                    else
                        $query->allowedIncludes($url['include']);

                    break;
                case 'sort':
                    if (is_array($url['sort']))
                        $query->allowedSorts(array_keys($url['sort']));
                    else
                        $query->allowedSorts($url['sort']);
                    break;
                case 'fields':
                    if (is_array($url['fields']))
                        $query->allowedFields(array_keys($url['fields']));
                    else
                        $query->allowedFields($url['fields']);

                    break;
                case 'append':
                    if (is_array($url['append']))
                        $query->allowedAppends(array_keys($url['append']));
                    else
                        $query->allowedAppends($url['append']);
                    break;
                case 'count':
                    $query->paginate($url['count']);
                    break;
                default:
                    $query->get();
            }


        }

        return $query->get();

    }

    public function filterQuery2($url, $query){

        foreach($url as $key => $value) {
            if (in_array(strtolower($key), config('query-builder.parameters'))) {

                if (is_array($url[strtolower($key)])){
                    $query->allowedFilters(array_keys($url[$key]));
                } else {
                    $query->allowedFilters($url[$key]);
                }

            }
        }

        return $query->get();

    }

}
