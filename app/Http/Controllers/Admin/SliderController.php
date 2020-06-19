<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use App\Model\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function showViewEvent()
    {
        $data['events'] = Slider::all();
        return view('admin.pages.event.event', $data);
    }

    public function showViewAddEvent()
    {
        return view('admin.pages.event.add_event');
    }

    public function addEvent(EventRequest $request)
    {
        if ($request->image_event !== 'undefined') {
            $image = $request->file('image_event');
            $file_name = $request->key . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/event/' . $request->key), $file_name);
            $data = [
                'image_name' => $file_name,
                'image_path' => 'uploads/event/' . $request->key . '/' . $file_name
            ];
            $event = new Slider();
            $event->types = $request->key;
            $event->image = json_encode($data);
            $event->link = $request->link;
            $event->save();
            if ($event) {
                return response()->json([
                    'status' => 'true',
                    'message' => 'Thêm sự kiện thành công',
                    'url' => route('admin.event.showViewEvent'),
                ]);
            } else
                return response()->json([
                    'status' => 'false',
                    'message' => 'Thêm sự kiện thất bại!',
                ]);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Chưa chọn ảnh!',
            ]);
        }
    }

    public function showViewEditEvent($id)
    {
        $data['event'] = Slider::find($id);
        return view('admin.pages.event.edit_event', $data);
    }

    public function editEvent(EventRequest $request, $id)
    {
        $event = Slider::find($id);
        $event->types = $request->key;
        $event->link = $request->link;
        if ($request->image_event !== 'undefined') {
            $image = $request->file('image_event');
            $file_name = $request->key . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/event/' . $request->key), $file_name);
            $data = [
                'image_name' => $file_name,
                'image_path' => 'uploads/event/' . $request->key . '/' . $file_name
            ];
            $event->image = json_encode($data);
        }
        $event->save();
        if ($event) {
            return response()->json([
                'status' => 'true',
                'message' => 'Sửa sự kiện thành công',
                'url' => route('admin.event.showViewEvent'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Sửa sự kiện thất bại!',
            ]);
    }

    public function deleteEvent($id)
    {
        Slider::destroy($id);
        return back();
    }

}
