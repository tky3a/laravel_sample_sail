<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PublisherService;
use Symfony\Component\HttpFoundation\Response;

class PublisherAction extends Controller
{
    private $publisher;

    public function __construct(PublisherService $publisherService)
    {
        $this->publisher = $publisherService;
    }

    public function create(Request $request)
    {
        // publisherServiceのexistsを呼び出しているのでtrue, falseで判定される
        if ($this->publisher->exists($request->name)) {
            return response('', Response::HTTP_OK); // 既に登録済みの場合、200を返す
        }

        // 登録して201を返却
        $id = $this->publisher->store($request->name, $request->address);
        return response('', Response::HTTP_CREATED)
            ->header('Location', '/api/publishers/' . $id);
    }
}
