

// code pour ajouter des valeurs dans une base de données

var mysql = require('mysql');

var con = mysql.createConnection({
    host: "localhost",
    user: "toto",
    password: "1234",
    database: "mydb"
});

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    var sql = "INSERT INTO adherant (nom, description, photo) VALUES ('Company Inc', 'Highway 37')";
    con.query(sql, function (err, result) {
        if (err) throw err;
        console.log("1 record inserted");
    });
});