<?php

namespace App\Http\Controllers;

use App\Models\ImageStack;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;

class IndexController extends Controller
{
    public function __invoke(ImageStack $imageStack)
    {
        dd('ddd');
        // $new_data = [];
        // $this->recursive($imageStack->all(), $new_data);
        // return view('index', $new_data);
        return view('index');
    }

    // private function recursive(Collection $data, array &$new_data, int &$counter = 0): array
    // {
    //     if ($counter < ($data->count() - 1)) {
    //         $image = $data[$counter];
    //         $new_data[$image->index][] = [
    //             'name' => $image->name,
    //             'path' => $image->path
    //         ];
    //         $counter++;
    //         $this->recursive($data, $new_data, $counter);
    //     }

    //     return $new_data;
    // }
}
