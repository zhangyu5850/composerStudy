<?php


namespace Test\LogHelper;

use Monolog\Logger;

/**
 * Class LoggerFacade.
 */
final class LoggerFacade extends Logger
{
    private $loggers;

    public function __construct(){
        parent::__construct('SYSTEM');
        $this->loggers =  [''=>$this];
    }

    public function getLogger(string $name=''):Logger
    {
        if(!isset($this->loggers[$name])){
            $this->loggers[$name] = $this->withName($name);
        }
        return  $this->loggers[$name];
    }

}