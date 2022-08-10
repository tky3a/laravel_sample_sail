<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;

class ArticlePayloadAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $resource = new ArticleResource([
            'id' => 1,
            'title' => 'Laravel REST API',
            'comments' => [
                [
                    'id' => 2134,
                    'body' => 'awesome',
                    'user_id' => 133345,
                    'user_name' => 'Application Developer'
                ]
            ],
            'user_id' => 13255,
            'user_name' => 'User1'
        ]);
        return $resource->response($request)
            ->header('content=type', 'application/hal+json');
    }
}
