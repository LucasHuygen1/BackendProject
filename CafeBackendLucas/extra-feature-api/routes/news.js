const express = require('express');
const router = express.Router();
const db = require('../db');

// GET alles
router.get('/news', (req, res) => {
    const query = 'SELECT * FROM news';
    db.query(query, (err, results) => {
        if (err) {
            console.error('Fout bij ophalen van nieuws:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }
        res.json(results);
    });
});

//  GET op basis van ID
router.get('/news/:id', (req, res) => {
    const query = 'SELECT * FROM news WHERE id = ?';
    db.query(query, [req.params.id], (err, results) => {
        if (err) {
            console.error('Fout bij ophalen van news:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }

        if (results.length === 0) {
            res.status(404).json({ message: 'Nieuwtje niet gevonden' });
            return;
        }

        res.json(results[0]);
    });
});

// POST
router.post('/news', (req, res) => {
    const { title, content, published_at } = req.body;
    const query = 'INSERT INTO news (title, content, published_at, user_id) VALUES (?, ?, ?, 1)';

    db.query(query, [title, content, published_at], (err, results) => {
        if (err) {
            console.error('Fout bij toevoegen van news:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }

        res.status(201).json({ message: 'Nieuwtje toegevoegd', id: results.insertId });
    });
});

// PUT
router.put('/news/:id', (req, res) => {
    const { title, content, published_at } = req.body;
    const query = 'UPDATE news SET title = ?, content = ?, published_at = ? WHERE id = ?';

    db.query(query, [title, content, published_at, req.params.id], (err, results) => {
        if (err) {
            console.error('Fout bij bijwerken van news:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }

        if (results.affectedRows === 0) {
            res.status(404).json({ message: 'Nieuwtje niet gevonden' });
            return;
        }

        res.json({ message: 'Nieuwtje bijgewerkt' });
    });
});

//  DELETE
router.delete('/news/:id', (req, res) => {
    const query = 'DELETE FROM news WHERE id = ?';

    db.query(query, [req.params.id], (err, results) => {
        if (err) {
            console.error('Fout bij verwijderen van news:', err);
            res.status(500).json({ error: 'Server error' });
            return;
        }

        if (results.affectedRows === 0) {
            res.status(404).json({ message: 'Nieuws niet gevonden' });
            return;
        }

        res.json({ message: 'Nieuwtje verwijderd' });
    });
});



module.exports = router;
