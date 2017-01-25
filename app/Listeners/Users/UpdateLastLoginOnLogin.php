<?php

namespace MyTailor\Listeners\Users;

use Carbon\Carbon;

class UpdateLastLoginOnLogin
{

    public function handle($event)
    {
        $event->user->last_login_at = Carbon::now();

        $event->user->save();

    }


}