<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreRequest;
use App\Http\Resources\BookingResource;
use App\Interfaces\BookingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    private BookingRepositoryInterface $bookingRepositoryInterface;

    public function __construct(BookingRepositoryInterface $bookingRepositoryInterface)
    {
        $this->bookingRepositoryInterface = $bookingRepositoryInterface;
    }

    public function store(StoreRequest $request)
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

            $data = $this->bookingRepositoryInterface->store($details);

            Mail::send('booking-responseMail', ['data' => $details], function ($message) use ($details) {
                $message->to('cocolabslekshmi@gmail.com')->subject("Geo-Holidays Geetings🎉");
            });

            // Commit transaction after email is sent successfully
            DB::commit();

            return ApiResponseClass::sendResponse(new BookingResource($data), 'Data Sent Successfully', 201);
        } catch (\Exception $ex) {
            // Rollback transaction in case of error
            DB::rollBack();

            return ApiResponseClass::rollback($ex);
        }
    }
}
