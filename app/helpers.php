<?php
function getApiResponse($url)
{
    $request = Request::create($url, 'GET');
    $response = Route::dispatch($request)->getContent();
    return $response;
}
