<?php 

Route::get('/','Home/Index/index');
Route::get('a{aid}.html','Home/Content/index');
Route::get('con-l{cid}.html','Home/List/index');
Route::get('con-t{tid}.html','Home/List/index');