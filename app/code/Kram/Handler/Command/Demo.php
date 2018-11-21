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
        $swapi = $this->objectManager->create('Kram\Swapi\Helper\Data');
        $episode = $swapi->getFilm(4);
        $output->writeln("Episode title:{$episode->title}");
    }
} 