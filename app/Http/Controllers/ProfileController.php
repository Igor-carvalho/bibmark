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
use App\Enums\{ MorphType, UserRole };
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
     * @author Igor
     * @return \Illuminate\Http\Response
     */
    public function getPermission() {
        $user = Auth::user();
        $roleCount = \DB::table('userables')
            ->where('role', [UserRole::Admin, UserRole::ReadOnly])
            ->count();

        if ((isset($user) && $user->is_superadmin == 0) || $roleCount > 0) {
            return response()->json(['success'=>true, 'msg'=>'You have a permission.']);
        }
        return response()->json(['success'=>false, 'msg'=>'You have no permission.']);
    }

    /**
     * Upload a photo to AWS S3 and edit user avatar
     *
     * @author Igor
     * @param App\Http\Requests\UploadImageRequest $request
     * @param App\Services\ExtraService $extraService
     * @return \Illuminate\Http\Response
     */
    public function editPhoto(UploadImageRequest $request, ExtraService $extraService)
    {
        $result = $extraService->uploadImage($request->all());
        if ($result) {
            $user = Auth::user();
            $user->photo = $result;
            $user->save();
            return response()->json(['success' => true, 'url' => $result]);
        }

        return response()->json(['success' => false, 'url' => '']);
    }

    /**
     * get user avatar
     *
     * @author Igor
     * @param App\Http\Requests\UploadImageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function getPhoto(Request $request)
    {
        $user = Auth::user();
        return response()->json(['url' => $user->photo]);
    }

    /**
     * get myEvents
     *
     * @author Igor
     * @param User id
     * @return \Illuminate\Http\Response
     */
    public function getEvents($user_id)
    {
        $user = Auth::user();
        $event_ids = $user->events()->pluck('events.id')->toArray();
        $myEvents = EventInstance::whereIn('event_id', $event_ids)
//            ->where('event_date', '<', date('Y-m-d H:i:s'))
            ->get()->toArray();
        $upcomingEvents = EventInstance::leftJoin('events', 'event_instances.event_id', '=', 'events.id')
            ->where('event_instances.event_date', '>', date('Y-m-d H:i:s'))
            ->get()->toArray();
        return response()->json(['my_events' => $myEvents, 'upcoming_events' => $upcomingEvents]);
    }

    /**
     * update comfirmation number of upcoming event
     *
     * @author Igor
     * @param App\Http\Requests\UploadImageRequest $request
     * @param User id
     * @param App\Services\EventService $eventService
     * @return \Illuminate\Http\Response
     */
    public function updateConfirmationNumber(Request $request, $user_id, EventService $eventService) {
        $eventInstance_id = EventInstance::where('event_id', $request->get('event_id'))->pluck('id')->first();
        $data = [
            'user_id' => $user_id,
            'event_instance_id' => $eventInstance_id,
            'confirmation_number' => $request->get('confirmation_number')
        ];
        $result = $eventService->registerEvent($data);
        return response()->json(['success'=>$result==null?false:true, 'events'=>$upcomingEvents]);
    }

}
