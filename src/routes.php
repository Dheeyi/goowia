<?php

use Goowia\Services\Task\Task;
// get all todos
$app->get('/api/v1/todos', function ($request, $response, $args) {
    try {
        $task = new Task();
        $data = $task->getTasks($this);

        if ($data) {
            return $this->response->withJson($data);
        } else {
            throw new PDOException('No records found.');
        }

    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
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