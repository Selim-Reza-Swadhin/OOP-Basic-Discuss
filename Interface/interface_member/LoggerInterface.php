<?php

interface LoggerInterface
{
    public function log($message);
}

interface DatabaseInterface{
    public function connect();
    public function query($query);
    public function fetchRow($row);
    public function close();
}