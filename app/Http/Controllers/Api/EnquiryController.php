<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Enquiry\StoreRequest;
use App\Http\Resources\EnquiryResource;
use App\Interfaces\EnquiryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    private EnquiryRepositoryInterface $enquiryRepositoryInterface;

    public function __construct(EnquiryRepositoryInterface $enquiryRepositoryInterface)
    {
        $this->enquiryRepositoryInterface = $enquiryRepositoryInterface;
    }

    public function store(StoreRequest $request)
    {
        $details =[
            'name' => $request->name,
            'service' => $request->service,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $request->subject
        ];
        
        DB::beginTransaction();
        try {
            $data = $this->enquiryRepositoryInterface->store($details);

            if($details['subject'] == 'Ayurvedic')
            {
                $details['subject'] ="🌿 New Enquiry: Ayurvedic Package Inquiry";
            }
            elseif($details['subject'] == 'flight & Hotel booking'){

                $details['subject'] ="🛩️ New Enquiry: Flight & Hotel Booking";

            }

            Mail::send('enquiryMail', ['data' => $details], function ($message) use ($details) {
                $message->to('prezentyapp@gmail.com')->subject("Enquiry Mail");
            });

            // Commit transaction after email is sent successfully
            DB::commit();

            return ApiResponseClass::sendResponse(new EnquiryResource($data), 'Data Sent Successfully', 201);
        } catch (\Exception $ex) {
            // Rollback transaction in case of error
            DB::rollBack();

            return ApiResponseClass::rollback($ex);
        }
    }
}
