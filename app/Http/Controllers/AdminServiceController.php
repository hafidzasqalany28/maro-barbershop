<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);

        $service = new Service;
        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->duration = $request->input('duration');
        $service->save();

        return redirect()->route('services.index')->with('success', 'Service baru telah ditambahkan.');
    }

    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);

        $service = Service::find($id);

        if (!$service) {
            return redirect()->route('services.index')->with('error', 'Service tidak ditemukan.');
        }

        $service->name = $request->input('name');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        $service->duration = $request->input('duration');
        $service->save();

        return redirect()->route('services.index')->with('success', 'Service telah diperbarui.');
    }

    public function destroy($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return redirect()->route('services.index')->with('error', 'Service tidak ditemukan.');
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service telah dihapus.');
    }
}
