<?php 

class SendWelcomeEmailListener implements ListenerInterface
{
    public function __construct(private EmailService $emailService) {}

    public function handle(EventInterface $event) : void
    {
        $this->emailService->sendWelcome($event->user);
    }
}

?>