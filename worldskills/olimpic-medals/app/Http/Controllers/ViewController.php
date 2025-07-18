<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Medal;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ViewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $countries = Country::with('medals')
            ->withCount([
                'medals as gold_medals' => function ($query) {
                    $query->where('medal_type', 'gold');
                },
                'medals as silver_medals' => function ($query) {
                    $query->where('medal_type', 'silver');
                },
                'medals as bronze_medals' => function ($query) {
                    $query->where('medal_type', 'bronze');
                },
                'medals as total_medals'
            ]);

        if (!empty($search)) {
            $countries = $countries->where(function ($query) use ($search) {
                $query->where('country_code', 'LIKE', "%$search%");
                $query->orWhere('country_name', 'LIKE', "%$search%");
            });
        }

        $countries = $countries->get();

        return view('home', compact('countries'));
    }

    public function countries(Request $request)
    {
        $search = $request->input('search', '');
        $page = $request->input('page', 1);

        $countries = Country::with('medals')
            ->withCount([
                'medals as gold_medals' => function ($query) {
                    $query->where('medal_type', 'gold');
                },
                'medals as silver_medals' => function ($query) {
                    $query->where('medal_type', 'silver');
                },
                'medals as bronze_medals' => function ($query) {
                    $query->where('medal_type', 'bronze');
                },
                'medals as total_medals'
            ]);

        if (!empty($search)) {
            $countries = $countries->where(function ($query) use ($search) {
                $query->where('country_code', 'LIKE', "%$search%");
                $query->orWhere('country_name', 'LIKE', "%$search%");
            });
        }

        $countries = $countries->paginate(5);

        return view('countries', compact('countries'));
    }
    public function medals(Request $request)
    {
        $search = $request->input('search', '');

        $countries = Country::all();

        $medals = Medal::with('country');

        if (!empty($search)) {
            $medals = $medals->where(function ($query) use ($search) {
                $query->where('medal_type', 'LIKE', "%$search%");
                $query->orWhere('medal_sport', 'LIKE', "%$search%");
                $query->orWhere('medal_year', 'LIKE', "%$search%");
                $query->orWhereHas('country', function ($query2) use ($search) {
                    $query2->where('country_code', 'LIKE', "%$search%");
                    $query2->orWhere('country_name', 'LIKE', "%$search%");
                });
            });
        }

        $medals = $medals->paginate(10);

        return view('medals', compact('countries', 'medals'));
    }
}
