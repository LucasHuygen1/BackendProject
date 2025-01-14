const express = require('express');
const mysql = require('mysql2');
require('dotenv').config(); 

// Databaseverbinding maken
const db = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE
});

//connectie
db.connect((err) => {
    if (err) {
        console.error('Fout bij verbinden met de database:', err);
        return;
    }
    console.log('Succesvolle verbinding met de database!');
});

const app = express();


// Server starten
const port = 3000;
app.listen(port, () => {
    console.log(`Server gestart op http://localhost:${port}`);
});


// GET-route voor nieuwsartikelen
app.get('/api/news', (req, res) => {
    const query = 'SELECT * FROM news';
    db.query(query, (err, results) => {
        if (err) {
            console.error('Fout bij ophalen van nieuwsartikelen:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }
        res.json(results);
    });
});