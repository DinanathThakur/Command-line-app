<?php namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GetEmpDataCommand extends Command
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('GET:empdata')
            ->setHelp("This command allows you get the employee details by ip_address")
            ->setDescription('Get the employee details having the ip_address')
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
        $where = 'ip_address = "' . $input->getArgument('ip_address') . '"';

        if ($empDetails = $this->database->fetch('employees', $where)) {
            $display = ['employee' => $empDetails];
            return $output->writeln(json_encode($display, JSON_PRETTY_PRINT));
        } else {
            return $output->writeln('<info>NULL</info>');
        }

    }

}