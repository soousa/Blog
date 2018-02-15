<?php
namespace Hallo\Controller;

use Hallo\Model\HalloTable;
use Hallo\Model\Hallo;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Hallo\Form\HalloForm;


class HalloController extends AbstractActionController
{
	// Add this property:
    private $table;
	
	// Add this constructor:
    public function __construct(HalloTable $table)
    {
        $this->table = $table;
    }
	
    public function indexAction()
    {
		 // Grab the paginator from the AlbumTable:
    $paginator = $this->table->fetchAll(true);

    // Set the current page to what has been passed in query string,
    // or to 1 if none is set, or the page is invalid:
    $page = (int) $this->params()->fromQuery('page', 1);
    $page = ($page < 1) ? 1 : $page;
    $paginator->setCurrentPageNumber($page);

    // Set the number of items per page to 10:
    $paginator->setItemCountPerPage(10);

    return new ViewModel(['paginator' => $paginator]);
    }

    public function addAction()
    {
		$form = new HalloForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $hallo = new Hallo();
        $form->setInputFilter($hallo->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $hallo->exchangeArray($form->getData());
        $this->table->saveHallo($hallo);
        return $this->redirect()->toRoute('hallo');
    }

    public function editAction()
    {
		$id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('hallo', ['action' => 'add']);
        }

        // Retrieve the hallo with the specified id. Doing so raises
        // an exception if the hallo is not found, which should result
        // in redirecting to the landing page.
        try {
            $hallo = $this->table->getHallo($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('hallo', ['action' => 'index']);
        }

        $form = new HalloForm();
        $form->bind($hallo);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($hallo->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveHallo($hallo);

        // Redirect to hallo list
        return $this->redirect()->toRoute('hallo', ['action' => 'index']);
    }

    public function deleteAction()
    {
		$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('hallo');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteHallo($id);
            }

            // Redirect to list of hallos
            return $this->redirect()->toRoute('hallo');
        }

        return [
            'id'    => $id,
            'hallo' => $this->table->getHallo($id),
        ];
    }
}
?>