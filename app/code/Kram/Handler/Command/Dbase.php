<?php
namespace Kram\Handler\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Dbase extends Command
{
    protected $objectManager;

    protected $eventManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\Event\ManagerInterface $eventManager
    )
    {
        $this->objectManager = $objectManager;
        $this->eventManager = $eventManager;
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

        $product = $this->objectManager->create('Magento\Framework\DataObject', ['text' => 'initial']);
        
        /** only object can be passed from event to observer */
        $this->eventManager->dispatch('dbase_command_dispatch', ['product' => $product]); 
        
        $output->writeln("After event: ". $product->getText());

    }
} 