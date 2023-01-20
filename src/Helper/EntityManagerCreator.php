<?php

namespace WillAvelar\Doctrine\Helper;

use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
    /**
     * @throws ORMException
     */
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."],
            true,
        );

        $consoleOutPut = new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG);
        $consoleLogger = new ConsoleLogger($consoleOutPut);
        $logMiddleware = new Middleware($consoleLogger);
        $config->setMiddlewares([$logMiddleware]);

        $cacheDirectory =  __DIR__.'/../../var/cache';

        // Enable Metadata Cache
        /*$config->setMetadataCache(new PhpFilesAdapter(
            namespace:'metadata_cache',
            directory: $cacheDirectory));*/

        // Enable Query Cache
        /*$config->setQueryCache(
            new PhpFilesAdapter(
                namespace:'query_cache',
                directory: $cacheDirectory));*/

        // Enable Result Cache
        /*$config->setResultCache(  new PhpFilesAdapter(
            namespace:'result_cache',
            directory: $cacheDirectory));*/

        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ];

        return EntityManager::create($conn, $config);
    }
}