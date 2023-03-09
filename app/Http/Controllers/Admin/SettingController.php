<?php

namespace App\Http\Controllers\Admin;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::find(1);
        return view('admin.setting.index',compact('setting'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'website_name' => 'required',
            'logo' => 'required',
            'favicon' => 'nullable',
            'desp' => 'nullable',
            'meta_title' => 'required',
            'meta_keyword' => 'nullable',
            'meta_desp' => 'nullable',
        ]);
        if($validator->fails())
        {
            return redirect('admin/settings')->back()->with('message','All fields are mandatory');
        }
        $setting = Setting::where('id', '1')->first();
        if($setting)
        {
            $setting->website_name = $request->website_name;

            if($request->hasfile('logo')){
                $destination ='uploads/settings/' .$setting->logo;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo = $filename;
            }

            
            if($request->hasfile('favicon')){
                $destination ='uploads/settings/' .$setting->favicon;
                if(File::exists($destination)){
                    File::delete($destination);
                }
                $file = $request->file('favicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon = $filename;
            }

            $setting->desp = $request->desp;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_desp = $request->meta_desp;

            $setting->update();
            return redirect('admin/settings')->with('message','Settings updated');
        }
        else{
            $setting = new Setting;
            $setting->website_name = $request->website_name;

            if($request->hasfile('logo')){
                $file = $request->file('logo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->logo = $filename;
            }

            
            if($request->hasfile('favicon')){
                $file = $request->file('favicon');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/', $filename);
                $setting->favicon = $filename;
            }

            $setting->desp = $request->desp;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_desp = $request->meta_desp;

            $setting->save();

            return redirect('admin/settings')->with('message','settings added');
        }

    }
}
