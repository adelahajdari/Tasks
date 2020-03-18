<?php declare(strict_types=1);

namespace App\Tests\Unit\Infrastructure\GetTaskCollectionForUser\TaskProvider;

use App\Core\Domain\Task;
use App\Core\Domain\User;
use App\Infrastructure\GetTaskCollectionForUser\TaskProvider\FakeTaskCollectionProvider;
use Exception;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Class FakeTaskCollectionProviderTest
 * @package App\Tests\Unit\Infrastructure\GetTaskCollectionForUser\TaskProvider
 */
class FakeTaskCollectionProviderTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test(): void
    {
        $userId = Uuid::uuid4();
        $user = new User($userId);

        $provider = new FakeTaskCollectionProvider();

        $providerResult = $provider->getCollectionByUser($user);

        $this->assertEquals(
            [
                new Task(Uuid::fromString('8e80aeaa-ae5b-4970-a54d-c5a29cc59a0e'), 'Task one', $userId),
                new Task(Uuid::fromString('e014b55e-8769-4a73-b7ea-81541abd7713'), 'Task two', $userId),
                new Task(Uuid::fromString('4b8302da-21ad-401f-af45-1dfd956b80b5'), 'Task three', $userId),
                new Task(Uuid::fromString('6948df80-14bd-4e04-8842-7668d9c001f5'), 'Task four', $userId),
                new Task(Uuid::fromString('2af76c6a-a613-4f74-827d-f8e735f2e1ce'), 'Task five', $userId),

            ],
            $providerResult->getTaskCollection()->getArrayCopy()
        );
    }
}
