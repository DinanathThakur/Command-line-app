<?php namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SetEmpWebHistoryCommand extends Command
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('SET:empwebhistory')
            ->setHelp("This command allows you set employee web history")
            ->setDescription("Set employee's web history")
            ->addArgument('ip_address', InputArgument::REQUIRED, 'IP address?')
            ->addArgument('url', InputArgument::REQUIRED, 'URL accessed?');
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
            'insert into employee_web_history(ip_address,url) values(:ip_address,:url)',
            [
                'ip_address' => $input->getArgument('ip_address'),
                'url' => $input->getArgument('url')
            ]
        );
        $output->writeln("<info>Employee's web history added!</info>");
    }
}
