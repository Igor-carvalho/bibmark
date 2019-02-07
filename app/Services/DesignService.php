<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\Design;

class DesignService
{
    /**
     * Get all designs
     * 
     * @return array
     */
    public function getAllDesigns()
    {
        return Design::all();
    }

    /**
     * Create or Update a design
     * 
     * @param array $data
     * @return App\Models\Design 
     */
    public function createOrUpdateDesign($data)
    {
        $design = null;
        $user = Auth::user();
        $values = [
            'name' => $data['name'],
            'exported_file' => $data['exported_file']
        ];
        if (isset($data['properties'])) {
            $values['properties'] = $data['properties'];
        }
        
        if (isset($data['id'])) {
            $design = Design::find($data['id']);
            $design->update($values);
        } else {
            $values['user_id'] = $user->id;
            $design = Design::create($values);
        }

        return $design;
    }

    /**
     * Delete a design
     * 
     * @param integer $designId
     * @return void
     */
    public function deleteDesign($designId)
    {
        $design = Design::find($designId);
        $design->delete();
    }
}