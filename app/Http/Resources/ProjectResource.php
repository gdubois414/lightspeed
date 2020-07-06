<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Format our project data properly. Leverage a Task Resource to create a collection of tasks for this project.
        return [
            'id' => $this->id,
            'name' => $this->name,
            'tasks' => TaskResource::collection($this->tasks),
            'total_hours' => $this->calculateTotalHours()
        ];
    }
}
