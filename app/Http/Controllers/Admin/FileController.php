<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $files = File::all();
        return view('admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.files.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:5120',
            'categories' => 'required|min:2'
        ]);


        $image_sizes = [
            'th' => [
                'width'     => 165,
                'height'    => 165,
            ],
            'md' => [
                'width'     => 820,
                'height'    => 820,
            ],
            'lg' => [
                'width'     => 1280,
                'height'    => 1280,
            ],
        ];

        $time = time();
        $str_random = Str::random(10);

        $image_name = $time.'_'.$str_random.'.'.$request->file('file')->getClientOriginalExtension();

        if (!Storage::exists('photos')) {
            Storage::makeDirectory('photos');
        }

        foreach ($image_sizes as $size => $value) {
            if (!Storage::exists('photos/'.$size)) {
                Storage::makeDirectory('photos/'.$size);
            }

            $image = Image::make($request->file('file'));

            if ($size == 'th') {
                $image->fit($value['width'], $value['height'], function($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(
                        storage_path().'\app\public\photos/'.$size.'/'.$image_name
                    );
            } else {
                $image->resize($value['width'], $value['height'], function($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save(
                    storage_path().'\app\public\photos/'.$size.'/'.$image_name
                );
            }
        }

        $file = File::create([
            'user_id' => auth()->user()->id,
            'url_th' => '/photos/th/'.$image_name,
            'url_md' => '/photos/md/'.$image_name,
            'url_lg' => '/photos/lg/'.$image_name,
        ]);

        $file->categories()->sync($request->categories);

        return redirect()->route('admin.files.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('admin.files.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $categories = Category::all();

        return view('admin.files.edit', compact('file', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'file' => 'image|max:5120',
            'categories' => 'required|min:2'
        ]);

        $image_sizes = [
            'th' => [
                'width'     => 165,
                'height'    => 165,
            ],
            'md' => [
                'width'     => 820,
                'height'    => 820,
            ],
            'lg' => [
                'width'     => 1280,
                'height'    => 1280,
            ],
        ];

        if ($request->file('file')) {
            Storage::delete($file->url_th);
            Storage::delete($file->url_md);
            Storage::delete($file->url_lg);

            $time = time();
            $str_random = Str::random(10);

            $image_name = $time.'_'.$str_random.'.'.$request->file('file')->getClientOriginalExtension();

            if (!Storage::exists('photos')) {
                Storage::makeDirectory('photos');
            }

            foreach ($image_sizes as $size => $value) {
                if (!Storage::exists('photos/'.$size)) {
                    Storage::makeDirectory('photos/'.$size);
                }

                $image = Image::make($request->file('file'));

                if ($size == 'th') {
                    $image->fit($value['width'], $value['height'], function($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })->save(
                            storage_path().'\app\public\photos/'.$size.'/'.$image_name
                        );
                } else {
                    $image->resize($value['width'], $value['height'], function($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save(
                        storage_path().'\app\public\photos/'.$size.'/'.$image_name
                    );
                }
            }

            $file->update([
                'url_th' => '/photos/th/'.$image_name,
                'url_md' => '/photos/md/'.$image_name,
                'url_lg' => '/photos/lg/'.$image_name,
            ]);

            $file->categories()->sync($request->categories);

        } else {
            $file->categories()->sync($request->categories);
        }

        return redirect()->route('admin.files.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $image_sizes = [
            'th' => str_replace('storage', 'public', $file->url_th),
            'md' => str_replace('storage', 'public', $file->url_md),
            'lg' => str_replace('storage', 'public', $file->url_lg)
        ];
        foreach ($image_sizes as $key => $value) {
            Storage::delete($value);
        };

        $file->delete();
        return redirect()->route('admin.files.index');
    }
}
