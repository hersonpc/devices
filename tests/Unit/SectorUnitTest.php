<?php

namespace Tests\Unit;

use App\Sector;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class SectorUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_list_of_sectors_can_be_access()
    {
        factory(Sector::class, 10)->create();

        $this->assertCount(10, Sector::all());
    }

    /** @test */
    public function a_sector_id_is_recorded()
    {
        factory(Sector::class)->create();

        $this->assertCount(1, Sector::all());
    }

    /** @test */
    public function a_sector_can_be_updated()
    {
        factory(Sector::class)->create([
            'name' => 'SETOR A',
            'leader_name' => 'JHON DOE',
        ]);
        $this->assertEquals('SETOR A', Sector::first()->name);
        $this->assertEquals('JHON DOE', Sector::first()->leader_name);

        $sector = Sector::first();
        $sector->update([
            'name' => 'SECTOR A1',
            'leader_name' => 'MARY JANE',
        ]);

        $this->assertCount(1, Sector::all());
        $this->assertEquals('SECTOR A1', Sector::first()->name);
        $this->assertEquals('MARY JANE', Sector::first()->leader_name);
    }

    /** @test */
    public function a_sector_can_be_deleted()
    {
        factory(Sector::class)->create();
        $this->assertCount(1, Sector::all());

        $sector = Sector::first();
        $sector->delete();
        $this->assertCount(0, Sector::all());
    }


}
