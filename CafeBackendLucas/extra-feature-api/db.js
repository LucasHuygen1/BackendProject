const mysql = require('mysql2');
require('dotenv').config();

// Maak verbinding met de database
const db = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE
});

// Controleer de connectie
db.connect((err) => {
    if (err) {
        console.error('Fout bij verbinden met de database:', err);
        process.exit(1);
    }
    console.log('Succesvolle verbinding met de database!');
});

module.exports = db;
