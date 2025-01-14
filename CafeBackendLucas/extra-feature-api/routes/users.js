const express = require('express');
const router = express.Router();
const db = require('../db');

// GET alles
router.get('/users', (req, res) => {
    const query = 'SELECT * FROM users';
    db.query(query, (err, results) => {
        if (err) {
            console.error('Fout bij ophalen van user:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }
        res.json(results);
    });
});

//  GET op basis van ID
router.get('/users/:id', (req, res) => {
    const query = 'SELECT * FROM users WHERE id = ?';
    db.query(query, [req.params.id], (err, results) => {
        if (err) {
            console.error('Fout bij ophalen van users:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }

        if (results.length === 0) {
            res.status(404).json({ message: 'user niet gevonden' });
            return;
        }

        res.json(results[0]);
    });
});

// POST
router.post('/users', (req, res) => {
    const { name, email, password, birthday, about, role, created_at} = req.body;
    //user id zetten we altijd op 1 anders error
    const query = 'INSERT INTO users (name, email, password, birthday, about, role, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)';

    db.query(query, [name, email, password, birthday, about, role, created_at], (err, results) => {
        if (err) {
            console.error('Fout bij toevoegen van users:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }

        res.status(201).json({ message: 'user toegevoegd', id: results.insertId });
    });
});

// PUT
router.put('/users/:id', (req, res) => {
    const { name, email, password, birthday, about, role, created_at} = req.body;
    const query = 'UPDATE users SET name = ?, email = ?, password = ?, birthday = ?,about = ?, role = ?, created_at = ?  WHERE id = ?';

    db.query(query, [name, email, password, birthday, about, role, created_at], (err, results) => {
        if (err) {
            console.error('Fout bij bijwerken van users:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }

        if (results.affectedRows === 0) {
            res.status(404).json({ message: 'user niet gevonden' });
            return;
        }

        res.json({ message: 'user bijgewerkt' });
    });
});

//  DELETE
router.delete('/users/:id', (req, res) => {
    const query = 'DELETE FROM users WHERE id = ?';

    db.query(query, [req.params.id], (err, results) => {
        if (err) {
            console.error('Fout bij verwijderen van users:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }

        if (results.affectedRows === 0) {
            res.status(404).json({ message: 'user niet gevonden' });
            return;
        }

        res.json({ message: 'user verwijderd' });
    });
});



module.exports = router;
