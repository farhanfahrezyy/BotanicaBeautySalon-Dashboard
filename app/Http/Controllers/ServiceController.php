<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(Request $request)
{
    $type_menu = 'service';

    $services = Service::when($request->input('title'), function ($query, $title) {
        return $query->where('title', 'like', '%' . $title . '%');
    })
    ->when($request->input('sort'), function ($query, $sort) {
        return $query->orderBy('price', $sort);
    })
    ->paginate($request->input('pagination', 10));

    return view('pages.admin.services.index', compact('services', 'type_menu'));
}




    public function show(Service $service)
    {

        $services = Service::all(); // Fetch all services, or paginate if needed
        return view('pages.main.service', ['activeMenu' => 'service'], compact('services'));
    }


    public function create()
    {
        $type_menu = 'service';
        return view('pages.admin.services.create', compact('type_menu'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480', // Required and max 20MB
            'service_link' => 'required|string|max:500',
        ]);

        // Store the uploaded image file
        if ($request->hasFile('image')) {
            // Ensure the 'public/images' directory exists
            if (!File::exists(public_path('images'))) {
                File::makeDirectory(public_path('images'), 0755, true); // Create directory with permissions
            }

            // Generate a unique name for the image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName); // Save image in 'public/images' directory
            $data['image'] = $imageName;
        }

        // Create the service with the provided data
        Service::create([
            'title' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName, // Image path is required and stored here
            'service_link' => $request->service_link,
        ]);

        return redirect()->route('admin.service.index')->with('success', 'Service created successfully.');
    }



    public function edit(Service $service)
    {
        $type_menu = 'service';
        return view('pages.admin.services.edit', compact('service', 'type_menu'));
    }

    public function update(Request $request, Service $service)
    {
        // Adjust validation to make 'image' field optional
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048', // 20MB max, nullable to make it optional
            'service_link' => 'required|string|max:500',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            // Store the new image and update the 'image' field
            $service->image = $request->file('image')->store('services', 'public');
        }

        // Update other fields
        $service->update([
            'title' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'service_link' => $request->service_link,
        ]);

        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }


    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();
        return redirect()->route('admin.service.index')->with('success', 'Service deleted successfully.');
    }
}
