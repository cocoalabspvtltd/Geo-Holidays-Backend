<?php

namespace App\Providers;

use App\Interfaces\AyurvedicPackageRepositoryInterface;
use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\ContactRepositoryInterface;
use App\Interfaces\EnquiryRepositoryInterface;
use App\Interfaces\FligtandHotelRepositoryInterface;
use App\Interfaces\OffersRepositoryInterface;
use App\Interfaces\PackageCategoryRepositoryInterface;
use App\Interfaces\ServiceRepositoryInterface;
use App\Repositories\AyurvedicPackageRepository;
use App\Repositories\BookingRepository;
use App\Repositories\ContactRepository;
use App\Repositories\EnquiryRepository;
use App\Repositories\FlightandHotelRepository;
use App\Repositories\OffersRepository;
use App\Repositories\PackageCategoryRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PackageCategoryRepositoryInterface::class,PackageCategoryRepository::class);

        $this->app->bind(OffersRepositoryInterface::class,OffersRepository::class);

        $this->app->bind(FligtandHotelRepositoryInterface::class,FlightandHotelRepository::class);

        $this->app->bind(AyurvedicPackageRepositoryInterface::class,AyurvedicPackageRepository::class);

        $this->app->bind(EnquiryRepositoryInterface::class,EnquiryRepository::class);

        $this->app->bind(BookingRepositoryInterface::class,BookingRepository::class);

        $this->app->bind(ContactRepositoryInterface::class,ContactRepository::class);

        $this->app->bind(ServiceRepositoryInterface::class,ServiceRepository::class);


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
