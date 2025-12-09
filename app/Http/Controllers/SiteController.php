<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class SiteController extends Controller
{
    public function page($page)
    {
        $viewName = "pages.{$page}";
        if (view()->exists($viewName)) {
            return view($viewName);
        }
        abort(404);
    }
    public function campaigns()
    {
        $campaigns = collect(config('cms.campaign'));
        // $campaigns = Campaign::all();
        return view('pages.campaigns.index', compact('campaigns'));
    }
}
