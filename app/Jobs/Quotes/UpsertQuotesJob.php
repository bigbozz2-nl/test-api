<?php

namespace App\Jobs\Quotes;

use App\Models\Quote;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Collection;

class UpsertQuotesJob
{
    use Dispatchable;

    private array $quotes;

    /**
     * Create a new job instance.
     */
    public function __construct(array $quotes)
    {
        $this->quotes = $quotes;
    }

    /**
     * Execute the job.
     */
    public function handle(): Collection
    {
        return collect($this->quotes)->map(function ($quote) {
            if (Quote::query()->where('quote', $quote)->exists()) {
                /** @var Quote $updateQuote */
                $updateQuote = Quote::query()->where('quote', $quote)->first();
                $updateQuote->request_amount++;
                $updateQuote->save();

                return $updateQuote;
            }

            $newQuote = new Quote();
            $newQuote->quote = htmlspecialchars($quote);
            $newQuote->request_amount = 1;
            $newQuote->save();

            return $newQuote;
        });
    }
}
