## NQueens with NxN chessboard (PHP) 

This is a simple project to solve the NQueens problem with a NxN chessboard.

It is based on [Eight Queens puzzle](https://en.wikipedia.org/wiki/Eight_queens_puzzle), posed
by Max Friedrich William Bezzel in 1848.

### Architecture

This problem is approached using OOP, and the input data validation for scalar types are centralized on Value Objects.

The Domain code is covered by phpunit tests.

To deliver my solution, I include a simple Docker setup based on two containers, which are orchestrated 
by docker-compose.
- composer
- php-cli

To run this application, Docker and Docker-compose are needed in your local machine.
Please, check the usage section to run it by CLI.  

### Installation 

1. Launch containers
````
docker-compose up
````

2. Install dependencies
````      
docker-compose run composer install
````

3. Set permissions (I'm getting issues to solve this)
````
sudo chown -R $USER: .
````
    
### Testing

1. Launch containers (skip this step if you already launched it)
````
docker-compose up
````

2. Run Unit tests
````    
docker-compose run php-cli vendor/bin/phpunit tests
````

4. Generate tests coverage
````    
docker-compose run php-cli vendor/bin/phpunit tests --coverage-html /var/www/var
````    
    
### Usage

1. Launch containers (skip this step if you already launched it)
````
docker-compose up
````
    
2. Run application console command (try with 7 7 7)
````    
docker-compose run php-cli php /var/www/application.php app:play-nqueens [nQueens] [nCols] [nRows]
````
