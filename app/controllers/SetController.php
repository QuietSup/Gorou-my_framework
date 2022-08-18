<?php

namespace app\controllers;

use app\models\Flashcard;
use app\models\Saved;
use app\models\Set;
use gr\core\View;
use RedBeanPHP\R;

//require 'vendor/gr/lib/dev.php';

class SetController extends \gr\core\Controller
{
    public function my_spaceAction()
    {
        new Set();
//        debug(R::testConnection());
//        $mycards = R::find('sets', 'user_id = ?', [$_SESSION['user']['id']]);
        $user_id = $_SESSION['user']['id'];
        $saved  = R::getAll(
            "SELECT sets.*, count(*) as terms_num, username, avatar,
                    CONCAT(sets.id, '/', REPLACE(sets.name, ' ', '-')) as slug
                 FROM sets, flashcards, users, saved 
                 WHERE sets.id=flashcards.set_id AND sets.user_id=users.id AND saved.set_id=sets.id AND saved.user_id=?
                    GROUP BY flashcards.set_id", [$user_id]
        );

        $mycards = R::getAll(
            "SELECT sets.*, count(*) as terms_num, username, avatar,
                   CONCAT(sets.id, '/', REPLACE(sets.name, ' ', '-')) as slug
                FROM sets, flashcards, users 
                WHERE sets.id=flashcards.set_id AND user_id=users.id AND sets.user_id=?
                    GROUP BY set_id", [$user_id]
        );

        if (!empty($_POST)){
            if (isset($_POST['delete'])) {
                $saved = new Saved();
                $saved->attributes['user_id'] = $_SESSION['user']['id'];
                $saved->attributes['set_id'] = $_POST['delete'];
                $same = R::findOne('saved',
                    'set_id = ? AND user_id=? LIMIT 1',
                    [$saved->attributes['set_id'], $saved->attributes['user_id'],]
                );
                R::trash($same);
            }

            if (isset($_POST['remove'])){
                $set_id = $_POST['remove'];
                $set = R::findOne('sets', "id=$set_id");
                R::trash($set);
            }
        }

//        debug($mycards);
        $this->view->render('my space',
            compact('mycards', 'saved')
        );
    }

    public function create_flashcardsAction()
    {
        if (!empty($_POST)) {
//            debug($_POST);

            $data = $_POST;
            $set = new Set();
            $user_id = $_SESSION['user']['id'];
            $set->attributes['name'] = $data['name'];
            $set->attributes['user_id'] = $user_id;
            $set->save('sets');


            unset($data['name']);
            $flashcard = new Flashcard();
            $set_id = R::getAll('SELECT id FROM sets WHERE name = ? and user_id = ? 
                    ORDER BY id DESC LIMIT 1', [$set->attributes['name'], $user_id]
            );
            $set_id = (int)$set_id[0]['id'];
//            debug($data);
            foreach ($data as $key => $value){
                if (str_contains($key, 'term')){
                    $flashcard->attributes['term'] = $value;
                }
                elseif (str_contains($key, 'definition')){
                    $flashcard->attributes['definition'] = $value;
                    $flashcard->save('flashcards');
                }
                $flashcard->attributes['set_id'] = $set_id;
            }
        }

        $this->view->render('Create set');
    }

    public function editAction()
    {
        $setUpdated = new Set();
        $set_id = $this->slug($slug);
        $set = R::findOne('sets', "id=$set_id");
//        debug($set_id);
        if ($_SESSION['user']['id'] != $set['user_id']) View::errorCode(403);
//        $flashcards = R::findAll('flashcards', "set_id=$set_id");
        $flashcards = R::getAll("SELECT *
                                        FROM flashcards
                                        WHERE set_id=$set_id");
//        debug($flashcards);

        if (!empty($_POST)){
//            debug($_POST);
            $setUpdated->attributes['name'] = $_POST['name'];
            $setUpdated->update('sets', $set_id, ['user_id']);


            R::exec("DELETE FROM flashcards WHERE set_id=$set_id");
            $data = $_POST;

//            R::trashAll()
            $flashcard = new Flashcard();
            $flashcard->attributes['set_id'] = $set_id;
            foreach ($data as $key => $value){
                if (str_contains($key, 'term')){
                    $flashcard->attributes['term'] = $value;
                }
                elseif (str_contains($key, 'definition')){
                    $flashcard->attributes['definition'] = $value;
                    $flashcard->save('flashcards');
                }
            }
            $slugName= str_replace(' ', '-', $_POST['name']);
//            debug($slugName);
            redirect("$slugName");
        }
        $this->view->render('Edit set',
            compact('set', 'flashcards', 'slug')
        );
    }

    public function findAction()
    {
        new Set();
        $user_id = $_SESSION['user']['id'];
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $allSets = R::getAll("SELECT sets.*, count(*) as terms_num, username, avatar,
       CASE 
           WHEN (
               EXISTS(SELECT * FROM saved 
                               WHERE flashcards.set_id=saved.set_id AND saved.user_id=$user_id
                                    
                   )
           ) THEN 'rgb(255, 193, 7)'
            ELSE 'rgb(120, 211, 178)'
        END as color,
    CONCAT(sets.id, '/', REPLACE(sets.name, ' ', '-')) as slug
FROM sets, flashcards, users 
                                     WHERE sets.id=flashcards.set_id AND user_id=users.id AND sets.name LIKE '%$search%' 
                                     GROUP BY set_id"
            );
        }
        else {
            $allSets = R::getAll("SELECT sets.*, count(*) as terms_num, username, avatar,
       CASE 
           WHEN (
               EXISTS(SELECT * FROM saved 
                               WHERE flashcards.set_id=saved.set_id AND saved.user_id=$user_id
                                    
                   )
           ) THEN 'rgb(255, 193, 7)'
            ELSE 'rgb(120, 211, 178)'
        END as color,
    CONCAT(sets.id, '/', REPLACE(sets.name, ' ', '-')) as slug
FROM sets, flashcards, users 
                                     WHERE sets.id=flashcards.set_id AND user_id=users.id 
                                     GROUP BY set_id"
            );
        }

        if(!empty($_POST)){
            $saved = new Saved();
            $saved->attributes['user_id'] = $_SESSION['user']['id'];
            $saved->attributes['set_id'] = $_POST['saved'];
            $same = R::findOne('saved',
                'set_id = ? AND user_id=? LIMIT 1',
                [$saved->attributes['set_id'], $saved->attributes['user_id']]
            );
//            debug($same);

            if ($same != null){
                R::trash($same);
            }
            else {
                $saved->save('saved');
            }
        }

        $this->view->render('Search', compact('allSets'));
    }

    public function all_termsAction()
    {
        new Set;
        $set_id = $this->slug($slug);
//        debug($set_id);
        $flashcards = R::findAll('flashcards', "set_id=$set_id");
        $set_name = R::findOne('sets', "id=$set_id")['name'];
//        debug($set_name);
        $this->view->render($set_name,
            compact('flashcards', 'slug', 'set_id', 'set_name')
        );
    }

    public function flashcardsAction()
    {
        new Set;
        $set_id = $this->slug($slug);
        $flashcards = R::getAll("SELECT * FROM flashcards WHERE set_id=$set_id");
        $set_name = R::getCell("SELECT name FROM sets WHERE id=$set_id");
        $author = R::getRow(
            "SELECT username, avatar FROM users 
                WHERE id=(SELECT user_id FROM sets
                               WHERE sets.id=$set_id)"
        );
//        debug($slug);


        $this->view->render('flashcards',
            compact('flashcards', 'set_id', 'set_name', 'author', 'slug')
        );
    }
}