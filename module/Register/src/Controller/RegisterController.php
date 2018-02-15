<?php
namespace Register\Controller;

use Register\Model\RegisterTable;
use Register\Model\Register;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Register\Form\RegisterForm;


class RegisterController extends AbstractActionController
{
	// Add this property:
    private $table;
	
	// Add this constructor:
    public function __construct(RegisterTable $table)
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
		$form = new RegisterForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $register = new Register();
        $form->setInputFilter($register->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $register->exchangeArray($form->getData());
        $this->table->saveRegister($register);
        return $this->redirect()->toRoute('register');
    }

    public function editAction()
    {
		$id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('register', ['action' => 'add']);
        }

        // Retrieve the register with the specified id. Doing so raises
        // an exception if the register is not found, which should result
        // in redirecting to the landing page.
        try {
            $register = $this->table->getRegister($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('register', ['action' => 'index']);
        }

        $form = new RegisterForm();
        $form->bind($register);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($register->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveRegister($register);

        // Redirect to register list
        return $this->redirect()->toRoute('register', ['action' => 'index']);
    }

    public function deleteAction()
    {
		$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('register');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteRegister($id);
            }

            // Redirect to list of registers
            return $this->redirect()->toRoute('register');
        }

        return [
            'id'    => $id,
            'register' => $this->table->getRegister($id),
        ];
    }
}
?>