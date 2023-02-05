<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        Log::info("Hello info");
        Log::warning("Hello warning");
        Log::error("Hello error");
        Log::critical("Hello critical");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello info", ["user" => "ridho"]);

        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "ridho"]);

        Log::info("Hello info");
        Log::info("Hello info");
        Log::info("Hello info");

        self::assertTrue(true);
    }

    public function testChannel()
    {
        $slackLogger = Log::channel("slack");
        $slackLogger->error("Hello Slack"); // send to slack channel

        Log::info("Hello Laravel"); // send to default channel
        self::assertTrue(true);
    }

    public function testFileHandler()
    {
        $fileLogger = Log::channel("file");
        $fileLogger->info("Hello File Handler");
        $fileLogger->warning("Hello File Handler");
        $fileLogger->error("Hello File Handler");
        $fileLogger->critical("Hello File Handler");

        self::assertTrue(true);
    }
}
