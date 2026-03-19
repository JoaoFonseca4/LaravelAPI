<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'secret' => $this->when(false, 'secret-value'),
            $this->mergeWhen(true, function(){
                return [
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                ];
            }),
        ];
    }
}
