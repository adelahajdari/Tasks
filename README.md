An example of a **REST app** that implements user story:

"As a user, I want to have an ability to see a list of tasks for my day, so that I can do them one by one".

**Start:**
~~~~
docker-compose up -d --build


docker-compose logs -f app

~~~~
When vendors installation via composer will be finished go to [localhost:3000/api/1/task/list](http://localhost:3000/api/1/task/list)



**Run the tests:**

~~~~
docker-compose exec app vendor/bin/simple-phpunit
~~~~