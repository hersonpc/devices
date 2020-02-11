<?php

namespace Tests\Unit;

use App\Device;
use App\Sector;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class DeviceUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_list_of_devices_can_be_access()
    {
        factory(Sector::class)->create();
        factory(Device::class, 10)->create();

        $this->assertCount(10, Device::all());
    }

    /** @test */
    public function a_device_id_is_recorded()
    {
        factory(Sector::class)->create();
        factory(Device::class)->create();

        $this->assertCount(1, Device::all());
    }

    /** @test */
    public function a_device_can_be_updated()
    {
        factory(Sector::class)->create();
        factory(Device::class)->create(['ipv4' => '192.168.0.1']);
        $this->assertEquals('192.168.0.1', Device::first()->ipv4);

        $device = Device::first();
        $device->update(['ipv4' => '192.168.0.100']);

        $this->assertCount(1, Device::all());
        $this->assertEquals('192.168.0.100', Device::first()->ipv4);
    }

    /** @test */
    public function a_device_can_be_deleted()
    {
        factory(Sector::class)->create();
        $device = factory(Device::class)->create();
        $this->assertCount(1, Device::all());

        $device->delete();
        $this->assertCount(0, Device::all());
    }
}
