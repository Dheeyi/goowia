<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Goowia\Services\Task\Task;
use Goowia\Connection\PMConnections;

// add new pm connection
$app->get('/', function ($request, $response, $args) {

    $pmUser = 'root';
    $pmDatabase = 'wf_will';
    $pmInstance = 'will';
    $pmServer = '127.0.0.1';
    $pmLicense = 'empty';
    $pmConn = new PMConnections\PMConnection($pmInstance, $pmServer, $pmDatabase, $pmUser, $pmLicense);
    $pmConn->saveDataConnection($this);
});


$app->get('/hello/{name}/', function ($request, $response, $args) {

    return $this->view->render($response, 'profile', [
        'name' => $args['name'],
    ]);
})->setName('profile');

// get all todos
$app->get('/api/v1/todos', function ($request, $response, $args) {
    try {
        $task = new Task();
        return $this->response->withJson($task->getTasks($this));

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
});

// Add a new todo
$app->post('/api/v1/todo', function ($request, $response) {
    $input = $request->getParsedBody();
    $sql = "INSERT INTO tasks (task) VALUES (:task)";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("task", $input['task']);
    $sth->execute();
    $input['id'] = $this->db->lastInsertId();
    return $this->response->withJson($input);
});


//$app->get('/[{name}]', function ($request, $response, $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});


//// Retrieve todo with id
//$app->get('/todo/[{id}]', function ($request, $response, $args) {
//    $sth = $this->db->prepare("SELECT * FROM tasks WHERE id=:id");
//    $sth->bindParam("id", $args['id']);
//    $sth->execute();
//    $todos = $sth->fetchObject();
//    return $this->response->withJson($todos);
//});
//
//// Search for todo with given search teram in their name
//$app->get('/todos/search/[{query}]', function ($request, $response, $args) {
//    $sth = $this->db->prepare("SELECT * FROM tasks WHERE UPPER(task) LIKE :query ORDER BY task");
//    $query = "%".$args['query']."%";
//    $sth->bindParam("query", $query);
//    $sth->execute();
//    $todos = $sth->fetchAll();
//    return $this->response->withJson($todos);
//});
//
//// Add a new todo
//$app->post('/todo', function ($request, $response) {
//    $input = $request->getParsedBody();
//    $sql = "INSERT INTO tasks (task) VALUES (:task)";
//    $sth = $this->db->prepare($sql);
//    $sth->bindParam("task", $input['task']);
//    $sth->execute();
//    $input['id'] = $this->db->lastInsertId();
//    return $this->response->withJson($input);
//});
//
//// DELETE a todo with given id
//$app->delete('/todo/[{id}]', function ($request, $response, $args) {
//    $sth = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
//    $sth->bindParam("id", $args['id']);
//    $sth->execute();
//    $todos = $sth->fetchAll();
//    return $this->response->withJson($todos);
//});
//
//// Update todo with given id
//$app->put('/todo/[{id}]', function ($request, $response, $args) {
//    $input = $request->getParsedBody();
//    $sql = "UPDATE tasks SET task=:task WHERE id=:id";
//    $sth = $this->db->prepare($sql);
//    $sth->bindParam("id", $args['id']);
//    $sth->bindParam("task", $input['task']);
//    $sth->execute();
//    $input['id'] = $args['id'];
//    return $this->response->withJson($input);
//});