require('dotenv').config();
const express = require('express');
const newsRoutes = require('./routes/news'); //routes van news

const app = express();
const port = process.env.PORT || 3000;

// Gebruik de routes
app.use('/api', newsRoutes);

// Start de server
app.listen(port, () => {
    console.log(`Server gestart op http://localhost:${port}`);
});
