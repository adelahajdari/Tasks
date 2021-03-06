<?php declare(strict_types=1);

namespace App\Infrastructure\GetTaskCollectionForUser\TaskProvider;

use App\Core\Application\UseCase\GetTaskCollectionForUser\TaskProvider\TaskCollectionProvider;
use App\Core\Application\UseCase\GetTaskCollectionForUser\TaskProvider\TaskCollectionProviderResult;
use App\Core\Domain\Task;
use App\Core\Domain\TaskCollection;
use App\Core\Domain\User;
use Exception;
use InvalidArgumentException;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

/**
 * Class FakeTaskCollectionProvider
 * @package App\Infrastructure\GetTaskCollectionForUser\TaskProvider
 */
class FakeTaskCollectionProvider implements TaskCollectionProvider
{
    /**
     * @param User $user
     * @return TaskCollectionProviderResult
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function getCollectionByUser(User $user): TaskCollectionProviderResult
    {
        $taskCollection = $this->createTaskCollection($user);

        return new TaskCollectionProviderResult($taskCollection);
    }

    /**
     * @param User $user
     * @return TaskCollection
     * @throws UnsatisfiedDependencyException
     * @throws InvalidArgumentException
     * @throws Exception
     */
    private function createTaskCollection(User $user): TaskCollection
    {
        $userId = $user->getId();

        return new TaskCollection(
            [
                new Task(Uuid::fromString('8e80aeaa-ae5b-4970-a54d-c5a29cc59a0e'), 'Task one', $userId),
                new Task(Uuid::fromString('e014b55e-8769-4a73-b7ea-81541abd7713'), 'Task two', $userId),
                new Task(Uuid::fromString('4b8302da-21ad-401f-af45-1dfd956b80b5'), 'Task three', $userId),
                new Task(Uuid::fromString('6948df80-14bd-4e04-8842-7668d9c001f5'), 'Task four', $userId),
                new Task(Uuid::fromString('2af76c6a-a613-4f74-827d-f8e735f2e1ce'), 'Task five', $userId,)
            ]
        );
    }
}
