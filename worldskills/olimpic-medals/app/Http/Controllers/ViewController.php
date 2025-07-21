<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use App\Models\Country;
use App\Models\Medal;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ViewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $countries = Country::with('medals', 'medals.competitors')
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
        $competitors = Competitor::all();

        $medals = Medal::with('country', 'competitors');

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

        return view('medals', compact('countries', 'medals', 'competitors'));
    }

    public function competitors(Request $request)
    {
        $search = $request->input('search', '');
        $page = $request->input('page', 1);

        $countries = Country::all();
        $competitors = Competitor::with('country');
        if (!empty($search)) {
            $competitors = $competitors->where(function ($query) use ($search) {
                $query->where('competitor_name', 'LIKE', "%$search%");
                $query->orWhere('competitor_lastname', 'LIKE', "%$search%");
                $query->orWhereHas('country', function ($query2) use ($search) {
                    $query2->where('country_code', 'LIKE', "%$search%");
                    $query2->orWhere('country_name', 'LIKE', "%$search%");
                });
            });
        }
        $competitors = $competitors->paginate(5);
        return view('competitors', compact('competitors', 'countries'));
    }

    public function competitorDetail($id)
    {
        $competitor = Competitor::with(['country', 'medals' => function ($q) {
            $q->with('country');
        }])->findOrFail($id);
        return view('competitor_detail', compact('competitor'));
    }

    public function ranking(Request $request)
    {
        $countries = Country::withCount([
            'medals as gold_medals' => function ($query) {
                $query->where('medal_type', 'gold');
            },
            'medals as silver_medals' => function ($query) {
                $query->where('medal_type', 'silver');
            },
            'medals as bronze_medals' => function ($query) {
                $query->where('medal_type', 'bronze');
            },
            'medals as total_medals',
        ])->orderByDesc('gold_medals')
            ->orderByDesc('silver_medals')
            ->orderByDesc('bronze_medals')
            ->orderByDesc('total_medals')
            ->get();

        return view('ranking', compact('countries'));
    }
}
