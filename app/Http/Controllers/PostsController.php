<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Posts;
use Image;
use Auth;
use App\User;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $posts = Posts::where('user_id',Auth::user()->id)->latest()->get();


        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'post_title'=>'required',
            'post_content'=>'required',
            'post_type'=>'required',
            'post_price'=>'required',
            'building_type'=>'required',
            'post_location'=>'required',
            'images' => 'required',
        ]);

        if($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        $images = $request->file('images');

        if ($request->hasFile('images')) {

            foreach($images as $image) {
                $filename = time().'_'.$image->getClientOriginalName();
                $location = public_path('uploads/posts/'. $filename);

                Image::make($image->getRealPath())->resize(400, 400)->save($location);

                $data[] = $filename;
            }
            

            
        } else {
            $filename = 'noimage.jpg';
        }


        $post = new Posts([
            'user_id' => auth()->id(),
            'post_title' => $request->get('post_title'),
            'post_content' => $request->get('post_content'),
            'post_type' => $request->get('post_type'),
            'post_price' => $request->get('post_price'),
            'post_year' => $request->get('post_year'),
            'post_floor' => $request->get('post_floor'),
            'post_furnished' => $request->get('post_furnished'),
            'post_therm' => $request->get('post_therm'),
            'post_features' => $request->get('post_features'),
            'building_type' => $request->get('building_type'),
            'post_location' => $request->get('post_location'),
            'post_promote' => $request->get('post_promote'),
            'images' => json_encode($data),
        ]);

        $post->save();

        return redirect('admin/posts')->with('toast_success', 'Anuntul a fost publicat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);

        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[

            'post_title'=>'required',
            'post_content'=>'required',
            'post_type'=>'required',
            'post_price'=>'required',
            'building_type'=>'required',
            'post_location'=>'required',
            
        ]);

        if($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }



        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $filename = time().'_'.$images->getClientOriginalName();
            $location = public_path('uploads/posts/'. $filename);

            Image::make($images->getRealPath())->resize(400, 400)->save($location);
        }


        $post = Posts::find($id);
        
        $post->post_title = $request->get('post_title');
        $post->post_content = $request->get('post_content');
        $post->post_type = $request->get('post_type');
        $post->post_price = $request->get('post_price');
        $post->post_year = $request->get('post_year');
        $post->post_floor = $request->get('post_floor');
        $post->post_furnished = $request->get('post_furnished');
        $post->post_therm = $request->get('post_therm');
        $post->post_features = $request->get('post_features');
        $post->building_type = $request->get('building_type');
        $post->post_location = $request->get('post_location');
        $post->post_promote = $request->get('post_promote');


        if($request->hasFile('images')) {
           $post->images = $filename;
        }

        $post->save();
        toast('Anuntul tau a fost modificat!','success')->width('100px;');

        return redirect('/admin/posts')->with('toast_info', 'Anuntul a fost modificat.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  

        $post = Posts::findOrFail($id);
        if($post->images != 'noimage.jpg') {
           
        if($post->images != 'noimage.jpg') {
            if(json_decode($post->images)) {
                foreach(json_decode($post->images) as $image)
                {
                    unlink(public_path('/uploads/posts/'. $image));
                }
            } else {
                unlink(public_path('/uploads/posts/'.$post->images));
            }
        }    

    }

        $post->delete();

        return redirect('/admin/posts')->with('toast_success', 'Anuntul a fost sters.');
    }
}
