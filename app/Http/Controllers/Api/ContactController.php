<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Resources\ContactResource;
use App\Interfaces\ContactRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    private ContactRepositoryInterface $contactRepositoryInterface;

    public function __construct(ContactRepositoryInterface $contactRepositoryInterface)
    {
        $this->contactRepositoryInterface = $contactRepositoryInterface;
    }

    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $details = $this->contactRepositoryInterface->store($data);

            Mail::send('Contact-Mail', ['details' => $details], function ($message) use ($data) {
                $message->from($data['email'], $data['email']); // Specify the "from" address and name
                $message->to('cocolabslekshmi@gmail.com')->subject($data['subject']);
            });

            // Commit transaction after email is sent successfully
            DB::commit();

            return ApiResponseClass::sendResponse(new ContactResource($data), 'Mail Sent Successfully', 201);
        } catch (\Exception $ex) {
            // Rollback transaction in case of error
            DB::rollBack();

            return ApiResponseClass::rollback($ex);
        }
    }
}
