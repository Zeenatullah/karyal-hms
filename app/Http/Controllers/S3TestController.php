<?php

namespace App\Http\Controllers;

use Storage;
use App\S3File;
use Illuminate\Http\Request;

class S3TestController extends Controller
{
    public function index()
    {
        $files = S3File::all();

        return view('s3.s3-test')->with('files', $files);
    }

    public function show($image)
    {
        return "Image: $image";
    }

    public function store(Request $request)
    {
        $files = [];

        foreach ($request->file('files') as $file) {
            
            // $fileWithExt = $file->getClientOriginalName();
            // $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
            // $extension = $file->getClientOriginalExtension();
            // $filenameToStore = $filename.'_'.time().'.'.$extension;
            // $path = $file->storeAs('public/images', $filenameToStore);
            $path = $file->store('public/images', 's3');
            // Storage::disk('s3')->setVisibility($path, 'public');
            array_push($files, S3File::create(['filename' => 'S3 File', 'url' => $path]));
        }

        dd( $files );
    }
}
