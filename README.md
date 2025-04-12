Installation:

Clone the project. <br>

in terminal, run the following commands: <br>

`php artisan migrate` <br>
`php artisan storage:link` <br>
`php artisan serve`

after serving you can do local fetch requests on the frontend project
through
`http://localhost:8000/api/playlist` [GET] & [POST]
`http://localhost:8000/api/playlist/{id}` [DELETE]
