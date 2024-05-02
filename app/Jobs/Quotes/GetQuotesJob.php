<?php

namespace App\Jobs\Quotes;

use Exception;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class GetQuotesJob
{
    use Dispatchable;

    private int $amount;

    /**
     * Create a new job instance.
     *
     * @param int $amount
     */
    public function __construct(int $amount = 5)
    {
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     *
     * @throws Exception
     */
    public function handle(): Collection
    {
        $quoteList = [];

        for ($x = 1; $x <= $this->amount; $x++) {
            $quoteList[] = $this->getRandomQuoteFromApiEndpoint();
        }

        return UpsertQuotesJob::dispatchSync($quoteList);
    }

    /**
     * Get the quote from the API endpoint.
     *
     * @return string|null
     */
    private function getRandomQuoteFromApiEndpoint(): ?string
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get(config('quotes.api.endpoint'));

        if ($response->ok()) {
            $json = $response->json();
            return $json['quote'];
        }

        return null;
    }
}
