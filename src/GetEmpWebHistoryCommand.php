<?php namespace Acme;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GetEmpWebHistoryCommand extends Command
{

    /**
     * Configure the command.
     */
    public function configure()
    {
        $this->setName('GET:empwebhistory')
            ->setHelp("This command allows you get the employee's web history by ip_address")
            ->setDescription('Print out the employee details with his web search')
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
        $where = 'ip_address = "' . $ip_address . '"';

        if ($empWebHistory = $this->database->fetchAll('employee_web_history', $where)) {
            $urls = [];
            foreach ($empWebHistory as $item) {
                $urls[] = $item['url'];
            }
            $display['employeewebhistory'] = ['ip_address' => $ip_address, 'urls' => $urls];

            return $output->writeln(json_encode($display));
        } else {
            return $output->writeln('<info>NULL</info>');
        }

    }

}