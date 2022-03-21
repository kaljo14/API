# API

API for shopping tasks
reated Kaloyan Ivanov

## Description

cURL CRUD Example ,CRUD methods,Many To Many relationship, Built with PHP & MySQL

## Project Requirements:

The goal is to make two resources to be fed through the API, respectively one resource for tasks and one resource for tags.
A task is something that needs to be done, and tags can be taken as a way to categorize tasks.

For example, we might have the following list of tasks:

- 1. To buy milk
- 2. To buy cheese
- 3. To buy tomatoes
- 4. To buy celery
- 5. To buy laundry detergent
- 6. To buy toilet paper

These tasks may have the following tags for easier grouping:

1. Food. 1,2,3,4
2. Dairy products
3. Vegetables
4. Sanitary products

Under these conditions, I will have the following distribution respectively:

1. Tasks 1, 2, 3, 4 will have the tag "Food products".
2. Tasks 1 and 2 will also have the tag "Dairy products"
3. Tasks 3 and 4 will also have a tag " Vegetables "
4. Tasks 5 and 6 will have the tag "Sanitary products"

Requirements:

Resource requirements for tasks

1. Each task has a name and zero or an indeterminate number of tags attached to it
2. The resource must have the following capabilities
   2.1. To take the data of one task or of all at the same time
   2.2. To create one new task or several new tasks at a time. Upon creation, there should be the ability to add tags to the tasks (from existing ones).
   2.3. Change the name and/or tags of one task or several tasks at a time
   2.4. Delete one task or several tasks at a time

Resource requirements for tags

1. Each tag has a name and a colour
2. The resource must have the following capabilities
   2.1. To take the data of one tag or all of them at the same time
   2.2. Create one new tag or several new tags at a time
   2.3. Change the name and/or colour of one tag or several tags at a time
   2.4. Delete one tag or multiple tags at a time

Translated with www.DeepL.com/Translator (free version)
created Kaloyan Ivanov
