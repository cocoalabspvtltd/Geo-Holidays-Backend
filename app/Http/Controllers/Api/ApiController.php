<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Contact\StoreRequest as ContactStoreRequest;
use App\Http\Requests\Enquiry\StoreRequest as EnquiryStoreRequest;
use App\Interfaces\ApiRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    private ApiRepositoryInterface $apirepositorinterface;

    public function  __construct(ApiRepositoryInterface $apirepositorinterface)
    {
        $this->apirepositorinterface = $apirepositorinterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function ayurvedic_package_index()
    {
        $data = $this->apirepositorinterface->ayurvedicPackageIndex();

        return ApiResponseClass::sendResponse($data, 'Ayurvedic Packge Details', 200);
    }

    public function store_booking_data(StoreRequest $request)
    {
        $adultCount = $request->adult_count;
        $childCount = $request->child_count;
        $infantCount = $request->infant_count;

        // Calculate total member count
        $memberCount = $adultCount + $childCount + $infantCount;
        $details = [
            'name' => $request->name,
            'package_id' => $request->package_id,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'depacture_city' => $request->depacture_city,
            'prefferd_date' => $request->prefferd_date,
            'adult_count' => $adultCount,
            'child_count' => $childCount,
            'infant_count' => $infantCount,
            'members_count' => $memberCount

        ];

        DB::beginTransaction();
        try {

            $data = $this->apirepositorinterface->storeBookingData($details);

            Mail::send('booking-responseMail', ['data' => $details], function ($message) use ($details) {
                $message->to('cocolabslekshmi@gmail.com')->subject("Geo-Holidays Geetings🎉");
            });

            // Commit transaction after email is sent successfully
            DB::commit();

            return ApiResponseClass::sendResponse($data, 'Data Sent Successfully', 201);
        } catch (\Exception $ex) {
            // Rollback transaction in case of error
            DB::rollBack();

            return ApiResponseClass::rollback($ex);
        }
    }

    public function store_contact_data(ContactStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $details = $this->apirepositorinterface->storeContactData($data);

            Mail::send('Contact-Mail', ['details' => $details], function ($message) use ($data) {
                $message->from($data['email'], $data['email']); // Specify the "from" address and name
                $message->to('cocolabslekshmi@gmail.com')->subject($data['subject']);
            });

            // Commit transaction after email is sent successfully
            DB::commit();

            return ApiResponseClass::sendResponse($data, 'Mail Sent Successfully', 201);
        } catch (\Exception $ex) {
            // Rollback transaction in case of error
            DB::rollBack();

            return ApiResponseClass::rollback($ex);
        }
    }

    public function store_enquiry_data(EnquiryStoreRequest $request)
    {
        $details = [
            'name' => $request->name,
            'service' => $request->service,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject
        ];

        DB::beginTransaction();
        try {
            $data = $this->apirepositorinterface->storeEnquiryData($details);

            if ($details['subject'] == 'Ayurvedic') {
                $details['subject'] = "🌿 New Enquiry: Ayurvedic Package Inquiry";
            } elseif ($details['subject'] == 'flight & Hotel booking') {

                $details['subject'] = "🛩️ New Enquiry: Flight & Hotel Booking";
            }

            Mail::send('enquiryMail', ['data' => $details], function ($message) use ($details) {
                $message->to('prezentyapp@gmail.com')->subject("Enquiry Mail");
            });

            // Commit transaction after email is sent successfully
            DB::commit();

            return ApiResponseClass::sendResponse($data, 'Data Sent Successfully', 201);
        } catch (\Exception $ex) {
            // Rollback transaction in case of error
            DB::rollBack();

            return ApiResponseClass::rollback($ex);
        }
    }

    public function filight_and_hotel_index()
    {
        $data = $this->apirepositorinterface->filight_and_hotelIndex();

        return ApiResponseClass::sendResponse($data, 'Flight and Hotel Cooking Data', 200);
    }

    public function offers_index()
    {
        $data = $this->apirepositorinterface->offersIndex();

        return ApiResponseClass::sendResponse($data, 'Offers Listed', 200);
    }

    public function package_category_index()
    {
        $data = $this->apirepositorinterface->package_categoryIndex();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Package Categories', 200);
    }

    public function tour_details($id)
    {
        $data = $this->apirepositorinterface->tour_details($id);

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Package Tour Details', 200);
    }

    public function package_category_tour($category_id)
    {
        $tours = $this->apirepositorinterface->getByCategory($category_id);

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $tours,
            'baseUrl' => $baseUrl,
        ];

        return ApiResponseClass::sendResponse($responseData, 'Tours Lists', 200);
    }

    public function package_gallery()
    {
        $images = $this->apirepositorinterface->packageGallery();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $images,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Gallery Images', 200);
    }

    public function service_index()
    {
        $data = $this->apirepositorinterface->serviceIndex();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Services List', 200);
    }

    public function about_us()
    {
        $data = $this->apirepositorinterface->aboutUs();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'About us Details', 200);
    }

    public function exclusive_offers()
    {
        $data = $this->apirepositorinterface->exclusiveOffers();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Exclussive Offers List', 200);
    }

    public function testimonials()
    {
        $data = $this->apirepositorinterface->testimonials();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Exclussive Offers List', 200);
    }

    public function home_slider()
    {
        $data = $this->apirepositorinterface->homeSlider();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Exclussive Offers List', 200);
    }

    public function why_book_with_us()
    {
        $data = $this->apirepositorinterface->why_book_with_us();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Exclussive Offers List', 200);
    }

    public function our_commitments()
    {
        $data = $this->apirepositorinterface->ourCommitments();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Exclussive Offers List', 200);
    }

    public function blog()
    {
        $data = $this->apirepositorinterface->blog();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($responseData, 'Exclussive Offers List', 200);
    }

    public function privacyPolicy()
    {
        $data = $this->apirepositorinterface->privacyPolicy();

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($data, 'Privacy Policies', 200);
    }

    public function termsandconditions()
    {
        $data = $this->apirepositorinterface->terms_and_conditions();

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($data, 'Terms and Conditions', 200);
    }

    public function disclaimer()
    {
        $data = $this->apirepositorinterface->disclaimer();

        // Return the response with the combined data and baseUrl
        return ApiResponseClass::sendResponse($data, 'Disclaimer data', 200);
    }

    public function contact_details()
    {
        $data = $this->apirepositorinterface->contactDetails();

        return ApiResponseClass::sendResponse($data, 'Contact Details', 200);
    }

    public function social_media_link()
    {
        $data = $this->apirepositorinterface->socialMediaLinks();

        return ApiResponseClass::sendResponse($data, 'Social Media Links', 200);
    }

    public function gallery()
    {
        $data = $this->apirepositorinterface->gallery();

        $baseUrl = 'https://www.cocoalabs.in/GeoHolidays/storage/app/public/';

        $responseData = [
            'data' => $data,
            'baseUrl' => $baseUrl,
        ];

        return ApiResponseClass::sendResponse($responseData, 'Gallery List', 200);
    }

    public function flash_message()
    {
        $data = $this->apirepositorinterface->flahMessage();

        return ApiResponseClass::sendResponse($data, 'Gallery List', 200);
    }
}
