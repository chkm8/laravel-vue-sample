<?php

namespace App\Http\Controllers;

use App\Models\ImageStack;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageStackingController extends Controller
{
    public function index(ImageStack $imageStack)
    {
        $new_data = [];
        $this->recursive($imageStack->all(), $new_data);

        return response()->json($new_data);
    }

    private function recursive(Collection $data, array &$new_data, int &$counter = 0): array
    {
        if ($counter < $data->count()) {
            $image = $data[$counter];
            $new_data[$image->index][] = [
                'name' => $image->name,
                'path' =>  Storage::url($image->path)
            ];
            $counter++;
            $this->recursive($data, $new_data, $counter);
        }

        return $new_data;
    }
}
