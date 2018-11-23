<?php
namespace Kram\Handler\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Dbase extends Command
{
    protected $objectManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $manager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $manager
    )
    {
        $this->objectManager = $manager;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName("dbase");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Create object of class 'Kram\Swapi\Helper\Data' by objectManager
         */
        $films = $this->objectManager->create('Kram\Swapi\Model\FilmFactory')->create()->getCollection();

        foreach ($films as $film) {
            $output->writeln("Film from db: ".$film->getTitle());
        }
    }
} 