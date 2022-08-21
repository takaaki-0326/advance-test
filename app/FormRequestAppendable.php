<?php

namespace App;

use Illuminate\Support\Str;

trait FormRequestAppendable {

    public function all($keys = null) {

        $results = parent::all($keys);

        foreach($this->appends as $append) {

            $method = Str::camel('get_'. $append .'_attribute');

            if(method_exists($this, $method)) {

                $results[$append] = $this->{$method}($results);

            }

        }

        return $results;

    }

}
