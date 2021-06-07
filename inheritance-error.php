<?php /** @noinspection UnknownInspectionInspection PhpUnused PhpUnusedParameterInspection */

abstract class Model {}

class Task extends Model {
    public int $id;
}

class NoAccess extends RuntimeException {
}

class Event {
    public Model $old;
    public ?Model $new;
}

class EventObject {
    public function on(string $eventKey, callable $handler): void {
    }

    public function hasAccess($model, string $accessKey): bool {
        return true;
    }
}

abstract class Service extends EventObject {
    public function __construct() {
        $this->on('beforeDelete', fn($e) => $this->onBeforeDelete($e));
    }

    private function onBeforeDelete(Event $e): void {
        if(!$this->hasAccess($e->old, 'delete')) {
            throw new NoAccess($e->old, 'delete');
        }
    }

    protected function notify(Model $model, string $eventKey): void {
    }
}

class TaskService extends Service {
    public function __construct() {
        parent::__construct();

        $this->on('beforeDelete', fn($e) => $this->onBeforeDelete($e->old));
    }

    private function onBeforeDelete(Task $deletedTask): void {
        $this->notify($deletedTask, 'deleted');
    }
}
