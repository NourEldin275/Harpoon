<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 6:01 PM
 */

namespace App\Command;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateRatesCommand extends AbstractHarpoonCommand
{

    protected function configure()
    {
        $this
            ->setName("harpoon:rates:update")
            ->setDescription("Updates rates of currencies.")
            ->setHelp("Updates the rates of all curriences unless specified otherwise.")
        ;
    }


    public function execute(InputInterface $input, OutputInterface $output)
    {

    }
}