<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YoutubeUrlRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       if ($value == ""){
           return false;
       }

       $urlParsedArr = parse_url($value);
       
       if (!isset($urlParsedArr['host'])) {
           return false;
       }

       return $urlParsedArr['host'] == "www.youtube.com" && $urlParsedArr['path'] == "/watch" && 
            substr($urlParsedArr['query'], 0, 2) == "v=" && substr($urlParsedArr['query'], 2) != "";
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Url is not YOUTUBE URL.';
    }
}
