const express = require('express');
const router = express.Router();
const db = require('../db');

// GET-route voor nieuwsartikelen
router.get('/news', (req, res) => {
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

module.exports = router;
