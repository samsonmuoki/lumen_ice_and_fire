# Introduction

A set of rest API endpoints using PHP(Lumen) that can be used for listing the names of books along with their authors and comment count, adding and listing anonymous comments for a book, and getting the character list for a book.
The movie data is fetched online from https://anapioficeandfire.com/

The URL to the live demo of the backend api is: https://lumen-ice-and-fire-muoki.herokuapp.com/api/books

The URL to the live demo of the frontend is https://react-ice-and-fire-muoki.herokuapp.com

# Available endpoints

The book api endpoint is: [/api/books](https://lumen-ice-and-fire-muoki.herokuapp.com/api/books)

The character api endpoint is: [/api/characters](https://lumen-ice-and-fire-muoki.herokuapp.com/api/characters)

The comment api endpoint is: [/api/comments](https://lumen-ice-and-fire-muoki.herokuapp.com/api/comments)

## BOOKS API: `api/books`

### View all books

Sample request: `curl https://lumen-ice-and-fire-muoki.herokuapp.com/api/books`

Sample response:

```
[
    {
        "id": 1,
        "name": "A Game of Thrones",
        "authors": "George R. R. Martin",
        "released": "1996-08-01",
        "created_at": "2022-03-27T11:52:10.000000Z",
        "updated_at": "2022-03-27T11:52:10.000000Z",
        "comments_count": 21,
        "bookscharacters": [
            {
            "id": 1,
            "book_id": 1,
            "character_id": 2,
            "created_at": "2022-03-27T11:52:10.000000Z",
            "updated_at": "2022-03-27T11:52:10.000000Z",
            "character_name": "Balon Greyjoy"
            }
        ]
},
    {
        "id": 2,
        "name": "A Clash of Kings",
        "authors": "George R. R. Martin",
        "released": "1999-02-02",
        "created_at": "2022-03-27T11:52:10.000000Z",
        "updated_at": "2022-03-27T11:52:10.000000Z",
        "comments_count": 0,
        "bookscharacters": [
            {
            "id": 15,
            "book_id": 2,
            "character_id": 2,
            "created_at": "2022-03-27T11:52:10.000000Z",
            "updated_at": "2022-03-27T11:52:10.000000Z",
            "character_name": "Balon Greyjoy"
            }
        ]
    }
]
```

### View a specific book: `api/books/id`

Sample request: `curl https://lumen-ice-and-fire-muoki.herokuapp.com/api/books/1`

Sample response:

```
{
   "id": 1,
   "name": "A Game of Thrones",
   "authors": "George R. R. Martin",
   "released": "1996-08-01",
   "created_at": "2022-03-27T11:52:10.000000Z",
   "updated_at": "2022-03-27T11:52:10.000000Z",
   "bookscharacters": [
       {
           "id": 1,
           "book_id": 1,
           "character_id": 2,
           "created_at": "2022-03-27T11:52:10.000000Z",
           "updated_at": "2022-03-27T11:52:10.000000Z",
           "character_name": "Balon Greyjoy"
       },
       {
           "id": 2,
           "book_id": 1,
           "character_id": 12,
           "created_at": "2022-03-27T11:52:10.000000Z",
           "updated_at": "2022-03-27T11:52:10.000000Z",
           "character_name": "Walder"
       }
   ],
   "comments": [
       {
           "id": 1,
           "content": "A very great book",
           "ip_address": "10.1.46.230",
           "book_id": 1,
           "created_at": "2022-03-27T18:04:32.000000Z",
           "updated_at": "2022-03-27T18:04:32.000000Z"
       }
   ]
}
```

## COMMENTS API: `api/comments`

### View all comments for all books

Sample request:
`curl https://lumen-ice-and-fire-muoki.herokuapp.com/api/comments`

Sample response:

```
{
   "1": {
       "id": 2,
       "content": "Kitabu kizuri",
       "ip_address": "10.1.51.241",
       "book_id": 2,
       "created_at": "2022-03-27T18:34:55.000000Z",
       "updated_at": "2022-03-27T18:34:55.000000Z"
   },
   "0": {
       "id": 1,
       "content": "A very great book",
       "ip_address": "10.1.46.230",
       "book_id": 1,
       "created_at": "2022-03-27T18:04:32.000000Z",
       "updated_at": "2022-03-27T18:04:32.000000Z"
   }
}
```

### Adding a comment to a book: `api/comments?book_id=book_id&content=content`

Make a POST request with the book_id and content of the comment

Sample request:
`curl -d "book_id=1&content=Kitabu kizuri" -X POST https://lumen-ice-and-fire-muoki.herokuapp.com/api/comments`

Sample response:

```
Status code: 201 created

{
   "book_id": "2",
   "content": "Kitabu kizuri",
   "ip_address": "10.1.51.241",
   "updated_at": "2022-03-27T18:34:55.000000Z",
   "created_at": "2022-03-27T18:34:55.000000Z",
   "id": 2
}
```

## CHARACTERS API: `api/characters`

### View all characters

Sample request:
`curl https://lumen-ice-and-fire-muoki.herokuapp.com/api/characters`

Sample response:

```
{
   "number_of_characters": 2,
   "total_age_in_years": "1369.90",
   "total_age_in_months": 16432,
   "characters": [
       {
           "id": 1,
           "name": "",
           "gender": "Female",
           "date_of_birth": "1987-03-12",
           "created_at": "2022-03-27T11:51:23.000000Z",
           "updated_at": "2022-03-27T11:51:23.000000Z",
           "age_in_years": "35.0",
           "age_in_months": 420
       },
       {
           "id": 2,
           "name": "Walder",
           "gender": "Male",
           "date_of_birth": "2015-04-23",
           "created_at": "2022-03-27T11:51:23.000000Z",
           "updated_at": "2022-03-27T11:51:23.000000Z",
           "age_in_years": "6.9",
           "age_in_months": 83
       }
}
```

-   Each character is assigned a random _date_of_birth_ value at the time of seeding the database.
-   The _age_in_years_ and _age_in_months_ are custom attributes calculated from the _date_of_birth_ value and don’t exist in the database.

### View a specific character: `api/characters/id`

Sample request:
`curl https://lumen-ice-and-fire-muoki.herokuapp.com/api/characters/1`

Sample response:

```
{
   "id": 1,
   "name": "",
   "gender": "Female",
   "date_of_birth": "1987-03-12",
   "created_at": "2022-03-27T11:51:23.000000Z",
   "updated_at": "2022-03-27T11:51:23.000000Z",
   "age_in_years": "35.0",
   "age_in_months": 420
}
```

### Filter by gender: `api/characters?gender=value`

Accepted values for the gender are: `Male` and `Female`

Sample request:
`curl https://lumen-ice-and-fire-muoki.herokuapp.com/api/characters?gender=Male`

Sample response:

```
{
   "number_of_characters": 2,
   "total_age_in_years": "33.1",
   "total_age_in_months": 397,
   "characters": [
       {
           "id": 2,
           "name": "Walder",
           "gender": "Male",
           "date_of_birth": "2015-04-23",
           "created_at": "2022-03-27T11:51:23.000000Z",
           "updated_at": "2022-03-27T11:51:23.000000Z",
           "age_in_years": "6.9",
           "age_in_months": 83
       },
       {
           "id": 3,
           "name": "",
           "gender": "Male",
           "date_of_birth": "1995-12-31",
           "created_at": "2022-03-27T11:51:23.000000Z",
           "updated_at": "2022-03-27T11:51:23.000000Z",
           "age_in_years": "26.2",
           "age_in_months": 314
       }
   ]
}
```

### Sorting

The api can sort characters by:

-   gender
-   age
-   name.

#### Sort by Gender

`api/characters?sort_by_gender=value`

#### Sort by Age

`api/characters?sort_by_age=value`

#### Sort by Name

`api/characters?sort_by_name=value`

-   For ascending order the acceptable value is `asc`
-   For descending order the acceptable value is `desc`

Sample request: _sorting_by_age_
`curl https://lumen-ice-and-fire-muoki.herokuapp.com/api/characters?sort_by_age=asc`

Sample response:

```
{
   "number_of_characters": 3,
   "total_age_in_years": "1369.90",
   "total_age_in_months": 16432,
   "characters": [
       {
           "id": 43,
           "name": "Aegon Targaryen",
           "gender": "Male",
           "date_of_birth": "1970-09-23",
           "created_at": "2022-03-27T11:51:23.000000Z",
           "updated_at": "2022-03-27T11:51:23.000000Z",
           "age_in_years": "51.5",
           "age_in_months": 618
       },
       {
           "id": 20,
           "name": "Mordane",
           "gender": "Female",
           "date_of_birth": "1971-09-04",
           "created_at": "2022-03-27T11:51:23.000000Z",
           "updated_at": "2022-03-27T11:51:23.000000Z",
           "age_in_years": "50.5",
           "age_in_months": 606
       },
       {
           "id": 4,
           "name": "",
           "gender": "Female",
           "date_of_birth": "1971-11-09",
           "created_at": "2022-03-27T11:51:23.000000Z",
           "updated_at": "2022-03-27T11:51:23.000000Z",
           "age_in_years": "50.3",
           "age_in_months": 604
       }
}
```

# DATABASE DESIGN

## Models

The database is made up of 4 models:

-   Books
-   Characters
-   Comments
-   BooksCharacters

### 1. Book

This table holds the basic details that describe a book. It has the following fields:

-   **id** - an integer value that is unique to each book
-   **name** - a string value for the title of the book
-   **authors** - a JSON field for storing a list of authors for the book
-   **released** - A DateTime value that shows when the book was published
-   **created_at** - a UTC DateTime value that shows when the record was created
-   **updated_at** - a UTC DateTime value that shows when the record was last updated

### 2. Character

All characters in the series of books are stored in this model. Each character has only one record in this model.
The model has the following fields:

-   **id** - an integer value that is unique to each character
-   **name** - a string value for the name of each character
-   **gender** - a string value for the gender of the character
-   **date_of_birth** - a DateTime value that shows when the character was born
-   **created_at** - a UTC DateTime value that shows when the record was created
-   **updated_at** - a UTC DateTime value that shows when the record was last updated

### 3. Comment

Holds all the comments made for all books. There is a one-to-many relationship between the Book model and the Comment model. i.e one book can have many comments but a comment can only belong to one book
The model has the following fields:

-   **id** - an autoincrement integer value that is unique to each comment
-   **book_id** - a foreign key to the book model that shows the book that the comment belongs to
-   **ip_address** - a string value that shows the IP address of the anonymous user that made the comment
-   **created_at** - a UTC DateTime value that shows when the record was created
-   **updated_at** - a UTC DateTime value that shows when the record was last updated

### 4. BooksCharacters

This table links each character to each book they appear. There is a many-to-many relationship between the Book model and the Character model.
The model has the following fields:

-   **book_id** - a foreign key to a book that a character appears in
-   **character_id** - a foreign key to a character that has appeared in the respective book pointed to by book_id
-   **created_at** - a UTC DateTime value that shows when the record was created
-   **updated_at** - a UTC DateTime value that shows when the record was last updated
