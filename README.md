# Mobile Store PHP MVC Website

This is a PHP Model-View-Controller (MVC) website for selling mobile phones and accessories.

## Installation

1. Clone the repository.
2. Import the `database.sql` file to create the required database tables.
3. Copy `config.example.php` to `config.php` and update the database connection details.
4. Start a PHP server and open the website in a browser.

## Features

The website includes the following pages and features:

- Login page for users to authenticate and access the sales and admin pages.
- Sales page for displaying and filtering mobile phones and accessories, and adding them to the shopping cart.
- Admin page for managing the products and orders, including adding, editing, and deleting products and viewing orders.
- Search bar for searching products by name or description.
- Navigation bar for navigating between pages.
- Sidebar for displaying product categories and filtering products by category.
- Topbar for displaying the shopping cart and login/logout links.
- Footer for displaying copyright and contact information.
- Header for displaying the website name and logo.

## MVC Structure

The website follows the Model-View-Controller (MVC) architecture, with the following structure:

- `app` folder for the core application files.
  - `controllers` folder for the controller classes.
  - `models` folder for the model classes.
  - `views` folder for the view templates.
  - `helpers` folder for utility functions.
  - `router.php` for routing requests to the appropriate controller actions.
- `public` folder for the publicly accessible files.
  - `css` folder for the CSS files.
  - `js` folder for the JavaScript files.
  - `img` folder for the images.
- `database.sql` file for creating the required database tables.
- `config.example.php` file for configuring the database connection.
- `README.md` file for documenting the project.

## Contributing

Feel free to contribute to the project by submitting issues or pull requests.

## License

This project is licensed under the MIT License - see the `LICENSE` file for details.
