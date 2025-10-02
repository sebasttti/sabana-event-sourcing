Demo of Event Sourcing for Universidad de la Sabana
=================================================

This project is a simple demo of **Event Sourcing** using **Laravel** with **Breeze** (Tailwind included).  
**SQLite** is used as the source of truth, and a basic form is provided to register events, as an exercise of Diploma in Software Arquitecture from Universidad de la Sabana

-------------------------------------------------

🚀 Requirements
---------------

- PHP 8.2+
- Composer
- Node.js + NPM

-------------------------------------------------

⚙️ Installation
---------------

1. Clone the repository:

   git clone https://github.com/sebasttti/sabana-event-sourcing
   cd eventos-demo

2. Install PHP dependencies:

   composer install

3. Install Node dependencies:

   npm install

4. Copy the environment file:

   cp .env.example .env

5. Configure SQLite as the database in the `.env` file:

   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite

   Create the SQLite database file:

   mkdir -p database
   touch database/database.sqlite

6. Run migrations:

   php artisan migrate

7. Compile frontend assets (Tailwind included):

   npm run dev

-------------------------------------------------

▶️ Run the Project
------------------

Start the development server:

   php artisan serve

Open in your browser: http://localhost:8000

-------------------------------------------------

📌 Features
-----------

- Ready-to-use authentication thanks to **Laravel Breeze** (login, register, dashboard).  
- Simple form to register **events**.  
- Events are stored in **SQLite** as the source of truth.  
- As part of the demo, events can be projected to another medium (e.g., a text file) simulating **ElasticSearch**.

-------------------------------------------------

📝 Notes
--------

- This project is for **academic/demo purposes only**, not production-ready.  
- If the projection (text file) is deleted, it can be regenerated from the events stored in SQLite.  
