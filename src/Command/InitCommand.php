<?php
/**
 * Created by PhpStorm.
 * User: nour
 * Date: 10/6/18
 * Time: 6:33 PM
 */

namespace App\Command;


use App\Entity\Currency;
use App\Repository\CurrencyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitCommand extends AbstractHarpoonCommand
{
    /** @var CurrencyRepository $currencyRepo */
    protected $currencyRepo;


    /** @var EntityManagerInterface $entityManager */
    protected $entityManager;


    protected function configure()
    {
        $this
            ->setName("harpoon:init")
            ->setDescription("Initialize Harpoon by adding currencies to DB.")
        ;
    }


    /**
     * InitCommand constructor.
     * @param CurrencyRepository $currencyRepository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        CurrencyRepository $currencyRepository,
        EntityManagerInterface $entityManager
    ){
        parent::__construct($this->getName());
        $this->currencyRepo        = $currencyRepository;
        $this->entityManager       = $entityManager;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $this->symfonyConsole->title("Harpoon Initialize Command");
        $currencies = $this->getContainer()->getParameter("currencies");

        $this->symfonyConsole->section("Creating Missing Currencies");
        $createdCurrencies = 0;
        $progressBar = $this->symfonyConsole->createProgressBar(count($currencies));
        $progressBar->start();
        foreach ($currencies as $ISOCode => $currency){
            if(
                !$this->currencyRepo->findOneBy(["isoCode" => $ISOCode]) instanceof Currency
            ){
                $symbol = isset($currency["symbol"]) ? $currency["symbol"] : null;
                $currency = $this->createCurrency($ISOCode, $currency["name"], $symbol);
                $this->entityManager->persist($currency);
                $createdCurrencies++;
            }
            $progressBar->advance();
        }
        $progressBar->finish();
        $this->symfonyConsole->writeln("");
        $this->symfonyConsole->writeln("");
        $this->entityManager->flush();
        $this->symfonyConsole->table(["Stat", "Value"], [
            ["Currencies Created", $createdCurrencies]
        ]);
        $this->symfonyConsole->success("Command Complete");
        return 0;
    }


    /**
     * @param string $isoCode
     * @param string $name
     * @param string|null $symbol
     * @return Currency
     */
    protected function createCurrency(
        string $isoCode,
        string $name,
        string $symbol = null
    ){
        $currency = new Currency();
        $currency->setIsoCode($isoCode);
        $currency->setName($name);
        $currency->setSymbol($symbol);
        return $currency;
    }
}