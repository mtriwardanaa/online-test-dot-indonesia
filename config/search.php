<?php
use App\Helper\SearchResource;

return [
    'search_resource' => env('SEARCH_SOURCE', SearchResource::DATABASE->value),
];
