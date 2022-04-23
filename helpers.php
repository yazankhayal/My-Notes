<?php

if (!function_exists('path')) {
    function path()
    {
        return url('/') . env('PUBLIC_FOLDER');
    }
}

if (!function_exists('user')) {
    function user()
    {
        return \Illuminate\Support\Facades\Auth::user();
    }
}

if (!function_exists('listStatus')) {
    function listStatus()
    {
        $lists = [];
        $lists[0] = 'Disable';
        $lists[1] = 'Active';
        return $lists;
    }
}

if (!function_exists('listTypes')) {
    function listTypes()
    {
        $lists = [];
        $lists['text-white bg-primary'] = 'Primary';
        $lists['text-white bg-success'] = 'Success';
        $lists['text-white bg-danger'] = 'Danger';
        $lists['text-dark bg-warning'] = 'Warning';
        $lists['text-dark bg-info'] = 'Info';
        $lists['text-dark bg-light'] = 'Light';
        $lists['text-white bg-secondary'] = 'Secondary';
        return $lists;
    }
}

function getlistTypes($id)
{
    $lists = listTypes();
    return $lists[$id];
}

if (!function_exists('listPriority')) {
    function listPriority()
    {
        $lists = [];
        $lists['text-light'] = 'None';
        $lists['text-danger'] = 'High';
        $lists['text-success'] = 'Medium';
        $lists['text-primary'] = 'Low';
        return $lists;
    }
}

function getlistPriority($id)
{
    $lists = listPriority();
    return $lists[$id];
}

function current_route($x)
{
    if (\Route::current()->getName() == $x) {
        return "active";
    } else {
        return "";
    }
}

function setting(){
    return \App\Models\Setting::first();
}
function intro(){
    return \App\Models\Intro::first();
}

function pages(){
    return \App\Models\Pages::orderby('created_at','DESC')->get();
}
