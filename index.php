<?php
// Define the SQLite database file path
$databasePath = 'data/database.sqlite';

// Create (or open) the SQLite database
$db = new PDO('sqlite:' . $databasePath);

// Create a table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY, 
    name TEXT, 
    email TEXT
)");

// Insert a new user
$db->exec("INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com')");
$db->exec("INSERT INTO users (name, email) VALUES ('Stephen Chan', 'stephen@example.ca')");

// Retrieve all users
$result = $db->query('SELECT * FROM users');

// Display the users
foreach ($result as $row) {
    echo "ID: " . $row['id'] . " Name: " . $row['name'] . " Email: " . $row['email'] . "<br>";
}