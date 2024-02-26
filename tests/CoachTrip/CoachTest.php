<?php
declare(strict_types=1);

namespace TdgTechDay\Test\CoachTrip;

use PHPUnit\Framework\Attributes\CoversClass;
use TdgTechDay\CoachTrip\Coach;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversFunction;
use TdgTechDay\CoachTrip\People\AbstractPerson;
use TdgTechDay\CoachTrip\People\Doctor;

/**
 * @phpstan-import-type CoachSpecs from \TdgTechDay\CoachTrip\Coach
 */
#[CoversClass(Coach::class)]
#[CoversFunction('__construct')]
#[CoversFunction('getCoachSpecs')]
class CoachTest extends TestCase
{
    /**
     * This test will fail because we have strict types
     * enabled in php, but also fails in phpstan
     */
    public function testGettingCoachSpecifications(): void
    {
        $specs = ['seats' => '100', 'wheels' => '6', 'mpg' => '65.5'];
        $coach = new Coach($specs);

        $coachSpecs = $coach->getCoachSpecs();

        $this->assertSame(100, $coachSpecs['seats']);
        $this->assertSame(6, $coachSpecs['wheels']);
        $this->assertSame(65.5, $coachSpecs['mpg']);
    }

    /**
     * This test can pass, but the types are wrong!
     */
    public function testCreatingANewCoach(): void
    {
        $specs = ['seats' => 'Banana!', 'wheels' => 99.5, 'mpg' => false];
        $coach = new Coach($specs);

        $this->assertInstanceOf(Coach::class, $coach);
    }

    /**
     * This test can pass, but the types are wrong!
     */
    public function testDoctorDrivingTheCoach(): void
    {
        $coach = new Coach(['seats' => 12, 'wheels' => 4, 'mpg' => 34]);
        $driver = new Doctor('Alphonse', 'Moreau', 68);
        $coach->driver = $driver;

        $this->assertInstanceOf(AbstractPerson::class, $coach->driver);
        $this->assertSame($coach->driver->firstName, 'Alphonse');
        $this->assertSame($coach->driver->lastName, 'Moreau');
    }
}
