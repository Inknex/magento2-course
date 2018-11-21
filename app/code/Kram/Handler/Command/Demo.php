<?php
namespace Kram\Handler\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class demo extends Command
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
        $this->setName("demo");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /**
         * Create object of class 'Kram\Swapi\Helper\Data' by objectManager
         */
        $swapi = $this->objectManager->create('Kram\Swapi\Helper\DataInterface');
        $episode = $swapi->getEntity(4);
        $output->writeln("Episode title:{$episode->title}");

        /**
         * Using VirtualType instead of real class
         */
        $swapi = $this->objectManager->create('Kram\Swapi\Data\Films');
        $episode = $swapi->getEntity(5);
        $output->writeln("Episode title:{$episode->title}");
        
        $swapi = $this->objectManager->create('Kram\Swapi\Data\Starships');
        $starship = $swapi->getEntity(9);
        $output->writeln("Starship name:{$starship->name}");

        /**
         * Method Get returns Singleton
        */
        $object1 = $this->objectManager->get('Kram\Handler\Helper\Single');
        $output->writeln("Initial @obj1->var: {$object1->getVar()}");
        $object1->setVar(8);

        $object2 = $this->objectManager->get('Kram\Handler\Helper\Single');
        $output->writeln("Initial @obj2->var: {$object2->getVar()}");
    }
} 