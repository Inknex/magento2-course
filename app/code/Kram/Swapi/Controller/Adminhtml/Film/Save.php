<?php
namespace Kram\Swapi\Controller\Adminhtml\Film;

use Magento\Backend\App\Action;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
            
class Save extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Pulsestorm_Formexample::ruleName';

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    
    /**
     * @var \Kram\Swapi\Model\FilmFactory
     */
    protected $objectFactory;

    /**
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param \Kram\Swapi\Model\FilmFactory $objectFactory
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        \Kram\Swapi\Model\FilmFactory $objectFactory
    ) {
        $this->dataPersistor    = $dataPersistor;
        $this->objectFactory  = $objectFactory;
        
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (isset($data['is_active']) && $data['is_active'] === 'true') {
                $data['is_active'] = Kram\Swapi\Model\Film::STATUS_ENABLED;
            }
            if (empty($data['film_id'])) {
                $data['film_id'] = null;
            }

            /** @var \Kram\Swapi\Model\Film $model */
            $model = $this->_objectManager->create('Kram\Swapi\Model\Film');

            $id = $this->getRequest()->getParam('film_id');
            if ($id) {
                $model = $this->objectFactory->create()->load($id);
            }

            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved the thing.'));
                $this->dataPersistor->clear('kram_swapi_film');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['film_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->dataPersistor->set('kram_swapi_film', $data);
            return $resultRedirect->setPath('*/*/edit', ['film_id' => $this->getRequest()->getParam('film_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }    
}
