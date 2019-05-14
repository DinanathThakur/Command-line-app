<?php namespace Acme;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand
{

    /**
     * The wrapper for the database.
     *
     * @var DBConnection
     */
    protected $database;

    /**
     * Create a new Command instance.
     *
     * @param DBConnection $database
     */
    public function __construct(DBConnection $database)
    {
        $this->database = $database;

        parent::__construct();
    }
}