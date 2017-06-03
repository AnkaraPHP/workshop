<?php

Route::bind('team', function($value, $route){
    return \App\Team::where("slug", $value)->first();
});

Route::group(["middleware" => "guest"], function(){
    Route::get("login", ["as" => "auth.login", "uses" => "AuthController@login"]);
    Route::post("login", ["as" => "auth.login", "uses" => "AuthController@doLogin"]);

    Route::get("register", ["as" => "auth.register", "uses" => "AuthController@register"]);
    Route::post("register", ["as" => "auth.register", "uses" => "AuthController@doRegister"]);
});

Route::group(["middleware" => "auth"], function(){

    Route::get("/", ["as" => "dashboard.index", "uses" => "DashboardController@index"]);

    Route::get("logout", ["as" => "auth.logout", "uses" => "AuthController@logout"]);
    Route::get("my", ["as" => "auth.settings", "uses" => "AuthController@settings"]);
    Route::put("my", ["as" => "auth.settings", "uses" => "AuthController@doSettings"]);


    Route::group(["as" => "team.", "prefix" => "{team}"], function(){

        Route::get("/", ["as" => "show", "uses" => "TeamController@show"]); // siteadi.com/{team}

        Route::group(["prefix" => "project", "as" => "project."], function(){
            Route::get("/", ["as" => "index", "uses" => "ProjectController@index"]); // {team}/project
            Route::get("create", ["as" => "create", "uses" => "ProjectController@create"]); // {team}/project/create
            Route::post("/", ["as" => "store", "uses" => "ProjectController@store"]); // {team}/project
            Route::get("{project}", ["as" => "show", "uses" => "ProjectController@show"]); // {team}/project/{project}
            Route::get("{project}/edit", ["as" => "edit", "uses" => "ProjectController@edit"]); // {team}/project/{project}/edit
            Route::put("{project}", ["as" => "update", "uses" => "ProjectController@update"]); // {team}/project/{project}
            Route::get("{project}/delete", ["as" => "destroy", "uses" => "ProjectController@destroy"]); // {team}/project/{project}/delete
        });

    });

});