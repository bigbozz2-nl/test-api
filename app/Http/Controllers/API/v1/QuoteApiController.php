<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use App\Jobs\Quotes\GetQuotesJob;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuoteApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection|null
     */
    public function getQuotes(): ?AnonymousResourceCollection
    {
        $quotes = GetQuotesJob::dispatchSync(5);

        return QuoteResource::collection($quotes);
    }
}
