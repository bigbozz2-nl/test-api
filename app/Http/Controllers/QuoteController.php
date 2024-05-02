<?php

namespace App\Http\Controllers;

use App\Jobs\Quotes\GetQuotesJob;
use Illuminate\Contracts\View\View;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|null
     */
    public function index(): ?View
    {
        $quotes = GetQuotesJob::dispatchSync(5);

        return view('quotes', compact('quotes'));
    }
}
