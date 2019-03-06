<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\EventRegistration;
use App\Models\EventInstance;
use App\Models\Event;
use App\Enums\{MorphType, UserRole};
use App\Services\ExtraService;
use App\Http\Requests\UploadImageRequest;


class ProfileController extends Controller
{
    private $extraService;

    public function __construct()
    {
        $this->extraService = new ExtraService();
    }

    public function update(Request $request, $id)
    {
        // Update the profile
        User::findOrFail($id)->update([
            'name' => $request->input('name'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
        ]);
        $message = 'Profile update successfully';
        return response()->json(['message' => $message]);
    }

    /**
     * have access to an Account, Charity or Event or if super admin
     *
     * @return \Illuminate\Http\Response
     */
    public function getPermission()
    {
        $user = Auth::user();
        return response()->json(['success' => $user->isAccess()]);
    }

    /**
     * Upload a photo to AWS S3 and edit user avatar
     *
     */
    public function editPhoto(UploadImageRequest $request, ExtraService $extraService)
    {
        $result = $extraService->uploadImage($request->all());
        if ($result) {
            $user = Auth::user();
            $user->photo = $result;
            $user->save();
            return response()->json([
                'success' => true,
                'url' => $result
            ]);
        }

        return response()->json(['success' => false, 'url' => '']);
    }

    /**
     * get user avatar
     *
     */
    public function getPhoto(Request $request)
    {
        $user = Auth::user();
        return response()->json(['url' => $user->photo]);
    }

    /**
     * get myEvents
     *
     */
    public function getEvents($user_id)
    {
        $user = Auth::user();

        $events = $user->events()->with('eventInstances')->has('eventInstances')->get()
            ->transform(function ($event) {
                $event->confirmation_number = EventRegistration::where('event_instance_id', $event->eventInstances->pluck('id')->first())
                    ->pluck('confirmation_number')->first();

                if ($event->confirmation_number)
                    return $event;
            })->toArray();
        $myEvents = array_filter($events);

        $upcomingEvents = EventInstance::leftJoin('event_registrations', 'event_instances.id', '=', 'event_registrations.event_instance_id')
            ->where('event_date', '>', now())
            ->get(['event_instances.id', 'event_instances.created_at', 'confirmation_number', 'event_instances.name'])
            ->toArray();

        return response()->json([
            'my_events' => $myEvents,
            'upcoming_events' => $upcomingEvents
        ]);
    }

    /**
     * update confirmation number of upcoming event
     *
     */
    public function registerEvent(Request $request, EventService $eventService)
    {
        $result = $eventService->registerEvent($request);
        return response()->json(['success' => $result == null ? false : true]);
    }

}
