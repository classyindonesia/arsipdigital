<?php
$router->model('mst_file', 'App\Models\Mst\File');

/* get file by mst_arsip_id */
Route::bind('mst_file_arsip', function($id)
{
    return App\Models\Mst\File::where('mst_arsip_id', $id)->get();
});