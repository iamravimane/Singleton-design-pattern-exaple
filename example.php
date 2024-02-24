<?php


class Singleton
{

    private static $instace;

    private function __construct()
    {
        
    }

    /**
     * 
     */
    public static function getInstance() : Singleton
    {
        if(self::$instace === null)
        {
            self::$instace = new self();

        }
      
        return self::$instace;



    }

    public function getMessage()
    {
        echo 'Hello , I am singleTon instance';
    }

}


$instace = Singleton::getInstance();
$instace->getMessage();