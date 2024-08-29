<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaomlarRequest;
use App\Http\Requests\UpdateTaomlarRequest;
use App\Models\Image;
use App\Models\Taomlar_user;
use App\Models\Taomlar;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TaomlarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRandomDish()
    {

        $user = User::with('taomlar')->where('id', auth()->id())->first();


        $allMeals = Taomlar::query()->with('image')->get();

        $shownMeals = Taomlar_user::where('user_id', $user->id)
            ->pluck('taomlar_id')
            ->toArray();

        $remainingMeals = $allMeals->filter(function ($meal) use ($shownMeals) {
            return !in_array($meal->id, $shownMeals);
        });


        if ($remainingMeals->isEmpty()) {
            $remainingMeals = $allMeals;
            $shownMeals = [];
            Taomlar_user::where('user_id', auth()->id())->delete();
        }

        $dish = $remainingMeals->random();

        if (count($shownMeals) >= 5) {
            $marta = Taomlar_user::where('user_id', $user->id)->orderBy('created_at', 'asc')->first();
            $marta->delete();
        }

        Taomlar_user::create([
            'user_id' => $user->id,
            'taomlar_id' => $dish->id,
        ]);


        $image = $dish->image;
        session()->flash('submitted', true);
        return view('admin.meals.index', compact('dish', 'image'));
    }




    public function index()
    {
        $dish = Taomlar::query()->with('image')->get();
        return view('admin.meals.indexed', compact('dish'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaomlarRequest $request)
    {

        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/meal_images', $imageName);
            }

            $taom = Taomlar::create([
                'name_uz' => $request->input('name'),
                'instructions' => $request->input('instructions'),
            ]);


            if ($imageName) {
                Image::create([
                    'name' => pathinfo($imageName, PATHINFO_FILENAME),
                    'image_url' => 'meal_images/' . $imageName,
                    'taomlar_id' => $taom->id,
                ]);
            }

            return redirect()->route('admin.taomlar.index')->with('success', 'Meal created successfully!');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->with('error', 'An error occurred while creating the meal.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Taomlar $taomlar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Taomlar $taomlar)
    {
        return view('admin.meals.edit', compact('taomlar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaomlarRequest $request, Taomlar $taomlar)
    {
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                if ($taomlar->image) {
                    Storage::delete('public/' . $taomlar->image->image_url);
                    $taomlar->image->delete();
                }
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/meal_images', $imageName);
            }

            $taomlar->update([
                'name_uz' => $request->input('name'),
                'instructions' => $request->input('instructions'),
            ]);

            if ($imageName) {
                Image::updateOrCreate(
                    ['taomlar_id' => $taomlar->id],
                    [
                        'name' => pathinfo($imageName, PATHINFO_FILENAME),
                        'image_url' => 'meal_images/' . $imageName,
                    ]
                );
            }

            return redirect()->route('admin.taomlar.index')->with('success', 'Meal updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the meal.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $taomlar = Taomlar::findOrFail($id);

        $image = $taomlar->image;

        if ($image) {
            Storage::disk('public')->delete($image->image_url);

            $image->delete();
        }

        $taomlar->delete();

        return back();
    }


}
