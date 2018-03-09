<?php

if ( ! function_exists('route_parameter')) {
    /**
     * @param string $key
     * @param null   $default
     *
     * @return mixed
     */
    function route_parameter($key, $default = null)
    {
        return data_get(app('request')->route(), '2.' . $key, $default);
    }
}
