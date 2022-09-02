<?php

namespace App\Console\Commands;

use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\ExchangeRateRepositoryInterface;
use App\Services\CurrencyLayerServiceInterface;
use Illuminate\Console\Command;

class UpdateExchangeRatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange_rates:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update exchange rates';

    private CurrencyLayerServiceInterface $currencyLayerService;
    private CurrencyRepositoryInterface $currencyRepository;
    private ExchangeRateRepositoryInterface $exchangeRateRepository;

    public function __construct(
        CurrencyLayerServiceInterface $currencyLayerService,
        CurrencyRepositoryInterface $currencyRepository,
        ExchangeRateRepositoryInterface $exchangeRateRepository
    )
    {
        parent::__construct();
        $this->currencyLayerService = $currencyLayerService;
        $this->currencyRepository = $currencyRepository;
        $this->exchangeRateRepository = $exchangeRateRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $query = [
            'source' => $this->currencyRepository->getDefaultCurrency(),
            'currencies' => $this->currencyRepository->getNotDefaultCurrencies()->implode('code', ',')
        ];

        $exchangeRatesFromAPI = $this->currencyLayerService->getCurrentExchangeRates($query);

        if($exchangeRatesFromAPI['success'] === true){
            $exchangeRates = $this->currencyLayerService->prepareExchangeRates($exchangeRatesFromAPI['source'], $exchangeRatesFromAPI['quotes']);

            foreach ($exchangeRates as $code => $rate){
                $this->exchangeRateRepository->updateExchangeRate($code, $rate);
            }
        }
        return 0;
    }
}
