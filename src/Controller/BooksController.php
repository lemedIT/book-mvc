<?php
namespace M2i\Mvc\Controller;

use Book as GlobalBook;
use M2i\Mvc\Model\Book;
use M2i\Mvc\Model;
use M2i\Mvc\Model\Model as ModelModel;
use M2i\Mvc\View;

class BooksController
{
    public function list()
    { 
        $title = 'Livres';

        $books = Book::all();

        return View::render('books',[
            'title' => $title,
            'books' => $books,
        ]);
        
    }
    
    public function show($id)
    {
       $book= Book::find($id);

       if(! $book){
        http_response_code(404);
        return View::render('404');
       }

       return View::render('book', [
        'book'=> $book,
       ]);
    }

    public static function price($preTaxPrice, $percentage = 0){
        $taxPrice = $preTaxPrice * (1 + 20/100) * (1 - $percentage / 100); //45.6
        $taxPrice = number_format($taxPrice, 2, ',', ' '); //1450..6 devient 1 450,60
        return $taxPrice;
    }

    public static function isbn($numbers) {
        $result = substr($numbers, 0, 1); //8
    
        if (strlen($numbers) === 13){
            $result = $result.'-'.substr($numbers, 1, 6);   //2-765412
            $result = $result.'-'.substr($numbers, 7, 6);   //2-765412-005123
    }else{
            $result .= '-'.substr($numbers, 1, 4);  //2-7654
            $result .= '-'.substr($numbers, 5, 4);  //2-7654-1005
            $result .= '-'.substr($numbers,-1);     //2-7654-1005-4
    }
    
        return $result;
    }
    public static function addMessage($message) {
        $_SESSION['message'] = $message;
    }
    public static function getMessage() {
        $message = $_SESSION['message'] ?? null;
        unset($_SESSION['message']);
    
        return $message;
    }

    public function create()
    {
        // Recup des données
        $book = new Book();
        $book->title = $_POST['title'] ?? null;
        $book->price = $_POST['price'] ?? null;
        $book->discount = $_POST['discount'] ?? null;
        $book->isbn = $_POST['isbn'] ?? null;
        $book->id_author = '1' ;
        $book->published_at = $_POST['published_at'] ?? null;
        $book->image = 'uploads/01.jpg';

        $errors = [];
        
        //2-Vérifier mes données
        if (! empty($_POST)){
            if(empty($book->title)){
            $errors['title'] = 'Le nom est invalide.';
        }
        if (($book->price) < 1 || ($book->price) > 100){
            $errors['price'] = 'Le prix est invalide.';
        }
        if (!empty($book->discount) && (($book->discount) >100 || ($book->discount) < 0)){
            $errors['dicount'] = 'La promotion est invalide.';
        }
        if (strlen($book->isbn) != 10 && strlen($book->isbn) != 13){
            $errors['isbn'] = 'L\'ISBN est invalide.';
        }
        if (empty($book->id_author)){
            $errors['author'] = 'L\'auteur est invalide.';
            
        }
        // $publishedAt = '2023-11-06'
        $checked = explode('-', ($book->published_at));//[2023, 11, 06]
        // (int) permet de caster une chaine en entier.
        if (!checkdate($checked[1] ?? 0, $checked[2] ?? 0, (int) $checked[0])){
        $errors['published_at'] = 'La date est invalide';
        }
    if (empty($book->image)){
        $errors['image'] = 'L\'image est invalide.';
    }
    // dd($book);
        if (empty($errors)){
            $book->save(['title', 'price', 'discount', 'isbn', 'id_author', 'published_at', 'image']);

            //View::redirect('/utilisateurs');
      ModelModel::addMessage('Votre livre à été ajouté!');

            //Redirection
            ;
            }
        }
            return View::render('add', [
                'errors' => $errors,
                'book' => $book,
            ]);
            //Message dans la session
        
    }
}