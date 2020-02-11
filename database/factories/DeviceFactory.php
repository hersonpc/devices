<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Device;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Device::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'name' => $faker->colorName,
        'sector' => $faker->randomElement(["ALA A", "ALA B", "ALA C", "ALA D", "EMERGÊNCIA"]),
        'sub_sector' => $faker->randomElement(["PRESCRIÇÃO MÉDICA", "POSTO DE ENFERMAGEM", ""]),
        'description' => $faker->word(),
        'type' => 'Desktop',
        'manufacturer' => $faker->randomElement(["Hewlett-Packard", "DELL", "Lenovo"]),
        'model' => null,
        'processor' => $faker->randomElement(["core-2-duo", "celeron", "i3", "i5"]),
        'memory' => $faker->randomElement(["2", "4", "8"]),
        'storage' => $faker->randomElement(["500Gb", "1Tb"]),
        'os' => $faker->randomElement(["Windows XP", "Windows 7"]),
        'ipv4' => "192.168.".$faker->numberBetween(2, 5).".".$faker->numberBetween(1, 254),
        'mac' => "00-00-00-00-00-00",
        'domain_primary_user' => null,
        'acquisition_date' => null,
    ];
});
