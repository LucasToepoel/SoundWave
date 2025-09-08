### SoundWave

**SoundWave** is an advanced web application developed with the Laravel framework, designed to function as a clone of Spotify. This project allows us to implement the fundamental principles of a robust full-stack application, including user management, playlists, and audio streaming. The project is developed using the Scrum methodology, focusing on collaborative work and continuous iteration.

---

### Tech Stack

* **Backend**: Laravel 12
* **Frontend**: Tailwind CSS
* **Database**: MySQL
* **Version Control**: Git

---

### Naming Conventions

To ensure the codebase remains consistent and readable for everyone, we will adhere to the following naming conventions:

#### General PHP & Laravel Conventions

* **File and Folder Names**: Use `snake_case` (lowercase with underscores).
    * **Example**: `user_profile_controller.php`, `database/migrations/create_users_table.php`
* **Classes (Models, Controllers, Services)**: Use `PascalCase` (the first letter of each word is capitalized).
    * **Example**: `PlaylistController`, `Song`, `AuthService`
* **Methods and Variables**: Use `camelCase` (lowercase for the first word, then capitalize the first letter of each subsequent word).
    * **Example**: `$userPlaylists`, `getUserProfile()`
* **Database Names (Tables, Columns)**: Use `snake_case`. Table names should be plural, and column names singular.
    * **Example**: `users` (table), `first_name` (column)
* **Routes**: Use `kebab-case` for URLs.
    * **Example**: `my-profile/playlists`

#### Tailwind CSS Conventions

* Tailwind CSS is a *utility-first* framework. This means you primarily use the built-in utility classes directly in your HTML. As a result, you will rarely need to invent new CSS class names.
* When you **do** create a custom component, use a clear, descriptive naming convention that reflects the component's function. `kebab-case` is the preferred convention here.
    * **Example**: `.card-item`, `.btn-primary`, `.playlist-grid`

---

### Project Management

This project is managed using the **Scrum methodology**. Our progress is tracked using **User Stories**, which describe features from a user's perspective. We will hold regular **Daily Standups** and plan our tasks in **Sprint Planning** meetings.
https://trello.com/b/BRX9dLF6/scrum-bord
---

### Local Setup

Follow these steps to set up and run the project locally:

1.  **Clone the repository**:
    ```bash
    git clone git@github.com:LucasToepoel/SoundWave.git
    cd SoundWave
    ```
2.  **Install Composer dependencies**:
    ```bash
    composer install
    ```
3.  **Copy the `.env` file and generate an app key**:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4.  **Configure the database**:
    * Update the database settings in the `.env` file.
5.  **Run the database migrations**:
    ```bash
    php artisan migrate
    ```
6.  **Install npm dependencies and compile assets**:
    ```bash
    npm install
    npm run dev
    ```
7.  **Start the local Laravel server**:
    ```bash
    php artisan serve
    ```
8.  Navigate to `http://127.0.0.1:8000` in your browser to view the application.

---

### Contributing to the Project

* Create a new Git branch for each new feature or bug fix. Use a clear branch name, such as `feat/user-profile-page` or `fix/registration-form-bug`.
* Once your work is complete, create a Pull Request (PR) to the `main` branch.
* Ensure your code adheres to the naming conventions and is free of syntax errors.
* Update your `user stories` in the project management tool (e.g., Notion or another tool) after your work is finished.
