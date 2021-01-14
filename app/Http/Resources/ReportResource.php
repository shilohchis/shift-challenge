<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'final' => $this->final,
            'is_intraversion' => $this->is_intraversion,
            'is_sensing' => $this->is_sensing,
            'is_thinking' => $this->is_thinking,
            'is_judging' => $this->is_judging
        ];
    }
}
