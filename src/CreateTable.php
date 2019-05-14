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
        $empDetailsQuery = "DROP TABLE IF EXISTS `employees`;
                            CREATE TABLE IF NOT EXISTS `employees` (
                              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                              `emp_id` varchar(50) NOT NULL DEFAULT '',
                              `emp_name` varchar(50) NOT NULL DEFAULT '',
                              `ip_address` varchar(15) NOT NULL DEFAULT '',
                              PRIMARY KEY (`id`)
                            )";

        try {
            $this->database->rawQuery($empDetailsQuery);
        } catch (\Exception $ex) {
            $output->writeln('<info>' . $ex->getMessage() . '!</info>');
        }

        $empWebHistory = "DROP TABLE IF EXISTS `employee_web_history`;
                            CREATE TABLE IF NOT EXISTS `employee_web_history` (
                              `ip_address` varchar(15) NOT NULL DEFAULT '',
                              `url` varchar(200) NOT NULL DEFAULT '',
                              `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
                            )";

        try {
            $this->database->rawQuery($empWebHistory);
        } catch (\Exception $ex) {
            $output->writeln('<info>' . $ex->getMessage() . '!</info>');
        }

        $output->writeln('<info>Tables created!</info>');
    }
}
