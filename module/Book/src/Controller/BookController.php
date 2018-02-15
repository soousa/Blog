<?php
namespace Book\Controller;

use Book\Model\BookTable;
use Book\Model\Book;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Book\Form\BookForm;


class BookController extends AbstractActionController
{
	// Add this property:
    private $table;
	
	// Add this constructor:
    public function __construct(BookTable $table)
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
		$form = new BookForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $book = new Book();
        $form->setInputFilter($book->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $book->exchangeArray($form->getData());
        $this->table->saveBook($book);
        return $this->redirect()->toRoute('book');
    }

    public function editAction()
    {
		$id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('book', ['action' => 'add']);
        }

        // Retrieve the book with the specified id. Doing so raises
        // an exception if the book is not found, which should result
        // in redirecting to the landing page.
        try {
            $book = $this->table->getBook($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('book', ['action' => 'index']);
        }

        $form = new BookForm();
        $form->bind($book);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($book->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveBook($book);

        // Redirect to book list
        return $this->redirect()->toRoute('book', ['action' => 'index']);
    }

    public function deleteAction()
    {
		$id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('book');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->table->deleteBook($id);
            }

            // Redirect to list of books
            return $this->redirect()->toRoute('book');
        }

        return [
            'id'    => $id,
            'book' => $this->table->getBook($id),
        ];
    }
}
?>