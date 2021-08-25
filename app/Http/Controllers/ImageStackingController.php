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

    public function post(Request $request, ImageStack $image_stack)
    {
        /**
         * TODO: For some reasons, $request validate does not return the validation error maybe I config issue
         * or its a known error with the latest version of laravel 8.54, I already tried to create a Request class
         * (ImageStackValidator) but its also not working. Will check this and maybe try to create a new project using
         * a stabled version of laravel may be 6(LTS) or 7/8
         */
        // $validated = $request->validate([
        //     'index' => 'required',
        //     'imageAttachment' => 'required',
        // ]);

        $file_name = time() . '_' . $request->imageAttachment->getClientOriginalName();
        $file_path = $request->file('imageAttachment')->storeAs('images', $file_name, 'public');

        $image = $image_stack->create(
            [
                'index' => $request->index,
                'name' => $file_name,
                'path' => $file_path,
            ]
        );

        return response()->json($image);
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
