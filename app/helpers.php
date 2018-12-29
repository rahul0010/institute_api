<?php

function getApiResponse($url)
{
    $request = Request::create($url, 'GET');
    $response = Route::dispatch($request)->getContent();
    return $response;
}

function getLastId($table)
{
    $id = DB::table('information_schema.tables')->select('auto_increment as id')->where('table_schema','institute_api')->where('table_name',$table)->value('id');
    return $id;
}
