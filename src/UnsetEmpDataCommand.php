<?php namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UnsetEmpDataCommand extends Command
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('UNSET:empdata')
            ->setHelp("This command allows you to unset the employee details by ip_address")
            ->setDescription('Soft delete the data having the passed ip_address')
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
        $ip_address = $input->getArgument('ip_address');

        $this->database->query(
            'delete from employees where ip_address = :ip_address',
            ['ip_address' => $ip_address]
        );

        $output->writeln('<info>NULL</info>');
    }

}