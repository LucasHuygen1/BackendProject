require('dotenv').config();
const express = require('express');
const newsRoutes = require('./routes/news'); //routes van news
const usersRoutes = require('./routes/users'); //routes van users


const app = express();
const port = process.env.PORT || 3000;

//JSON parser
app.use(express.json()); 

// Gebruik de routes
app.use('/api', newsRoutes);
app.use('/api', usersRoutes);


// Start de server
app.listen(port, () => {
    console.log(`Server gestart op http://localhost:${port}`);
});
