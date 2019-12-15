<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::paginate(9);
        $title = "Объявления";
        return view('adverts.index', compact('adverts', 'title'));
    }

    public function finds()
    {
        $adverts = Advert::whereType('find')->paginate(9);

        $title = "Объявления";
        return view('adverts.index', compact('adverts', 'title'));
    }

    public function losts()
    {
        $adverts = Advert::whereType('lost')->paginate(9);

        $title = "Объявления";
        return view('adverts.index', compact('adverts', 'title'));
    }

    public function myad()
    {
        $user = \Auth::user();
        $adverts = $user->adverts()->paginate(9);
        $title = "Мои объявления";
        return view('adverts.myad', compact('adverts', 'title'));
    }

    public function hidead(Request $request)
    {
        if ($request->advId) {
            $ad = Advert::findOrFail($request->advId);
            $ad->status = $request->status;
            $ad->save();
        }

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advert = new Advert();

        return view('adverts.create', compact('advert'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'type' => 'required',
            'category' => 'required',
            'incident_date' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'fee' => 'required',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            \DB::beginTransaction();
            $advert = Advert::create([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'category' => $request->category,
                'incident_date' => $request->incident_date,
                'phone' => $request->phone,
                'address' => $request->address,
                'fee' => $request->fee,
                'user_id' => auth()->user()->id,
            ]);


            if ($request->hasfile('images')) {
                foreach ($request->images as $file) {
                    $name = time() . $file->getClientOriginalName();
                    $file->move('image', $name);
                    $images[] = $name;
                }
            }

            if (!empty($images))
                foreach ($images as $image) {
                    $advert->images()->create(['name' => $image]);
                }

            \DB::commit();
            return redirect()->route('adverts.index');
        } catch (\Exception $exception) {
            dd($exception);
            \DB::rollBack();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        return view('adverts.show', compact('advert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Advert $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        //
    }
}
