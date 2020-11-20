## About The Project

This project is a RESTful API with 2 endpoints:

1. `'/top-posts'`(To fetch top posts based on number of comments).
2. `'/search-comments'`(To fetch comments based on searchable fields).

    > The searchable fields are:
    - postId
    - id
    - email
    - name


Side note: I did try to fetch comments based on the **body** field of the comments API(https://jsonplaceholder.typicode.com/comments), but I think the    jsonplaceholder API does not support fetching comments through the **body** parameter(i.e. https://jsonplaceholder.typicode.com/comments?body=laudantium%20enim%20quasi%20est%20quidem%20magnam%20voluptate%20ipsam%20eos\ntempora%20quo%20necessitatibus\ndolor%20quam%20autem%20quasi\nreiciendis%20et%20nam%20sapiente%20accusantium does not return any results, even though it's the first comment returned in the https://jsonplaceholder.typicode.com/comments API.)
