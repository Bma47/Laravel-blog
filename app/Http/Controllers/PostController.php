<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;



class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(6);
        $users = User::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();
        $categories = Category::with('posts')->get();

        // Pass the users data to the view
        return view('post.index', compact('posts', 'users' ,'categories'));
    }

//->with('posts' , Post::OrderBy('title','DESC')->get());



    public function create()
    {
        $categories = Category::with('posts')->get();

        return view('post.create', compact('categories'));
    }



    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id', // Validate category_id exists in the categories table
        ]);

        // Generate a slug from the title
        $slug = Str::slug($request->title, '-');

        // Initialize image name
        $newImageName = null;

        // Handle image upload if an image is provided
        if ($request->hasFile('image')) {
            $newImageName = uniqid() . '-' . $slug . '-image.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }

        // Create the post, including category_id
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $slug,
            'image_path' => $newImageName, // This can be null if no image is uploaded
            'user_id' => auth()->id(), // Set the logged-in user as the author
            'category_id' => $request->input('category_id'), // Ensure you're saving this
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }



    public function show($slug)
    {
        // Fetch the post by slug
        $post = Post::where('slug', $slug)->with('user')->first(); // Assuming you have a relationship with User

        // Check if the post exists
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }

        // Fetch the user with their post count
        $user = User::withCount('posts')->find($post->user_id); // Assuming post has user_id field

        return view('post.show', compact('post', 'user'));
    }


    public function edit( $slug)
    {
        return view('post.edit')
            ->with('post', Post::where('slug', $slug)->first());

    }


    public function update (Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        Post::where('slug' , $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => $slug,
                'image_path' => $newImageName,
                'user_id' => auth()->user()->id
            ]);
        return redirect('/post/' . $slug)
            ->with('message','the post has been modified');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        Post::where('slug' , $slug)
            ->delete();
        return redirect('/post/' )
            ->with('message','the post has been delete');
    }
}
