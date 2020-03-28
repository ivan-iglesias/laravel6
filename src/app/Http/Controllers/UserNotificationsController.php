<?php

namespace App\Http\Controllers;

class UserNotificationsController extends Controller
{
    public function show()
    {
        /*
        $notifications = auth()->user()->unreadNotifications;

        $notifications->markAsRead();

        return view('notifications.show', [
            'notifications' => $notifications
        ]);
        */

        return view('notifications.show', [
            'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead()
        ]);
    }
}
