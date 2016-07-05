<?php

namespace Pottkinder\UnitedDomains\Command;

use Pottkinder\UnitedDomains\Domain\Model\Domain;
use Pottkinder\UnitedDomains\Domain\Model\Response;
use Pottkinder\UnitedDomains\Domain\Model\User;
use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Output\OutputInterface;

class MoveDomainToSubAccountCommand extends \Symfony\Component\Console\Command\Command {

    protected function configure()
    {
        $this->setName("ud:moveDomainToSubAccount")
             ->setDescription("Moves given Domain to SubUser Account")
             ->setDefinition(array(
                 new InputArgument('domain', InputArgument::REQUIRED, 'Domain which should be moved to a subaccount.'),
                 new InputArgument('user', InputArgument::REQUIRED, 'SubAccount which should own the Domain.'),
//                 new InputOption('stop', 'e', InputOption::VALUE_OPTIONAL, 'stop number of the range of Fibonacci number', $stop)
             ));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        require_once('./Config/config.php');
        $apiService = new \Pottkinder\UnitedDomains\Service\ApiService($user, $pass);
        $domain = new Domain($input->getArgument('domain'));
        $user = new User($input->getArgument('user'));
        $responses = $apiService->moveDomainAndZoneToAccount($domain, $user);
        foreach($responses as $response) 
        {
            /**
             * @var Response $response
             */
            if($response->isSuccessfull()) {
                $output->writeln('<info>Command done successfull.</info>');
            } else {
                $output->writeln('<error>Command error: ' . $response->getDescription() . '</error>');
            }
            var_dump($response);
        }
    }
}