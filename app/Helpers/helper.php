<?php

use Illuminate\Support\Facades\Lang;



function paginate($object)
{
    return [
        'current_page' => $object->currentPage(),
        //'items' => $object->items(),
        'first_page_url' => $object->url(1),
        'from' => $object->firstItem(),
        'last_page' => $object->lastPage(),
        'last_page_url' => $object->url($object->lastPage()),
        'next_page_url' => $object->nextPageUrl(),
        'per_page' => $object->perPage(),
        'prev_page_url' => $object->previousPageUrl(),
        'to' => $object->lastItem(),
        'total' => $object->total(),
    ];
}

function t($key, $placeholder = [], $locale = null)
{

    $group = 'site';
    if (is_null($locale))
        $locale = config('app.locale');
    $key = trim($key);
    $word = $group . '.' . $key;
    if (Lang::has($word))
        return trans($word, $placeholder, $locale);

    $messages = [
        $word => $key,
    ];

    app('translator')->addLines($messages, $locale);
    $langs = ['ar', 'en'];
    foreach ($langs as $lang) {
        $translation_file = base_path() . '/resources/lang/' . $lang . '/' . $group . '.php';
        $fh = fopen($translation_file, 'r+');
        $new_key = "  \n  '$key' => '$key',\n];\n";
        fseek($fh, -4, SEEK_END);
        fwrite($fh, $new_key);
        fclose($fh);
    }
    return trans($word, $placeholder, $locale);
    return $key;
}
