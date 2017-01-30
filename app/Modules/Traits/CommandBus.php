<?php


namespace MyTailor\Modules\Traits;


use Illuminate\Support\Facades\App;

trait CommandBus
{
    /**
     * Executes the command
     * @param $command
     */
    public function execute($command)
    {
      return $this->getCommandBus()->execute($command);
    }

    /**
     * Gets the command bus
     * @return mixed
     */
    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }

}