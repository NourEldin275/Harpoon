<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 6:03 PM
 */

namespace App\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

abstract class AbstractHarpoonCommand extends ContainerAwareCommand
{

    /** @var SymfonyStyle $symfonyConsole */
    protected $symfonyConsole;

    protected function execute(InputInterface $input, OutputInterface $output){
        $this->symfonyConsole = new SymfonyStyle($input, $output);
    }
}