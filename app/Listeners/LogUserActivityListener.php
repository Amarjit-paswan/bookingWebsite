<?php 

class LogUserActivityListener implements ListenerInterface
{
    public function __construct(private ActivityService $activityService) {}

    public function handle(EventInterface $event) : void
    {
        $this->activityService->log($event->user);
    }

}

?>