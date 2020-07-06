<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /*
         * Manually create an array of projects related to this User.
         * Trying to leverage the Project Resource created an infinite loop of Project/User resources
         */
        $projects = [];
        foreach($this->projects as $project){
            $users = [];
            foreach($project->users as $user){
                $users[] = [
                    'id' => $user->id,
                    'name' => $user->name
                ];
            }
            $projects[] = [
                'id' => $project->id,
                'name' => $project->name,
                'users' => $users,
                'total_hours' => $project->calculateTotalHours()
            ];
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'projects' => $projects
        ];
    }
}
