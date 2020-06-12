<?php
interface LoggerInterface{
    public function log($message);
}

class FileLogger implements LoggerInterface{
    public function log($message){
        echo "FileLogger:: " . $message;
    }
}
class DatabaseLogger implements LoggerInterface{
    public function log($message){
        echo "DatabaseLogger:: " . $message;
    }
}

$logger = new FileLogger();
$logger->log("Object created ...<br>");

$logger = new DatabaseLogger();
$logger->log("Object created ...<br>");