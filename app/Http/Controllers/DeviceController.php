<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function show(Device $device) {
        $device->sector;
        return response()->json($device, 200);
    }
}
