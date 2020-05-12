<?php

namespace App\Http\Controllers\Admin;

use App\Model\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function showDashboard()
    {
        return view('admin.pages.admin_dashboard_event');
    }

    public function showViewEvent()
    {
        $data['events'] = Slider::paginate(10);
        return view('admin.pages.slider.event', $data);
    }

    public function showViewAddEvent()
    {
        return view('admin.pages.slider.add_event');
    }

    public function AddEvent(Request $request)
    {
        $image = $request->file('image_event');
        $file_name = $request->key . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $file_name);
        $data = [
            'image_name' => $file_name,
            'image_path' => 'uploads/' . $file_name
        ];
        $event = new Slider();
        $event->types = $request->key;
        $event->image = json_encode($data);
        $event->save();
        return back()->withInput()->with('success', 'Thêm sự kiện thành công!');
    }
}
