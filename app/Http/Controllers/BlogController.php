<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use URL;

class BlogController extends Controller
{
    /**
     * Display all the blog listing view with blogs which have active status.
     */
    public function index(){
        try{
            $blogs = Blog::where('status','active')->paginate(6);
            return view('blogs.index')->with('blogs',$blogs);
        } catch (Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function singleBlog(Request $request,$id){
        try{
            $blog = blog::find($id);
            if($blog){
                return view('blogs.single-blog')->with('blog',$blog);
            } else {
                return redirect()->back()->with('error'," Blog not available");
            }

        } catch (Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the blog listing view with blogs of login user.
     */
    public function userIndex(){
        try{
            $userid = auth()->user()->id;
            $blogs = Blog::where('user_id',$userid)->latest()->paginate(3);
            return view('dashboard')->with('blogs',$blogs);
        } catch (Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }


    /**
     * Display the Create Blog view and also handle request for creating a new Blog.
     */
    public function create(Request $request){
        try{
            if($request->isMethod('post')){
                $validated = $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'required|mimes:jpeg,png,jpg',
                ]);
                $blog = new Blog;
                if($request->hasFile('image')){
                    $image_temp = $request->file('image');
                    if($image_temp->isValid()){
                        $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
                        $path = $request->file('image')->storeAs('images/blogs',$imageName,'public');
                    }
                }
                $blog->title = $request->title;
                $blog->description = $request->description;
                $blog->image = URL::to('/').'/storage/'.$path;
                $blog->user_id = auth()->user()->id;
                if($blog->save()){
                    return redirect()->route('dashboard')->with('sucess',$blog->title." Blog Added successfully");
                }
            } else {
                return view('blogs.create');
            }
        } catch (Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }


    /**
     * Change status of the blog.
     */
    public function updateStatus($id)
    {
        try{
            
            $blog = Blog::find($id);
            if($blog){
                if($blog->status == 'active'){
                    $blog->status = 'deactive';
                } else{
                    $blog->status='active';
                }
                if($blog->save()){
                    return redirect()->back()->with('sucess',$blog->title." Blog status updated");
                }
            }
        } catch (Exception $e){
                return redirect()->back()->with('error',$e->getMessage());
        }
    }


    /**
     * Distroy the perticular blog.
     */
    public function destroy($id)
    {
        try{
            $blog = Blog::find($id);
            if($blog){
                $blog->delete();
                return redirect()->back()->with('error',$blog->title." Blog deleted successfully");
            }
        } catch (Exception $e){
                return redirect()->back()->with('error',$e->getMessage());
        }
    }


    /**
     * Display a perticular blog view and update it.
     */
    public function show(Request $request,$id)
    {
        try{
            $blog = blog::find($id);
            if($request->isMethod('post')){
                $validated = $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                ]);
                $image = $blog->image;
                    if($request->hasFile('image')){
                        $image_temp = $request->file('image');
                        if($image_temp->isValid()){
                            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
                            $path = $request->file('image')->storeAs('images/blogs',$imageName,'public');
                            $image = URL::to('/').'/storage/'.$path;
                        }
                    }
                    $blog->title = $request->title;
                    $blog->description = $request->description;
                    $blog->image = $image;
                    $blog->user_id = auth()->user()->id;
                    if($blog->save()){
                        return redirect()->back()->with('sucess',$blog->title." Blog Updated successfully");
                    }

            } else {
                if($blog){
                    return view('blogs.view')->with('blog',$blog);
                } else {
                    return redirect()->back()->with('error'," Blog not available");
                }
            }
        } catch (Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
