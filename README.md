# Cyber Cynergy API

A RESTful backend API for Cyber Cynergy — a cybersecurity company managing clients, services, incidents, and audits across West Africa.

Built with Laravel 11, MySQL, and Laravel Sanctum.

---

## Tech Stack

- PHP 8.2+
- Laravel 11
- MySQL 8
- Laravel Sanctum 
- Postman 

---

## Setup Instructions

 1. Clone the repository
git clone https://github.com/04elzeinALi/cyber-cynergy-api.git
cd cyber-cynergy-api

 2. Install dependencies
composer install

 3. Copy environment file
cp .env.example .env

 4. Configure your .env
Set your database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cyber_cynergy
DB_USERNAME=root
DB_PASSWORD=

 5. Generate app key
php artisan key:generate

 6. Create the database
Create a MySQL database named `cyber_cynergy`

 7. Run migrations
php artisan migrate

 8. Start the server
php artisan serve

 9. hit http://127.0.0.1:8000

---

## Authentication

This API uses token-based authentication via Laravel Sanctum.

1. Register at `POST /api/register`
2. Login at `POST /api/login` to receive a token
3. Pass the token as a Bearer Token in the Authorization header for all protected routes

---

## API Endpoints

### Auth (Public)
| Method | Endpoint | Description |
|---|---|---|
| POST | /api/register | Register a new user |
| POST | /api/login | Login and receive token |

### Auth (Protected)
| Method | Endpoint | Description |
|---|---|---|
| GET | /api/me | Get authenticated user |
| POST | /api/logout | Logout and delete token |

### Clients
| Method | Endpoint | Description |
|---|---|---|
| GET | /api/clients | Get all clients |
| POST | /api/clients | Create a client |
| GET | /api/clients/{id} | Get a client |
| PUT | /api/clients/{id} | Update a client |
| DELETE | /api/clients/{id} | Delete a client |

### Services
| Method | Endpoint | Description |
|---|---|---|
| GET | /api/services | Get all services |
| POST | /api/services | Create a service |
| GET | /api/services/{id} | Get a service |
| PUT | /api/services/{id} | Update a service |
| DELETE | /api/services/{id} | Delete a service |

### Incidents
| Method | Endpoint | Description |
|---|---|---|
| GET | /api/incidents | Get all incidents |
| POST | /api/incidents | Create an incident |
| GET | /api/incidents/{id} | Get an incident |
| PUT | /api/incidents/{id} | Update an incident |
| DELETE | /api/incidents/{id} | Delete an incident |
| POST | /api/incidents/{id}/assign | Assign incident to analyst |
| POST | /api/incidents/{id}/resolve | Resolve an incident |
| GET | /api/incidents/{id}/comments | Get incident comments |
| POST | /api/incidents/{id}/comments | Add a comment |

### Audits
| Method | Endpoint | Description |
|---|---|---|
| GET | /api/audits | Get all audits |
| POST | /api/audits | Create an audit |
| GET | /api/audits/{id} | Get an audit |
| PUT | /api/audits/{id} | Update an audit |
| DELETE | /api/audits/{id} | Delete an audit |
| POST | /api/audits/{id}/complete | Complete an audit |

---

## User Roles

| Role | Permissions |
|---|---|
| admin | Full access to all resources |
| analyst | Handle assigned incidents and audits |

---

## Developed by

Ali Elzein — Backend Developer Intern
Cyber Cynergy | XpertBot Academy
