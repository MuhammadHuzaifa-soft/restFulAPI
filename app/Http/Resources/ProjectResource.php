<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            // 'tasks1' => $this->tasks,
            // 'tasks2' => TaskResource::collection($this->tasks),
            'tasks' => TaskResource::collection($this->whenLoaded('tasks')),
            'tasks_count' => $this->when(!is_null($this->tasks_count) ,$this->tasks_count),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }

    public function with($request)
    {
        return [
            'status' => 'ok',
        ];
    }
}