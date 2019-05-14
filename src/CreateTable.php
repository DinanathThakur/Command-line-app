<?php namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTable extends Command
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('MigrateTables')
            ->setHelp("This command allows you to create required tables")
            ->setDescription('Create required tables');
    }

    /**
     * Execute the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     * @author Dinanath Thakur <dinanath.thakur@ei-india.com>
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $empDetailsQuery = "CREATE TABLE `employees` (
                        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `emp_id` VARCHAR(50) NOT NULL DEFAULT '',
                        `emp_name` VARCHAR(50) NOT NULL DEFAULT '',
                        `ip_address` VARCHAR(12) NOT NULL DEFAULT '',
                        PRIMARY KEY (id) 
                    )";

        try {

            $this->database->rawQuery($empDetailsQuery);
        } catch (\Exception $ex) {
            $output->writeln('<info>' . $ex->getMessage() . '!</info>');
        }

        $empWebHistory = "CREATE TABLE `employee_web_history` (
                        `ip_address` VARCHAR(12) NOT NULL DEFAULT '',
                        `url` VARCHAR(12) NOT NULL DEFAULT '',
                        `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                    )";

        try {

            $this->database->rawQuery($empWebHistory);
        } catch (\Exception $ex) {
            $output->writeln('<info>' . $ex->getMessage() . '!</info>');
        }

        $output->writeln('<info>Tables created!</info>');
    }
}
