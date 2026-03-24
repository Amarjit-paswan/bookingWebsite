<?php 

class GiveSignupBonusListener implements ListenerInterface
{
    public function __construct(private BonusService $bonusService){}

    public function handle(EventInterface $event) : void
    {
        $this->bonusService->giveSignupBonus($event->user);
    }
}

?>