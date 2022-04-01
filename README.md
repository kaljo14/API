# API for shopping tasks

# Description

---

cURL CRUD Example ,CRUD methods,Many To Many relationship, Built with PHP & MySQL

# Project Requirements:

---

The goal is to make two resources to be fed through the API, respectively one resource for tasks and one resource for tags.
A task is something that needs to be done, and `tags` it a can be taken as a way to categorize `tasks`.

##### For example, we might have the following list of tasks:

- To buy milk
- To buy cheese
- To buy tomatoes
- To buy celery
- To buy laundry detergent
- To buy toilet paper
  ##### Under these conditions, I will have the following distribution respectively:
- Tasks 1, 2, 3, 4 will have the tag "Food products".
- Tasks 1 and 2 will also have the tag "Dairy products"
- Tasks 3 and 4 will also have a tag " Vegetables "
- Tasks 5 and 6 will have the tag "Sanitary products"

### Requirements:

---

##### Resource requirements for `tasks`

- Each task has a name and zero or an indeterminate number of tags attached to it
- The resource must have the following capabilities
- To take the data of one task or of all at the same time
- To create one new task or several new tasks at a time. Upon creation, there should be the ability to add tags to the tasks (from existing ones).
- Change the name and/or tags of one task or several tasks at a time
- Delete one task or several tasks at a time

##### Resource requirements for `tags`

- Each tag has a name and a colour
- The resource must have the following capabilities
- To take the data of one tag or all of them at the same time
- Create one new tag or several new tags at a time
- Change the name and/or colour of one tag or several tags at a time
- Delete one tag or multiple tags at a time

---

# Example of how to make a request to the API

For `POST` `PUT` `DELETE` requests, the API only accepts Header Content-Type → application / json

##### Examples queries:

curl http://localhost/API/tasks/read.php

curl -d '{"task_name": "To buy soda", "tag_id": "1"}' -H "Content-Type: application/json" -X POST http://localhost/API/tasks/create.task.php

curl -d '{"tag_name": "fruit products", "tag_color": "purple"}' -H "Content-Type: application/json" -X POST http://localhost/API/tags/create.php

curl -d '{"task_id": "151"}' -H "Content-Type: application/json" -X DELETE http://localhost/API/tasks/delete.php

curl -d '{"task_id": "98", "task_name": "To buy bread"}' -H "Content-Type: application/json" -X UPDATE http://localhost/API/tasks/update.php

---

Created by Kaloyan Ivanov
