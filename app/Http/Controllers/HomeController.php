<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;

use App\User as User;
use App\Channel as Channel;
use App\Category as Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_channels = Channel::all();
        $all_category = Category::all();

        return view('admin/dashboard', [
            'channels' => $all_channels,
            'categories' => $all_category
        ]);
    }

    public function category()
    {
        $all_category = Category::all();

        return view('admin/category', [
            'categories' => $all_category
        ]);
    }


    public function Channels()
    {
        $all_channels = Channel::all();
        $all_category = Category::all();

        return view('admin/channels', [
            'categories' => $all_category,
            'channels' => $all_channels,
        ]);
    }

    public function newCategory(Request $request)
    {

        $newcategory = ([
            'category_name' => $request->category_name,
            'status' => 1,
        ]);

        if(Category::create($newcategory)) {
            alert()->success('You have successfully created a Category', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
            alert()->error('An error occurred', 'Oops!')->persistent('Close');
            return redirect()->back();
        }
    }

    public function saveCategory(Request $request)
    {

        $id = $request->id;

        $category = Category::find($id);
        $category->category_name = $request->category_name;


        if($category->update()) {
            alert()->success('Changes saved', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
            alert()->error('An error occurs', 'Oops')->persistent('Close');
            return redirect()->back();
        }
    }

    public function changeCategoryStatus($id)
    {
        $category = Category::find($id);
        $category_status = $category['status'];

        $category_status == 1 ? $category->status = 0 : $category->status = 1;

        if($category->save()) {
            foreach($category->channel as $channel){
                $main_channel = Channel::find($channel->id);
                $channel_status = $main_channel->status;
                $main_channel->status = $channel_status == 1 ? $main_channel->status = 0 : $main_channel->status = 1;;
                $main_channel->save();
            }
            $category_status == 1 ? alert()->success('You have successfully deactivated a category', 'Success')->persistent('Close') : alert()->success('You have successfully activated a category', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
            alert()->error('An Error Occurred', 'Oops!')->persistent('Close');
            return redirect()->back();
        }
    }

    //==========================================================================================================
    public function newChannel(Request $request)
    {
        try{
            $this->validate($request, [
                'channel_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            ]);
        } catch(ValidationException $e) {
            alert()->error('Image size is greater than 4MB', 'Oops');
            return redirect()->back();
        }


        $channel_name = $request->channel_name;

        $channel_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $channel_name), '-'));

        $channel_image = $channel_slug.'.'.$request->channel_image->getClientOriginalExtension();

        if(empty($channel_image)){
            alert()->error('Kindly Upload the channel image', 'Oops');
            return redirect()->back();
        }

        $request->channel_image->move(public_path('uploads/image'), $channel_image);

        $newchannel = ([
            'channel_name' => $request->channel_name,
            'channel_type' => $request->channel_type,
            'channel_url' => $request->channel_url,
            'category_id' => $request->category_id,
            'channel_image' => $channel_image,
            'status' => 1,
        ]);

        if(Channel::create($newchannel)) {
            alert()->success('You have successfully created a channel', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
            alert()->error('An error occurred', 'Oops!')->persistent('Close');
            return redirect()->back();
        }
    }

    public function deleteChannel($id)
    {
        $channel = Channel::find($id);
        $channel_id = $channel['id'];

        $delete_channel = channel::where('id', $id)->delete();

        if($delete_channel) {
            alert()->success('You have successfully delete a channel', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
            alert()->error('An Error Occurred', 'Oops!')->persistent('Close');
            return redirect()->back();
        }
    }

    public function changeChannelStatus($id)
    {
        $channel = Channel::find($id);
        $channel_status = $channel['status'];

        $channel_status == 1 ? $channel->status = 0 : $channel->status = 1;

        if($channel->save()) {
            $channel_status == 1 ? alert()->success('You have successfully deactivated a channel', 'Success')->persistent('Close') : alert()->success('You have successfully activated a channel', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
            alert()->error('An Error Occurred', 'Oops!')->persistent('Close');
            return redirect()->back();
        }
    }

    public function saveChannel(Request $request)
    {

        $id = $request->id;

        $channel = Channel::find($id);

        $channel_name = $request->channel_name;

        $channel_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $channel_name), '-'));

        if(!empty($request->channel_image)){
            $channel_image = $channel_slug.'.'.$request->channel_image->getClientOriginalExtension();
            $request->channel_image->move(public_path('uploads/image'), $channel_image);

            $channel->channel_name = $request->channel_name;
            $channel->channel_type = $request->channel_type;
            $channel->channel_url = $request->channel_url;
            $channel->category_id = $request->category_id;
            $channel->channel_image = $channel_image;
        }else{
            $channel->channel_name = $request->channel_name;
            $channel->channel_type = $request->channel_type;
            $channel->channel_url = $request->channel_url;
            $channel->category_id = $request->category_id;
        }


        if($channel->update()) {
            alert()->success('Changes saved', 'Success')->persistent('Close');
            return redirect()->back();
        }else{
            alert()->error('An error occurs', 'Oops')->persistent('Close');
            return redirect()->back();
        }
    }

    public function saveProfile(Request $request)
    {
        $data = $request->all();

        $user = User::find($request->id);
        if(empty($request->new_password) && empty($request->confirm_password)) {
            if(\Hash::check($data['old_password'], Auth::user()->password)) {
                $user->name = $request->name;
                $user->username = $request->username;
            }else{
                alert()->error('Wrong Old password, Try again with the right one', 'Oops!')->persistent('Close');
                return redirect()->back();
            }
        }else{
            if(\Hash::check($data['old_password'], Auth::user()->password)){
                if($request->new_password == $request->confirm_password){
                    $user->name = $request->name;
                    $user->username = $request->username;
                    $user->password = bcrypt($request->new_password);

                }else{
                    alert()->error('Password mismatch', 'Oops!')->persistent('Close');
                    return redirect()->back();
                }
            }else{
                alert()->error('Wrong Old password, Try again with the right one', 'Oops!')->persistent('Close');
                return redirect()->back();
            }
        }

        if($user->update()) {
            alert()->success('Save Changes', 'Success')->persistent('Close');
            return redirect()->back();
        }
    }
}
