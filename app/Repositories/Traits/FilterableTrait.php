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
                    if (is_array($url[$key]))
                        $query->allowedFilters(array_keys($url[$key]));
                    else
                        $query->allowedFilters($url[$key]);

                    break;
                case 'include':
                    if (is_array($url[$key]))
                        $query->allowedIncludes(array_keys($url[$key]));
                    else
                        $query->allowedIncludes($url[$key]);

                    break;
                case 'sort':
                    if (is_array($url[$key]))
                        $query->allowedSorts(array_keys($url[$key]));
                    else
                        $query->allowedSorts($url[$key]);
                    break;
                case 'fields':
                    if (is_array($url[$key]))
                        $query->allowedFields(array_keys($url[$key]));
                    else
                        $query->allowedFields($url[$key]);

                    break;
                case 'append':
                    if (is_array($url[$key]))
                        $query->allowedAppends(array_keys($url[$key]));
                    else
                        $query->allowedAppends($url[$key]);
                    break;
            }


        }

        return $query;

    }

    /**
     * depracated, used for testing
     * @param $url
     * @param $query
     * @return mixed
     */
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
