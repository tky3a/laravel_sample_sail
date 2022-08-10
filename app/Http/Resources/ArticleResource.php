<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use App\Http\Resources\CommentResourceCollection;
use App\Http\Resources\UserResource;

use sprintf;

class ArticleResource extends JsonResource
{
    public static $wrap = '';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['id'],
            'title' => $this->resource['title'],
            '_embedded' => [
                'comments' => new CommentResourceCollection(
                    new Collection($this->resource['comments'])
                ),
                'user' => new UserResource(
                    [
                        'user_id' => $this->resource['user_id'],
                        'user_name' => $this->resource['id']
                    ]
                ),
            ],
            '_links' => [
                'self' => [
                    'href' => sprintf(
                        'https"//example.com/articles/%s',
                        $this->resource['id']
                    )
                ]
            ],
        ];
    }
}
