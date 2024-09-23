<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function countTask()
    {
        Task::factory()->count(4)->create();
        $taskCount = Task::count();
        assertEquals(4, $taskCount);
    }
}
