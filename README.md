PROJECT TESTE BOOKSTORE SIMPLE DDD

This is my bookstore test project, implemented using the technology stack mentioned in the provided file.

I've developed it with simplicity and efficiency in mind, opting for a streamlined approach. Utilizing repositories to manage methods and services to establish a comprehensible structure has been pivotal in achieving this goal.


📁 app
│
├── 📁 Domain
│   │
│   ├── 📁 Book
│   │   ├── Book.php
│   │   └── BookService.php
│   │   └── BookRepository.php
|   
│   ├── 📁 Store
│      ├── Store.php
│      └── StoreService.php
│      └── StoreRepository.php
├── 📁 Infrastructure
│   │
│   ├── 📁 Book
│   │     ├── EloquentBookRepository.php
│   │    
│   └── 📁 Store
|         └── EloquentStoreRepository.php
│   │
│   │
│   └── 📁 Providers
│       └── AppServiceProvider.php
│   
├── 📁Controllers
│       ├── BookController.php
│       └── StoreController.php
|       └── LoginController.php
