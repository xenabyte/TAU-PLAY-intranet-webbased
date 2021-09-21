<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;

use App\User as User;
use App\Channel as Channel;
use App\Category as Category;
use App\Viewer as Viewer;
use Log;

class StreamController extends Controller
{



    public function index(Request $request)
    {
        $all_channels = Channel::with('viewer')->where('status', 1)->get();
        $all_category = Category::where('status', 1)->get();

        $slider_channel = Channel::Where('status', 1)->inRandomOrder()->take(1)->get();
        $user_agent  = $request->header('User-Agent');
        $ip_address = $request->ip();

        $existing_viewer =  Viewer::where('ip_address', $ip_address)->where('user_agent', $user_agent)->get();
        foreach($existing_viewer as $viewer){
            $old_viewer = Viewer::find($viewer->id);
            $old_viewer->status = 0;
            $old_viewer->save();
        }

        return view('welcome', [
            'channels' => $all_channels,
            'categories' => $all_category,
            'slider_channel' => $slider_channel
        ]);
    }

    public function streamChannel(Request $request, $id)
    {
        $channel = Channel::where('id', $id)->where('status', 1)->first();
        $other_channels = Channel::where('category_id', $channel->category_id)->where('status', 1)->get();
        $user_agent  = $request->header('User-Agent');
        $ip_address = $request->ip();

        if(!$channel) {
            alert()->success('Channel have been deactivated', 'Success')->persistent('Close');
            return redirect()->back();
        }

        //create viewer
        $viewer_exist = count(Viewer::where('channel_id', $id)->where('ip_address', $ip_address)->where('user_agent', $user_agent)->get());

        if($viewer_exist > 0) {

            $existing_channel_viewer =  Viewer::where('channel_id', $id)->where('ip_address', $ip_address)->where('user_agent', $user_agent)->get();
            foreach($existing_channel_viewer as $viewer){
                $old_viewer = Viewer::find($viewer->id);
                $old_viewer->status = 1;
                $old_viewer->save();
            }

            $existing_viewer =  Viewer::where('channel_id', '!=', $id)->where('ip_address', $ip_address)->where('user_agent', $user_agent)->get();
            foreach($existing_viewer as $viewer){
                $old_viewer = Viewer::find($viewer->id);
                $old_viewer->status = 0;
                $old_viewer->save();
            }

        }else{
            //check
            $new_viewer = ([
                'channel_id' => $id,
                'user_agent' => $user_agent,
                'ip_address' => $ip_address,
                'status' => 1
            ]);

            Viewer::create($new_viewer);
        }

        return view('streamer', [
            'channel' => $channel,
            'other_channels' => $other_channels
        ]);
    }

}
