<?php namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SetEmpDataCommand extends Command
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('SET:empdata')
            ->setHelp("This command allows you set employee details")
            ->setDescription('Insert the employee details to employee table with data emp_id, emp_name, ip_address')
            ->addArgument('emp_id', InputArgument::REQUIRED, 'Employee ID?')
            ->addArgument('emp_name', InputArgument::REQUIRED, 'Employee name?')
            ->addArgument('ip_address', InputArgument::REQUIRED, 'IP address?');
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
        $this->database->query(
            'insert into employees(emp_id,emp_name,ip_address) values(:emp_id,:emp_name,:ip_address)',
            [
                'emp_id' => $input->getArgument('emp_id'),
                'emp_name' => $input->getArgument('emp_name'),
                'ip_address' => $input->getArgument('ip_address')
            ]
        );

        $output->writeln('<info>Employee details added!</info>');
    }
}
