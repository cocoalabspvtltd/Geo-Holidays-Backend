<?php

namespace App\Repositories;

use App\Interfaces\ApiRepositoryInterface;
use App\Models\AboutUs;
use App\Models\AyurvedicPackages;
use App\Models\Blog;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\ContactDetails;
use App\Models\Disclaimer;
use App\Models\Enquiry;
use App\Models\ExclusiveOffers;
use App\Models\FlashMessage;
use App\Models\FlightandHotel;
use App\Models\Gallery;
use App\Models\HomeSlider;
use App\Models\Offers;
use App\Models\OurCommitmentBanner;
use App\Models\OurCommitments;
use App\Models\PackageCategory;
use App\Models\PackageGalleryBanner;
use App\Models\PackageTour;
use App\Models\PrivacyPolicy;
use App\Models\Services;
use App\Models\SocialMediaLinks;
use App\Models\TermsandCondition;
use App\Models\TestimonialBanner;
use App\Models\Testimonials;
use App\Models\WhyBookUsBanner;
use App\Models\WhyBookWithUS;

class ApiRepository implements ApiRepositoryInterface
{
    public function ayurvedicPackageIndex()
    {
        return AyurvedicPackages::all();
    }

    public function storeBookingData(array $data)
    {
        return Booking::create($data);
    }

    public function storeContactData(array $data)
    {
        return Contact::create($data);
    }

    public function storeEnquiryData(array $data)
    {
        return Enquiry::create($data);
    }

    public function filight_and_hotelIndex()
    {
        return FlightandHotel::all();
    }

    public function offersIndex()
    {
        return Offers::all();
    }

    public function package_categoryIndex()
    {
        return PackageCategory::all();
    }

    public function serviceIndex()
    {
        return Services::all();
    }

    public function tour_details($id)
    {
        return PackageTour::where('id', $id)->get();
    }

    public function getByCategory($category_id)
    {
        return PackageTour::where('package_category_id', $category_id)->get();
    }

    public function packageGallery()
    {
        $bannerDetails = new PackageGalleryBanner();
        $package_gallery =  PackageTour::select('image')->get();
        $response = [
            'banner' => [
                'title' => $bannerDetails->title,
                'subtitle' => $bannerDetails->subtitle,
            ],
            'package_gallery' => $package_gallery,
        ];

        return $response;
    }

    public function aboutUs()
    {
        return AboutUs::all();
    }

    public function exclusiveOffers()
    {
        return ExclusiveOffers::all();
    }

    public function testimonials()
    {
        $bannerDetails = new TestimonialBanner();
        $testimonials = Testimonials::all();
        $response = [
            'banner' => [
                'title' => $bannerDetails->title,
                'subtitle' => $bannerDetails->subtitle,
            ],
            'testimonials' => $testimonials,
        ];

        return $response;
    }

    public function homeSlider()
    {
        return HomeSlider::all();
    }

    public function why_book_with_us()
    {
        $bannerDetails = new WhyBookUsBanner();
        $why_book_with_us = WhyBookWithUS::all();
        $response = [
            'banner' => [
                'title' => $bannerDetails->title,
                'subtitle' => $bannerDetails->subtitle,
                'description' => $bannerDetails->description
            ],
            'why_book_with_us' => $why_book_with_us,
        ];

        return $response;
    }

    public function ourCommitments()
    {
        $bannerDetails = new OurCommitmentBanner();
        $our_commitment = OurCommitments::all();
        $response = [
            'banner' => [
                'title' => $bannerDetails->title,
                'subtitle' => $bannerDetails->subtitle
            ],
            'our_commitment' => $our_commitment,
        ];

        return $response;
    }

    public function blog()
    {
        return Blog::all();
    }

    public function privacyPolicy()
    {
        return PrivacyPolicy::all();
    }

    public function contactDetails()
    {
        return ContactDetails::all();
    }

    public function socialMediaLinks()
    {
        return SocialMediaLinks::all();
    }

    public function gallery()
    {
        return Gallery::all();
    }

    public function terms_and_conditions()
    {
        return TermsandCondition::all();
    }

    public function disclaimer()
    {
        return  Disclaimer::all();
    }

    public function flahMessage()
    {
        return FlashMessage::all();
    }
}
