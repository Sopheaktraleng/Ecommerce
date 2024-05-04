<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slideshow; // Assuming your Slideshow model is in App\Models namespace

class SlideshowController extends Controller
{
    public function listAll()
    {
        $slideshows = Slideshow::orderBy('ssorder')->paginate(10);
        return view('admin.slideshow.index', compact('slideshows')); // 'slideshows', not 'slideshow'
    }
    public function enableDisable(String $id, string $action){
        $slideshows = Slideshow::find($id);
        $slideshows->enable = $action==('1'? 0 : 1);
        $slideshows->save();
        $slideshows = Slideshow::orderBy('ssorder')->paginate(10);
        return view('admin.slideshow.index', compact('slideshows')); // 'slideshows', not 'slideshow'
    }
    public function moveUpDown(String $id, string $action){
        $slideshows = Slideshow::find($id);
        if(!$slideshows) {
            // Handle the case where slideshow with given ID is not found
            return redirect()->back()->with('error', 'Slideshow not found.');
        }
    
        $upperSlideshow = null;
        if($action=='1'){
            $upperSlideshow = Slideshow::where('ssorder', '<', $slideshows->ssorder)->orderBy('ssorder', 'desc')->first();
            if(!$upperSlideshow) {
                // Handle the case where there's no upper slideshow
                return redirect()->back()->with('error', 'No upper slideshow found.');
            }
            $tmd = $slideshows->ssorder;
            $slideshows->ssorder = $upperSlideshow->ssorder;
            $upperSlideshow->ssorder = $tmd;
        }
        else {
            $upperSlideshow = Slideshow::where('ssorder', '>', $slideshows->ssorder)->orderBy('ssorder', 'asc')->first();
            if(!$upperSlideshow) {
                // Handle the case where there's no lower slideshow
                return redirect()->back()->with('error', 'No lower slideshow found.');
            }
            $tmd = $slideshows->ssorder;
            $slideshows->ssorder = $upperSlideshow->ssorder;
            $upperSlideshow->ssorder = $tmd;
        }
        $slideshows->save();
        $upperSlideshow->save();
        $slideshows = Slideshow::orderBy('ssorder')->paginate(10);
        return view('admin.slideshow.index', compact('slideshows'));
    }
    public function delete(String $id){
    $slideshows = Slideshow::find($id);
    if($slideshows != null) {
        $slideshows->delete();
        $slideshows = Slideshow::orderBy('ssorder')->paginate(10);
        return view('admin.slideshow.index', compact('slideshows'))->with("success", "A Slideshow has been deleted successfully!");
        }
    else{
        $slideshows = Slideshow::orderBy('ssorder')->paginate(10);;
        return view('admin.slideshow.index', compact('slideshows'))->with("fail", "Slideshow not found!");
        }   
    }
    public function form(){
        return view('admin.slideshow.form');
    }
    public function add(Request $request){
        $slideshows = new Slideshow();
        $slideshows->title = $request->txttitle;
        $slideshows->subtitle = $request->txtsubtitle;
        $slideshows->text = $request->tatext;
        $slideshows->link = $request->txtlink;
        $slideshows->enable = "0";
        if($request->has('chkenable'))
        {
            $slideshows->enable = "1";
        }
        $ext = $request->file('fileimg')->getClientOriginalExtension();
        $iname = time() . "." .$ext;
        $request->file('fileimg')->move(public_path('images/slideshows',$iname));
        $slideshows->img = $iname;
        $slideshows->save();
        $slideshows = Slideshow::orderBy('ssorder')->paginate(10);
        return view('admin.slideshow.index', compact('slideshows'));
    }
}
